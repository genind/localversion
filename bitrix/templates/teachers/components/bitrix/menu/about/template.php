<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<style type="text/css" scoped="scoped">
.left .left-menu {margin-left: -15px;}
.left .left-menu li {margin-left: -24px; padding-left: 35px; display:inline-block;}
.left .left-menu li.active11 {background: url(/images/current-bullit.png) 0px 7px no-repeat;}
.left .left-menu li ul {margin-left: 0px;}
.left .left-menu li ul li {margin-left: -34px; padding-left: 35px; display:block; border-top: none;}
.left .left-menu li ul li span { border-top:1px solid #c4ced7; display: block;
border-top: 1px solid #C4CED7;width: 102%; padding-top: 7px;}
.left .left-menu li ul li.curr11 {background: url(/images/current-bullit.png) 0px 20px no-repeat;}
</style>
<ul class="left-menu">
<li class="<?if($_SERVER["REQUEST_URI"] === "/about/"){?>active11<?}?>"><a href="/about/" class="lb <?if($_SERVER["REQUEST_URI"] === "/about/"){?>active<?}?>">�� ���������</a>
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
		<li class="curr11"><span <?if ($j == $t):?>style="border-bottom:1px solid #c4ced7;padding-bottom: 7px;"<?endif?>><a href="<?=$arItem["LINK"]?>" class="curr"><?=$arItem["TEXT"]?></a></span></li>
	<?else:?>
		<li><span <?if ($j == $t):?>style="border-bottom:1px solid #c4ced7;padding-bottom: 7px;"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></span></li>
	<?endif?>
	
<?endforeach?>
</ul>
</li>
</ul>
<?endif?>