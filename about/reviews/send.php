<?
// подключение служебной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$_REQUEST = all2cp($_REQUEST);

$err = array();

$validation['required'] = array(
    'contactname', 'email', 'city', 'message'
);

foreach($validation['required'] as $v) {
    if (!$_REQUEST[$v]) {
        $err['required'][] = $v;
    }
}

if (!$GLOBALS['APPLICATION']->CaptchaCheckCode($_REQUEST["captcha_word"], $_REQUEST["captcha_code"])) {
    $err['required'][] = 'captcha_word';
}

if ($err) {
    $result['status'] = 'error';
    $result['errors'] = $err;
} else {
    $result['status'] = 'ok';
}

$body = "
ФИО: $_REQUEST[contactname] <br />
E-mail: $_REQUEST[email] <br />
Город: $_REQUEST[city] <br />
Отзыв: $_REQUEST[message] <br />
";

$to  = "dh@radia.ru";

$subject = "Новый отзыв на сайте"; 
$subject = '=?cp-1251?B?'.base64_encode($subject).'?=';



$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
$headers .= "From: Sys Mailer <sys@".$_SERVER['HTTP_HOST'].">\r\n"; 

if ($result['status'] == 'ok') {
    $rs_user = CUser::GetList(
                ($by = 'name'),
                ($order = 'asc'),
                array(
                    'GROUPS_ID' => array(11)
                )
            );
    
    while($ar_user = $rs_user->GetNext()) {
        mail($ar_user['EMAIL'], $subject, $body, $headers); 
    }
    
}


print json_encode($result);

function all2cp($array) {
    foreach($array as &$item) {
        if (is_array($item)) {
            $item = all2cp($item);
        } else {
            $item = iconv('UTF-8', 'CP1251', $item);
        }
    }
    return $array;
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>