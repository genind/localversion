<? 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
global $APPLICATION; 
$aMenuLinksExt=$APPLICATION->IncludeComponent("custom:menu.sections", "", array(
	"IS_SEF" => "N",
	"ID" => $_REQUEST["ID"],
	"IBLOCK_TYPE" => "activity",
	"IBLOCK_ID" => "13",
	"SECTION_URL" => "/actions/#CODE#/",
	"SORT_BY1" => "NAME",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"DEPTH_LEVEL" => "2",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600"
	),
	false
); 
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks); 
?> 