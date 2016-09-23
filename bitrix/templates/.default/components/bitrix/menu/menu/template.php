<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); // проверяем, загружена ли служебная часть сайта (ядро)?>

<?if (!empty($arResult)): ?>
		<ul>
		<? foreach ($arResult as $key => $arItem): ?>
			<li<?if($arItem["LINK"] =="/about/"):?> id="first"<?elseif ($arItem["LINK"] =="/contacts/"):?> id="last"<? endif; ?> <?if($arItem["SELECTED"]):?> class="current"<? endif;?>><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
		<? endforeach; ?>
		</ul>
<?endif?>

<pre>
<?print_r($arResult)?>
</pre>