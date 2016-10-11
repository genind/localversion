<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="catalog-sections-list-top">
	<div class="title">Повышение квалификации:</div>
	<div class="description">Вид дополнительного профессионального образования, который позволяет повысить уровень Вашей квалификации: теоретических знаний, практических навыков и умений. По завершению обучения выдается Удостоверение РУДН о повышении квалификации в определенной профессиональной сфере деятельности.</div>
</div>

<div class="catalog-sections-list-bottom">
<? 
	$APPLICATION->IncludeComponent("custom:curses.left.menu", "sections-list", array(
	"IBLOCK_ID" => "25",
	"DISPLAY_ELEMENTS" => "Y",
	"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
	"URL_TEMPLATE" => "",
	"FOLDER" => $arResult["FOLDER"]
	),
	false
);
?>
</div>