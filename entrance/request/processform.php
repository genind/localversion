<?
// подключение служебной части пролога
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$_REQUEST = all2cp($_REQUEST);

$err = array();

$validation['required'] = array(
    'name', 'birth', 'residence', 'city', 'address', 'email',
    'mphone', 'svyaz',
    'learn12', 'startlearn12', 'namelearn12', 'officeprog', 'internetprog',
    'purpose', 
    'from'
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

ФИО: $_REQUEST[name]</div> <br />
Дата рождения: $_REQUEST[birth]</div> <br />
Гражданство: $_REQUEST[residence]</div> <br /><br />


<b>Контактная информация:</b> <br />
Город: $_REQUEST[city] <br />
Адрес: $_REQUEST[address] <br />
E-mail: $_REQUEST[email] <br />
Телефоны: $_REQUEST[hphone], $_REQUEST[mphone] <br />
Предпочтительный способ связи: $_REQUEST[svyaz] <br />
<br />

<b>Образование:</b> <br />
Тип: $_REQUEST[learn12] <br />
Дата начала: $_REQUEST[startlearn12] <br />
Дата окончания: $_REQUEST[endlearn12] <br/>
Название учебного заведения: $_REQUEST[namelearn12] <br/>
Факультет: ".$_REQUEST[fakultet][0]." <br />
Специальность: ".$_REQUEST[specialnost][0]." <br />";

if ($_REQUEST['fakultet'][0]) {
    //unset($_REQUEST['namelearn'][0]);
    foreach($_REQUEST['namelearn'] as $n=>$fac) {
        
        $body .= '<br /><b>Дополнительное образование </b><br />';
        $body .= 'Тип: ' . $_REQUEST['learn'][$n] . ' <br />';
        $body .= 'Дата начала: ' . $_REQUEST['startlearn'][$n] . ' <br />';
        $body .= 'Дата окончания: ' . $_REQUEST['endlearn'][$n] . ' <br />';
        $body .= 'Название заведения: ' . $_REQUEST['namelearn'][$n] . ' <br />';
        $body .= 'Факультет: ' . $_REQUEST['fakultet'][$n] . ' <br />';
        $body .= 'Специальность: ' . $_REQUEST['specialnost'][$n] . ' <br />';
    }
    
}


$body .= '<br /><b>Знание языков:</b><br />';
foreach($_REQUEST['lang'] as $k => $lang) {
    $body .= $lang . ' (' . $_REQUEST['urlang'][$k] . ')' . '<br />';
}

$body .= "
<br /><b>Навыки работы с компьютером</b> <br />
Офисные программы: $_REQUEST[officeprog] <br />
Интернет: $_REQUEST[internetprog] <br />
Профессиональные программы: $_REQUEST[profprog] <br />
<br />
<b>Последнее место работы:</b><br />
Профессия: $_REQUEST[profession] <br/>
Организация: $_REQUEST[org] <br />
Направление: $_REQUEST[naprorg] <br />
Название отдела: $_REQUEST[otdelrorg] <br />
Должность: $_REQUEST[dolzhrorg] <br />
Стаж работы по нынешней профессии: $_REQUEST[staj] <br />
<br />
<b>Цель дополнительного образования:</b>
".implode(', ', $_REQUEST['purpose'])." <br />
<br />   
<b>Источник информации о курсах:</b> <br />
".implode(', ', $_REQUEST['from'])." <br />
";

$to  = "myura.roman@gmail.com";

$subject = "Новая анкета на сайте"; 
//$subject = '=?cp-1251?B?'.base64_encode($subject).'?=';



$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
$headers .= "From: IPPK SITE<sys@".$_SERVER['HTTP_HOST'].">\r\n"; 

if ($result['status'] == 'ok') {
    $rs_user = CUser::GetList(
                ($by = 'name'),
                ($order = 'asc'),
                array(
                    'GROUPS_ID' => array(10)
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