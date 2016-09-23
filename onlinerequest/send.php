<?
// подключение служебной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

$_REQUEST = all2cp($_REQUEST);


$err = array();

$validation['required'] = array(
    'contactname', 'contact', 'contact-type'
);

foreach($validation['required'] as $v) {
    if (!$_REQUEST[$v]) {
        $err['required'][] = $v;
    }
}

if (!$GLOBALS['APPLICATION']->CaptchaCheckCode($_REQUEST["captcha_word"], $_REQUEST["captcha_code"])) {
    $err['required'][] = 'captcha_word';
}

$CurIP = $_SERVER['REMOTE_ADDR'];
$IPfromBASE = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>22,"NAME"=>$CurIP), false, false, Array("ID", "IBLOCK_ID", "PROPERTY_TIME1","PROPERTY_TIME2","PROPERTY_TIME3"));
$result['info']  = "";
if($ip = $IPfromBASE->GetNext()){
	$TIME1 = $ip["PROPERTY_TIME1_VALUE"];
	$TIME2 = $ip["PROPERTY_TIME2_VALUE"];
	$TIME3 = $ip["PROPERTY_TIME3_VALUE"];
	$curID = $ip["ID"];
	if((time()-$TIME3)<100) {
	$err['required'][] = 'timelimit';
	}
}
else
	{
	$el = new CIBlockElement;
	$curID = $el->Add(Array("IBLOCK_ID"=>22,"NAME"=>$CurIP,"PROPERTY_VALUES"=>Array("TIME1"=>0,"TIME2"=>1,"TIME3"=>time()) ));
	$TIME1 = 0; $TIME2 = 1 ; $TIME3=  time();
	$result['info'] = " NEW_ID=".$curID;
}


	

if ($err) {
    $result['status'] = 'error';
    $result['errors'] = $err;
} else {
    $result['status'] = 'ok';
}


$body = "
<b>Контактная информация:</b> <br/>
ФИО: ".$_REQUEST['contactname']." <br/>"
.$_REQUEST['contact-type'].":".$_REQUEST['contact']." <br/>"
."\n Отправлено со страницы: http://".$_SERVER['SERVER_NAME'].$_POST['uri'].
"<br/> <b>Дополнительная информация</b> <br/>"
.$_REQUEST['dopinfo']
."<br />";



$subject = "Новая онлайн-заявка на ippkrudn.ru"; 
//$subject = '=?cp-1251?B?'.base64_encode($subject).'?=';

$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
$headers .= "From: IPPK SITE <site@".$_SERVER['HTTP_HOST'].">\r\n"; 

	$el = new CIBlockElement;
	$PROP = Array("TIME1"=>$TIME1,"TIME2"=>$TIME2,"TIME3"=>$TIME3);
	$PROP["DATA"]["VALUE"]["TYPE"] = "html";
	$PROP["DATA"]["VALUE"]["TEXT"] = $body;
	$el->update($curID,Array("PROPERTY_VALUES"=>$PROP));

if ($result['status'] == 'ok') {
    $rs_user = CUser::GetList(
                ($by = 'name'),
                ($order = 'asc'),
                array(
                    'GROUPS_ID' => array(10)
                )
            );
	$el = new CIBlockElement;
	$PROP = Array("TIME1"=>$TIME2,"TIME2"=>$TIME3,"TIME3"=>time());
	$PROP["DATA"]["VALUE"]["TYPE"] = "html";
	$PROP["DATA"]["VALUE"]["TEXT"] = $body;
	$el->update($curID,Array("PROPERTY_VALUES"=>$PROP));
	while($ar_user = $rs_user->GetNext()) {
		mail($ar_user['EMAIL'], $subject, $body, $headers); 
	}

}

//mail('genin_d@mail.ru',  $subject, $body, $headers);
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