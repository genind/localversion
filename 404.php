<?
/*require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�������� �� �������");*/
?>
 
<!--<div class="onecolumn">
      <h1 class="title">�������� �� �������</h1>
      <br  />
      <p>�������� �� ����������� ������� �����, ��� ����� �������� �� ����� ������ �� ����������.</p>
      <p>���������� ������ � <a href="/">������� ��������</a> �����.</p></div>

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
//��� ��� ����������� ������ ����� ������� � ������������ ���������
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>