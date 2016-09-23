<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?$ind=0?>
	<div class="accordion">
	<?foreach($arResult["ITEMS"] as $Item):?>
	<?$ind=$ind+1;?>
	<div class="accordion-section">
		<div class="accordion-section-title" href="#accordion-<?=$ind?>">
			<div class="news-title">
					<?echo  $Item["NAME"]?>
			</div>
			<div class="news-date">
				<?=$Item["DISPLAY_ACTIVE_FROM"]?>
			</div>
		</div>
		
		<div id="accordion-<?=$ind?>" class="accordion-section-content">
			<div class="text-fading"></div>		
			<div class="description" id="<?=$Item['ID'];?>">
				<pre><?//print_r($Item)?></pre>
				<?echo $Item["DETAIL_TEXT"];?>


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

			
					<div id="hide_description">свернуть</div>
			</div> <!-- description -->
		</div><!-- accordion-section-content -->
	</div><!-- accordion-section -->
	<?endforeach;?>
	</div><!-- accordion -->
