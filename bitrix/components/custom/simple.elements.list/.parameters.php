<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");
$arIBlock=array();
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
{
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arComponentParameters = array(
	"PARAMETERS" => array(
	
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BN_P_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
			"ADDITIONAL_VALUES" => "Y",
		),
		"DISPLAY_ELEMENTS" => Array(
			"PARENT" => "BASE",
			"NAME" => "показывать элементы в секциях",
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"ELEMENT_CODE" => Array(
			"PARENT" => "BASE",
			"NAME" => "код текущего элемента инфоблока",
			"TYPE" => "TEXT",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"SECTION_CODE" => Array(
			"PARENT" => "BASE",
			"NAME" => "код текущего подраздела",
			"TYPE" => "TEXT",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"URL_TEMPLATE" => Array(
			"PARENT" => "BASE",
			"NAME" => "шаблон адресов",
			"TYPE" => "LIST",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"FOLDER" => Array(
			"PARENT" => "BASE",
			"NAME" => "текущая директория",
			"TYPE" => "STRING",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
	),
);
?>
