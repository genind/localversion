<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="catalog-sections-list-top">
	<div class="title">���������������� ��������������:</div>
	<div class="description">��� ��������������� ����������������� �����������, ������� ��������� � ���������� ����� ������� ����� ���������. �� ���������� �������� �������� ������ ���� � ���������������� �������������� � ����������� ������������. ������ � ���������������� �������������� ������������ ����� �� ������� ����� ���������������� ������������</div>
</div>

<div class="catalog-sections-list-bottom">
<? 
	$APPLICATION->IncludeComponent("custom:curses.left.menu", "sections-list", Array(
	"IBLOCK_ID" => "4",
	"DISPLAY_ELEMENTS" => "Y",	// показывать элементы в секциях
	"FOLDER" => $arResult["FOLDER"],	// текущая директория
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],	// код текущего подраздела
	"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],	// код текущего элемента инфоблока
	),
	false
);
?>
</div>