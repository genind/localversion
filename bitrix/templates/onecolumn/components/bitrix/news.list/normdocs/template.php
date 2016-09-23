<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<? if(!empty ($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"])) :?>
<?$tmparr = explode(".", $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["FILE_NAME"]);
$ext = $tmparr[sizeof($tmparr)-1];
$descr = $arItem["NAME"];?>
<div class="<?=$ext?>"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]?>"><?=$arItem["NAME"]?></a></div>
<br/>
<?else:?>
<div class="html"><a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>"><?=$arItem["NAME"]?></a></div>
<?endif;?>
<?//var_dump($arItem);?>
<?endforeach;?>	