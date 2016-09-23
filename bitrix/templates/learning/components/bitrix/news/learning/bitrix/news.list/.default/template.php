<?
$sections = array();
foreach($arResult['ITEMS'] as $ar_item) {
    if (!in_array($ar_item['~IBLOCK_SECTION_ID'], $sections)) {
        $sections[] = $ar_item['~IBLOCK_SECTION_ID'];
    }
}?>
<?
$arFilter = Array('IBLOCK_ID'=>$IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $arResult['ID']);
$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);

while($ar_section = $rs_sections -> GetNext()) {?>
<div class="prodbox">
    <?$i = 0;?>
    <h2><?=$ar_section['NAME']?></h2>
    <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
    <?if ($arElement["~IBLOCK_SECTION_ID"] == $ar_section['ID']) {?>
        <?$i++?>
        <div class="prodblock">
            
                <div class="imgblock"><center><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="imglink" >
                   <img src="<?if(!empty($arElement["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["SRC"])):{?><?=$arElement["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"]["SRC"]?><?} else:?><?=$arElement["DISPLAY_PROPERTIES"]["PHOTOS"]["FILE_VALUE"][0]["SRC"]?><?endif;?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" valign="middle"  /></a></center></div>
            <div class="textblock">
            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="plink"><?=$arElement["NAME"]?></a>
            <p><?=$arElement["PREVIEW_TEXT"]?></p>
            </div>
        </div>
            <?if($i%2 ==0) {echo '<div style="clear: both; height:1px;"></div>';}?>
        <? } ?>
    <?endforeach;?>
</div>
<?}?>


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-content" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<div class="news-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
		<?endif?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<div class="news-title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br /></div>
			<?endif;?>
		<?endif;?>
		<?if($arItem["PREVIEW_TEXT"]):?>
			<div class="news-prevtext"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
		
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>