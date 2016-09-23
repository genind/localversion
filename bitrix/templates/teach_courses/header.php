<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<?$APPLICATION->ShowHead();?>
 <? CJSCore::Init(array("jquery")); ?>
<title><?$APPLICATION->ShowTitle();?></title>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />
<link rel="icon" href="http://ippkrudn.ru/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/css/feedback.css" type="text/css" media="screen" />
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/cufon.js"></script>
<script type="text/javascript" src="/js/font.js"></script>
<script type="text/javascript" src="/js/scr.js"></script>
<script type="text/javascript" src="/js/jquery.ba-hashchange.min.js"></script>
<script type="text/javascript" src="/js/ajax_load.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>
<script type="text/javascript">
	$(function(){
		AjaxContent.init({containerDiv:"#teachers",contentDiv:"#teachers"}).ajaxify_links(".filter ul li a");
	});
$(document).ajaxSuccess(function() {
	Cufon.refresh('.filter ul li a');
});
</script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount','UA-47212297-1']);
	_gaq.push(['_addOrganic','images.yandex.ru','text',true]);
	_gaq.push(['_addOrganic','blogsearch.google.ru','q',true]);
	_gaq.push(['_addOrganic','blogs.yandex.ru','text',true]);
	_gaq.push(['_addOrganic','go.mail.ru','q']);
	_gaq.push(['_addOrganic','nova.rambler.ru','query']);
	_gaq.push(['_addOrganic','nigma.ru','s']);
	_gaq.push(['_addOrganic','webalta.ru','q']);
	_gaq.push(['_addOrganic','aport.ru','r']);
	_gaq.push(['_addOrganic','poisk.ru','text']);
	_gaq.push(['_addOrganic','liveinternet.ru','q']);
	_gaq.push(['_addOrganic','quintura.ru','request']);
	_gaq.push(['_addOrganic','search.qip.ru','query']);
	_gaq.push(['_addOrganic','gogo.ru','q']);
	_gaq.push(['_addOrganic','ru.yahoo.com','p']);
	_gaq.push(['_addOrganic','market.yandex.ru','text']);
	_gaq.push(['_addOrganic','price.ru','query']);
	_gaq.push(['_addOrganic','tyndex.ru','query']);
	_gaq.push(['_addOrganic','torg.mail.ru','q']);
	_gaq.push(['_addOrganic','tiu.ru','query']);
	_gaq.push(['_addOrganic','tech2u.ru','text']);
	_gaq.push(['_addOrganic','goods.marketgid.com','query']);
	_gaq.push(['_addOrganic','poisk.ngs.ru','q']);
	_gaq.push(['_addOrganic','akavita.by','z']);
	_gaq.push(['_addOrganic','tut.by','query']);
	_gaq.push(['_addOrganic','all.by','query']);
	_gaq.push(['_addOrganic','meta.ua','q']);
	_gaq.push(['_addOrganic','bigmir.net','q']);
	_gaq.push(['_addOrganic','i.ua','q']);
	_gaq.push(['_addOrganic','online.ua','q']);
	_gaq.push(['_addOrganic','a.ua','query']);
	_gaq.push(['_addOrganic','ukr.net','q']);
	_gaq.push(['_addOrganic','search.com.ua','q']);
	_gaq.push(['_addOrganic','search.ua','area']);
	_gaq.push(['_addOrganic','search.ukr.net','q']);
	_gaq.push(['_addOrganic','sm.aport.ru','key']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

<!--GOOGLE ANALYTICS-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56277345-1', 'auto');
  ga('send', 'pageview');

</script>
<!--GOOGLE ANALYTICS-->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter26325633 = new Ya.Metrika({id:26325633,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/26325633" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</head>

<body>
<div id="panel">
<?$APPLICATION->ShowPanel();?>
</div>
<div id="wr1">

<div id="wrapper">

	<div id="header">
		<div id="logo">
        	<a href="/"><img src="/images/new-logo.png" alt="logo" /></a>
			<a href="/"><img src="/images/logo-name.png" alt="title" style="float:left; margin-left:15px; display:block;" /></a>
        </div>
		<div id="search2">
			<button id="searchbutton" title="Поиск на сайте"></button>
			<form id="searchform" class="search" action="/search/" method="get">
			<input type="text" name="q" value="Поиск по сайту" onfocus="if (this.value == 'Поиск по сайту') {this.value = '';}" onblur="if (this.value==''){this.value='Поиск по сайту';}">
			</form>
			<script>
$("#searchbutton").click(function() {
  $("#searchbutton").fadeOut(500);
  $("#searchform").css("display","block");
  $("#searchform").animate({width:"100%"},500 );
});
</script>
		</div>
        <div id="search">
       	  <span><img src="/images/course_zap.png" alt="Запись на курса" /></span>

          <span id="phone">+7 (499) 936 85 94</span>
         <div style=" width: 100%; text-align: center;  margin-top: -5px; margin-bottom: 5px;">
                    <a href="mailto:ippk_sales@pfur.ru" style="font-size: 13px;  font-weight: 600; color: #293f80;">ippk_sales@pfur.ru </a>
          </div>
          <br/>
<a href="/onlinerequest/" data-reveal-id="subscribetop_reveal" id="subscribetop" style="margin-top: -20px;">ЗАЯВКА НА ОБУЧЕНИЕ</a> 
        </div>
<div id="main_divider"><img src="/images/main-divider.png" alt="main divider" /></div>
        <?$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => "/include/feedback.php",
        "EDIT_TEMPLATE" => ""
    ),
    false
);?>
  </div><!-- #header-->
	<div id="menu">
	<?$APPLICATION->IncludeComponent("bitrix:menu", "menu", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
	<div class="shadow1"></div>
	</div>
		<? $APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array( 
"START_FROM" => "0", 
"PATH" => "", 
"SITE_ID" => "s1" 
) 
); ?>
	<div id="content">

        <div id="centr">
<div class="left">
<?$APPLICATION->IncludeComponent("bitrix:menu", "about", array(
	"ROOT_MENU_TYPE" => "left",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
<div class="inner-shadow">&nbsp;</div>
<div class="filter2">
<?$APPLICATION->IncludeComponent("bitrix:news.list", "courses", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "4",
	"NEWS_COUNT" => "50",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "ID",
	"SORT_ORDER2" => "DESC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "newsnav",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
</div>
</div>

<div class="right">
        	<h1><?$APPLICATION->ShowTitle();?></h1>
        