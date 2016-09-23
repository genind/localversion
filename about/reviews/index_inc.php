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
            $(document).ready(function() { 
                // bind form using ajaxForm 
                $('#contactform').ajaxForm({ 
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
 $('input[type=text]').css('border', '').css('border-top', '1px solid #C1C1C1');
 $('textarea').css('border', '').css('border-top', '1px solid #C1C1C1');
                $('.err').hide();
                if (data.status == 'error') { 
                    $('#errors').html('<p>�� ������� ��������� �����. ��������� ����, ���������� �������.</p>');
                    for (err in data.errors.required ) {                                             
                        var err_code = data['errors']['required'][err];

                        
                        if ( $('input[type=text][name='+err_code+']').length) {
                            $('input[type=text][name='+err_code+']').css('border', '1px solid red');
}
          
                        
else if ( $('textarea[name='+err_code+']').length) {
$('textarea[name='+err_code+']').css('border', '1px solid red');
}
else {
                            //$('.' + err_code + '-error').show();

                        }

                    }
                    
                    
                     $('html, body').animate({scrollBottom:0}, 'fast');
                    
                } else {
                    document.location = '/reviews/success.php';
                }

            }
if ( $('input[name="contactname"]').val() == '') {
$('input[name="contactname"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="contactname"]').css('border', '').css('border-top', '1px solid #C1C1C1'); 
           }else{
               $('input[name="contactname"]').css('border', '1px solid red');
           }
       });
}
if ( $('input[name="email"]').val() == '') {
$('input[name="email"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="email"]').css('border', '').css('border-top', '1px solid #C1C1C1'); 
           }else{
               $('input[name="email"]').css('border', '1px solid red');
           }
       });
}
if ( $('input[name="city"]').val() == '') {
$('input[name="city"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="city"]').css('border', '').css('border-top', '1px solid #C1C1C1'); 
           }else{
               $('input[name="city"]').css('border', '1px solid red');
           }
       });
}
if ( $('input[name="captcha_word"]').val() == '') {
$('input[name="captcha_word"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('input[name="captcha_word"]').css('border', '').css('border-top', '1px solid #C1C1C1'); 
           }else{
               $('input[name="captcha_word"]').css('border', '1px solid red');
           }
       });
}
if ( $('textarea[name="message"]').val() == '') {
$('textarea[name="message"]').bind('change', function(){ 
           var fld = $(this); 
           if(fld.val() != ''){ 
             $('textarea[name="message"]').css('border', '').css('border-top', '1px solid #C1C1C1'); 
           }else{
               $('textarea[name="message"]').css('border', '1px solid red');
           }
       });
}


});
</script>
<hr class="rcl" />
<div id="add-recall">
<h2>�������� ���� �����</h2>

<div id="errors">
</div>

<form method="post" action="/reviews/send.php" id="contactform" name="contactform">
  <div class="bb">
    <label for="name">�������, ��� <span>*</span></label>
	<div style="display:inline-block; height:27px; margin-bottom:10px;"><input type="text" size="50" name="contactname" value="" class="required" /></div>

  </div>

  <div class="bb">
    <label for="email">E-mail <span>*</span></label>
	<input type="text" size="50" name="email" value="" class="required"  />

  </div>

  <div class="bb">
    <label for="city">����� <span>*</span></label>
	<input type="text" size="50" name="city" value="" class="required" />

  </div>

  <div class="bb">
    <label for="message">��� ����� <span>*</span>
    <p class="info">����, ���������� ���������� (<span style="display:inline;">*</span>)<br/>����������� ��� ����������</p>
    </label>
	<textarea rows="5" cols="50" name="message"></textarea>

  </div>
  <div>
<?$arResult["CAPTCHA_CODE"] = htmlspecialchars($GLOBALS["APPLICATION"]->CaptchaGetCode()); ?>
    <label for="captcha" style="font-size:14px; margin-left:0px; padding-top:10px;">������� ��� � ��������</label>
        <input type="hidden" name="captcha_code" id="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <div id="captcha_container" style="display:inline-block;">
           <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>" style="margin-left:-40px;" />
        </div>
    <a class="reload" id="reload" onclick="getnewcaptcha();return false;"></a>
    <span style="position:relative; top:-30px; margin:0 10px 0 50px; font-size:14px; display:inline-block;">����</span>         <input type="text" id="captcha_word" name="captcha_word" style="width:145px; position:relative; top:-12px;" class="required" value="" />


   </div>
<div style="margin-left:0px;">
<input type="checkbox" class="confirmation-checkbox" id="chk-rules-agreed"/> 

                <span style="display:inline-block; height:15px; padding-top:3px;">� <a href="#rules" data-reveal-id="rules" data-animation="fade" data-closeonbackgroundclick="true" data-dismissmodalclass="close-reveal-modal">��������(��) �� ��������� ���� ������������ ������</a> � ���� ����.</span>
</div>
   <div style="margin-left:0px;">
	    <input type="submit" value="&nbsp;" name="submit" disabled="disabled" class="passive" />
    </div>


<div id="rules" class="reveal-modal">
<h3 style="color:#2D7DC8; font-size:18px; line-height:22px; font-weight:normal; padding-bottom:10px;">����������</h3>
<hr style="margin-bottom:20px;"/>
<p>��������� � ����������� ������������ � ��� �������� ���� ����, ������������ �� ������: ���������� ���������, ����� ������, ��. �������-������, �.10, ����. 2, �� ��������� ��� ��� ���������� ������� � ������������ ������ �� 27.07.2006 �. �152-��,���� ������������ ������ ��������� � ������ �������� ������, ����������� ��� ���������� �� �����.</p>
<p>��������� �������� ��������� � ������� ����������� �� ������, ������������� ���������������� � ����� ������������ ��������� ������ ���������� ��������� ������������� � ������ ���������� ��� ��� ���� �������� �� ��������� ������������ ������. � ������ ������ ��������� ������������ ������ ���������� �������� ���� ���� ������� ���������� ���������� �������� �� ��������� ������������ ������, �� ����������� �������� �� ��������� ������������ ������, ����������� �� ���������� ������� ��������� �� ���� ���� ���������������� � ����� ������������ ��������� ������ ���������� ���������. ������� ������������ ������ ������ �������� ��������� ��������, �������� � ������������� ������� ���� ����. ��������� �������� �������� ���������� �� ��������� ������� ���� ����� ��������� ����������� ����������� �� ������ ���� ����.</p>   
<a class="close-reveal-modal">&#215;</a>         
</div>
<script type="text/javascript" src="/js/jquery.reveal.js"></script>
<link type="text/css" rel="stylesheet" media="screen" href="/css/reveal.css" /> 
<script type="text/javascript">
  
    $(".confirmation-checkbox").change(function() { 
        if ($(".confirmation-checkbox:checked").length == 1 ) {
            $("input[name=submit]").removeAttr("disabled").removeClass("passive");
        } else {
            $("input[name=submit]").attr("disabled", "disabled").addClass("passive");
        }
    }); 
</script>

	</form>
</div>