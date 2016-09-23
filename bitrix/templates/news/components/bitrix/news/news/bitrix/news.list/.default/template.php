<script type="text/javascript" src="/js/jcarousellite_1.0.1.js"></script>
<style type="text/css">
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



.right {width:685px; margin: 0px 0px 0px 0px; margin-right:15px;}
.course_box {	margin-right:0px;
				margin-bottom: 0px;
				padding: 0px;
				padding-bottom:0px;
				border-bottom:1px solid rgba(28, 28, 28, 0.32);
				margin-top:0px;
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
					text-align:center;
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
			color: rgb(114, 141, 183);
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

#hide_description	{
						font-weight: bold;
						color: #616161;
						margin-top: 10px;
						cursor: pointer;
					} 

#hide_description:hover { color:black; text-decoration:underline;}					


.description {
				margin-top:10px;
				margin-left:15px;
				margin-right: 30px;
	}

.accordion
	{
		margin-left:-3%;
		margin-right: 3%;
	}

.accordion-section-title {
    display:inline-block;
    transition:all linear 0.15s;
	width:100%;
	cursor:pointer;
}
.accordion-section-content .open {
		display:block;
}
.accordion-section-content {
	overflow:hidden;
	height:100px;
	cursor:pointer;
	position:relative;
}


.accordion-section-content .text-fading {
    background: -moz-linear-gradient(top, rgba(251,251,251,0) 0%, rgba(251,251,251,0.65) 50%, rgba(251,251,251,1) 100%);
    background: -webkit-linear-gradient(top, rgba(251,251,251,0) 0%,rgba(251,251,251,0.65) 50%,rgba(251,251,251,1) 100%);
    background: linear-gradient(to bottom, rgba(251,251,251,0) 0%,rgba(251,251,251,0.65) 50%,rgba(251,251,251,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00fbfbfb', endColorstr='#fbfbfb',GradientType=0 );
    background-size: 100% auto;
    top: 42%;
    display: block;
    height: 60%;
    position: absolute;
    width: 100%;
}

.accordion-section
{
		margin-bottom:25px;
}

.accordion-section:hover
{
-webkit-box-shadow: 0px -4px 6px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 0px -4px 6px -2px rgba(0,0,0,0.75);
box-shadow: 0px -4px 6px -2px rgba(0,0,0,0.75);
}

</style>

<script>
$(document).ready(function() {


	$('.accordion-section').hover(
		function(){$(this).find('.accordion-section-content .text-fading').fadeOut(300);},
		function(){
			if(!($(this).is('.active'))){
				$(this).find('.accordion-section-content .text-fading').fadeIn(300);
			}
		}
	);

	/* $('.accordion-section').click(function(e) { 
        if($(this).is('.active')) {
            $(this).removeClass('active');
            $(this).children('.accordion-section-content').animate({height:"100px"}).removeClass('open');
			$(this).find('.accordion-section-content .text-fading').show();
        }else {
            $(this).addClass('active');
			var h = this.children[1].scrollHeight;
            $(this).children('.accordion-section-content').animate({height:h}).addClass('open'); 
			$(this).find('.accordion-section-content .text-fading').hide();
        }
		e.preventDefault();
	});*/
});
</script>


	<?$ind=0?>
	<div class="accordion">
	<?foreach($arResult["ITEMS"] as $Item):?>
		<?if(ConvertDateTime($Item["ACTIVE_FROM"],"YYYY")!=date('Y',strtotime($_REQUEST["arrFilter_DATE_ACTIVE_FROM_1"]))){ continue;}?>
	<?$ind=$ind+1;?>
	<div class="accordion-section" onclick="return location.href = '<?=$Item["DETAIL_PAGE_URL"]?>'">
	<div class="accordion-section-title" href="#accordion-<?=$ind?>">
	<div class="course_box">
	<table width="100%">
			<tr>
				<td width="75%" style="vertical-align:bottom;">
					<div class="tbl-cell-title"><div class="tbl-title"><?echo  $Item["NAME"]?></div></div>
				</td>
				<td width="25%" style="vertical-align:bottom;">
					<div class="tbl-cell-text">
						<span class="volume"><?=$Item["DISPLAY_ACTIVE_FROM"]?></span>
					</div>
				</td>
			</tr>
	</table>
	</div>
	</div>
	<div id="accordion-<?=$ind?>" class="accordion-section-content">
	<div class="text-fading"></div>
	<div class="course_box" style="border-style:none;margin-bottom:20px;  padding-bottom:20px;">

	<div class="description" id="<?=$Item['ID'];?>">
		<pre><?//print_r($Item)?></pre>
      	<div class="news-prevtext"><?echo $Item["DETAIL_TEXT"];?></div>


		<?if($Item['DISPLAY_PROPERTIES']['IMAGES']['FILE_VALUE'] and false) {?>
            <?$i=0;?>
            <?$k=0;?>		  
            <script type="text/javascript">
				var id="<?echo $Item['ID']?>";
				$(document).ready(function(){
                   $('#carousel_'+id).jCarouselLite({
                       visible: 4,
                       btnNext: ".right_arr_carousel_"+id,
					   btnPrev: ".left_arr_carousel_"+id?>               
                   });

                });
            </script>

            <?$k = count($Item['DISPLAY_PROPERTIES']['IMAGES']['FILE_VALUE'])?>

            <div class="left_arr left_arr_carousel_<?=$Item['ID']?>" <?if ($k<4):?>style="display:none;"<?endif?>>&nbsp;</div>

            <div class="carousel" id="carousel_<?=$Item['ID']?>">
				<?$FV = $Item['DISPLAY_PROPERTIES']['IMAGES']['FILE_VALUE']?>
                <ul id="news-slider">
					<?foreach($FV as $imgf){?>
					<?$MINI = CFile::ResizeImageGet( $imgf['ID'] , array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL );?>
					<?$img = $MINI["src"];?>;
                        <?$i++;?>
						<li style="list-style:none;">
								<a href="<?=$imgf['SRC']?>" rel="prettyPhoto[<?=$Item['ID']?>]">
									<img src="<?=$img?>" alt="<?=$Item['NAME']?>" />
								</a>
						</li>
					<?}?>
                </ul>
            </div>

            <div class="right_arr right_arr_carousel_<?=$Item['ID']?>" <?if ($i<4):?>style="display:none;"<?endif?>>&nbsp;</div>
            <div style="clear: both"></div>	
			<?}?>

		<div style="text-align:right;">
			<div class="accordion-section-title" id="hide_description">свернуть</div>
		</div>
	</div>
	</div>
	</div><!--end .accordion-section-content-->
	</div><!--end .accordion-section-->
	<?endforeach;?>
	</div><!--end .accordion-->



<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><br/><br/><?=$arResult["NAV_STRING"]?>
<?endif;?>
