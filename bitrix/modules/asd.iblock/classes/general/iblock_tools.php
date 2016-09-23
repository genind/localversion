<?php

class CASDiblockTools {

	public static $arNotExport = array('ID', 'TIMESTAMP_X', 'IBLOCK_ID', 'TMP_ID', 'EXTERNAL_ID', 'PROPERTY_ID', 'PROPERTY_NAME', 'PROPERTY_SORT');

	public static function ExportPropsToXML($BID) {
		$xml = '';
		$arOnlyID = $_REQUEST['p'];
		if ($BID>0 && CModule::IncludeModule('iblock')) {
			$xml .= '<?xml version="1.0" encoding="'.SITE_CHARSET.'"?>'."\n";
			$xml .= '<asd_iblock_props>'."\n";
			$xml .= "\t".'<props>'."\n";
			$arExported = array();
			$arCData = array('NAME', 'DEFAULT_VALUE', 'XML_ID', 'FILE_TYPE', 'USER_TYPE_SETTINGS', 'HINT', 'VALUE');
			$rsProp = CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $BID));
			while ($arProp = $rsProp->Fetch()) {
				if (!empty($arOnlyID) && !isset($arOnlyID[$arProp['ID']])) {
					continue;
				}
				$arExported[] = $arProp['CODE'];
				$xml .= "\t\t".'<prop>'."\n";
				foreach ($arProp as $k => $v) {
					if (in_array($k, self::$arNotExport)) {
						continue;
					}
					if (in_array($k, $arCData) && strlen(trim($v))) {
						$v = '<![CDATA['.$v.']]>';;
					}
					$xml .= "\t\t\t".'<'.strtolower($k).'>'.$v.'</'.strtolower($k).'>'."\n";
				}
				$xml .= "\t\t".'</prop>'."\n";
			}
			$xml .= "\t".'</props>'."\n";
			$xml .= "\t".'<enums>'."\n";
			$rsProp = CIBlockPropertyEnum::GetList(array(), array('IBLOCK_ID' => $BID));
			while ($arProp = $rsProp->Fetch()) {
				if (!in_array($arProp['PROPERTY_CODE'], $arExported)) {
					continue;
				}
				$xml .= "\t\t".'<enum>'."\n";
				foreach ($arProp as $k => $v) {
					if (in_array($k, self::$arNotExport)) {
						continue;
					}
					if (in_array($k, $arCData) && strlen(trim($v))) {
						$v = '<![CDATA['.$v.']]>';;
					}
					$xml .= "\t\t\t".'<'.strtolower($k).'>'.$v.'</'.strtolower($k).'>'."\n";
				}
				$xml .= "\t\t".'</enum>'."\n";
			}
			$xml .= "\t".'</enums>'."\n";
			$xml .= '</asd_iblock_props>';
		}
		return $xml;
	}

	public static function ImportPropsFromXML($BID, $xmlPath) {
		if (file_exists($xmlPath) && $BID && CModule::IncludeModule('iblock')) {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/classes/general/xml.php');

			$arExistProps = array();
			$rsProp = CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $BID));
			while ($arProp = $rsProp->Fetch()) {
				$arExistProps[$arProp['CODE']] = $arProp;
			}

			$arExistEnums = array();
			$rsEnum = CIBlockPropertyEnum::GetList(array(), array('IBLOCK_ID' => $BID));
			while ($arEnum = $rsEnum->Fetch()) {
				$arExistEnums[$arEnum['PROPERTY_ID'].'_'.$arEnum['XML_ID']] = $arEnum;
			}

			$xml = new CDataXML();
			$ep = new CIBlockProperty();
			$en = new CIBlockPropertyEnum();
			if ($xml->Load($xmlPath)) {
				if ($node = $xml->SelectNodes('/asd_iblock_props/props/')) {
					foreach ($node->children() as $child) {
						$arProp = array_pop($child->__toArray());
						$arFields = array('IBLOCK_ID' => $BID);
						foreach ($arProp as $code => $v) {
							$arFields[strtoupper($code)] = is_array($v[0]['#']['cdata-section']) ? $v[0]['#']['cdata-section'][0]['#'] : $v[0]['#'];
						}
						if (isset($arExistProps[$arFields['CODE']])) {
							$ep->Update($arExistProps[$arFields['CODE']]['ID'], $arFields);
						} else {
							$arFields['ID'] = $ep->Add($arFields);
							$arExistProps[$arFields['CODE']] = $arFields;
						}
					}
				}
				if ($node = $xml->SelectNodes('/asd_iblock_props/enums/')) {
					foreach ($node->children() as $child) {
						$arProp = array_pop($child->__toArray());
						$arFields = array('IBLOCK_ID' => $BID);
						foreach ($arProp as $code => $v) {
							$arFields[strtoupper($code)] = is_array($v[0]['#']['cdata-section']) ? $v[0]['#']['cdata-section'][0]['#'] : $v[0]['#'];
						}
						$arFields['PROPERTY_ID'] = $arExistProps[$arFields['PROPERTY_CODE']]['ID'];
						if (isset($arExistEnums[$arFields['PROPERTY_ID'].'_'.$arFields['XML_ID']])) {
							$en->Update($arExistEnums[$arFields['PROPERTY_ID'].'_'.$arFields['XML_ID']]['ID'], $arFields);
						} else {
							$en->Add($arFields);
						}
					}
				}
			}
		}
	}

	public static function GetIBUF($BID, $CODE=false) {
		global $USER_FIELD_MANAGER, $APPLICATION;
		$arReturn = array();
		$arUserFields = $USER_FIELD_MANAGER->GetUserFields(CASDiblock::$UF_IBLOCK, $BID, LANGUAGE_ID);
		foreach($arUserFields as $FIELD_NAME => $arUserField) {
			if ($arUserField['USER_TYPE_ID'] == 'enumeration') {
				$arValue = array();
				$rsSecEnum = CUserFieldEnum::GetList(array(), array('USER_FIELD_ID' => $arUserFields['ID']));
				while ($arSecEnum = $rsSecEnum->Fetch()) {
					$arValue[$arSecEnum['ID']] = $arSecEnum['VALUE'];
				}
				$arReturn[$FIELD_NAME] = $arValue;
			} else {
				$arReturn[$FIELD_NAME] = $arUserField['VALUE'];
			}
		}
		return $CODE===false ? $arReturn : $arReturn[$CODE];
	}
}