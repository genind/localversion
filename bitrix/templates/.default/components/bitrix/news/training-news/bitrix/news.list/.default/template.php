<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
				
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<div class="news-title">
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				<?else:?>
					<?echo $arItem["NAME"]?>
				<?endif;?>
			</div>
		<?endif;?>

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<img class="preview_picture" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
				</a>
			<?else:?>
				<img class="preview_picture" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" style="float:left" />
			<?endif;?>
		<?endif?>
	<div class="description">
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="preview_text">
				<?echo $arItem["PREVIEW_TEXT"];?>
			</div>
		<?endif;?>
		
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<div class="<?=$code?>">
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</div>
		<?endforeach;?>


		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty){

				$val = $arProperty["DISPLAY_VALUE"];
				if(is_array($arProperty["DISPLAY_VALUE"]))
					$val = implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);

				if($arProperty["CODE"] == "PRICE_STR") $price=$val;
				if($arProperty["CODE"] == "LECTORCV") $lector=$val;
				if($arProperty["CODE"] == "CLASS") $place=$val;
				if($arProperty["CODE"] == "DATE") $date=$val;
		}

		if(empty($date)) {$date = $arItem["DISPLAY_ACTIVE_FROM"];}
		?>

		<div class="properties">
			<div class="prop-left">
				<div class="place"><div class="prop_name">Место:</div><div class="value"><?=$place?></div></div>
				<div class="price">
					<div class="prop_name">Цена:</div><div class="value">
						<?=$price?>
						<img src="/images/ruble.gif" class="ruble"  alt="рублей"/>
					</div>
				</div>
				<div class="date"><div class="prop_name">Дата:</div><div class="value"><?=$date?></div></div>
			</div>
			<div class="prop-right">
				<div class="lector"><div class="prop_name">Тренинг проводит:</div><div class="value"><?=$lector?></div></div>
			</div>
		</div>
	</div>
	</div>
<?endforeach;?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>