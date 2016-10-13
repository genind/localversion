<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul id="tree">
<?foreach($arResult as $SEC) {?>
	<li <?if ($SEC["CODE"]==$arParams["SECTION_CODE"]){?>class="current active"<?}?>>
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
	</li>
<?}?>
</ul>

<pre>
<?//print_r($arResult)?>
<?//print_r($arParams)?>
</pre>