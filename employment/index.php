<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�������� � ���������������");
?> 
<script type="text/javascript">
	$(document).ready(function() {
		
            Cufon('#lerning-directions .item a.title', { fontFamily: 'PFBeauSansPro', hover: true });
})
</script>
 
<div id="lerning-directions"> 
  <div class="col-1"> 
    <div class="item nitem"> </div>
   
    <div class="item nitem"> 		<a class="title ntitle" href="/employment/career/" >��������������� � �������</a> </div>
   </div>
 
  <div class="col-2"> 
    <div class="item nitem"> 		<a class="title ntitle" href="/employment/partners/" >�������� ��������</a> </div>
   
    <div class="item nitem"> 		<a class="title ntitle" href="/employment/contact/" >��������</a> </div>
   </div>
 </div>
 
<div style="height: 50px; clear: both;"></div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>