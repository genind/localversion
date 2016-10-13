<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Анкета слушателя");
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
                    
                    $('#errors').html('<p>Не удалось отправить форму. Проверьте поля, отмеченные красным.</p>');
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
      <div class="rowElem4" style="clear: none; width: 400px; float: left; "> <label for="lang[]">Язык</label> <input name="lang[]" type="text" style="width: 300px; " placeholder="Немецкий" /> </div>
     
      <div class="rowElem4" style="clear: none; width: 520px; float: left;"> <label for="urlang[]"> Степень владения языком </label> <select name="urlang[]" id="urlang10" style="width: 250px;"> <option id="field-1" value="Разговорный"> Разговорный </option> <option id="field-2" value="Могу объясниться"> Могу объясниться </option> <option id="field-3" value="Читаю"> Читаю </option> <option id="field-4" value="Пишу"> Пишу </option> <option id="field-5" value="Использую в профессиональной деятельности"> Использую в профессиональной деятельности </option> </select> </div>
     
      <div style="clear: both; height: 1px; ">&nbsp;</div>
     <a href="javascript:;" onclick="rem_lang($(this))" class="removelang" >Удалить язык</a> 
      <div style="clear: both; "></div>
     </div>
   </div>
 
  <div id="edu"> 
    <div class="edu-dop"> 


  <div class="rowElem" style="clear: none; width: 450px; float: left; "> <label for="learn">Уровень образования</label> <select name="learn[]" id="learn"> <option id="field14-1" value="Высшее"> Высшее </option> <option id="field14-2" value="Среднее"> Среднее </option> <option id="field14-3" value="Средне-специальное"> Средне-специальное </option> <option id="field14-4" value="Начальное профессиональное"> Начальное профессиональное </option>


 </select> </div>
 
  <div class="rowElem" style="clear: none; width: 245px; float: left; "> <label for="startlearn">Начало</label> <input name="startlearn[]" id="startlearn" class="required" type="text" placeholder="ДД.ММ.ГГГГ" /> </div>
 
<div class="rowElem" style="clear: none; width: 235px; float: left; "> <label for="endlearn">Конец</label> <input name="endlearn[]" id="endlearn" type="text" placeholder="ДД.ММ.ГГГГ" style="width:162px;" /> </div>

<div style="clear: both; ">&nbsp;</div>


      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="namelearn[]">Название учебного заведения</label> <input name="namelearn[]" type="text" style="width: 654px; " placeholder="Название ВУЗа" /> </div>
  


   
      <div style="clear: both; ">&nbsp;</div>
     
      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="fakultet[]">Факультет или отделение</label> <input name="fakultet[]" type="text" style="width: 689px; " placeholder="Название факультета" /> </div>
     
      <div style="clear: both; ">&nbsp;</div>
     
      <div class="rowElem1" style="clear: none; width: 960px; float: left; "> <label for="specialnost[]">Специальность</label> <input name="specialnost[]" id="specialnost1" type="text" style="width: 779px; " placeholder="Специальность" /> </div>
     <a href="javascript:;" onclick="rem_edu($(this))" class="removelearn" >Удалить образование</a> 
      <div style="clear: both; ">&nbsp;</div>
     </div>
   </div>
 </div>
 
<div id="errors"> </div>
 <form action="/entrance/request/processform.php" method="post" id="requestForm" class="jqtransform"> 
  <div class="rowElem" style="width: 620px; float: left; "> <label for="name"> ФИО </label> <input name="name" id="name" class="required" type="text" style="width: 500px; " placeholder="Иванов Петр Михайлович" /> </div>
 
  <div class="rowElem" style="clear: none; width: 310px; float: left; "> <label for="birthday"> Дата рождения </label> <input name="birth" id="birth" class="required" type="text" style="width: 162px; " placeholder="ДД.ММ.ГГГГ" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="residense">Гражданство</label> <input name="residence" id="residence" type="text" style="width: 800px; " placeholder="Россия" /> </div>
 


<div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">Контактная информация (фактический адрес)</h2>
 
  <div class="rowElem" style="clear: none; width: 350px; float: left; "> <label for="city">Город</label> <input name="city" id="city" class="required" type="text" style="width: 250px; " placeholder="Москва" /> </div>
 
  <div class="rowElem" style="clear: none; width: 580px; float: left; "> <label for="address">Адрес</label> <input name="address" id="address" class="required" type="text" style="width: 510px; " placeholder="Ул. Миклухо-Маклая, д.7" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="email">E-mail</label> <input name="email" id="email" class="required email" type="text" style="width: 861px; " placeholder="info@ipk-rudn.ru" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 471px; float: left; "> <label for="hphone">Домашний телефон</label> <input name="hphone" id="hphone" type="text" style="width: 271px; " placeholder="+7(495)731-5111" /> </div>
 
  <div class="rowElem" style="clear: none; width: 460px; float: left; "> <label for="mphone">Мобильный телефон</label> <input name="mphone" id="mphone" class="required" type="text" style="width: 262px; " placeholder="+7(926)555-5555" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <label for="field10-1">Предпочтительный способ связи</label> <input name="svyaz" id="mail" value="по e-mail" type="radio" checked="checked" /> <span class="sv">по e-mail</span> <input name="svyaz" id="phones" value="по телефону" type="radio" /> <span class="sv">по  телефону</span> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
 <hr class="razd"/> 
  <h2 class="zag">Основное образование</h2>
 <p class="namelearn-error err" style="display: none; color: red; ">Выберите цель прихода на курсы.</p>
  <div class="rowElem" style="clear: none; width: 450px; float: left; "> <label for="learn">Уровень образования</label> <select name="learn12" id="learn"> <option id="field14-1" value="Высшее"> Высшее </option> <option id="field14-2" value="Среднее"> Среднее </option> <option id="field14-3" value="Средне-специальное"> Средне-специальное </option> <option id="field14-4" value="Начальное профессиональное"> Начальное профессиональное </option>


 </select> </div>
 
  <div class="rowElem" style="clear: none; width: 245px; float: left; "> <label for="startlearn">Начало</label> <input name="startlearn12" id="startlearn" class="required" type="text" placeholder="ДД.ММ.ГГГГ" /> </div>
 
<div class="rowElem" style="clear: none; width: 235px; float: left; "> <label for="endlearn">Конец</label> <input name="endlearn12" id="endlearn" type="text" placeholder="ДД.ММ.ГГГГ" style="width:162px;" /> </div>

  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <label for="namelearn">Название учебного заведения</label> <input name="namelearn12" id="namelearn"  type="text" class="required" style="width: 654px; " placeholder="Российский Университет Дружбы Народов" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="fakultet">Факультет или отделение</label> <input name="fakultet12" id="fakultet"  type="text" style="width: 689px; " placeholder="Иностранные языки" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="specialnost">Специальность</label> <input name="specialnost12" id="specialnost"  type="text" style="width: 779px; " placeholder="Преподаватель английского в младших классах" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="wrap_dop" id="dop-edu-area" style="display: none; "> 
    <h2 class="zag1">Дополнительное образование</h2>
   </div>
 
  <div style="clear: both; ">&nbsp;</div>
 <a href="javascript:;" class="addlearn" id="add-edu" >Добавить образование</a> 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd" /> 
  <h2 class="zag">Владение иностранными языками</h2>
 
  <div class="rowElem" style="clear: none; width: 390px; float: left; "> <label for="lang">Язык</label> <input name="lang[]" id="lang" type="text" style="width: 300px; " placeholder="Английский" /> </div>
 
  <div class="rowElem" style="clear: none; width: 530px; float: left; "> <label for="urlang">Степень владения языком</label> <select name="urlang[]" id="urlang" class="required" style="float: left; width:250px; "> <option id="field20-1" value="Разговорный"> Разговорный </option> <option id="field20-2" value="Могу объясниться"> Могу объясниться </option> <option id="field20-3" value="Читаю"> Читаю </option> <option id="field20-4" value="Пишу"> Пишу </option> <option id="field20-5" value="Использую в профессиональной деятельности"> Использую в профессиональной деятельности </option> </select> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 520px; float: left; "> <label for="emptylang" style="color: rgb(46, 61, 76); font-size: 12px; margin-top: -15px; "> Оставьте поле пустым, если не владеете языками </label> </div>
 
  <div class="wrap_dop10" id="dop-lang-area"> 
    <br />
   
    <h2 class="zag3">Дополнительные языки</h2>
   </div>
 
  <div style="clear: both; height: 1px; ">&nbsp;</div>
 <a href="javascript:;" class="addlang" id="add-lang" >Добавить язык</a> 
  <div style="clear: both; height: 1px; ">&nbsp;</div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">Навыки работы с компьютером</h2>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="officeprog">Офисные программы</label> <input name="officeprog" id="officeprog" class="required" type="text" style="width: 732px; " placeholder="MS WORD, MS EXCEL и пр." /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="internetprog">Интернет</label> <input name="internetprog" id="internetprog" class="required" type="text" style="width: 832px; " placeholder="MS IE, Opera, Chrome" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="profprog">Профессиональные программы</label> <input name="profprog" id="profprog" type="text" style="width: 642px; " placeholder="1С Бухгалтерия, Консультант и пр." /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 

 <hr class="razd" /> 
  <h2 class="zag">Последнее место работы</h2>
 
<div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="profession">Профессия</label> <input name="profession" id="profession" type="text" style="width: 805px; " placeholder="Менеджер по рекламе" /> </div>

<div style="clear: both; ">&nbsp;</div>
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="org">Организация</label> <input name="org" id="org" type="text" style="width: 792px; " placeholder="ЗАО Финансовые системы" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="naprorg">Направление деятельности организации</label> <input name="naprorg" id="naprorg" type="text" style="width: 554px; " placeholder="Дистрибуция мебели" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="otdelrorg">Название отдела или подразделения</label> <input name="otdelrorg" id="otdelrorg"  type="text" style="width: 584px; " placeholder="Отдел продаж" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="dolzhrorg">Занимаемая должность</label> <input name="dolzhrorg" id="dolzhrorg" type="text" style="width: 702px; " placeholder="Менеджер по продажам" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 
  <div class="rowElem" style="clear: none; width: 960px; float: left; "> <label for="staj">Стаж работы по нынешней профессии</label> <input name="staj" id="staj" type="text" style="width: 580px; " placeholder="Десять лет" /> </div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  <h2 class="zag">Цель дополнительного образования</h2>
 
  <p class="purpose-error err" style="display: none; color: red; ">Выберите цель прихода на курсы.</p>
 
  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <input name="purpose[]" id="field33-1" value="Расширение профессиональных возможностей" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">Расширение профессиональных возможностей</span> <input name="purpose[]" id="field33-2" value="Карьерный рост" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">Карьерный рост</span> <input name="purpose[]" id="field33-3" value="Найти новую работу" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 0px 0px 5px; ">Найти новую работу</span> 
<div style="clear: both; height:1px; ">&nbsp;</div>
<br/> <input name="purpose[]" id="field33-4" value="Саморазвитие" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; ">Саморазвитие</span> 
<input name="purpose[]" id="field33-5" value="Другое" type="checkbox" /><span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px;">Другое</span><input name="purpose[]" id="purpose[]" type="text" placeholder="Что-то еще?" /> <span style="float: left; font-size: 12px; margin: 0px 0px 0px 20px; ">Оставьте это поле пустым, если 
      <br />
    необходимость отсутствует</span>

</div>
 
  <div style="clear: both; ">&nbsp;</div>
 <hr class="razd"/> 
  
  <h2 class="zag">Откуда Вы узнали информацию о курсах?</h2>

  <div class="rowElem required" style="clear: none; width: 960px; float: left; "> <input name="from[]" id="field36-1" value="Из печатной рекламы" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 55px 0px 5px; "> Из печатной рекламы </span> 
<input name="from[]" id="field36-2" value="Из Интернета" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 10px 0px 5px; "> Из Интернета <span style="font-size:16px"><i>(по возможности, укажите сайт)</i></span> </span> <input name="from[]" id="from[]" type="text" placeholder="Адрес сайта" style="width:250px;" />

<div style="clear: both; ">&nbsp;</div>

<input name="from[]" id="field36-3" value="Из плакатов в РУДН" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 65px 0px 5px; "> Из плакатов в РУДН </span> 

   <input name="from[]" id="field36-4" value="От знакомых" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 65px 0px 5px; "> От знакомых </span> 

<input name="from[]" id="field36-5" value="Рассылка на e-mail" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 198px 0px 5px; "> Рассылка на e-mail </span> 

<div style="clear: both; ">&nbsp;</div>

<input name="from[]" id="field36-6" value="Другое" type="checkbox" /> <span style="float: left; font-size: 18px; margin: 5px 20px 0px 5px; "> Другое </span> <input name="from[]" id="field36-7" type="text" style="float: left; width:350px;" placeholder="Где-то еще?" /> </div>

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
  <div style="clear: none; width: 960px; float: left; "> <label for="captcha" style="font-size: 14px; margin-left: 0px; padding-top: 10px; ">Введите код с картинки</label> <input type="hidden" name="captcha_code" id="captcha_sid" value="&lt;img id=" bxid_624270"="" src="/bitrix/images/fileman/htmledit2/php.gif" border="0" />&quot; /&gt; 
    <div id="captcha_container" style="display: inline-block; float: left; margin-left: 30px; margin-top: 5px; "> <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>"  /> </div>
   
    <div style="float: left; margin-left: 10px; margin-top: 5px; "> <a class="reload" id="reload" onclick="getnewcaptcha();return false;" ></a> </div>
   
    <div style="float: left; margin-left: 50px; margin-top: 15px; "> <span style="position: relative; margin: 0px 0px 0px 10px; font-size: 14px; ">сюда</span> </div>
   
    <div style="position: relative; left: 40px; float: left; margin-top: 5px; "><input type="text" id="captcha_word" name="captcha_word" style="width: 140px; position: relative; " class="reqired" /></div>
   
<div style="clear: both; margin-top: 50px;">
<input type="checkbox" class="confirmation-checkbox" id="chk-rules-agreed"/> 

                <span style="display:inline-block; padding-top:3px;">&nbsp;Я <a href="#rules" data-reveal-id="rules" data-animation="fade" data-closeonbackgroundclick="true" data-dismissmodalclass="close-reveal-modal">согласен(на) на обработку моих персональных данных</a> в ИППК РУДН.</span>
</div>


    <div style="clear: both; float: left; margin-top: 50px; "> 	 <input type="submit" value="&nbsp;" name="submit" class="passive" disabled="disabled" /> </div>
   </div>

<div id="rules" class="reveal-modal">
<h3 style="color:#2D7DC8; font-size:18px; line-height:22px; font-weight:normal; padding-bottom:10px;">Соглашение</h3>
<hr style="margin-bottom:20px;"/>
<p>Настоящим я подтверждаю правильность и даю согласие ИППК РУДН, находящемуся по адресу: Российская Федерация, город Москва, Ул. Миклухо-Маклая, д.10, корп. 2, на обработку как это определено Законом о персональных данных от 27.07.2006 г. №152-ФЗ,моих персональных данных указанных в Онлайн-заявке, заполненной для записи на курс.</p>
<p>Настоящее согласие действует в течение наибольшего из сроков, установленных законодательными и иными нормативными правовыми актами Российской Федерации применительно к срокам совершения тех или иных действий по обработке персональных данных. В случае отзыва субъектом персональных данных настоящего согласия ИППК РУДН обязано прекратить совершение действий по обработке персональных данных, за исключением действий по обработке персональных данных, обязанность по совершению которых возложена на ИППК РУДН законодательными и иными нормативными правовыми актами Российской Федерации. Субъект персональных данных вправе отозвать настоящее согласие, уведомив в установленном порядке ИППК РУДН. Настоящее согласие является отозванным на следующий рабочий день после получения письменного уведомления об отзыве ИППК РУДН.</p>   
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