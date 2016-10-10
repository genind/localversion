<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="catalog-sections-list-top">
	<div class="title">Повышение квалификации:</div>
	<div class="description">Вид дополнительного профессионального образования, который позволяет повысить уровень Вашей квалификации: теоретических знаний, практических навыков и умений. По завершению обучения выдается Удостоверение РУДН о повышении квалификации в определенной профессиональной сфере деятельности.</div>
</div>

<div class="catalog-sections-list-bottom">
<? 
	$APPLICATION->IncludeComponent("custom:curses.left.menu", "sections-list", Array(
	"IBLOCK_ID" => "4",
	"DISPLAY_ELEMENTS" => "Y",	// РїРѕРєР°Р·С‹РІР°С‚СЊ СЌР»РµРјРµРЅС‚С‹ РІ СЃРµРєС†РёСЏС…
	"FOLDER" => $arResult["FOLDER"],	// С‚РµРєСѓС‰Р°СЏ РґРёСЂРµРєС‚РѕСЂРёСЏ
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],	// РєРѕРґ С‚РµРєСѓС‰РµРіРѕ РїРѕРґСЂР°Р·РґРµР»Р°
	"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],	// РєРѕРґ С‚РµРєСѓС‰РµРіРѕ СЌР»РµРјРµРЅС‚Р° РёРЅС„РѕР±Р»РѕРєР°
	),
	false
);
?>
</div>