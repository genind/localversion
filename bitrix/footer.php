<?php 
// SEO Modification
if (file_exists($_SERVER['DOCUMENT_ROOT'].'/seo_mod.php'))
{
  include $_SERVER['DOCUMENT_ROOT'].'/seo_mod.php';
  if (isset($seo_text))
    echo '<div class="seo-text">',$seo_text,'</div>';
}
?>
<?
if(defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED===true)
{
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog.php");
}
?>