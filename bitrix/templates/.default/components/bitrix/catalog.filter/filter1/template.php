<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$y=0;
?>
<ul class="fltr">
<?
	$current_year = date('Y');
	$selected_year = date('Y', strtotime($_REQUEST["arrFilter_DATE_ACTIVE_FROM_1"]));
	$z= count($arResult["ITEMS"]);
	foreach ($arResult["ITEMS"] as $arYear):?>
	 		<li>
				<?$link = $arYear . "?arrFilter_DATE_ACTIVE_FROM_1=01.01." . $arYear ."&arrFilter_DATE_ACTIVE_FROM_2=31.12." . $arYear?>
	 			<a href="/news/<?= $link?>" class="year <?
	 				if (($selected_year && ($selected_year==$arYear)) || (!$selected_year && ($current_year == $arYear))) :?>current<?endif?>">

	 						<?= $arYear ?>
	 			</a>
	 		</li>
	<?endforeach; ?>
</ul>

