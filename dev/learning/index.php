<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
CModule::IncludeModule('iblock');
?>
<script>
	$(document).ready(function() {
		
		Cufon('#lerning-directions .item a.title', { fontFamily: 'PFBeauSansPro', hover: true });
		$('#lerning-directions .item a.title').click(function() {

			if(!$(this).parents('.item').hasClass('open')) {
				$(this).parents('.item').addClass('pre-open');
				Cufon.refresh('#lerning-directions .item a.title');
				$(this).parents('.item').find('ul').slideDown(function(){ $(this).parents('.item').addClass('open');
$(this).parents('.item').removeClass('pre-open');
	Cufon.refresh('#lerning-directions .item a.title');
});
			
			}
			else {
				$(this).parents('.item').find('ul').slideUp(function(){ 			
					$(this).parents('.item').removeClass('open');
					Cufon.refresh('#lerning-directions .item a.title'); });
			}
		});
	});
</script>

<div id="lerning-directions">
<?
$rs_sections = CIBlockSection::GetList(
    array('sort' => 'asc', 'id' => 'desc'),
    array('IBLOCK_ID' => 4, 'ACTIVE' => 'Y')
);


$count = $rs_sections->SelectedRowsCount();
$half = ceil($count / 2);
$j = 0;
$i = 0;
while($ar_section = $rs_sections->GetNext()) {
    $i++;
    if (ceil($i/$half) != $j) {
        if ($j) {
            ?></div><?
        }
        ?>
        <div class='col-<?=ceil($i/$half)?>'>
        <?
        $j = ceil($i/$half);
    }
    ?>
	<div class="item">
		<a class="title"><?=$ar_section['NAME']?></a>
		<ul>
            <?
            $rs_elements = CIBlockElement::GetList(
                    array('sort' => 'asc'),
                    array('IBLOCK_ID' => 4, 'SECTION_ID' => $ar_section['ID']),
                    false, false,
                    array('ID', 'NAME', 'CODE')
            );
            while ($ar_element = $rs_elements->GetNext()) {
                ?>
            <li><a href="/learning/<?=$ar_section['CODE'] . '/' . $ar_element['CODE']?>/"><?=$ar_element['NAME']?></a></li>
                <?
            }
            ?>
		</ul>
	</div>
    <?
}
?>
        </div>
</div>


<script src="http://ippkrudn.ru/js/jquery.reveal.js"></script>
<link href="http://ippkrudn.ru/css/reveal.css" rel="stylesheet" />
<a href="#feedback-form" id="feedback"  data-reveal-id="feedback-form" data-animation="fade" data-closeonbackgroundclick="true" data-dismissmodalclass="close-reveal-modal"></a>
<div id="feedback-form" class="reveal-modal">
<h3 style="color:#2D7DC8; font-size:18px; line-height:22px; font-weight:normal; padding-bottom:10px; font-family:arial;">Напишите нам</h3>
<hr style="margin-bottom:20px;">
<textarea></textarea>
<p style="font-family:arial;">Если вы хотите получить ответ, пожалуйста, оставьте свои контактные данные</p>
<input type="text" size="50" name="contactname" value="" class="required">
<input type="submit" value="&nbsp;" name="submit" disabled="disabled" class="passive">
<a class="close-reveal-modal">&#215;</a>         
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>