<?php

IncludeModuleLangFile(__FILE__);

class CASDiblock {
	public static $error = '';
	public static $UF_IBLOCK = 'ASD_IBLOCK';
}

class CASDiblockInterface {

	public static function OnAdminListDisplayHandler(&$list) {
		if (!empty($list->arActions)) {
			CJSCore::Init(array('asd_iblock'));
			$strSomeScripts  = '<script type="text/javascript">sListTable = \''.$list->table_id.'\';</script>';
			$list->arActions['asd_checkbox_manager'] = array('type' => 'html', 'value' => $strSomeScripts);
		}

		$strCurPage = $GLOBALS['APPLICATION']->GetCurPage();
		$bRightPage = ($strCurPage=='/bitrix/admin/iblock_list_admin.php' ||
						$strCurPage=='/bitrix/admin/iblock_element_admin.php' ||
						$strCurPage=='/bitrix/admin/cat_product_admin.php');

		if ($bRightPage && CModule::IncludeModule('iblock')) {
			if (strlen(CASDiblock::$error)) {
				$message = new CAdminMessage(array('TYPE' => 'ERROR', 'MESSAGE' => CASDiblock::$error));
				echo $message->Show();
			}

			$lAdmin = new CAdminList($list->table_id, $list->sort);

			foreach ($list->aRows as $id => $v) {
				if (substr($v->id, 0, 1) != 'S') {
					$arnewActions = array();
					foreach ($v->aActions as $i => $act) {
						$arnewActions[] = $act;
						if ($act['ICON'] == 'copy') {
							$arnewActions[] = array('ICON' => 'copy',
													'TEXT' => GetMessage('ASD_ACTION_POPUP_COPY'),
													'ACTION' => $lAdmin->ActionDoGroup($v->id, 'asd_copy_in_list',
																'&type='.urlencode($_REQUEST['type']).'&lang='.LANG.'&IBLOCK_ID='.$_REQUEST['IBLOCK_ID'].'&find_section_section='.intval($_REQUEST['find_section_section'])),
													);
						}
					}
					$v->aActions = $arnewActions;
				}
			}

			$arIBtypes = array();
			$rsIBtype = CIBlockType::GetList();
			while($arIBtype = $rsIBtype->Fetch()) {
				if ($arIBTypeLang = CIBlockType::GetByIDLang($arIBtype['ID'], LANGUAGE_ID)) {
					$arIBtypes[$arIBTypeLang['IBLOCK_TYPE_ID']] = $arIBTypeLang['NAME'];
				}
			}

			$arIBblocks = array();
			$rsIB = CIBlock::GetList();
			while ($arIB = $rsIB->GetNext(true, false)) {
				if (!isset($arIBblocks[$arIB['IBLOCK_TYPE_ID']])) {
					$arIBblocks[$arIB['IBLOCK_TYPE_ID']] = array('NAME' => $arIBtypes[$arIB['IBLOCK_TYPE_ID']], 'ITEMS' => array());
				}
				$arIBblocks[$arIB['IBLOCK_TYPE_ID']]['ITEMS'][] = array('ID' => $arIB['ID'], 'NAME' => $arIB['NAME']);
			}

			$strIBlocksCp = '<div id="asd_ib_dest_cont" style="display:none; "><select class="typeselect" name="asd_ib_dest" id="asd_ib_dest">';
			foreach ($arIBblocks as $arType) {
				$strIBlocksCpGr = '';
				foreach ($arType['ITEMS'] as $arIB) {
					if (CIBlock::GetPermission($arIB['ID'])>='W') {
						$strIBlocksCpGr .= '<option value="'.$arIB['ID'].'">'.$arIB['NAME'].'</option>';
					}
				}
				if (strlen($strIBlocksCpGr)) {
					$strIBlocksCp .= '<optgroup label="'.$arType['NAME'].'">';
					$strIBlocksCp .= $strIBlocksCpGr;
					$strIBlocksCp .= '</optgroup>';
				}
			}
			$strIBlocksCp .= '</select></div>';

			$strSectionSelect = '<div id="asd_ib_dest_sect" class="asd-sect-cont" style="display:none;" title="'.htmlspecialcharsbx(GetMessage('ASD_SELECT_SECTION_DESCR')).'">'.
				htmlspecialcharsex(GetMessage('ASD_SELECT_SECTION')).
				'&nbsp;<input class="asd-sect-input" type="text" id="asd_sect_id" value="" name="asd_sect_dest" size="4" title="">'.
				'<span id="sp_asd_sect_id" class="asd-sect-descr"></span>'.
				'<input type="button" onclick="ASDSelIBShow(\''.LANGUAGE_ID.'\');" value="'.
				htmlspecialcharsbx(GetMessage('ASD_SELECT_BUTTON')).
				'" title="'.htmlspecialcharsbx(GetMessage('ASD_SELECT_BUTTON_DESCR')).'"></div>';

			$list->arActions['asd_remove'] = GetMessage('ASD_ACTION_REMOVE');

			$list->arActions['asd_copy'] = GetMessage('ASD_ACTION_COPY');
			$list->arActions['asd_move'] = GetMessage('ASD_ACTION_MOVE');
			$list->arActions['asd_copy_move'] = array('type' => 'html', 'value' => $strIBlocksCp);
			$list->arActions['asd_copy_move_sect'] = array('type' => 'html', 'value' => $strSectionSelect);

			$list->arActionsParams['select_onchange'] .= "ASDSelIBChange(this.value);";
		}
	}

	public static function OnAdminContextMenuShowHandler(&$items) {
		if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_edit.php' && $_REQUEST['ID']>0) {
			CJSCore::Init(array('asd_iblock'));
			$BID = intval($_REQUEST['ID']);
			$importAction = "javascript:(new BX.CDialog({
							width: 310,
							height: 110,
							resizable: false,
							title: '".GetMessage('ASD_ACTION_IMPORT_FORM')."',
							content: '<form action=\"".CUtil::JSEscape($GLOBALS['APPLICATION']->GetCurPageParam('', array('action')))."\" method=\"post\" enctype=\"multipart/form-data\">"
										.bitrix_sessid_post()
										."<input type=\"hidden\" name=\"action\" value=\"asd_prop_import\" />"
										."<input type=\"hidden\" name=\"ID\" value=\"".$BID."\" />"
										."<input type=\"hidden\" name=\"type\" value=\"".htmlspecialchars($_REQUEST['type'])."\" />"
										."<input type=\"file\" name=\"xml_file\" /><br/><br/>"
										."<center><input type=\"submit\" value=\"".GetMessage('ASD_ACTION_IMPORT_SUBMIT')."\" /></center>"
									."</form>'
						})).Show()";
			$exportAction = "javascript:(new BX.CDialog({
							width: 310,
							height: 200,
							resizable: false,
							title: '".GetMessage('ASD_ACTION_EXPORT_FORM')."',
							buttons: [BX.CAdminDialog.btnSave, BX.CAdminDialog.btnCancel],
							content: '<form action=\"".CUtil::JSEscape($GLOBALS['APPLICATION']->GetCurPageParam('', array('action')))."\" method=\"post\" enctype=\"multipart/form-data\">"
										.bitrix_sessid_post()
										."<input type=\"hidden\" name=\"action\" value=\"asd_prop_export\" />"
										."<input type=\"hidden\" name=\"ID\" value=\"".$BID."\" />";

			$exportAction .= '<input type="checkbox" id="asd_export_prop_all" checked="checked" />'.
							'<label for="asd_export_prop_all">'.GetMessage('ASD_ACTION_EXPORT_ALL').'</label><br/><br/>';
			$rsProp = CIBlockProperty::GetList(array(), array('IBLOCK_ID' => $BID));
			while ($arProp = $rsProp->GetNext()) {
				$exportAction .= '<input type="checkbox" class="asd_export_prop" name="p['.$arProp['ID'].']" id="p'.$arProp['ID'].'" value="Y" checked="checked" />'.
								'<label for="p'.$arProp['ID'].'" title="'.$arProp['CODE'].'">'.$arProp['NAME'].'</label><br/>';
			}

			$exportAction .=	"</form>'
							})).Show()";
			$items[] = array(
				'TEXT' => GetMessage('ASD_ACTION_EXPORT_IMPORT'),
				'TITLE' => GetMessage('ASD_ACTION_EXPORT_IMPORT_TITLE'),
				'LINK' => '#',
				'ICON' => 'btn_settings',
				'MENU' => array(
					array(
						'TEXT' => GetMessage('ASD_ACTION_EXPORT_PROP'),
						'ACTION' => version_compare(SM_VERSION, '11.5.5')>=0 ?  $exportAction : htmlspecialchars($exportAction),
					),
					array(
						'TEXT' => GetMessage('ASD_ACTION_IMPORT_PROP'),
						'ACTION' => version_compare(SM_VERSION, '11.5.5')>=0 ?  $importAction : htmlspecialchars($importAction),
					),
				),
			);
		}
		if (($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_element_edit.php' ||
			$GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/cat_product_edit.php') && $_REQUEST['ID']>0
		) {
			if ($arElement = CIBlockElement::GetByID($_REQUEST['ID'])->GetNext()) {
				if (strlen($arElement['DETAIL_PAGE_URL'])) {
					$items[] = array('ICON' => 'asd_iblock_show_element',
									'TEXT' => GetMessage('ASD_ACTION_VIEW_DETAIL'),
									'LINK' => $arElement['DETAIL_PAGE_URL'],
									);
				}
			}
		}
	}

	public static function OnAdminTabControlBeginHandler(&$form) {
		if ($GLOBALS['APPLICATION']->GetCurPage()=='/bitrix/admin/iblock_edit.php' && $_REQUEST['ID']>0) {
			global $USER_FIELD_MANAGER, $APPLICATION;
			$ID = intval($_REQUEST['ID']);
			$PROPERTY_ID = CASDiblock::$UF_IBLOCK;
			$bVarsFromForm = $_SERVER['REQUEST_METHOD']=='POST';
			if ($USER_FIELD_MANAGER->GetRights($PROPERTY_ID) >= 'W') {

				ob_start();
				if(method_exists($USER_FIELD_MANAGER, 'showscript')) {
					echo $USER_FIELD_MANAGER->ShowScript();
				}
				?>
				<tr>
					<td colspan="2" align="left">
						<a href="/bitrix/admin/userfield_edit.php?lang=<?= LANGUAGE_ID?><?
						?>&amp;ENTITY_ID=<?= urlencode($PROPERTY_ID)?>&amp;back_url=<?= urlencode($APPLICATION->GetCurPageParam().'&tabControl_active_tab=user_fields_tab')?><?
						?>"><?= GetMessage('ASD_IBLOCK_ADD_UF')?></a>
					</td>
				</tr>
				<?
				$arUserFields = $USER_FIELD_MANAGER->GetUserFields($PROPERTY_ID, $_REQUEST['ID'], LANGUAGE_ID);
				foreach($arUserFields as $FIELD_NAME => $arUserField) {

					$arUserField['VALUE_ID'] = intval($ID);
					if (isset($_REQUEST['def_'.$FIELD_NAME])) {
						$arUserField['SETTINGS']['DEFAULT_VALUE'] = $_REQUEST['def_'.$FIELD_NAME];
					}

					$form_value = $GLOBALS[$FIELD_NAME];
					if(!$bVarsFromForm) {
						$form_value = $arUserField['VALUE'];
					} elseif($arUserField['USER_TYPE']['BASE_TYPE']=='file') {
						$form_value = $GLOBALS[$arUserField['FIELD_NAME'].'_old_id'];
					}

					$hidden = '';
					if(is_array($form_value)) {
						foreach($form_value as $value)
							$hidden .= '<input type="hidden" name="'.$FIELD_NAME.'[]" value="'.htmlspecialcharsbx($value).'">';
					} else {
						$hidden .= '<input type="hidden" name="'.$FIELD_NAME.'" value="'.htmlspecialcharsbx($form_value).'">';
					}
					echo $hidden;

					echo $USER_FIELD_MANAGER->GetEditFormHTML($bVarsFromForm, $GLOBALS[$FIELD_NAME], $arUserField);
				}
				$strContent = ob_get_contents();
				ob_end_clean();

				$arTab = $GLOBALS['USER_FIELD_MANAGER']->EditFormTab($PROPERTY_ID);
				$arTab['CONTENT'] = $strContent;
				$form->tabs[] = $arTab;
			}
		}
	}
}
