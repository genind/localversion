<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="left-menu" id="entr">
<li><a href="/entrance/" class="flevel <?if($_SERVER["REQUEST_URI"] === "/entrance/"){?>active<?}?>">Поступление</a>
<ul>
<?$t= count($arResult);?>
<?$j=0;?>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
<?$j++;?>
	<?if($arItem["SELECTED"]):?>
		<li <?if ($j == $t):?>style="border-bottom:1px solid #c4ced7"<?endif?>><a href="<?=$arItem["LINK"]?>" class="curr"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li <?if ($j == $t):?>style="border-bottom:1px solid #c4ced7"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>	
<?endforeach?>
</ul>
</li>
</ul>
<?endif?>