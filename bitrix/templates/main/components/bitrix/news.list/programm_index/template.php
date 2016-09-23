<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div style="margin-left:20px;"><img src="/images/header-programs.png" alt="Öוכוגûו ןנמדנאללû" /></div>
<?$i=0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?$i++;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
<div class="news-wr1" <?if ($i == 1):?>style="margin-top:20px"<?endif?>>		
		<span class="date"><img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"]?>" /></span>
		<p class="news_one"><a href="<?= $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["NAME"]?></a></p>
</div>
<div style="clear:both;">&nbsp;</div>

<?endforeach;?>