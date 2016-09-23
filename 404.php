<?
/*require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");*/
?>
 
<!--<div class="onecolumn">
      <h1 class="title">Страница не найдена</h1>
      <br  />
      <p>Возможно вы неправильно набрали адрес, или такой страницы на сайте больше не существует.</p>
      <p>Попробуйте начать с <a href="/">главной страницы</a> сайта.</p></div>

</div>-->

<?/*require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/?>
<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
$sapi_type = php_sapi_name();
if ($sapi_type=="cgi") 
   header("Status: 404");
else 
   header("HTTP/1.1 404 Not Found");
@define("ERROR_404","Y");
//Тут уже подключение верней части шаблона и присваивание заголовка
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>