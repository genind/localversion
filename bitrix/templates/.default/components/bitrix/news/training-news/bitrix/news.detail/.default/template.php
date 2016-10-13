<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-item">
	<div class="news-title2"><?=$arResult["NAME"]?></div>

	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<div class="detail-picture">
			<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" title="<?=$arResult["NAME"]?>" />
		</div>
	<?endif?>
		
	<div class="description">
		<div class="detail-text">
			<?if(empty($arResult["DETAIL_TEXT"])){?>
				<?echo $arResult["PREVIEW_TEXT"];?>
			<?}else{?>
				<?echo $arResult["DETAIL_TEXT"];}?>
		</div>
	
		<?
			foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty){
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
		
		
		<?if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y"){?>
			<div class="news-detail-share">
				<noindex>
				<?
				$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
						"HANDLERS" => $arParams["SHARE_HANDLERS"],
						"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
						"PAGE_TITLE" => $arResult["~NAME"],
						"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"HIDE" => $arParams["SHARE_HIDE"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);
				?>
				</noindex>
			</div>
		<?}?>
	</div>
</div>
