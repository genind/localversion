<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
CModule::IncludeModule('iblock');

$rs_sections = CIBlockSection::GetList(
    array('sort' => 'desc', 'id' => 'asc'),
    array('IBLOCK_ID' => 18, 'ACTIVE' => 'Y')
);

while($ar_section = $rs_sections->GetNext()) { ?>
		<div><a class="show-hide sect-link" href="#"><span><?=$ar_section['NAME']?></span></a>
            <? 
            $rs_elements = CIBlockElement::GetList(
                    array('sort' => 'asc'),
                    array('IBLOCK_ID' => 18, 'SECTION_ID' => $ar_section['ID'], 'ACTIVE' => 'Y'),
                    false, false,
                    array('ID', 'NAME', 'CODE', 'PROPERTY_FILE')
            );
            while ($ar_element = $rs_elements->GetNext()) {
                ?>
<?$t = CFile::GetFileArray ($ar_element['PROPERTY_FILE_VALUE']);?> 
<div class="hide">            
<?$tmparr = explode(".", $t['FILE_NAME']);
$ext = $tmparr[sizeof($tmparr)-1];
$descr = $ar_element['NAME'];?>
<div class='<?=$ext?>1'><a href="<?=$t['SRC']?>" style="width:auto; display:inline-block;"><?=$ar_element['NAME']?></a></div>
</div>
                <?
            }
            ?></div>
<?}?>


<? 
            $rs_elements = CIBlockElement::GetList(
                    array('sort' => 'asc'),
                    array('IBLOCK_ID' => 18, 'SECTION_ID' => 0, 'ACTIVE' => 'Y'),
                    false, false,
                    array('ID', 'NAME', 'CODE', 'PROPERTY_FILE')
            );
            while ($ar_element = $rs_elements->GetNext()) {
                ?>
<?$t = CFile::GetFileArray ($ar_element['PROPERTY_FILE_VALUE']);?> 
<div style="margin:30px 0 0 0;">          
<?$tmparr = explode(".", $t['FILE_NAME']);
$ext = $tmparr[sizeof($tmparr)-1];
$descr = $ar_element['NAME'];?>
<div class='<?=$ext?>1'><a href="<?=$t['SRC']?>" style="margin-top:0;"><?=$ar_element['NAME']?></a></div>
</div>
                <?
            }
            ?>

<script type="text/javascript">
$(document).ready(function(){
$('.show-hide').click(function () {
if ($(this).parent().find('.hide').is(":hidden")) { 
$(this).parent().find('.hide').fadeIn();
}
else $(this).parent().find('.hide').fadeOut();
return false;
});
});
</script>