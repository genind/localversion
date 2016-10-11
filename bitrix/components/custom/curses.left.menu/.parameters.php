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
			"NAME" => "���������� �������� � �������",
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y",
		),
		"ELEMENT_CODE" => Array(
			"PARENT" => "BASE",
			"NAME" => "��� �������� �������� ���������",
			"TYPE" => "TEXT",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"SECTION_CODE" => Array(
			"PARENT" => "BASE",
			"NAME" => "��� �������� ����������",
			"TYPE" => "TEXT",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"URL_TEMPLATE" => Array(
			"PARENT" => "BASE",
			"NAME" => "������ �������",
			"TYPE" => "LIST",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
		"FOLDER" => Array(
			"PARENT" => "BASE",
			"NAME" => "������� ����������",
			"TYPE" => "STRING",
			"DEFAULT" => "",
			"REFRESH" => "Y",
		),
	),
);
?>
