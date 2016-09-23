<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="teachers">
        	<h3 class="teach_header_inner"><?=$arResult["NAME"]?></h3>

<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" style="" class="teach_photo_inner" />
			<?if (!empty($arResult["DETAIL_TEXT"])):?>
                        <p>
			 <?=$arResult["DETAIL_TEXT"]?>
			</p>
                        <?endif?>
<div style="clear:both;"></div>
</div>