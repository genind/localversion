<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?=$arResult['~DETAIL_TEXT']?>
<br />
<?foreach($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $photo ){?>
    <?$prev = CFIle::ResizeImageGet($photo, array('width' => 120, 'height' => 90))?>
    <a href="<?=CFIle::GetPath($photo);?>" rel="prettyphoto[1]" style="padding: 0px 5px;"><img src="<?=$prev['src']?>" alt=""></a>
<?}?>

<br />
<div style="clear:both;">&nbsp;</div>
	<a href="/actions/<?=$arResult["SECTION"]["PATH"][0]["CODE"]?>/" id="news-back-button"></a>
	<br />
	<?//var_dump($arResult["SECTION"]["PATH"][0]["CODE"]);?>
<div class="clearfix" style="height:70px;"></div>