<?
session_name("fancyform");
session_start();
//var_dump($_SESSION['post']);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
?>
<?if (!$GLOBALS['APPLICATION']->CaptchaCheckCode($_REQUEST["captcha_word"], $_REQUEST["captcha_code"]))
{
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<div class="onecolumn">
<h1 style="float:left; margin-top:0;">Отзывы</h1>
<script type="text/javascript">
$('#add-recall-button').click(function () {
	$.scrollTo('#add-recall');
	return false;
	});
</script>
<?
$APPLICATION->IncludeComponent("bitrix:news", "recalls", array(
	"IBLOCK_TYPE" => "content",
	"IBLOCK_ID" => "8",
	"NEWS_COUNT" => "6",
	"USE_SEARCH" => "N",
	"USE_RSS" => "N",
	"USE_RATING" => "N",
	"USE_CATEGORIES" => "N",
	"USE_REVIEW" => "N",
	"USE_FILTER" => "N",
	"FILTER_NAME" => "",
	"FILTER_FIELD_CODE" => array(
		0 => "NAME",
		1 => "PREVIEW_TEXT",
		2 => "DATE_ACTIVE_FROM",
		3 => "",
	),
	"FILTER_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"SORT_BY1" => "DATE_ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"CHECK_DATES" => "Y",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/reviews/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "Y",
	"USE_PERMISSIONS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
	"LIST_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"LIST_PROPERTY_CODE" => array(
		0 => "CITY",
		1 => "FIO",
	),
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"DISPLAY_NAME" => "N",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
	"DETAIL_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_PROPERTY_CODE" => array(
		0 => "FIO",
		1 => "CITY",
		2 => "",
	),
	"DETAIL_DISPLAY_TOP_PAGER" => "N",
	"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
	"DETAIL_PAGER_TITLE" => "Страница",
	"DETAIL_PAGER_TEMPLATE" => "",
	"DETAIL_PAGER_SHOW_ALL" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Отзывы",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "pagenav",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "N",
	"USE_SHARE" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"news" => "",
		"section" => "",
		"detail" => "#ELEMENT_ID#/",
	)
	),
	false
);?>

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
</script>
<script src="/js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#contactform").validate({
		rules: {
			contactname: "required",
			city: "required",
                        message: "required",
                        captcha_word: "required",
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			contactname: "Введите Фамилию и Имя",
			city: "Введите город",
                        message: "Введите свой отзыв",
                        captcha_word: "Введите правильный код с картинки",
			email: "Введите правильный email",
		}
	});
});
</script>
<hr class="rcl" />
<div id="add-recall">
<h2>Оставьте свой отзыв</h2>
<form method="post" action="send.php" id="contactform" name="contactform">
  <div>
    <label for="name">Фамилия, Имя <span>*</span></label>
	<input type="text" size="50" name="contactname" id="contactname" value="<?=$_SESSION['post']['contactname']?>" class="required" />
  </div>

  <div>
    <label for="email">E-mail <span>*</span></label>
	<input type="text" size="50" name="email" id="email" value="<?=$_SESSION['post']['email']?>" class="required email"  />
  </div>

  <div>
    <label for="city">Город <span>*</span></label>
	<input type="text" size="50" name="city" id="city" value="<?=$_SESSION['post']['city']?>" class="required" />
  </div>

  <div>
    <label for="message">Ваш отзыв <span>*</span>
    <p class="info">Поля, отмеченные звездочкой (<span>*</span>)<br/>обязательны для заполнения</p>
    </label>
	<textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
  </div>
  <div>
<?$arResult["CAPTCHA_CODE"] = htmlspecialchars($GLOBALS["APPLICATION"]->CaptchaGetCode()); ?>
    <label for="captcha" style="font-size:14px; margin-left:215px; padding-top:10px;">Введите код с картинки</label>
        <input type="hidden" name="captcha_code" id="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
        <div id="captcha_container" style="display:inline-block;">
           <img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>" style="margin-left:-40px;" />
        </div>
    <a class="reload" id="reload" onclick="getnewcaptcha();return false;"></a>
    <span style="position:relative; top:-17px; margin:0 10px 0 50px; font-size:14px;">сюда</span>         <input type="text" id="captcha_word" name="captcha_word" style="width:140px; position:relative; top:-12px;" class="required" value="<?=$_SESSION['post']['captcha_word']?>" />
<span class="nocaptcha" style="display:block; color:red;">Введите правильный код с картинки</span>
<script type="text/javascript">
$("#captcha_word").focus(function(){
  $('.nocaptcha').css('display','none');
});
</script>
   </div>
   <div style="margin-left:210px;">
	    <input type="submit" value="&nbsp;" name="submit" id="submit" />
    </div>
	</form>
</div>
<?
}
else 
//Если форма отправлена
if(isset($_POST['submit'])) {


	//Проверка Поля ИМЯ
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Проверка поля ТЕМА
	if(trim($_POST['city']) == '') {
		$hasError = true;
	} else {
		$city = trim($_POST['city']);
	}

	//Проверка правильности ввода EMAIL
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Проверка наличия ТЕКСТА сообщения
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//Если ошибок нет, отправить email
	if(!isset($hasError)) {
		$emailTo = 'dh@radia.ru'; //Сюда введите Ваш email
		$body = "ФИО: $contactname \n\nEmail: $email \n\nГород: $city \n\nОтзыв:\n $comments";
		$headers = 'From: ИПК РУДН <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
unset($_REQUEST["captcha_code"]);
//session_destroy();	
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<div class="onecolumn" style="min-height:600px;">
<h1>Отзывы</h1>
<p style="font-size:22px; line-height:24px; color:#3167c0;">Спасибо!</p>
<p style="font-size:14px; line-height:19px; color:#2e3d4c;">После того, как ваш отзыв пройдет модерацию, он будет размещен на сайте.</p>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
}
}
?>