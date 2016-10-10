<? 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<? 
	$APPLICATION->IncludeComponent(	"bitrix:breadcrumb","",
								Array( "START_FROM" => "0", "PATH" => "", "SITE_ID" => "s1" ));
?>



<?
$APPLICATION->IncludeComponent("bitrix:catalog", "catalog-short", Array(
	"IBLOCK_TYPE" => "content",	// Тип инфоблока
	"IBLOCK_ID" => "4",	// Инфоблок
	"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"SECTION_ID_VARIABLE" => "",	// Название переменной, в которой передается код группы
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
	"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
	"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
	"SEF_FOLDER" => "/short/",	// Каталог ЧПУ (относительно корня сайта)
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "259200",	// Время кеширования (сек.)
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
	"USE_ELEMENT_COUNTER" => "Y",	// Использовать счетчик просмотров
	"USE_FILTER" => "N",	// Показывать фильтр
	"USE_REVIEW" => "N",	// Разрешить отзывы
	"USE_COMPARE" => "N",	// Использовать компонент сравнения
	"PRICE_CODE" => "",	// Тип цены
	"USE_PRICE_COUNT" => "Y",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
	"PRICE_VAT_SHOW_VALUE" => "N",	// Отображать значение НДС
	"PRODUCT_PROPERTIES" => "",	// Характеристики товара, добавляемые в корзину
	"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
	"SHOW_TOP_ELEMENTS" => "N",	// Выводить топ элементов
	"SECTION_COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
	"SECTION_TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
	"PAGE_ELEMENT_COUNT" => "25",	// Количество элементов на странице
	"LINE_ELEMENT_COUNT" => "2",	// Количество элементов, выводимых в одной строке таблицы
	"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем товары в разделе
	"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки товаров в разделе
	"LIST_PROPERTY_CODE" => array(	// Свойства
		0 => "START_DATE",
		1 => "HITWORD",
		2 => "NEW",
		3 => "DURATION",
		4 => "DISCOUNTS",
		5 => "PRICE_STR",
		6 => "",
	),
	"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
	"LIST_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства раздела
	"LIST_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства раздела
	"LIST_BROWSER_TITLE" => "NAME",	// Установить заголовок окна браузера из свойства раздела
	"DETAIL_PROPERTY_CODE" => array(	// Свойства
		0 => "DOCUMENT",
		1 => "TIME",
		2 => "PRICE",
		3 => "TEACHERS",
		4 => "PROGRAMM",
		5 => "FORM",
		6 => "AUDITORIA",
		7 => "CEL",
		8 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
	"DETAIL_META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
	"DETAIL_BROWSER_TITLE" => "NAME",	// Установить заголовок окна браузера из свойства
	"LINK_IBLOCK_TYPE" => "content",	// Тип инфоблока, элементы которого связаны с текущим элементом
	"LINK_IBLOCK_ID" => "4",	// ID инфоблока, элементы которого связаны с текущим элементом
	"LINK_PROPERTY_SID" => "",	// Свойство, в котором хранится связь
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",	// URL на страницу, где будет показан список связанных элементов
	"USE_STORE" => "N",	// Показывать блок "Количество товара на складе"
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
	"PAGER_TITLE" => "Профессиональная переподготовка",	// Название категорий
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_TEMPLATE" => "pagenav",	// Название шаблона
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
	"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>