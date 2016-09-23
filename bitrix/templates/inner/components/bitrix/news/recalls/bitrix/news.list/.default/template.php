<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-content" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="margin-bottom:10px; width:920px; clear:both;">

		<?if(!empty ($arItem["DISPLAY_PROPERTIES"]["FIO"])):?>
			<div class="news-date"><?echo $arItem["DISPLAY_PROPERTIES"]["FIO"]["~VALUE"]?>, <?=$arItem["DISPLAY_PROPERTIES"]["CITY"]["~VALUE"]?></div>
		<?endif?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<div class="news-title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br /></div>
			<?endif;?>
		<?endif;?>
		<?if($arItem["PREVIEW_TEXT"]):?>
			<div class="news-prevtext" style="width:920px;"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
		
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><br /><br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

<?$APPLICATION->IncludeComponent(
"bitrix:main.include",
"",
Array(
"AREA_FILE_SHOW" => "page",
"AREA_FILE_SUFFIX" => "inc",
"EDIT_TEMPLATE" => ""
),
false
);?>