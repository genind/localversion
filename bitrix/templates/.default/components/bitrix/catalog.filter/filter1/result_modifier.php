<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule ("iblock");

$rsElements = CIBlockElement::GetList (
	Array ("DATE_ACTIVE_FROM" => "DESC"), Array ("IBLOCK_ID" => $arParams["IBLOCK_ID"]), false, false, Array ("DATE_ACTIVE_FROM"));

$arResult["ITEMS"] = Array ();
while ($arElement = $rsElements->Fetch())
{
	if (empty ($arElement["DATE_ACTIVE_FROM"])) continue;
	
	$year = ConvertDateTime ($arElement["DATE_ACTIVE_FROM"], "YYYY");
	if ($year)
	{
		$arResult["ITEMS"][$year] = $year;
	}
}

?>