<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?$Nrow=TRUE;?>
<?$Ncol=0;?>
<div class="sections-table">
	<?foreach($arResult as $SEC) {?>
	<?if($Nrow){ $Nrow=FALSE; echo("<div class='row'>");}?>
			<div class="cell">
				<div class="section <?if ($SEC["CODE"]==$arParams["SECTION_CODE"]) echo('current active')?>">
					<div class="section-name">	
						<a	href="<?=$SEC["URL"]?>">
							<? echo $SEC['NAME']?>
						</a>
					</div>
					<?if(!empty($SEC['ITEMS'])){?>
					<ul class="sub_tree" >
						<?foreach($SEC['ITEMS'] as $CURSE):?>
							<li <?if( $CURSE["CODE"]==$arParams["ELEMENT_CODE"] ){?>class="current"<?}?> >
								<a 	href="<?=$CURSE["URL"]?>"> <?echo $CURSE["NAME"]?></a>
							</li>	
						<?endforeach;?>
					</ul>
					<?}?>
				</div>
			</div>
	<? $Ncol = $Ncol+1 ?>
	<? if($Ncol==3){ $Ncol=0; $Nrow=TRUE; echo("</div>");}?>
	<?}?>
</div>


<pre>
<?//print_r($arResult)?>
<?//print_r($arParams)?>
</pre>