<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "мастер-классы , выставки , семинары , конференции , вебинары , дни открытых дверей, мероприятия");
$APPLICATION->SetPageProperty("keywords", "мастер-классы , выставки , семинары , конференции , вебинары , дни открытых дверей, мероприятия");
$APPLICATION->SetPageProperty("description", "участие и организация мастер-классов выставок семинаров конференций вебинаров дней открытых дверей и других мероприятий");
if(stripos($_SERVER['REQUEST_URI'],"master-class")){$APPLICATION->SetTitle("Мастер-классы");}
if(stripos($_SERVER['REQUEST_URI'],"actions/photo")){$APPLICATION->SetTitle("Фоторепортажи");}
if(strlen($_SERVER['REQUEST_URI'])-stripos($_SERVER['REQUEST_URI'],"/actions")<10){$APPLICATION->SetTitle("Мероприятия");}

?>
<?
$arrFilter = array(
    "ACTIVE" =>"Y",
    array(
        "LOGIC" => "OR",
        array("IBLOCK_ID" => "13"), 
        array("IBLOCK_ID" => "14")    
    )
); 

if ($_REQUEST['SCODE']) {
    $arrFilter['SECTION_CODE'] = $_REQUEST['SCODE'];
}



$APPLICATION->IncludeComponent("custom:news.list", "actions", array(
	"IBLOCK_TYPE" => "-",
	"IBLOCK_ID" => $_REQUEST["BCODE"],
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arrFilter",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "PHOTOS",
		2 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "/actions/#ID#",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "259200",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "j F Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => $_REQUEST["SID"],
	"PARENT_SECTION_CODE" => $_REQUEST["SCODE"],
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Мероприятия",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "pagenav",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>