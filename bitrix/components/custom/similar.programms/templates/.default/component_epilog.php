<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<hr style="height:1; color:#c4ced7; margin-top:25px; margin-bottom:25px; margin-left:-10px; margin-right:-5px;">

<?
foreach($arResult as $arElement)
	if( substr_count($_SERVER['REQUEST_URI'],$arElement['DETAIL_PAGE_URL'])==1){ $CURSES = $arElement['RELEVANCE'] ; $DISPLAY = true; break;}
?>

<?if($DISPLAY and (!empty($CURSES[0]))){?>
	<div class="LRelevance">Похожие программы:</div>
	<?foreach($CURSES as $CurID){?>
		<div class="LRelevance_Item">
			<a class="LRelevance_Ref" href="<?=$arResult[$CurID]["DETAIL_PAGE_URL"]?>"><?echo($arResult[$CurID]['NAME'])?></a>
		</div>
	<?}?>
<?}?>