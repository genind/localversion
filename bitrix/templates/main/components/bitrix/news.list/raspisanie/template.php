<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="recall-wr">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="recall-index" id="<?=$arItem['ID']?>">
		<span class="who"><?echo $arItem["DISPLAY_PROPERTIES"]["FIO"]["~VALUE"]?>, <?=$arItem["DISPLAY_PROPERTIES"]["CITY"]["~VALUE"]?></span>
		
		<p class="news_one"><a href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["PREVIEW_TEXT"]?></a></p>
</div>
<?endforeach;?>
</div>
<a href="/reviews/" class="goreviews"></a>