<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

	<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<div class="teacher">
			<div class="photo" style="background-image:url(<?=$arElement["DETAIL_PICTURE"]["SRC"]?>);"> </div>
			<div class="description">
				<a class="name" href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="p"><?=$arElement["NAME"]?></a>
				<div><?=$arElement["PREVIEW_TEXT"]?></div>
			</div>
		</div>
	<?endforeach?>

<pre>
<?print_r($arResult)?>
</pre>
	
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
