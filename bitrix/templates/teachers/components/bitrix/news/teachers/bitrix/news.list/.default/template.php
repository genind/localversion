<div id="teachers">

<?$i=0;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
<?$i++;?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<div class="teacher-content col1" <?if($i%4 ==0):?>style="margin-right:0;"<?endif?> id="<?=$this->GetEditAreaId($arItem['ID']);?>">



		
		<div class="teacher-foto">
<?$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>127, 'height'=>153), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img alt="<?=$arItem["NAME"]?>" src="<?=$img["src"]?>" width="<?=$img['width']?>" height="<?=$img['height']?>" /></a></div>
		

		<?if($arItem["NAME"]):?>
				<div class="teacher-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br /></div>
		<?endif;?>
		<?if($arItem["PREVIEW_TEXT"]):?>
			<div class="teacher-prevtext"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
		
	</div>

<?if($i%4 ==0) {echo '<div style="clear: both;">&nbsp;</div>';}?>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

<script type="text/javascript" src="/js/jquery.masonry.js"></script>
<script type="text/javascript">
$('#teachers').masonry({
  itemSelector: '.box',
  isAnimated: true
});
</script>
</div>
<div style="clear: both;"></div>

<?//print_r($arParams)?>