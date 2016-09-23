<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(CModule::IncludeModule("iblock"))
   { 

		if ($this->StartResultCache(86400*30,false,false))
		{
			$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y');
			$arSelect = Array('ID','NAME','SECTION_PAGE_URL');
			$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'),$arFilter, true,$arSelect);
		
			$arFilter = Array('IBLOCK_ID'=>"4", 'ACTIVE'=>'Y');
			$arSelect = Array('ID','NAME','SECTION_ID','SUBSECTION','DETAIL_PAGE_URL','sort', "PROPERTY_IFMODULE");
			$rs_elements = CIBlockElement::GetList(Array('sort'=>'ASC'),$arFilter,false,false,$arSelect);
		
			$Curses = Array();
			while($ar_section = $rs_sections -> GetNext()) {
				$Curses[$ar_section['ID']] = $ar_section; 
			}
		
			while($ar_element = $rs_elements -> GetNext()) {
				$SecList = CIBlockElement::GetElementGroups($ar_element["ID"],false,array('ID'));
				while($SID = $SecList-> GetNext()){
					$Curses[$SID['ID']]['ITEMS'][]=$ar_element;
				}
			}
		
			$arResult = Array();
			foreach($Curses as $Sec) {
				$arResult[] = $Sec;
			}
			$this->IncludeComponentTemplate();
		}
	}

?>