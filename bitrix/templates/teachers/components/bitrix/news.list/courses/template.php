<div class="filter2">
<?
$sections = array();
foreach($arResult['ITEMS'] as $ar_item) {
    if (!in_array($ar_item['~IBLOCK_SECTION_ID'], $sections)) {
        $sections[] = $ar_item['~IBLOCK_SECTION_ID'];
    }
}?>
<?if(!empty ($arResult["ITEMS"])):?>
<?$k=0;?>

<ul>

<li><a href="/about/teachers/" <?if($_SERVER["REQUEST_URI"] === "/about/teachers/"):?>class="actv"<?endif?>>Все преподаватели</a></li>

<?
//$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $arResult['ID']);

$arFilter = array('IBLOCK_ID' => 4);
$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);
while($ar_section = $rs_sections -> GetNext()) {?>
<?$k++;?>

<? $lnk = "\/about\/teacher\/\#\/about\/$ar_section\['CODE'\]\/";
//var_dump($lnk);
?>
<li><a href="/about/<?echo $ar_section['CODE']?>/" <?if($_SERVER["REQUEST_URI"] === $lnk):?>class="actv"<?endif?>><?echo $ar_section['NAME']?></a></li>
<?//var_dump($ar_section);?>
<?}?>
</ul>
<?endif?>
</div>
<?//var_dump(parse_url('$lnk', PHP_URL_FRAGMENT));?>