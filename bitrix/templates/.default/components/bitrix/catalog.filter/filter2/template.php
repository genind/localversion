<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$y=0; $z= count($arResult["ITEMS"]);?>
<ul class="fltr">
	<? foreach ($arResult["ITEMS"] as $arYear): ?>
<?$y++;?>
<?if ($arYear["SELECTED"]):?>

	 <li><a href="/news/<?= $arYear ?>" class="year <?if ($_SERVER["REQUEST_URI"] == $arResult["FORM_ACTION"]):?>current2<?endif?>"><?= $arYear ?></a></li>
<?else :?>
<li><a href="/news/<?= $arYear ?>"><?= $arYear ?></a></li>
<?endif?>
	<? endforeach; ?>
</ul>


<?//var_dump($arResult);?>
