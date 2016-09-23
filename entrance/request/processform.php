<?
// ����������� ��������� ����� �������
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

���: $_REQUEST[name]</div> <br />
���� ��������: $_REQUEST[birth]</div> <br />
�����������: $_REQUEST[residence]</div> <br /><br />


<b>���������� ����������:</b> <br />
�����: $_REQUEST[city] <br />
�����: $_REQUEST[address] <br />
E-mail: $_REQUEST[email] <br />
��������: $_REQUEST[hphone], $_REQUEST[mphone] <br />
���������������� ������ �����: $_REQUEST[svyaz] <br />
<br />

<b>�����������:</b> <br />
���: $_REQUEST[learn12] <br />
���� ������: $_REQUEST[startlearn12] <br />
���� ���������: $_REQUEST[endlearn12] <br/>
�������� �������� ���������: $_REQUEST[namelearn12] <br/>
���������: ".$_REQUEST[fakultet][0]." <br />
�������������: ".$_REQUEST[specialnost][0]." <br />";

if ($_REQUEST['fakultet'][0]) {
    //unset($_REQUEST['namelearn'][0]);
    foreach($_REQUEST['namelearn'] as $n=>$fac) {
        
        $body .= '<br /><b>�������������� ����������� </b><br />';
        $body .= '���: ' . $_REQUEST['learn'][$n] . ' <br />';
        $body .= '���� ������: ' . $_REQUEST['startlearn'][$n] . ' <br />';
        $body .= '���� ���������: ' . $_REQUEST['endlearn'][$n] . ' <br />';
        $body .= '�������� ���������: ' . $_REQUEST['namelearn'][$n] . ' <br />';
        $body .= '���������: ' . $_REQUEST['fakultet'][$n] . ' <br />';
        $body .= '�������������: ' . $_REQUEST['specialnost'][$n] . ' <br />';
    }
    
}


$body .= '<br /><b>������ ������:</b><br />';
foreach($_REQUEST['lang'] as $k => $lang) {
    $body .= $lang . ' (' . $_REQUEST['urlang'][$k] . ')' . '<br />';
}

$body .= "
<br /><b>������ ������ � �����������</b> <br />
������� ���������: $_REQUEST[officeprog] <br />
��������: $_REQUEST[internetprog] <br />
���������������� ���������: $_REQUEST[profprog] <br />
<br />
<b>��������� ����� ������:</b><br />
���������: $_REQUEST[profession] <br/>
�����������: $_REQUEST[org] <br />
�����������: $_REQUEST[naprorg] <br />
�������� ������: $_REQUEST[otdelrorg] <br />
���������: $_REQUEST[dolzhrorg] <br />
���� ������ �� �������� ���������: $_REQUEST[staj] <br />
<br />
<b>���� ��������������� �����������:</b>
".implode(', ', $_REQUEST['purpose'])." <br />
<br />   
<b>�������� ���������� � ������:</b> <br />
".implode(', ', $_REQUEST['from'])." <br />
";

$to  = "myura.roman@gmail.com";

$subject = "����� ������ �� �����"; 
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