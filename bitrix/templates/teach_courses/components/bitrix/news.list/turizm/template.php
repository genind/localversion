<div id="teachers">

<?$i=0;?>
<?$j=0;?>
<?if (count($arResult["ITEMS"]) > 0):?>
<?foreach($arResult["ITEMS"] as $arItem):?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

<?if (is_array($arItem["DISPLAY_PROPERTIES"]["learning"]["DISPLAY_VALUE"])):?>
<?foreach($arItem["DISPLAY_PROPERTIES"]["learning"]["DISPLAY_VALUE"] as $arElement):?>

   <?$sh="/>(.*?)<\/a>/"; 
   preg_match_all($sh,$arElement,$name);
   $t= $name[1][0];?>


<?if ($t == "Туризм"):?>
<?$i++;?>
<div class="teacher-content col1 box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
  
<?$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>127, 'height'=>153), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
		
		<div class="teacher-foto"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img alt="<?=$arItem["NAME"]?>" src="<?=$img["src"]?>" width="<?=$img["width"]?>" height="<?=$img["height"]?>" /></a></div>
		

		<?if($arItem["NAME"]):?>
				<div class="teacher-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br /></div>
		<?endif;?>
		<?if($arItem["PREVIEW_TEXT"]):?>
			<div class="teacher-prevtext"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
		
	</div>

<?endif?><?endforeach?>
<?elseif (!is_array($arItem["DISPLAY_PROPERTIES"]["learning"]["DISPLAY_VALUE"])):?>
<?$sh="/>(.*?)<\/a>/"; 
   preg_match_all($sh,$arItem["DISPLAY_PROPERTIES"]["learning"]["DISPLAY_VALUE"],$name);
   $t= $name[1][0];?>
<?if ($t == "Туризм"):?>
<?$j++;?>
<div class="teacher-content col1 box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
  
<?$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>127, 'height'=>153), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);?>
		
		<div class="teacher-foto"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img alt="<?=$arItem["NAME"]?>" src="<?=$img["src"]?>" width="<?=$img["width"]?>" height="<?=$img["height"]?>" /></a></div>
		

		<?if($arItem["NAME"]):?>
				<div class="teacher-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a><br /></div>
		<?endif;?>
		<?if($arItem["PREVIEW_TEXT"]):?>
			<div class="teacher-prevtext"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
		
	</div>

<?endif?>


<?endif?>
<?$k= $j+$i;?>
<? if($k%4 ==0) {echo "<div style='clear: both;'></div>";}?>
<?endforeach;?>
<?else:?>
<p>Преподавателей нет</p>
<?endif?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

</div>
<div style="clear: both;"></div>
<?//var_dump($name);?>