<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профессиональная переподготовка");
if($APPLICATION->GetCurPage (false) == "/learning/"):?>
<!--Сюда вводить текст для страницы Профессиональная переподготовка-->
 Страница находится в стадии наполнения. 
<!--Конец блока-->
 <?else:?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "inc1",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => ""
	)
);?> <?endif;?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>