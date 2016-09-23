<style>

.LRelevance 	{
					color:#0675db;
					font-size: 22px;
				}
				
.LRelevance_Ref	{
					color: #4C5461;
					text-decoration: none;
					font-size: 17px;
				}
				
.LRelevance_Ref:hover {text-decoration:underline;}
				
.LRelevance_Item{
					margin-top: 10px;
					margin-left: 5px;
				}

</style>

<?
$DISPLAY = 0;
foreach($arResult["ITEMS"] as $cell=>$arElement)
	if( substr_count($_SERVER['REQUEST_URI'],$arElement['DETAIL_PAGE_URL'])==1){ $CurCourse = $arElement ; $DISPLAY = 1; break;}

$relevance = CIBlockElement::GetProperty($CurCourse["IBLOCK_ID"],$CurCourse["ID"],Array(),Array("CODE"=>"RELEVANCE"));
while ($ob = $relevance->GetNext()){
	$Related_courses[] = $ob['~VALUE'];}		
?>

<hr height="1" color="#c4ced7" style="margin-top:25px; margin-bottom:25px; margin-left:-10px; margin-right:-5px;">

<?if(($DISPLAY == 1) and (!empty($Related_courses[1]))){?>
	<div class="LRelevance">Похожие программы:</div>
	<?foreach($Related_courses as $CurID){?>
	<?	foreach($arResult["ITEMS"] as $cell=>$arElement){?>
	<?		if($arElement['ID']==$CurID){?>
				<div class="LRelevance_Item">
					<a class="LRelevance_Ref" href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?echo($arElement['NAME'])?></a>
				</div>
				<?break;?>	
			<?}?>
	<?	}?>
	<?}?>
<?}?>

