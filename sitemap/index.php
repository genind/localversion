<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����� �����");
?>

<?$APPLICATION->IncludeComponent("bitrix:main.map", "sitemap", array(
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600",
	"SET_TITLE" => "Y",
	"LEVEL" => "5",
	"COL_NUM" => "1",
	"SHOW_DESCRIPTION" => "N"
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>