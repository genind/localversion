<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
// нопки соц закладок
$arYaButtons = array(
                     "yaru"          => GetMessage("LNG_BTYPE_yaru"), 
                     "vkontakte"     => GetMessage("LNG_BTYPE_vkontakte"), 
                     "facebook"      => GetMessage("LNG_BTYPE_facebook"), 
                     "twitter"       => GetMessage("LNG_BTYPE_twitter"), 
                     "odnoklassniki" => GetMessage("LNG_BTYPE_odnoklassniki"), 
                     "moimir"        => GetMessage("LNG_BTYPE_moimir"), 
                     "lj"            => GetMessage("LNG_BTYPE_lj"), 
                     "friendfeed"    => GetMessage("LNG_BTYPE_friendfeed"), 
                     "moikrug"       => GetMessage("LNG_BTYPE_moikrug")
);
//—тили иконок
$arYaBVar = array(
                  "button" => GetMessage("LNG_BVAR_button"), 
                  "link"   => GetMessage("LNG_BVAR_link"), 
                  "icon"   => GetMessage("LNG_BVAR_icon"), 
                  "none"   => GetMessage("LNG_BVAR_none")
);
//язык
$arYaBLang = array(
                  "ru" => GetMessage("LNG_LANG_RUS"), 
                  "en" => GetMessage("LNG_LANG_ENG"),
                  "uk" => GetMessage("LNG_LANG_UK"),
                  "be" => GetMessage("LNG_LANG_BE"),
                  "kk" => GetMessage("LNG_LANG_KK"),
);

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
        "YA_LANG"       => array(
                                    "PARENT"  => "BASE",
                                    "NAME"    => GetMessage("LNG_LANG"),
                                    "TYPE"    => "LIST",
                                    "VALUES"  => $arYaBLang,
                                    "DEFAULT" => "ru"                                    
                                   ),

        "YA_BVAR"       => array(
                                    "PARENT"  => "BASE",
                                    "NAME"    => GetMessage("LNG_BVAR"),
                                    "TYPE"    => "LIST",
                                    "VALUES"  => $arYaBVar,
                                    "DEFAULT" => "none"                                    
                                   ),
        "YA_BUTTONS"    => array(
                                    "PARENT"   => "BASE",
                                    "NAME"     => GetMessage("LNG_BTYPE"),
                                    "TYPE"     => "LIST",
                                    "VALUES"   => $arYaButtons,
                                    "MULTIPLE" => "Y",
                                    "DEFAULT"  => "yaru"                                    
                                   ),
	),
);
?>