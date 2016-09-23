<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog.php");?>
<?php
$current_URI = $_SERVER['REQUEST_URI'];
// Редирект 301
if ($current_URI === '/news/2012/') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://ippkrudn.ru/news/2012');
    exit;
}
if ($current_URI === '/news/2013/') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://ippkrudn.ru/news/2013');
    exit;
}
if ($current_URI === '/news/2014/') {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: http://ippkrudn.ru/news/2014');
    exit;
}



// ROBOTS
$robots_arr = array('/actions/', '/actions/conference/', '/actions/exhibitions/', '/actions/master-class/', '/actions/open-door-day/', '/actions/photos/', '/actions/science-festivals/', '/actions/seminars/', '/actions/training/', '/actions/webinars/', '/about/administration/', '/about/beauty/', '/about/bukhgalterskiy-uchet-i-nalogooblozhenie/', '/about/design/', '/about/languages/', '/about/manager/', '/about/mini-mba/', '/about/pr/', '/about/psihology/', '/about/special/', '/about/teachers/', '/about/turizm/', '/about/yurisprudentsiya/', );

foreach ($robots_arr as $value) {
    if ($current_URI === $value) {
        $APPLICATION->SetPageProperty('robots', 'NOINDEX, FOLLOW');
    }
}

if (strpos($current_URI, 'arrFilter') !== false ||
    strpos($current_URI, 'PAGEN') !== false) {
    $APPLICATION->SetPageProperty('robots', 'NOINDEX, FOLLOW');
}

// <title>
if ($current_URI === '/actions/photos/481/') {
    $APPLICATION->SetPageProperty('title', 'Фото отчет об открытии первого в России подразделения международного психологического общества почета PSI CHI');
}
?>