<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ ���������");
?>	 
<script type="text/javascript" src="/js/jquery.jqtransform.js"></script>
 <link rel="stylesheet" href="/css/jqtransform.css" type="text/css"></link> 
<script type="text/javascript">
$(function() {
    //find all form with class jqtransform and apply the plugin
    $("form.jqtransform").jqTransform();
});
</script>
 
<script type="text/javascript">
    function setcaptcha(data){
    $('#captcha_sid').attr('value',data);
    $('#captcha_container').empty();
    $('#captcha_container').append('<img id="bxid_959986" src="/bitrix/tools/captcha.php?captcha_sid='+data+'" alt="CAPTCHA"  />');
    }

    function getnewcaptcha()
    {
    var file = '/bitrix/ajax.getcaptcha.php';
    $.get (file,{},function(data) { setcaptcha(data); });
    }
    
    $(document).ready(function() {
            // prepare the form when the DOM is ready 
            $(document).ready(function() { 
                // bind form using ajaxForm 
                $('#requestForm').ajaxForm({ 
                    // dataType identifies the expected content type of the server response 
                    dataType:  'json', 

                    // success identifies the function to invoke when the server response 
                    // has been received 
                    success:   processJson 
                }); 
            });
            
            function processJson(data) { 
                getnewcaptcha();
                
                $('#errors').html('');
                $('.jqTransformInputInner').css('border', '');
                $('.err').hide();
                if (data.status == 'error') { 
                    
                    $('#errors').html('<p>�� ������� ��������� �����. ��������� ����, ���������� �������.</p>');
                    for (err in data.errors.required ) {                                             
                        var err_code = data['errors']['required'][err];  
                        
                        if ( $('input[type=text][name='+err_code+']').length) {
                            $('input[type=text][name='+err_code+']').parent().parent().css('border', '1px solid red');              
                        } else {
                            $('.' + err_code + '-error').show();
                        }

                    }
                    
                    
                     $('html, body').animate({scrollTop:0}, 'fast');
                    
                } else {
                    document.location = '/entrance/request/success.php';
                }
            }

if ( $('input[name="name"]').val() == '') {
$('input[name="name"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="name"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="name"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="birth"]').val() == '') {
$('input[name="birth"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="birth"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="birth"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="residence"]').val() == '') {
$('input[name="residence"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="residence"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="residence"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="city"]').val() == '') {
$('input[name="city"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="city"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="city"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="address"]').val() == '') {
$('input[name="address"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="address"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="address"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="email"]').val() == '') {
$('input[name="email"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="email"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="email"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="mphone"]').val() == '') {
$('input[name="mphone"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="mphone"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="mphone"]').parent().parent().css('border', '1px solid red');
           }
       });
}

if ( $('input[name="startlearn"]').val() == '') {
$('input[name="startlearn"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="startlearn"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="startlearn"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="namelearn12"]').val() == '') {
$('input[name="namelearn12"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="namelearn12"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="namelearn12"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="officeprog"]').val() == '') {
$('input[name="officeprog"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="officeprog"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="officeprog"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="internetprog"]').val() == '') {
$('input[name="internetprog"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="internetprog"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="internetprog"]').parent().parent().css('border', '1px solid red');
           }
       });
}
if ( $('input[name="captcha_word"]').val() == '') {
$('input[name="captcha_word"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="captcha_word"]').parent().parent().css('border', ''); 
           }else{
               $('input[name="captcha_word"]').parent().parent().css('border', '1px solid red');
           }
       });
}

            $('#add-edu').click(function() {
                $('#dop-edu-area').show();
                $('#dop-edu-area').append($('#pattern #edu').html());
                $('.edu-dop:last').jqTransform();
            })  

            $('#add-lang').click(function() {
                $('#dop-lang-area').show();
                $('#dop-lang-area').append($('#pattern #lang').html());
                $('.lang-dop:last').jqTransform();

                $('.jqTransformSelectWrapper').css('z-index', '');
            })    
    });

    function rem_edu(el) {
        if ($('#dop-edu-area .edu-dop').length < 2) {
            $('#dop-edu-area').hide();
        }

        el.parent().remove();
    }

    function rem_lang(el) {
        if ($('#dop-lang-area .lang-dop').length < 2) {
            $('#dop-lang-area').hide();
        }

        el.parent().remove();
    }
</script>
 
<div id="pattern" style="display: none; "> 
  <div id="lang"> 
    <div class="lang-dop"> 
      <div class="rowElem4" style="clear: none; width: 400px; float: left; "> <label for="lang[]">����</label> <input name="lang[]" type="text" style="width: 300px; " placeholder="��������" /> </div>
     
      <div class="rowElem4" style="clear: none; width: 520px; float: left;"> <label for="urlang[]"> ������� �������� ������ </label> <select name="urlang[]" id="urlang10" style="width: 250px;"> <option id="field-1" value="�����������"> ����������� </option> <option id="field-2" value="���� �����������"> ���� ����������� </option> <option id="field-3" value="�����"> ����� </option> <option id="field-4" value="����"> ���� </option> <option id="field-5" value="��������� � ���������������� ������������"> ��������� � ���������������� ������������ </option> </select> </div>
     
      <div style="clear: both; height: 1px; ">&nbsp;</div>
     <a href="javascript:;" onclick="rem_lang($(this))" class="removelang" >������� ����</a> 
      <div style="clear: both; "></div>
     </div>
   </div>
 
  <div id="edu"> 
    <div class="edu-dop"> 


  <div class="rowElem" style="clear: none; width: 450px; float: left; "> <label for="learn">������� �����������</label> <select name="learn[]" id="learn"> <option id="field14-1" value="������"> ������ </option> <option id="field14-2" value="�������"> ������� </option> <option id="field14-3" value="������-�����������"> ������-����������� </option> <option id="field14-4" value="��������� ����������������"> ��������� ���������������� </option>


 </select> </div>
 
  <div class="rowElem" style="clear: none; width: 245px; float: left; "> <label for="startlearn">������</label> <input name="startlearn[]" id="startlearn" class="required" type="text" placeholder="��.��.����" /> </div>
 
<div class="rowElem" style="clear: none; width: 235px; float: left; "> <label for="endlearn">�����</label> <input name="endlearn[]" id="endlearn" type="text" placeholder="��.��.����" style="width:162px;" /> </div>

<div style="clear: both; ">&nbsp;</div>


      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="namelearn[]">�������� �������� ���������</label> <input name="namelearn[]" type="text" style="width: 654px; " placeholder="�������� ����" /> </div>
  


   
      <div style="clear: both; ">&nbsp;</div>
     
      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="fakultet[]">��������� ��� ���������</label> <input name="fakultet[]" type="text" style="width: 689px; " placeholder="�������� ����������" /> </div>
     
      <div style="clear: both; ">&nbsp;</div>
     
      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="specialnost[]">�������������</label> <input name="specialnost[]" id="specialnost1" type="text" style="width: 779px; " placeholder="�������������" /> </div>
     <a href="javascript:;" onclick="rem_edu($(this))" class="removelearn" >������� �����������</a> 
      <div style="clear: both; ">&nbsp;</div>
     </div>
   </div>
 </div>
 
<div id="errors"> </div>
 <form action="/entrance/request/processform.php" method="post" id="requestForm" class="jqtransform"> 
  <div class="rowElem" style="width: 620px; float: left; "> <label for="name"> ��� </label> <input name="name" id="name" class="required" type="text" style="width: 500px; " placeholder="������ ���� ����������" /> </div>
 
  <div class="rowElem" style="clear: none; width: 310px; float: left; "> <label for="birthday"> ���� �������� </label> <input name="birth" id="birth" class="required" type="text" style="width: 162px; " placeholder="��.��.����" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="residense">�����������</label> <input name="residence" id="residence" type="text" style="width: 800px; " placeholder="������" /> </div>
 


<div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">���������� ���������� (����������� �����)</h2>
 
  <div class="rowElem" style="clear: none; width: 350px; float: left; "> <label for="city">�����</label> <input name="city" id="city" class="required" type="text" style="width: 250px; " placeholder="������" /> </div>
 
  <div class="rowElem" style="clear: none; width: 580px; float: left; "> <label for="address">�����</label> <input name="address" id="address" class="required" type="text" style="width: 510px; " placeholder="��. �������-������, �.7" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="email">E-mail</label> <input name="email" id="email" class="required email" type="text" style="width: 861px; " placeholder="info@ipk-rudn.ru" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 471px; float: left; "> <label for="hphone">�������� �������</label> <input name="hphone" id="hphone" type="text" style="width: 271px; " placeholder="+7(495)731-5111" /> </div>
 
  <div class="rowElem" style="clear: none; width: 460px; float: left; "> <label for="mphone">��������� �������</label> <input name="mphone" id="mphone" class="required" type="text" style="width: 262px; " placeholder="+7(926)555-5555" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <label for="field10-1">���������������� ������ �����</label> <input name="svyaz" id="mail" value="�� e-mail" type="radio" checked="checked" /> <span class="sv">�� e-mail</span> <input name="svyaz" id="phones" value="�� ��������" type="radio" /> <span class="sv">��  ��������</span> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
 <hr class="razd"/> 
  <h2 class="zag">�������� �����������</h2>
 <p class="namelearn-error err" style="display: none; color: red; ">�������� ���� ������� �� �����.</p>
  <div class="rowElem" style="clear: none; width: 450px; float: left; "> <label for="learn">������� �����������</label> <select name="learn12" id="learn"> <option id="field14-1" value="������"> ������ </option> <option id="field14-2" value="�������"> ������� </option> <option id="field14-3" value="������-�����������"> ������-����������� </option> <option id="field14-4" value="��������� ����������������"> ��������� ���������������� </option>


 </select> </div>
 
  <div class="rowElem" style="clear: none; width: 245px; float: left; "> <label for="startlearn">������</label> <input name="startlearn12" id="startlearn" class="required" type="text" placeholder="��.��.����" /> </div>
 
<div class="rowElem" style="clear: none; width: 235px; float: left; "> <label for="endlearn">�����</label> <input name="endlearn12" id="endlearn" type="text" placeholder="��.��.����" style="width:162px;" /> </div>

  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <label for="namelearn">�������� �������� ���������</label> <input name="namelearn12" id="namelearn"  type="text" class="required" style="width: 654px; " placeholder="���������� ����������� ������ �������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="fakultet">��������� ��� ���������</label> <input name="fakultet12" id="fakultet"  type="text" style="width: 689px; " placeholder="����������� �����" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="specialnost">�������������</label> <input name="specialnost12" id="specialnost"  type="text" style="width: 779px; " placeholder="������������� ����������� � ������� �������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="wrap_dop" id="dop-edu-area" style="display: none; "> 
    <h2 class="zag1">�������������� �����������</h2>
   </div>
 
  <div style="clear: both; ">&nbsp;</div>
 <a href="javascript:;" class="addlearn" id="add-edu" >�������� �����������</a> 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd" /> 
  <h2 class="zag">�������� ������������ �������</h2>
 
  <div class="rowElem" style="clear: none; width: 390px; float: left; "> <label for="lang">����</label> <input name="lang[]" id="lang" type="text" style="width: 300px; " placeholder="����������" /> </div>
 
  <div class="rowElem" style="clear: none; width: 530px; float: left; "> <label for="urlang">������� �������� ������</label> <select name="urlang[]" id="urlang" class="required" style="float: left; width:250px; "> <option id="field20-1" value="�����������"> ����������� </option> <option id="field20-2" value="���� �����������"> ���� ����������� </option> <option id="field20-3" value="�����"> ����� </option> <option id="field20-4" value="����"> ���� </option> <option id="field20-5" value="��������� � ���������������� ������������"> ��������� � ���������������� ������������ </option> </select> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 520px; float: left; "> <label for="emptylang" style="color: rgb(46, 61, 76); font-size: 12px; margin-top: -15px; "> �������� ���� ������, ���� �� �������� ������� </label> </div>
 
  <div class="wrap_dop10" id="dop-lang-area"> 
    <br />
   
    <h2 class="zag3">�������������� �����</h2>
   </div>
 
  <div style="clear: both; height: 1px; ">&nbsp;</div>
 <a href="javascript:;" class="addlang" id="add-lang" >�������� ����</a> 
  <div style="clear: both; height: 1px; ">&nbsp;</div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">������ ������ � �����������</h2>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="officeprog">������� ���������</label> <input name="officeprog" id="officeprog" class="required" type="text" style="width: 732px; " placeholder="MS WORD, MS EXCEL � ��." /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="internetprog">��������</label> <input name="internetprog" id="internetprog" class="required" type="text" style="width: 832px; " placeholder="MS IE, Opera, Chrome" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="profprog">���������������� ���������</label> <input name="profprog" id="profprog" type="text" style="width: 642px; " placeholder="1� �����������, ����������� � ��." /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 

 <hr class="razd" /> 
  <h2 class="zag">��������� ����� ������</h2>
 
<div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="profession">���������</label> <input name="profession" id="profession" type="text" style="width: 805px; " placeholder="�������� �� �������" /> </div>

<div style="clear: both; ">&nbsp;</div>
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="org">�����������</label> <input name="org" id="org" type="text" style="width: 792px; " placeholder="��� ���������� �������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="naprorg">����������� ������������ �����������</label> <input name="naprorg" id="naprorg" type="text" style="width: 554px; " placeholder="����������� ������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="otdelrorg">�������� ������ ��� �������������</label> <input name="otdelrorg" id="otdelrorg"  type="text" style="width: 584px; " placeholder="����� ������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="dolzhrorg">���������� ���������</label> <input name="dolzhrorg" id="dolzhrorg" type="text" style="width: 702px; " placeholder="�������� �� ��������" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="staj">���� ������ �� �������� ���������</label> <input name="staj" id="staj" type="text" style="width: 580px; " placeholder="������ ���" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">���� ��������������� �����������</h2>
 
  <p class="purpose-error err" style="display: none; color: red; ">�������� ���� ������� �� �����.</p>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <input name="purpose[]" id="field33-1" value="���������� ���������������� ������������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">���������� ���������������� ������������</span> <input name="purpose[]" id="field33-2" value="��������� ����" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">��������� ����</span> <input name="purpose[]" id="field33-3" value="����� ����� ������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 0px 0px 5px; ">����� ����� ������</span> 
<div style="clear: both; height:1px; ">&nbsp;</div>
<br/> <input name="purpose[]" id="field33-4" value="������������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">������������</span> 
<input name="purpose[]" id="field33-5" value="������" type="checkbox" /><span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px;">������</span><input name="purpose[]" id="purpose[]" type="text" placeholder="���-�� ���?" /> <span style="float: left; font-size: 12px; margin: 0px 0px 0px 20px; ">�������� ��� ���� ������, ���� 
      <br />
    ������������� �����������</span>

</div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  
  <h2 class="zag">������ �� ������ ���������� � ������?</h2>

  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <input name="from[]" id="field36-1" value="�� �������� �������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 55px 0px 5px; "> �� �������� ������� </span> 
<input name="from[]" id="field36-2" value="�� ���������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 10px 0px 5px; "> �� ��������� <span style="font-size:16px"><i>(�� �����������, ������� ����)</i></span> </span> <input name="from[]" id="from[]" type="text" placeholder="����� �����" style="width:250px;" />

<div style="clear: both; ">&nbsp;</div>

<input name="from[]" id="field36-3" value="�� �������� � ����" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 65px 0px 5px; "> �� �������� � ���� </span> 

   <input name="from[]" id="field36-4" value="�� ��������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 65px 0px 5px; "> �� �������� </span> 

<input name="from[]" id="field36-5" value="�������� �� e-mail" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 198px 0px 5px; "> �������� �� e-mail </span> 

<div style="clear: both; ">&nbsp;</div>

<input name="from[]" id="field36-6" value="������" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; "> ������ </span> <input name="from[]" id="field36-7" type="text" style="float: left; width:350px;" placeholder="���-�� ���?" /> </div>

  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd" /> <?include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0)
{
    $captchaPass = randString(10);
    COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
?> 
<script type="text/javascript">

</script>
 <?$arResult["CAPTCHA_CODE"] = htmlspecialchars($GLOBALS["APPLICATION"]->CaptchaGetCode()); ?> 
  <div style="clear: none; width: 960px; float: left; "> <label for="captcha" style="font-size: 14px; margin-left: 0px; padding-top: 10px; ">������� ��� � ��������</label> <input type="hidden" name="captcha_code" id="captcha_sid" value="&lt;img id=" bxid_624270"="" src="/bitrix/images/fileman/htmledit2/php.gif" border="0" />&quot; /&gt; 
    <div id="captcha_container" style="display: inline-block; float: left; margin-left: 30px; margin-top: 5px; "> <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>"  /> </div>
   
    <div style="float: left; margin-left: 10px; margin-top: 5px; "> <a class="reload" id="reload" onclick="getnewcaptcha();return false;" ></a> </div>
   
    <div style="float: left; margin-left: 50px; margin-top: 15px; "> <span style="position: relative; margin: 0px 0px 0px 10px; font-size: 14px; ">����</span> </div>
   
    <div style="position: relative; left: 40px; float: left; margin-top: 5px; "><input type="text" id="captcha_word" name="captcha_word" style="width: 140px; position: relative; " class="reqired" /></div>
   
<div style="clear: both; margin-top: 50px;">
<input type="checkbox" class="confirmation-checkbox" id="chk-rules-agreed"/> 

                <span style="display:inline-block; padding-top:3px;">&nbsp;� <a href="#rules" data-reveal-id="rules" data-animation="fade" data-closeonbackgroundclick="true" data-dismissmodalclass="close-reveal-modal">��������(��) �� ��������� ���� ������������ ������</a> � ���� ����.</span>
</div>


    <div style="clear: both; float: left; margin-top: 50px; "> 	 <input type="submit" value="&nbsp;" name="submit" class="passive" disabled="disabled" /> </div>
   </div>

<div id="rules" class="reveal-modal">
<h3 style="color:#2D7DC8; font-size:18px; line-height:22px; font-weight:normal; padding-bottom:10px;">����������</h3>
<hr style="margin-bottom:20px;"/>
<p>��������� � ����������� ������������ � ��� �������� ���� ����, ������������ �� ������: ���������� ���������, ����� ������, ��. �������-������, �.10, ����. 2, �� ��������� ��� ��� ���������� ������� � ������������ ������ �� 27.07.2006 �. �152-��,���� ������������ ������ ��������� � ������-������, ����������� ��� ������ �� ����.</p>
<p>��������� �������� ��������� � ������� ����������� �� ������, ������������� ���������������� � ����� ������������ ��������� ������ ���������� ��������� ������������� � ������ ���������� ��� ��� ���� �������� �� ��������� ������������ ������. � ������ ������ ��������� ������������ ������ ���������� �������� ���� ���� ������� ���������� ���������� �������� �� ��������� ������������ ������, �� ����������� �������� �� ��������� ������������ ������, ����������� �� ���������� ������� ��������� �� ���� ���� ���������������� � ����� ������������ ��������� ������ ���������� ���������. ������� ������������ ������ ������ �������� ��������� ��������, �������� � ������������� ������� ���� ����. ��������� �������� �������� ���������� �� ��������� ������� ���� ����� ��������� ����������� ����������� �� ������ ���� ����.</p>   
<a class="close-reveal-modal">&#215;</a>         
</div>
<script type="text/javascript" src="/js/jquery.reveal.js"></script>
<link type="text/css" rel="stylesheet" media="screen" href="/css/reveal.css" /> 
<script type="text/javascript">
$(document).ready(function() {
$('button.jqTransformButton').attr("disabled", "disabled");   
$("button.jqTransformButton_hover").attr("disabled", "disabled"); 
});
    $(".confirmation-checkbox").change(function() { 
        if ($(".confirmation-checkbox:checked").length == 1 ) {
            $("button[name=submit]").removeAttr("disabled").removeClass("passive");
$("input[type=submit]").removeAttr("disabled").removeClass("passive");
        } else {
            $("button[name=submit]").attr("disabled", "disabled").addClass("passive");
$("input[type=submit]").attr("disabled", "disabled").addClass("passive");
        }
    }); 
</script>


 </form> 
<div style="clear: both; ">&nbsp;</div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>