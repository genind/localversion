<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    $first = true;
    $ya_button = '';
    foreach ((array) $arParams['YA_BUTTONS'] as $val)
    {
        if ($first) {
            $ya_button .= $val;
            $first = false;
            }
        else $ya_button .= ',' . $val;
    }
    $arResult['YA_BUTTONS'] = $ya_button;
    $arResult['YA_BVAR'] = $arParams['YA_BVAR'];
    $arResult['YA_LANG'] = $arParams['YA_LANG'];
	$this->IncludeComponentTemplate();
?>