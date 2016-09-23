<style>			
.carousel	{
				width:100%;
				padding:0px;
				margin:0px;
				height:100px;
				float:left; 
				margin:0px 0 0 0;
			}
			
.carousel ul{
				padding:0px;
				margin:0px;				
			}
			
.carousel li
			{
				list-style:none;
				float:left;
				background:none;
				padding:0px;
				margin:0px;	
				min-height:80px;
				background-size: cover;
				background-position: 50% 50%;
				background-repeat: no-repeat;
			}
			

.left_arr	{
				z-index: 2;
				width: 24px;
				height: 100%;
				background: url(/images/fwd1.png) 50% 50% no-repeat rgba(0, 0, 0, 0.48);
				margin: 0px 0px 0 0px;
				cursor: pointer;
				position: absolute;
				padding: 0px;
				font-weight: bold;
				top: 0px;
				left: 0%;
			}
.left_arr:hover {background-image:url(/images/fwd2.png);}
.right_arr {				
				z-index: 2;
				width: 24px;
				height: 100%;
				background: url(/images/bwd1.png) 50% 50% no-repeat rgba(0, 0, 0, 0.48);
				margin: 0px 0px 0px -24px;
				cursor: pointer;
				position: absolute;
				padding: 0px;
				font-weight: bold;
				top: 0px;
				left: 100%;
			}
.right_arr:hover {background-image:url(/images/bwd2.png);}

</style>


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


<?if (false) :?>
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

<a href="/news/" id="news-back-button" style="position: relative;color: #3D67C0;font-weight: bold;font-size: 17px; ">Вернуться в список новостей</a>
<br />


<div style="clear:both; height:10px;"></div>

<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="icon" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 


<div style="clear:both; height:10px;"></div>

