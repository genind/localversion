<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
global $APPLICATION; 
$aMenuLinksExt=$APPLICATION->IncludeComponent("custom:menu.sections.and.elements", "", array(
	"IS_SEF" => "Y",
	"SEF_BASE_URL" => "/about/teachers/",
	"SECTION_PAGE_URL" => "",
	"DETAIL_PAGE_URL" => "#ELEMENT_ID#",
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "2",
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