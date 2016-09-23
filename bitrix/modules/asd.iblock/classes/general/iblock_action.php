<?php

class CASDiblockAction {

	public static function OnBeforePrologHandler() {

		$BID = intval($_REQUEST['ID']);

		if ($_REQUEST['action']=='asd_prop_export' && $BID>0 && check_bitrix_sessid() &&
			CModule::IncludeModule('iblock') && CIBlock::GetPermission($BID)>='W'
		) {
			$strPath = $_SERVER['DOCUMENT_ROOT'].'/bitrix/tmp/asd.iblock/';
			$strName = 'asd_props_export_'.$BID.'_'.md5(LICENSE_KEY).'.xml';
			CheckDirPath($strPath);
			if ($hdlOutput = fopen($strPath.$strName, 'wb')) {
				fwrite($hdlOutput, CASDiblockTools::ExportPropsToXML($BID));
				fclose($hdlOutput);
			}
			?><script type="text/javascript">
top.BX.closeWait(); top.BX.WindowManager.Get().AllowClose(); top.BX.WindowManager.Get().Close();
window.location = 'http://<? echo $_SERVER['SERVER_NAME']; ?>/bitrix/tools/asd.iblock/props_export.php?ID=<? echo $BID; ?>';
</script><?
			die();
		}

		if ($_REQUEST['action']=='asd_prop_import' && $BID>0 && !$_FILES['xml_file']['error'] &&
			check_bitrix_sessid() && CModule::IncludeModule('iblock') && CIBlock::GetPermission($BID)>='W'
		) {
			CASDiblockTools::ImportPropsFromXML($BID, $_FILES['xml_file']['tmp_name']);
			LocalRedirect('/bitrix/admin/iblock_edit.php?type='.$_REQUEST['type'].'&tabControl_active_tab=edit2&lang='.LANG.'&ID='.$BID.'&admin=Y');
		}

		$strCurPage = $GLOBALS['APPLICATION']->GetCurPage();
		$bRightPage = ($strCurPage=='/bitrix/admin/iblock_list_admin.php' ||
						$strCurPage=='/bitrix/admin/iblock_element_admin.php' ||
						$strCurPage == '/bitrix/admin/cat_product_admin.php');

		if ($bRightPage && $_REQUEST['action']=='asd_copy_in_list' && strlen($_REQUEST['ID'])>0) {
			$bDoAction = true;
			$_REQUEST['action'] = 'asd_copy';
			$_REQUEST['asd_ib_dest'] = $_REQUEST['IBLOCK_ID'];
			$_REQUEST['ID'] = array($_REQUEST['ID']);
		} else {
			$bDoAction = false;
		}

		if ($bRightPage && check_bitrix_sessid() && !empty($_REQUEST['ID']) &&
			($_SERVER['REQUEST_METHOD']=='POST' || $bDoAction) && CModule::IncludeModule('iblock') &&
			(($_REQUEST['action']=='asd_copy' && $_REQUEST['asd_ib_dest']>0 && CIBlock::GetPermission($_REQUEST['asd_ib_dest'])>='W') ||
			 ($_REQUEST['action']=='asd_move' && $_REQUEST['asd_ib_dest']>0 && CIBlock::GetPermission($_REQUEST['asd_ib_dest'])>='W'
			&& CIBlock::GetPermission($_REQUEST['IBLOCK_ID'])>='X'))
		) {
			$intSetSectID = 0;
			if (array_key_exists('asd_sect_dest', $_REQUEST)) {
				$intSetSectID = intval($_REQUEST['asd_sect_dest']);
			}

			$arPropListCache = array();
			$arOldPropListCache = array();
			$intSrcIBlockID = intval($_REQUEST['IBLOCK_ID']);
			$intDestIBlockID = intval($_REQUEST['asd_ib_dest']);
			$arDestIBlock = CIBlock::GetArrayByID($intDestIBlockID);
			$arDestIBFields = $arDestIBlock['FIELDS'];
			$boolCodeUnique = false;
			if ('Y' == $arDestIBFields['CODE']['DEFAULT_VALUE']['UNIQUE']) {
				$boolCodeUnique = ($intSrcIBlockID == $intDestIBlockID);
			}

			$boolCatalog = CModule::IncludeModule('catalog');
			$boolCopyCatalog = false;
			$boolNewCatalog = false;
			if ($boolCatalog) {
				$boolCopyCatalog = (is_array(CCatalog::GetByID($intDestIBlockID)));
				$boolNewCatalog = $boolCopyCatalog;
				if ($boolCopyCatalog) {
					$boolCopyCatalog = (is_array(CCatalog::GetByID($intSrcIBlockID)));
				}
			}

			$el = new CIBlockElement();
			foreach ($_REQUEST['ID'] as $eID) {
				if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_list_admin.php') {
					if ('E' != substr($eID, 0, 1)) {
						continue;
					}
					$ID = intval(substr($eID, 1));
				} else {
					$ID = intval($eID);
				}
				if ($obSrc = CIBlockElement::GetByID($ID)->GetNextElement()) {
					$arSrc = $obSrc->GetFields();
					$arSrcPr = $obSrc->GetProperties();
					$arSrc = array(
						'IBLOCK_ID' => $intDestIBlockID,
						'ACTIVE' => $arSrc['ACTIVE'],
						'ACTIVE_FROM' => $arSrc['ACTIVE_FROM'],
						'ACTIVE_TO' => $arSrc['ACTIVE_TO'],
						'SORT' => $arSrc['SORT'],
						'NAME' => $arSrc['~NAME'],
						'PREVIEW_PICTURE' => $arSrc['PREVIEW_PICTURE']>0 ? CFile::MakeFileArray($arSrc['PREVIEW_PICTURE']) : '',
						'PREVIEW_TEXT' => $arSrc['~PREVIEW_TEXT'],
						'PREVIEW_TEXT_TYPE' => $arSrc['PREVIEW_TEXT_TYPE'],
						'DETAIL_TEXT' => $arSrc['~DETAIL_TEXT'],
						'DETAIL_TEXT_TYPE' => $arSrc['DETAIL_TEXT_TYPE'],
						'DETAIL_PICTURE' => $arSrc['DETAIL_PICTURE']>0 ? CFile::MakeFileArray($arSrc['DETAIL_PICTURE']) : '',
						'WF_STATUS_ID' => $arSrc['WF_STATUS_ID'],
						'CODE' => $arSrc['~CODE'],
						'TAGS' => $arSrc['~TAGS'],
						'XML_ID' => $arSrc['~XML_ID'],
						'PROPERTY_VALUES' => array(),
					);
					if ('Y' == $arDestIBFields['CODE']['IS_REQUIRED']) {
						if (!strlen($arSrc['CODE'])) {
							$arSrc['CODE'] = mt_rand(100000, 1000000);
						}
					}
					if ('Y' == $arDestIBFields['CODE']['DEFAULT_VALUE']['UNIQUE']) {
						$boolElCodeUnique = $boolCodeUnique;
						if (!$boolCodeUnique) {
							$rsCheckItems  = CIBlockElement::GetList(array(), array('IBLOCK_ID' => $intDestIBlockID, '=CODE' => $arSrc['CODE'], 'CHECK_PERMISSIONS' => 'N'),
																	false, array('nTopCount' => 1), array('ID', 'IBLOCK_ID'));
							if ($arCheck = $rsCheckItems->Fetch()) {
								$boolElCodeUnique = true;
							}
						}
						if ($boolElCodeUnique) {
							$arSrc['CODE'] .= mt_rand(100, 10000);
						}
					}
					if (0 < $intSetSectID) {
						$arSrc['IBLOCK_SECTION_ID'] = $intSetSectID;
					} elseif ($intSrcIBlockID == $intDestIBlockID) {
						$arSectionList = array();
						$rsSections = CIBlockElement::GetElementGroups($ID, true);
						while ($arSection = $rsSections->Fetch()) {
							$arSectionList[] = $arSection['ID'];
						}
						$arSrc['IBLOCK_SECTION'] = $arSectionList;
					}
					if ($intSrcIBlockID != $intDestIBlockID) {
						if (empty($arPropListCache)) {
							$rsProps = CIBlockProperty::GetList(
								array(),
								array('IBLOCK_ID' => $intDestIBlockID, 'PROPERTY_TYPE' => 'L', 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'N')
							);
							while ($arProp = $rsProps->Fetch()) {
								$arValueList = array();
								$rsValues = CIBlockProperty::GetPropertyEnum($arProp['ID']);
								while ($arValue = $rsValues->Fetch()) {
									$arValueList[$arValue['XML_ID']] = $arValue['ID'];
								}
								if (!empty($arValueList)) {
									$arPropListCache[$arProp['CODE']] = $arValueList;
								}
							}
						}
						if (empty($arOldPropListCache)) {
							$rsProps = CIBlockProperty::GetList(
								array(),
								array('IBLOCK_ID' => $intSrcIBlockID, 'PROPERTY_TYPE' => 'L', 'ACTIVE' => 'Y', 'CHECK_PERMISSIONS' => 'N')
							);
							while ($arProp = $rsProps->Fetch()) {
								$arValueList = array();
								$rsValues = CIBlockProperty::GetPropertyEnum($arProp['ID']);
								while ($arValue = $rsValues->Fetch()) {
									$arValueList[$arValue['ID']] = $arValue['XML_ID'];
								}
								if (!empty($arValueList)) {
									$arOldPropListCache[$arProp['CODE']] = $arValueList;
								}
							}
						}
					}
					foreach ($arSrcPr as &$arProp) {
						if ($arProp['USER_TYPE'] == 'HTML') {
							$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = array('VALUE' => array('TEXT' => $arProp['~VALUE']['TEXT'], 'TYPE' => 'html'));
						} elseif ($arProp['PROPERTY_TYPE'] == 'F') {
							if (is_array($arProp['VALUE'])) {
								$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = array();
								foreach ($arProp['VALUE'] as $file) {
									if ($file > 0) {
										$arSrc['PROPERTY_VALUES'][$arProp['CODE']][] = CFile::MakeFileArray($file);
									}
								}
							} elseif ($arProp['VALUE'] > 0) {
								$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = CFile::MakeFileArray($arProp['VALUE']);
							}
						} elseif ($arProp['PROPERTY_TYPE'] == 'L') {
							if (!empty($arProp['VALUE_ENUM_ID'])) {
								if ($intSrcIBlockID == $arSrc['IBLOCK_ID']) {
									$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = $arProp['VALUE_ENUM_ID'];
								} else {
									if (array_key_exists($arProp['CODE'], $arPropListCache) && array_key_exists($arProp['CODE'], $arOldPropListCache)) {
										if (is_array($arProp['VALUE_ENUM_ID'])) {
											$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = array();
											foreach ($arProp['VALUE_ENUM_ID'] as &$intValueID) {
												$strValueXmlID = $arOldPropListCache[$arProp['CODE']][$intValueID];
												$arSrc['PROPERTY_VALUES'][$arProp['CODE']][] = (array_key_exists($strValueXmlID, $arPropListCache[$arProp['CODE']]) ? $arPropListCache[$arProp['CODE']][$strValueXmlID] : '');
											}
											if (isset($intValueID)) {
												unset($intValueID);
											}
										} else {
											$strValueXmlID = $arOldPropListCache[$arProp['CODE']][$arProp['VALUE_ENUM_ID']];
											$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = (array_key_exists($strValueXmlID, $arPropListCache[$arProp['CODE']]) ? $arPropListCache[$arProp['CODE']][$strValueXmlID] : '');
										}
									}
								}
							}
						} else {
							$arSrc['PROPERTY_VALUES'][$arProp['CODE']] = $arProp['~VALUE'];
						}
					}
					if (isset($arProp)) {
						unset($arProp);
					}

					$intNewID = $el->Add($arSrc, true, true, true);
					if ($intNewID) {
						if ($boolCatalog && $boolCopyCatalog) {
							$priceRes = CPrice::GetList(
								array(),
								array('PRODUCT_ID' => $ID),
								false,
								false,
								array('PRODUCT_ID', 'EXTRA_ID', 'CATALOG_GROUP_ID', 'PRICE', 'CURRENCY', 'QUANTITY_FROM', 'QUANTITY_TO')
							);
							while ($arPrice = $priceRes->Fetch()){
								$arPrice['PRODUCT_ID'] = $intNewID;
								CPrice::Add($arPrice);
							}
						}
						if ($boolCatalog && $boolNewCatalog) {
							$arProduct = array(
								'ID' => $intNewID
							);
							if ($boolCopyCatalog) {
								$productRes = CCatalogProduct::GetList(
									array(),
									array('ID' => $ID),
									false,
									false,
									array(
										'QUANTITY',
										'QUANTITY_TRACE_ORIG',
										'CAN_BUY_ZERO_ORIG',
										'NEGATIVE_AMOUNT_TRACE_ORIG',
										'WEIGHT',
										'PRICE_TYPE',
										'RECUR_SCHEME_TYPE',
										'RECUR_SCHEME_LENGTH',
										'TRIAL_PRICE_ID',
										'WITHOUT_ORDER',
										'SELECT_BEST_PRICE',
										'VAT_ID',
										'VAT_INCLUDED',
									)
								);
								if ($arCurProduct = $productRes->Fetch()){
									$arProduct = $arCurProduct;
									$arProduct['ID'] = $intNewID;
									$arProduct['QUANTITY_TRACE'] = $arProduct['QUANTITY_TRACE_ORIG'];
									$arProduct['CAN_BUY_ZERO'] = $arProduct['CAN_BUY_ZERO_ORIG'];
									$arProduct['NEGATIVE_AMOUNT_TRACE'] = $arProduct['NEGATIVE_AMOUNT_TRACE_ORIG'];
								}
							}
							CCatalogProduct::Add($arProduct, false);
						}
						if ($_REQUEST['action'] == 'asd_move') {
							$el->Delete($ID);
						}

					}
					else {
						CASDiblock::$error .= '['.$arSrc['ID'].'] '.$el->LAST_ERROR."\n";
					}
				}
			}

			unset($_REQUEST['action']);
		}

		if ($_REQUEST['action']=='asd_remove' && isset($_REQUEST['find_section_section']) &&
			check_bitrix_sessid() && CIBlock::GetPermission($BID)>='W'
		) {
			$intSectionID = intval($_REQUEST['find_section_section']);
			if (0 < $intSectionID) {
				foreach ($_REQUEST['ID'] as $eID) {
					if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_list_admin.php') {
						if ('E' != substr($eID, 0, 1)) {
							continue;
						}
						$ID = intval(substr($eID, 1));
					} else {
						$ID = intval($eID);
					}
					$arSectionList = array();
					$rsSections = CIBlockElement::GetElementGroups($ID, true);
					while ($arSection = $rsSections->Fetch()) {
						$arSection['ID'] = intval($arSection['ID']);
						if ($arSection['ID'] != $intSectionID)
							$arSectionList[] = $arSection['ID'];
					}
					CIBlockElement::SetElementSection($ID, $arSectionList, false);
				}
			}
			unset($_REQUEST['action']);
		}
	}

	public static function OnAfterIBlockUpdateHandler($arFields) {
		if ($arFields['RESULT'] && CIBlock::GetPermission($arFields['ID'])>='W') {
			global $USER_FIELD_MANAGER, $HTTP_POST_FILES;
			$PROPERTY_ID = CASDiblock::$UF_IBLOCK;
			$USER_FIELD_MANAGER->EditFormAddFields($PROPERTY_ID, $arFields);
			$USER_FIELD_MANAGER->Update($PROPERTY_ID, $arFields['ID'], $arFields);
		}
	}
}