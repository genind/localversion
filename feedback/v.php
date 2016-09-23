<?
// РїРѕРґРєР»СЋС‡РµРЅРёРµ СЃР»СѓР¶РµР±РЅРѕР№ С‡Р°СЃС‚Рё РїСЂРѕР»РѕРіР°
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$_REQUEST = all2cp($_REQUEST);

$err = array();

$body = "Заказать звонок:".$_POST['contact']."\n Отправлено со страницы: http://".$_SERVER['SERVER_NAME'].$_POST['uri'];
$subject = "Телефоны посетителей ippkrudn.ru";
$headers  = "Content-type: text/plain; charset=windows-1251 \r\n"; 
$headers .= "From: IPPK SITE <site@".$_SERVER['HTTP_HOST'].">\r\n"; 

CModule::IncludeModule("iblock");
$CurIP = $_SERVER['REMOTE_ADDR'];
$IPfromBASE = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>22,"NAME"=>$CurIP), false, false, Array("ID", "IBLOCK_ID", "PROPERTY_TIME1","PROPERTY_TIME2","PROPERTY_TIME3"));
$curID = NULL;
if($ip = $IPfromBASE->GetNext()){
	$TIME1 = $ip["PROPERTY_TIME1_VALUE"];
	$TIME2 = $ip["PROPERTY_TIME2_VALUE"];
	$TIME3 = $ip["PROPERTY_TIME3_VALUE"];
	$curID = $ip["ID"];
	if((time()-$TIME3)<100) {
		$err[] = 'timelimit';
	}else{
		
	}	
}
else{
	$el = new CIBlockElement;
	$TIME1 = 0; $TIME2 = 1 ; $TIME3=  time();
	$PROP = Array("TIME1"=>$TIME1,"TIME2"=>$TIME2,"TIME3"=>$TIME3);
	$PROP["DATA"]["VALUE"]["TYPE"] = "html";
	$PROP["DATA"]["VALUE"]["TEXT"] = $body;
	$curID = $el->Add(Array("IBLOCK_ID"=>22,"NAME"=>$CurIP,"PROPERTY_VALUES"=>$PROP ));	
}

if ($err) {
    $result['status'] = 'error';
    $result['errors'] = $err;

} else {
    $result['status'] = 'ok';
}


if($result['status'] == 'ok') {
	$rs_user = CUser::GetList(
		($by = 'name'),
		($order = 'asc'),
		array('GROUPS_ID' => array(10))
	); 

	while($ar_user = $rs_user->GetNext()) {
		mail($ar_user['EMAIL'], $subject, $body, $headers); }  

	$el = new CIBlockElement;
	$PROP = Array("TIME1"=>$TIME2,"TIME2"=>$TIME3,"TIME3"=>time());
	$PROP["DATA"]["VALUE"]["TYPE"] = "html";
	$PROP["DATA"]["VALUE"]["TEXT"] = $body;
	$el->update($curID,Array("PROPERTY_VALUES"=>$PROP));  
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