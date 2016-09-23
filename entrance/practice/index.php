<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ѕрактика");
?> 
<p>
  <div style="text-align: justify;">ѕрактика слушателей €вл€етс€ составной частью основной образовательной программы.</div>

  <div style="text-align: justify;">ѕрактика осуществл€етс€ в цел€х формировани€ и закреплени€ профессиональных знаний, умений и навыков, полученных в результате теоретической подготовки, а также дл€ изучени€ производственного приобретени€ организаторских навыков работы, так как это неразрывное единство фундаментальной теоретической и основательной практической подготовки слушателей.</div>

  <div style="text-align: justify;">
    <br />
  </div>

  <div style="text-align: justify;"><b>ѕроцедура предоставлени€ практики.</b></div>

  <div style="text-align: justify;">ѕрактика предоставл€етс€ всем слушател€м в рамках учебной программы.</div>

  <div style="text-align: justify;">—лушатели, желающие самосто€тельно пройти практику, должны сообщить об этом в письменной форме (установленного образца).</div>

  <div style="text-align: justify;">ѕо окончанию практики, все слушатели должны предоставить отчет о ее прохождении и дневник практики (установленного образца).</div>

  <div style="text-align: justify;">—лушатели, проходившие практику самосто€тельно, предоставл€ют отчет о прохождении практики, дневник практики и письмо из компании, где была пройдена практика о ее результатах, за подписью генерального директора.</div>
</p>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"docs_pr",
	Array(
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "100",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("FILE"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "–уководства",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	)
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>