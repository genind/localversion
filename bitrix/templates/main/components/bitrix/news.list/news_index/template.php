<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$i=0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?$i++;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
<div class="news-wr" <?if ($i==1):?>style="margin-top:30px;"<?endif?>>		
		<span class="date"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
		<p class="news_one"><a href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["NAME"]?></a></p>
</div>


<?endforeach;?>
