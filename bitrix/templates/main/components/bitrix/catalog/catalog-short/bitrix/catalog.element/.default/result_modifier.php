<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arFilter = Array("ID"=>$arResult["PROPERTIES"]["TEACHERS"]["VALUE"]); 
   $arSelect = Array("DETAIL_PICTURE", "PREVIEW_TEXT", "NAME", "DETAIL_PAGE_URL");
   $res = CIBlockElement::GetList(Array("NAME"), $arFilter, false, false, $arSelect); 
   $i=0;
   while($ob = $res->GetNext(false,false)) 
	{
		foreach($arResult["PROPERTIES"]["TEACHERS"]["VALUE"] as $key => $val){ if($val===$ob['ID']) $i = $key;}
		$arResult["PROPERTIES"]["TEACHERS"]["VALUE"][$i] = Array();
		$arResult["PROPERTIES"]["TEACHERS"]["VALUE"][$i]['src'] = CFile::GetPath($ob['DETAIL_PICTURE']);
		$arResult["PROPERTIES"]["TEACHERS"]["VALUE"][$i]['text'] = $ob['PREVIEW_TEXT'];
		$arResult["PROPERTIES"]["TEACHERS"]["VALUE"][$i]['name'] = $ob['NAME'];
		$arResult["PROPERTIES"]["TEACHERS"]["VALUE"][$i]['link'] = $ob['DETAIL_PAGE_URL'];
	}
?>