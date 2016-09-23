<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if ($this->StartResultCache(86400*30,false,false))
{
	$arFilter = Array('IBLOCK_ID'=>"4", 'ACTIVE'=>'Y');
	$arSelect = Array('ID','NAME','DETAIL_PAGE_URL');
	$rs_elements = CIBlockElement::GetList(Array('sort'=>'ASC'),$arFilter,false,false,$arSelect);

	$arResult = Array();
	while($ar_element = $rs_elements -> GetNext()) {		
		$Related_courses = Array();
		$relevance = CIBlockElement::GetProperty($ar_element["IBLOCK_ID"],$ar_element["ID"],Array(),Array("CODE"=>"RELEVANCE"));
		while ($ob = $relevance->GetNext()){
			$Related_courses[] = $ob['~VALUE'];}
			
		$arResult[$ar_element["ID"]]['NAME'] = $ar_element['NAME'];
		$arResult[$ar_element["ID"]]['DETAIL_PAGE_URL'] = $ar_element['DETAIL_PAGE_URL'];
		$arResult[$ar_element["ID"]]['RELEVANCE'] = $Related_courses;
	}
	

	$this->IncludeComponentTemplate();
}

?>