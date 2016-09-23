<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include.php");
   $code=CMain::CaptchaGetCode();
   echo $code;
  ?> 