<?
$sections = array();
foreach($arResult['ITEMS'] as $ar_item) {
    if (!in_array($ar_item['~IBLOCK_SECTION_ID'], $sections)) {
        $sections[] = $ar_item['~IBLOCK_SECTION_ID'];
    }
}?>
<?
//$dbr = CIBlockElement::GetList(array(), array("=IBLOCK_ID"=>4,"!PROPERTY_IFMODULE"=>Array("Y","N")), false, false, array("ID"));
//while($dbr_arr = $dbr->GetNext())
//{
//  $ELEMENT_ID = $dbr_arr["ID"];
//  CIBlockElement::SetPropertyValues($ELEMENT_ID, 4, "N","IFMODULE");
//}
?>


<?if(!empty ($arResult["ITEMS"])):?>
<style type="text/css">
.tree								{margin: 0px; margin-left:-38px; margin-right:-20px;}
.tree li 							{margin: 0px; padding:0px; margin-bottom:10px; display:block; width:100%;}
.bullit								{width:29px; height:26px ; background: url(/images/current-bullit.png) 0px 0px no-repeat;}
.bullit:hover 						{width:29px; height:26px ; background: url(/images/current-bullit2.png) 0px 0px no-repeat;}
.tree li ul.sub_tree 				{margin: 0px; padding:0px; margin-left: 30px; }
.tree li ul.sub_tree li 			{margin: 0px; padding:0px; display:block; border-top: none; width:100%;}
.tree li ul.sub_tree li span 		{background:none; border-top:1px solid #c4ced7; display: block; margin-top: 7px; margin: 0px; padding:0px; height:auto; width:100%;}
.tree li ul.sub_tree li span a 		{background:none; padding-left:20px; margin: 0px; padding:0px; height:auto; width:100%;}
.tree li.act ul.sub_tree li span	{background:none; border-top:1px solid #c4ced7; display: block; margin-top: 7px; margin: 0px; padding:0px;}
.tree li.act ul.sub_tree li span a 	{background:none; padding-left:20px; margin: 0px; padding:0px;}
.tree li ul.sub_tree li ul 			{ list-style-type:disc; margin-left: -35px; padding-left: 36px; display:block; border-top: none; margin: 0px; padding:0px;  margin-bottom:25px;}
.tree li ul.sub_tree li ul li 		{ margin-left: -35px; padding-left: 70px; display:block; border-top: none; margin-bottom:0px; margin-top:0px;}
</style>

<?$k=0;?>
<ul class="tree">
<?list($domen,$directory,$currSection, $currCourse, $end) = split('[/]', $_SERVER["REQUEST_URI"]);?>
<?
$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y', 'INCLUDE_SUBSECTIONS' => 'Y');
$rs_sections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);
while($ar_section = $rs_sections -> GetNext()) {
?>
<?$k++;?>
<li id="<?=$k?>">
	<table>
		<tr>
			<td class="bullit">
			</td>
			<td>
				<a href="<?=$ar_section["SECTION_PAGE_URL"]?>"class="l1"
				<?if ($_SERVER["REQUEST_URI"] ===($ar_section["SECTION_PAGE_URL"])){?> style="color:#45addf"<?}?>
				>
				<? echo $ar_section['NAME']?>
				</a>
			</td>
		</tr>
	</table>

<ul class="sub_tree" >
<?$i=0;?>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
	<? 
		$buff = CIBlockElement::GetProperty($arElement["IBLOCK_ID"],$arElement["ID"],Array(),Array("CODE"=>"IFMODULE"));
		while ($ob = $buff->GetNext())
			{
				$If_Module_Prop = $ob['~VALUE'];
			}	
		$sections = CIBlockElement::GetElementGroups($arElement["ID"], true);
		$FLAG=false;
		while ($section = $sections->GetNext())
			{
				if($section["ID"]==$ar_section['ID']){$FLAG=true;}
			}
	?>
	<?if ($FLAG){?>
		<? if ( $If_Module_Prop=='N'){?>
		<?$i++;?>
		<li <?if( strpos($arElement["DETAIL_PAGE_URL"],$currCourse)) :?>class="curr11"<?endif?> >
			<?
				$modulesID = Array();
				$buff2 = CIBlockElement::GetProperty($arElement["IBLOCK_ID"],$arElement["ID"],Array(),Array("CODE"=>"MODULE"));
				while ($ob = $buff2->GetNext()){
					$modulesID[] = $ob['~VALUE'];}	
			?>
			<span <?if($ar_section["ELEMENT_CNT"] == $i){?>style="border-bottom:1px solid #C4CED7; padding-bottom:7px;"<?}?>>
				<a 	
					href="<?=$arElement["DETAIL_PAGE_URL"]?>" 
				<?if($_SERVER["REQUEST_URI"] == $arElement["DETAIL_PAGE_URL"]){?>id="active"<?}?>
				>
					<?echo $arElement["NAME"]?>
					<?// echo "<pre>"; echo $If_Module_Prop; echo "</pre>";?>
				</a>
			</span>
					
					<?if (!empty($modulesID[0])) {
						$modules = Array();
						$dbr = CIBlockElement::GetList( array(), 
									array("=IBLOCK_ID"=>4,"ID"=>$modulesID),
									false, false, array("ID","NAME","DETAIL_PAGE_URL"));
						while($dbr_arr = $dbr->GetNext())
						  {$modules[] = $dbr_arr;}	
					?>
					<ul>
						<?foreach ($modules as $module){?>
						<li><a 
								style="text-decoration: none";
								href="<?=$module["DETAIL_PAGE_URL"]?>"
								<?if($_SERVER["REQUEST_URI"] == $arElement["DETAIL_PAGE_URL"]):?>id="active"<?endif?>>
									<?echo $module["NAME"];?>
							</a>
						</li>
						<?}?>
					</ul>
					<?}?>
					<?if( strpos($arElement["DETAIL_PAGE_URL"],$currCourse)){?>
		<script type="text/javascript">
		$('li#<?=$k?>').addClass('expand');
		</script>
		<?}?>
		</li>
		<?}?>
	<? } ?>
<?endforeach;?>
</ul>
</li>
<?//var_dump($ar_section);?>
<?}?>
<?endif?>
</ul>

