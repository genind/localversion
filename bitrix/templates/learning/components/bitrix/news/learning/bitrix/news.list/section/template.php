<?
$sections = array();
foreach($arResult['ITEMS'] as $ar_item) {
    if (!in_array($ar_item['~IBLOCK_SECTION_ID'], $sections)) {
        $sections[] = $ar_item['~IBLOCK_SECTION_ID'];
    }
}?>
<?
$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y', 'INCLUDE_SUBSECTIONS' => 'Y');
$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);
while($ar_section = $rs_sections -> GetNext()) {?>


<?var_dump($ar_section);?>
<?}?>







