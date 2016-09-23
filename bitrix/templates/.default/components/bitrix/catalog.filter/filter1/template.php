<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$y=0;
?>
<ul class="fltr">
<?
	$current_year = date('Y');
	$selected_year = date('Y', strtotime($_REQUEST["arrFilter_DATE_ACTIVE_FROM_1"]));
	$z= count($arResult["ITEMS"]);
	foreach ($arResult["ITEMS"] as $arYear): 
		$y++;
		if ($arYear["SELECTED"]):?>
	 		<li>
	 			<a href="/news/<?= $arYear ?>" class="year <?
	 				if (($selected_year && $selected_year==$arYear) || (!$selected_year && $current_year == $arYear)) :?>current<?endif?>">

	 						<?= $arYear ?>
	 			</a>
	 		</li>
		<?else :?>
			<li><a href="/news/<?= $arYear ?>" class="year"><?= $arYear ?></a></li>
		<?endif?>
	<? endforeach; ?>
</ul>
