<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Обратная связь");
?> 

<?
$errors = array();
if (empty($_POST['message'])) {
    $errors[] = 'Ошибка: Вы не ввели текст сообщения!!!!!';
}
if ($errors) 
	{
		$errorsstr = implode('<br />', $errors);
	?> 
	
	<script type="text/javascript">
			$(function() {
				$('#feedback-form').css('height', '350px');
				$('#feedback-form h3').after('<p style="color: red;"><img id="bxid_428736" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"/></p>');
				$('#feedback-form').reveal();
			})
	</script>
	
	<?
	}else 
	{
		$subject = mb_convert_encoding ('Запись на курсы, новое сообщение',"UTF-8");
		$body = 'Сообщение: ' . mb_convert_encoding ($_POST['message'],"UTF-8","CP-1251") . "\r\n";
		if ($_POST['contactname']) {
			$body .= "\r\n";
			$body .= 'Контакты  gпроверка генин: ' . mb_convert_encoding ($_POST['contactname'],"UTF-8");
		}
		
		$rs_users = CUser::GetList(($by = 'name'), ($ord = 'asc'), array('GROUPS_ID' => array(10)));
		while($ar_user = $rs_users->GetNext())
			mail($ar_user['EMAIL'], $subject, $body, $headers);

		?> 
		<p> Ваше сообщение отправлено. </p>
	 	<?
	}

?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>