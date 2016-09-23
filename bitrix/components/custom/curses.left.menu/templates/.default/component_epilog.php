<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>







<?list($domen,$directory,$currSection, $currCourse, $end) = split('[/]', $_SERVER["REQUEST_URI"]);?>

<?$k=0;?>
<ul class="tree">
<?foreach($arResult as $SEC) {?>
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