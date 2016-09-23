<?
$sections = array();
foreach($arResult['ITEMS'] as $ar_item) {
    if (!in_array($ar_item['~IBLOCK_SECTION_ID'], $sections) && $ar_item['~IBLOCK_ID'] == 4) {
        $sections[] = $ar_item['~IBLOCK_SECTION_ID'];
    }
//var_dump ($ar_item);
}?>
<?if(!empty ($arResult["ITEMS"])):?>
<?$k=0;?>
<ul>

<li><a href="/about/teachers/" <?if($_SERVER["REQUEST_URI"] === "/about/teachers/"):?>class="actv"<?endif?>>Все преподаватели</a></li>

<?
$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $arResult['SECTION_ID']);
$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);
while($ar_section = $rs_sections -> GetNext()) {?>
<?$k++;?>
<? $lnk = "/about/".$ar_section['CODE']."/";
?>
<li><a href="/about/<? echo $ar_section['CODE']?>/" <?if($_SERVER["REQUEST_URI"] === $lnk):?>class="actv"<?endif?>><? echo $ar_section['NAME']?></a></li>

<?}?>
</ul>
<?endif?>
<?//print_r($_POST);?>