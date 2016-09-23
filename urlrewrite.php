<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/actions/master-class/#",
		"RULE"	=>	"BCODE=activity",
		"ID"	=>	"",
		"PATH"	=>	"/actions/index.php",
	),
	array(
		"CONDITION"	=>	"#^/about/administration/#",
		"RULE"	=>	"ELEMENT_ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/about/administration/index.php",
	),
	array(
		"CONDITION"	=>	"#^/actions/photos/(.+?)/#",
		"RULE"	=>	"BCODE=photos&id=$1",
		"ID"	=>	"",
		"PATH"	=>	"/actions/photogallery.php",
	),
	array(
		"CONDITION"	=>	"#^/actions/(.+?)/(.+?)/#",
		"RULE"	=>	"SCODE=$1&id=$2",
		"ID"	=>	"",
		"PATH"	=>	"/actions/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/entrance/reviews/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/entrance/reviews/index.php",
	),
	array(
		"CONDITION"	=>	"#^/about/vacancies/#",
		"RULE"	=>	"ELEMENT_ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/about/vacancies/index.php",
	),
	array(
		"CONDITION"	=>	"#^/about/teachers/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/about/teachers/index.php",
	),
	array(
		"CONDITION"	=>	"#^/actions/(.+?)/#",
		"RULE"	=>	"SCODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/actions/index.php",
	),
	array(
		"CONDITION"	=>	"#^/actions/(.+?)#",
		"RULE"	=>	"id=$1",
		"ID"	=>	"",
		"PATH"	=>	"/actions/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/programms/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/programms/index.php",
	),
	array(
		"CONDITION"	=>	"#^/training/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/actions/training/index.php",
	),
	array(
		"CONDITION"	=>	"#^/learning/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:catalog",
		"PATH"	=>	"/learning/index.php",
	),
	array(
		"CONDITION"	=>	"#^/news/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/news/index.php",
	),
);

?>