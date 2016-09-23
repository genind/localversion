<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
<style type="text/css">
.left_arr {float:left; width:17px; height:17px; background:url(/images/bwd.png) top left no-repeat; margin-top:35px; cursor:pointer; }
.left_arr:hover {background:url(/images/bwd.png) bottom left no-repeat;cursor:pointer;}
.right_arr {float:left; width:17px; height:17px; background:url(/images/fwd.png) top left no-repeat; margin:35px 0 0 30px;cursor:pointer;}
.right_arr:hover {background:url(/images/fwd.png) bottom left no-repeat;cursor:pointer;}
	.carousel {width:700px; height:80px; float:left; margin-top:5px;}
.carousel #news-slider li {list-style:none; float:left; width:120px;height:80px; background:none;}
.carousel #news-slider li a {display:block; width:120px; height:80px;}
.carousel #news-slider li a img {display:block; width:120px;  margin:0 5px;}


.right {width:685px; margin: 0px 0px 0px 0px; margin-right:15px;}
.course_box {	margin-right:0px;
				margin-bottom: 0px;
				padding: 0px;
				padding-bottom:0px;
				border-bottom:1px solid rgba(28, 28, 28, 0.32);
				margin-top:20px;
			}

.course_box ul	{
					margin-top: 20px;
					margin-left: 15px;
				}			
.course_box ul li	{
					color: #2e3d4c;
					font-size: 15px;
					line-height: 22px;
					padding: 0;
					list-style-type:disc;
				}
				
.course_box2:hover { background: #FFF; box-shadow: 0 0 10px 5px rgba(0,0,0,.5);}
.tbl-cell-text { 	color:#2e3d4c;
					margin: 0px;
					margin-right: 0px;
					margin-bottom:10px; 
					margin-top: 12px;
					text-align:left;
				}
.onecolumn a 	{	
					font-size: 15px;
					line-height: 0px;
					color: #4C5461;
				}				
.tbl-cell-title {	padding: 0px; 
					padding-top:12px;
					padding-bottom:0px;
					margin-left:15px;
					margin-right:10px;
					margin-top: 0px;
					margin-bottom:10px;
				}
.tbl-more {
					background: #2146A4;
					width: 100px;
					text-align: center;
					color: #FFFFFF;
					margin-left: 20px;
					font-size: 12px;
					font-weight: bold;
					box-shadow: 3px 2px 6px #000000;
					float: right;
					cursor:pointer;
					border-radius:4px;
			}
			
.subscribe {
				color: #2753C3;
				font-weight:bold;
}
.tbl-more:hover {
				background: #A1A0A0;
				box-shadow: 0px 0px 0px #000000;
			}
				
.tbl-title {color:#4C5461; font-size:16px; font-weight:bold; text-decoration: none; }
span.price {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}
span.volume {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}
span.duration {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}

.section_name {
				  font-size: 16px;
				  font-weight: bold;
				  border-bottom: 1px solid rgba(28, 28, 28, 0.32);
				  margin-top: 30px;
				  padding-bottom: 5px;
		padding-left:20px;
	}

.description {
				margin-top:10px;
				margin-left:15px;
				margin-right: 30px;
	}

 img.ruble { height: 12px; }
 
#hide_description	{
						font-weight: bold;
						color: #616161;
						margin-top: 10px;
						cursor: pointer;
					} 

	#hide_description:hover { color:black; text-decoration:underline;}					
  
.accordion-section-title {
    display:inline-block;
    transition:all linear 0.15s;
	width:100%;
}
.accordion-section-content {
    display:none;
}

</style>

<script>
$(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
 
    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(this).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
        e.preventDefault();
    });
});
</script>

<?if(stripos($_SERVER['REQUEST_URI'],"master-class")){
	$MClasses = CIBlockElement::GetList( array("PROPERTY_DATE"=>"ASC"), array("=IBLOCK_ID"=>23,"ACTIVE"=>'Y'));
	$MasterClasses = Array();
	while ($arElement = $MClasses->GetNext()){
		$buff = CIBlockElement::GetProperty(23,$arElement["ID"],Array(),Array());
		$CurMC = Array();
		while ($ob = $buff->GetNext())
			{	if( $ob["CODE"]=="LECTOR" or
					$ob["CODE"]=="LECTORCV" or
					$ob["CODE"]=="CLASS" or
					$ob["CODE"]=="DATE" or
					$ob["CODE"]=="PRICE_STR"
					) 
				{$CurMC[$ob["CODE"]] = $ob["~VALUE"];}
			}
		$arElement["PROPS"] = $CurMC;
		$MasterClasses[$arElement["ID"]] =$arElement;
	};	

		//echo("<pre>"); print_r($MasterClasses); echo("</pre>");
	
?>	
<!--<div>
Для записи  на маcтер-класс необходимо заполнить заявление о приеме на обучение,
которое указано в
<a  class="subscribe" href="/docs/Untitled187.PDF" download>договоре</a>.
</div>-->

	<?$ind=0?>
	<div class="accordion">
	<?foreach($MasterClasses as $MC):?>
	<?$ind=$ind+1;?>
	<div class="accordion-section">
	<div class="accordion-section-title" href="#accordion-<?=$ind?>">
	<div class="course_box">
	<table width="100%">
			<tr>
				<td width="55%" style="vertical-align:bottom;">
					<div class="tbl-cell-title"><div class="tbl-title"><?echo $MC["NAME"]?></div></div>
				</td>
				<td width="10%" style="vertical-align:bottom;">
					<div class="tbl-cell-text">
						<?$Date = $MC["PROPS"]["DATE"];?>
						<?if(!empty($Date)){?>
							<span class="volume"><?=FormatDate("d", MakeTimeStamp($Date))?></span>
							<b><?=FormatDate("M", MakeTimeStamp($Date))?></b>
						<?}else{?>
							<div style="height:35px; background:url(/images/clock.png) no-repeat;     background-position: 50% 49%;"></div>
						<?}?>
					</div>
				</td>
				<td width="10%" style="vertical-align:bottom;">
					<div class="tbl-cell-text">
						<?$Date = $MC["PROPS"]["DATE"];?>
						<span class="volume"><?=Date("H", MakeTimeStamp($Date))?></span>
						<b>:</b>
						<span class="volume"><?=Date( "i",MakeTimeStamp($Date))?></span>
					</div>
				</td>
				<td width="25%" style="vertical-align:bottom;">
					<div class="tbl-cell-text">
							<?if(count($MC["PROPS"]["DISCOUNTS"])==1){
								if(!empty($MC["PROPS"]["DISCOUNTS"][0])){?>
									<text class="discount"><?=$MC["PROPS"]["DISCOUNTS"][0]?></text>
							<?}}?>
							<span class="price"><?=$MC["PROPS"]["PRICE_STR"]?></span>
							<b><img src="/images/ruble.gif" class="ruble" /></b>							
							<?if(count($MC["PROPS"]["DISCOUNTS"])>=2){
								  foreach($MC["PROPS"]["DISCOUNTS"] as $Discount){?>
									<text class="discount"><?=$Discount?></text>
							<?}}?>
							<div class="tbl-more">ПОДРОБНЕЕ</div>
					</div>
				</td>
			</tr>
	</table>
	</div>
	</div>
	<div id="accordion-<?=$ind?>" class="accordion-section-content">
	<div class="course_box" style="border-style:none;margin-bottom:20px;  padding-bottom:20px;">
		
	<div class="description" id="<?=$MC['ID'];?>">

      	<div class="news-prevtext"><?echo $MC["PREVIEW_TEXT"];?></div>


		<?if($MC['PROPS']['PHOTO']) {?>
            <?$i=0;?>
            <?$k=0;?>		  
            <script type="text/javascript">
            $(document).ready(function(){
                   $('#carousel_<?=$MC['ID']?>').jCarouselLite({
                       visible: 4,
                       btnNext: ".right_arr_carousel_<?=$MC['ID']?>",
                       btnPrev: ".left_arr_carousel_<?=$MC['ID']?>"               
                   });
                   
                });
            </script>

            <?
            $k = count($MC["PROPS"]["PHOTO"]);
            ?>

            <div class="left_arr left_arr_carousel_<?=$MC['ID']?>" <?if ($k<4):?>style="display:none;"<?endif?>>&nbsp;</div>

            <div class="carousel" id="carousel_<?=$MC['ID']?>">		
                <ul id="news-slider">
                    <?foreach($MC["PROPS"]["PHOTO"] as $img):?>
                        <?$img = CFIle::GetPath($img);?>
                        <?$i++;?>
                        <li><a href="<?=$img?>" rel="prettyPhoto[<?=$MC['ID']?>]"><img src="<?= $img?>" alt="<?= $MC['NAME']  ?>" /></a></li>
                    <?endforeach;?>
                </ul>
            </div>

            <div class="right_arr right_arr_carousel_<?=$MC['ID']?>" <?if ($i<4):?>style="display:none;"<?endif?>>&nbsp;</div>
            <div style="clear: both"></div>	
			<?}?>

		<div class="news-prevtext"><b>Лектор: </b><?=$MC["PROPS"]["LECTOR"]["NAME"]?> - <?=$MC["PROPS"]["LECTORCV"]["TEXT"]?></div>
		<div class="news-prevtext"><b>Место проведения:</b> <?=$MC["PROPS"]["CLASS"]["TEXT"]?></div>
		
		<div style="text-align:right;">
			<a href="#" data-reveal-id="subscribetop_reveal" class="subscribe">Записаться на мастер-класс</a>
			<div class="accordion-section-title" id="hide_description">свернуть</div>
		</div>
	</div>
	</div>
	</div><!--end .accordion-section-content-->
	</div><!--end .accordion-section-->
	<?	endforeach;?>
	</div><!--end .accordion-->
<?}else{?>

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
                
        <?if($arItem['PROPERTIES']['PHOTOS']['VALUE']) {?>
            <?$i=0;?>
            <?$k=0;?>

            
            <script type="text/javascript">
            $(document).ready(function(){
                   $('#carousel_<?=$arItem['ID']?>').jCarouselLite({
                       visible: 4,
                       btnNext: ".right_arr_carousel_<?=$arItem['ID']?>",
                       btnPrev: ".left_arr_carousel_<?=$arItem['ID']?>"               
                   });
                   
                });
            </script>


            <?
            $k = count($arItem["PROPERTIES"]["PHOTOS"]["VALUE"]);
            ?>


            <div class="left_arr left_arr_carousel_<?=$arItem['ID']?>" <?if ($k<4):?>style="display:none;"<?endif?>>&nbsp;</div>

            <div class="carousel" id="carousel_<?=$arItem['ID']?>">		
                <ul id="news-slider">
                    <?foreach($arItem["PROPERTIES"]["IMAGES"]["VALUE"] as $img):?>
                        <?$img = CFIle::GetPath($img);?>
                        <?$i++;?>
                        <li><a href="<?=$img?>" rel="prettyPhoto[<?=$arItem['ID']?>]"><img src="<?= $img?>" alt="<?= $arItem['NAME']  ?>" /></a></li>
                    <?endforeach;?>
                </ul>
            </div>

            <div class="right_arr right_arr_carousel_<?=$arItem['ID']?>" <?if ($i<4):?>style="display:none;"<?endif?>>&nbsp;</div>


            <div style="clear: both"></div>	

		 <?}?>
            <?if($arItem["PREVIEW_TEXT"]):?>
                <div class="news-prevtext"><?echo $arItem["PREVIEW_TEXT"];?></div>
            <?endif;?>

		
	</div>
<?endforeach;?>
<?}?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<br /><br/><br/><?=$arResult["NAV_STRING"];?>
<?endif;?>
