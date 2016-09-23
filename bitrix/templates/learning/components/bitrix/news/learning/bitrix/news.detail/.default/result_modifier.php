<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arFilter = Array("ID"=>$arResult["PROPERTIES"]["TEACHERS"]["VALUE"]); 
   $arSelect = Array("DETAIL_PICTURE", "PREVIEW_TEXT", "NAME", "DETAIL_PAGE_URL");
   $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect); 
   $i=0;
   while($ob = $res->GetNext(false,false)) 
      {
              $arResult["MOD"][$i]['src'] = CFile::GetPath($ob['DETAIL_PICTURE']);
         $arResult["MOD"][$i]['text'] = $ob['PREVIEW_TEXT'];
         $arResult["MOD"][$i]['name'] = $ob['NAME'];
         $arResult["MOD"][$i]['link'] = $ob['DETAIL_PAGE_URL'];
         $i++;
      }
//var_dump($arResult);?>