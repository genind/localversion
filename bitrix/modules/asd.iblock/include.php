<?php

if (!function_exists('htmlspecialcharsbx')) {
	function htmlspecialcharsbx($string, $flags=ENT_COMPAT) {
		return htmlspecialchars($string, $flags, (defined('BX_UTF')? 'UTF-8' : 'ISO-8859-1'));
	}
}

CModule::AddAutoloadClasses(
	'asd.iblock',
	$a = array(
		'CASDiblock' => 'classes/general/iblock_interface.php',
		'CASDiblockInterface' => 'classes/general/iblock_interface.php',
		'CASDiblockAction' => 'classes/general/iblock_action.php',
		'CASDiblockTools' => 'classes/general/iblock_tools.php',
		'CASDiblockPropCheckbox' => 'classes/general/iblock_property.php',
	)
);

$arJSAsdIBlockConfig = array(
	'asd_iblock' => array(
		'js' => '/bitrix/js/asd.iblock/script.js',
		'css' => '/bitrix/panel/asd.iblock/interface.css',
		'rel' => array('jquery'),
	),
);
foreach ($arJSAsdIBlockConfig as $ext => $arExt) {
	CJSCore::RegisterExt($ext, $arExt);
}