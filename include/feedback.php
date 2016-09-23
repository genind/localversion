<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0)
{
    $captchaPass = randString(10);
    COption::SetOptionString("main", "captcha_password", $captchaPass);
}
$cpt->SetCodeCrypt($captchaPass);
?>

<script src="/js/jquery.reveal.js"></script>
<link href="/css/reveal.css" rel="stylesheet" />


<script type="text/javascript">				
    $(document).ready(function() {              
        $('#phone-form form').ajaxForm({ 
            dataType:'JSON',
			beforeSubmit: checkPHone,
            success:   processJson,
            error:function (x) { console.log(x)}             
		}); 
	});
	function checkPHone(){
		yaCounter16198597.reachGoal('PHONE_TRY'); 
		var val = $('input[name=contact]').val();
		if( /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/.test($('input[name=contact]').val()) && ($('input[name=contact]').val()!="+7 111 222 33 33")){
			$('#phone-form form div.errors ').html('Отправка сообщения ...');
			return true;
		}else{
			$('#phone-form form div.errors ').html('Проверьте правильность ввода номера');
			return false;
		}
	}
	function processJson(data){
    	if (data.status == 'error') {   
			if (data.errors == 'timelimit'){
				$('#phone-form form div.errors').html('превышено ограничение числа попыток');
			}
    	}else{
            $('#phone-form form div.errors').html('Сообщение отправлено');
			yaCounter16198597.reachGoal('PHONE_SUCCESS'); 
        }
    }
</script>

<div id="phone-form">
    <form action="/feedback/v.php" method="post">
        <input type="text" size="50" name="contact" id="contact" placeholder="+7 111 222 33 33" class="number"/>
		<input type="hidden" name="uri" value="<?=$_SERVER['REQUEST_URI']?>"/>
		<input  type="submit" value="ЗАКАЗАТЬ ЗВОНОК" name="submit" onclick="yaCounter26325633.reachGoal('YaFeedbackClick'); return true;" class="submit"/>
		<div class="errors"></div>
	</form>
</div>


<script type="text/javascript">
function setcaptcha(data){
   $('#captcha_sid').attr('value',data);
   $('#captcha_container').empty();
   $('#captcha_container').append('<img src="/bitrix/tools/captcha.php?captcha_sid='+data+'"  alt="CAPTCHA">');
}

function getnewcaptcha()
{
   var file = '/bitrix/ajax.getcaptcha.php';
   $.get (file,{},function(data) { setcaptcha(data); });
}

$(document).ready(function() {				
            // prepare the form when the DOM is ready 
            $('#subscribetop_reveal form').ajaxForm({ 
                    dataType:  'json', 
					beforeSubmit: befSub,
                    success:   processJson2,
					error:function (x) { console.log(x)}					
                }); 
           
			function befSub(){
				yaCounter16198597.reachGoal('REQUEST_TRY');
			}

            function processJson2(data) { 
                getnewcaptcha();
				$('#errors').html('');
				$('.jqTransformInputInner').css('border', '');
                $('.err').hide();
                if (data.status == 'error') { 
                    $('#onlineform #errors').html('<p>Не удалось отправить форму. Проверьте поля, отмеченные красным. Если у Вас возникли проблемы с отправкой сообщения , то позвоните по номеру 8 926 351 48 34.</p>');
                   for (err in data.errors.required ) {                                             
                        var err_code = data['errors']['required'][err];

						if(err_code=="timelimit"){$('#onlineform #errors').html('<p>Вы превысили ограничение числа попыток.  Вы также можете связаться с нами по телефону +7 (499) 936-85-94 или отправить письмо на sales@ippkrudn.ru</p>');}
						
						if ( $('input[name='+err_code+']').length){
                            $('input[name='+err_code+']').parent().parent().css('border', '1px solid red');
						}                       
						else{
                            $('.' + err_code + '-error').show();
                        }

                    }
                    

                     $('html, body').animate({scrollBottom:0}, 'fast');
                    
                } else {
					$('#onlineform_body').html('<div>Сообщение успешно отправлено. В ближайшее время наши специалисты свяжутся с Вами.</div><div>Также Вы можете ознакомиться с порядком оформления договора на обучение и <a style="color:blue;" href="/entrance/">списком необходимых документов</a></div>');
					yaCounter16198597.reachGoal('REQUEST_SUCCESS');                    
                }

            }
});
</script>


<div id="subscribetop_reveal" class="reveal-modal">
<form method="post" action="/onlinerequest/send.php" id="onlineform" name="onlineform" class="jqtransform">
	<h3 style="color:#2D7DC8; font-size:18px; line-height:22px; font-weight:normal; padding-bottom:10px;font-family:arial;">Заявка на обучение</h3>
	<hr style="margin-bottom:20px;"/>
	<div id="onlineform_body">
	<div id="errors"></div>
	<input type="hidden" name="uri" value="<?=$_SERVER['REQUEST_URI']?>"/>
	<input type="text" name="contactname" value="" placeholder="Ваше имя" />
	<input type="text" name="contact" value="" placeholder="Ваши контактные данные ..."  style="width:72%; float:left;"/>	
	<select  name="contact-type" id="contact-type"> 
		<option value="phone">телефон</option>
		<option value="e-mail">электронная почта</option>
		<option value="vk">вконтакте</option>
	</select>



	<div style="clear:both;"></div>
    <label>Комментарий:</label>
	<textarea rows="5" cols="100" name="dopinfo"  style="width: 100%; min-height:150px;" ></textarea>
	<?$POS = strpos( $_SERVER['REQUEST_URI'], '/actions/master-class/' )?>
	<?if (($POS ==0) or ($POS!= FALSE)) {?>
		<input type="hidden" name="type-m" value="master-class"/> 
	<? }?>
	<div style="clear: none; width: 100%; float: left; ">
		<?$arResult["CAPTCHA_CODE"] = htmlspecialchars($GLOBALS["APPLICATION"]->CaptchaGetCode()); ?>

        <input type="hidden" name="captcha_code" id="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <div id="captcha_container" style="display: inline-block; float: left; margin-left: 40px; margin-top: 5px; ">
           <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>" style="margin-left:-40px;" alt="KATCHA-IMAGE"/>
        </div>
    <div style="float: left; margin-left: 10px; margin-top: 5px; "><a class="reload" id="reload" onclick="getnewcaptcha();return false;"></a></div>   
	<div style="position: relative; left: 10px; float: left; margin-top: 10px; "><input type="text" id="captcha_word" name="captcha_word" style="width:210px; position:relative;" value="" placeholder="Введите код с картинки сюда" /></div>
	</div>

	<input  type="submit" value="ОТПРАВИТЬ ЗАЯВКУ" name="submit" class="submit"/>
    </div>
	<a id="bxid_5724" class="close-reveal-modal" >&#215;</a>
</form>
</div>


