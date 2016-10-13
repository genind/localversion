<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem){?>
	<?if(empty($arItem['IBLOCK_SECTION_ID'])){?>
		<?if(!empty ($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"])) {?>
			<div class="doc_load"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>"><?=$arItem["NAME"]?></a></div>
		<?}else{?>
			<div class="doc_link"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><?=$arItem["NAME"]?></a></div>
		<?}?>
		<br/>
	<?}?>
<?}?>

<pre>
<?print_r($arResult)?>
</pre>