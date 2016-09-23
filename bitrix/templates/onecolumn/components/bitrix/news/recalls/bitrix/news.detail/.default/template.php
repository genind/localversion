<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div style="clear:both;"></div>

	<?if($arResult["NAME"]):?>
		<div class="news-title1" style="font-size:32px; line-height:35px; color:#2e3d4c;"><?=$arResult["NAME"]?></div>
	<?endif;?>

<?if(!empty($arResult["DISPLAY_PROPERTIES"]["FIO"]) && !empty($arResult["DISPLAY_PROPERTIES"]["CITY"])):?>
		<div style="font-size:14px; line-height:24px; color:#77838f; margin-bottom:25px;">
  <?=$arResult["DISPLAY_PROPERTIES"]["FIO"]["~VALUE"]?>, <?=$arResult["DISPLAY_PROPERTIES"]["CITY"]["~VALUE"]?>
</div>
	<?endif;?>

 	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div class="news-text"><?echo $arResult["DETAIL_TEXT"];?></div>
	<?endif?>

<div style="clear:both;">&nbsp;</div>





	<a href="/reviews/" id="recall-back-button"></a>
	<br />

