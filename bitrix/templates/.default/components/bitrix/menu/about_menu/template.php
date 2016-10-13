<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?
$menu=Array();
$curr_1=0;
foreach($arResult as $num => $Item){
	if($Item["DEPTH_LEVEL"]==1) {$menu[$num]=$Item; $curr_1=$num;}
	if($Item["DEPTH_LEVEL"]==2) {$menu[$curr_1]['sub-menu'][$num]=$Item;}
}
?>

<ul id="tree">
<?foreach($menu as $Item):?>
	<li <?if($arItem["SELECTED"]){?>class="current active"<?}?>>
		<div class="section-name">
			<a href="<?=$Item["LINK"]?>"><?=$Item["TEXT"]?></a>
		</div>
		<?foreach($Item["sub-menu"] as $Item2){?>
			<ul class="sub_tree">
				<li>
					<a href="<?=$Item2["LINK"]?>"><?=$Item2["TEXT"]?></a>
				</li>
			</ul>
		<?}?>
	</li>
<?endforeach?>
</ul>
<?endif?>

<pre>
<?print_r($arResult)?>
</pre>
