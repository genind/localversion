<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
global $APPLICATION;
$aMenuLinksExt=$APPLICATION->IncludeComponent("custom:menu.sections.and.elements", "", array(
	"IS_SEF" => "Y",
	"SEF_BASE_URL" => "/learning/",
	"SECTION_PAGE_URL" => "#SECTION_ID#/",
	"DETAIL_PAGE_URL" => "#SECTION_ID#/#ELEMENT_CODE#/",
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "4",
	"DEPTH_LEVEL" => "2",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt); 


?>