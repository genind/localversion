<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="slider_wrap" style="	width: 1011px;
								height: 210px;
								position: relative;
								border-radius: 5px;

							">
<div style="margin-left:75px; top:5px; height:200px; width:861px; position:absolute;" id="da-slider" >
<?$index = 0;?>
<!--								background-color: rgba(24, 46, 95, 0.3);-->
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], 
							$arItem['EDIT_LINK'],
								CIBlock::GetArrayByID($arItem["IBLOCK_ID"],
									"ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID']
								,$arItem['DELETE_LINK']
									,CIBlock::GetArrayByID($arItem["IBLOCK_ID"]
										,"ELEMENT_DELETE")
											,array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

	<?if ($index == 0){?>
		<div class="item" style="height:200px; width:861px;">
		<table>
			<tr>
	<?}?>
		<?$index = $index + 1?>
		<td>
		<?if (!empty($arItem["DISPLAY_PROPERTIES"]["LINK"]["~VALUE"])):?>
		<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["~VALUE"]?>">
		<?endif?>

			<div style="width:240px; height:200px; border-radius:10px; 
					<?if(($index == 1) or ($index == 2)){?>margin-right:70px;<?}?>
					background: url(<?=$arItem["DETAIL_PICTURE"]["SRC"]?>) center no-repeat;
					background-color: rgba(32, 62, 128, 1);
					background-size:cover;"></div>

		<?if (!empty($arItem["DISPLAY_PROPERTIES"]["LINK"]["~VALUE"])):?>
			</a>
		<?endif?>
		</td>
	<?if ($index == 3){ $index = 0?>
		</tr>
		</table>
		</div>
	<?}?>	
<?//var_dump($arItem);?>		
<?endforeach;?>
	<?if (($index != 3)&&($index != 0)){ $index = 0?>
		</tr>
		</table>
		</div>
	<?}?>
</div>
	<div class="sliderArrows">
		<a href="#" class="prev">Previous</a>
		<a href="#" class="next">Next</a>
	</div>
</div>
<div style="clear:both;">&nbsp;</div>