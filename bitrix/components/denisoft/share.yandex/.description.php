<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("LNG_NAME_YAS"),
	"DESCRIPTION" => GetMessage("LNG_DESCRIPTION_YAS"),
	"ICON" => "/images/icon_yashare.gif",
	"SORT" => 10,
	"CACHE_PATH" => "N",
    "PATH" => array(
              "ID" => GetMessage("LNG_ID_PARTNER"),
              "CHILD" => array(
                      "ID" => "dssocialservice",
                      "NAME" => GetMessage("LNG_CAT_SOCIAL")
                )
        ),
	"COMPLEX" => "N",
);
?>