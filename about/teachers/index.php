<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������������, �����������������, �������, �����������, �������, �������������, �����������");
$APPLICATION->SetPageProperty("keywords", "�������������, �����������������, �������, �����������, �������, �������������, �����������");
$APPLICATION->SetPageProperty("description", "������������� ��������� ��������� ������������ � �������������� ������� �������");
$APPLICATION->SetTitle("�������������");
$APPLICATION->SetPageProperty("title", "�������������");
?>


        	
<?
$APPLICATION->IncludeComponent("bitrix:news", "teachers", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "2",
	"NEWS_COUNT" => "50",
	"USE_SEARCH" => "N",
	"USE_RSS" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_REVIEW" => "N",
	"USE_FILTER" => "N",
	"SORT_BY1" => "NAME",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"CHECK_DATES" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/about/teachers/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "259200",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "Y",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
	"LIST_FIELD_CODE" => array(
		0 => "PREVIEW_TEXT",
		1 => "DETAIL_PICTURE",
		2 => "",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "COURSES",
		1 => "",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "N",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
	"DETAIL_FIELD_CODE" => array(
		0 => "NAME",
		1 => "DETAIL_TEXT",
		2 => "DETAIL_PICTURE",
		3 => "",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "COURSES",
		1 => "",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
	"DETAIL_PAGER_TITLE" => "��������",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "�������������",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "pagenav",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "N",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_ID#/",
	)
	),
	false
);?>	


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>