<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="news-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<?endif;?>

	<?if($arResult["NAME"]):?>
		<div class="news-title1"><?=$arResult["NAME"]?></div>
	<?endif;?>

 	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<div class="news-text"><?echo $arResult["DETAIL_TEXT"];?></div>
	<?endif?>

<div style="clear:both;">&nbsp;</div>


<?if (!empty($arResult["DISPLAY_PROPERTIES"]["IMAGES"])) :?>
<?$i=0;?>
<?$k=0;?>
<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
		$('#carousel_rus').jCarouselLite({
                visible: 4,
	        btnNext: ".right_arr",
	        btnPrev: ".left_arr"
    	});
	});
</script>
<style type="text/css">
.left_arr {float:left; width:17px; height:17px; background:url(/images/bwd.png) top left no-repeat; margin-top:35px; cursor:pointer; }
.left_arr:hover {background:url(/images/bwd.png) bottom left no-repeat;cursor:pointer;}
.right_arr {float:left; width:17px; height:17px; background:url(/images/fwd.png) top left no-repeat; margin:35px 0 0 30px;cursor:pointer;}
.right_arr:hover {background:url(/images/fwd.png) bottom left no-repeat;cursor:pointer;}
.carousel {width:700px; height:110px; float:left;}
.carousel #news-slider li {list-style:none; float:left; width:120px;height:100px; background:none;}
.carousel #news-slider li a {display:block; width:120px; height:100px;}
.carousel #news-slider li a img {display:block; width:120px;  margin:0 5px;}
</style>

<?foreach($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"] as $arPic):?>
<?$k++;?>
<?endforeach;?>
<div class="left_arr" <?if ($k<4):?>style="display:none;"<?endif?>>&nbsp;</div>
<div class="carousel" id="carousel_rus">
		
		<ul id="news-slider">


<?foreach($arResult["DISPLAY_PROPERTIES"]["IMAGES"]["FILE_VALUE"] as $arPic):?>
<?$i++;?>
<li><a href="<?= $arPic["SRC"] ?>" rel="prettyPhoto[pp_gal]"><img src="<?= $arPic["SRC"] ?>" alt="<?= $arPic["ORIGINAL_NAME"]  ?>" /></a></li>
<?//var_dump($arPic);?>
<?endforeach;?>
                 </ul>

	</div>
<div class="right_arr" <?if ($i<4):?>style="display:none;"<?endif?>>&nbsp;</div>




						

<?endif;?>

<div style="clear:both; height:1px;">&nbsp;</div>
	<a href="/news/" id="news-back-button" style="position:relative; "></a>
	<br />

<div style="clear:both; height:10px;"></div>