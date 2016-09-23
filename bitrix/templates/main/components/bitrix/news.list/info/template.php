<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>

<?if (empty($arItem["DETAIL_PICTURE"]["SRC"])) :?>

	<?if (!empty($arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"])):?>

		<?if (!empty($arItem["DISPLAY_PROPERTIES"]["LINK"])):?>
		<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" style="display:inline-block; position:relative; z-index:1000; width:1010px; height:75px;">
		<?endif?>
		
			<embed src="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["SRC"]?>" width="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["WIDTH"]?>" height="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["HEIGHT"]?>" type="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["CONTENT_TYPE"]?>" pluginspage="	http://www.macromedia.com/go/getflashplayer" wmode="transparent" quality="high" >
			
		<?if (!empty($arItem["DISPLAY_PROPERTIES"]["LINK"])):?>
		</a>
		<?endif?>
		
	<?endif?>
	
<?else :?>

<?if (!empty($arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"])):?>

	<?if (!empty($arItem["DETAIL_PICTURE"]["SRC"])) :?>
		<a 	href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" rel="prettyphoto" 
			style="display:inline-block; position:relative; z-index:1000; width:1010px; height:75px;">
	<?endif?>

			<img 	src="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["SRC"]?>" 
					width="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["WIDTH"]?>"
					height="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["HEIGHT"]?>"
					type="<?=$arItem["DISPLAY_PROPERTIES"]["FLASH"]["FILE_VALUE"]["CONTENT_TYPE"]?>"
					align="left" 
			/>
	
	<?if (!empty($arItem["DETAIL_PICTURE"]["SRC"])):?>
		</a>
	<?endif?>

<?endif?>

<?endif?>

<?endforeach?>
<?//var_dump($arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]);?>

