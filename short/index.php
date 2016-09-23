<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "курсы краткосрочные квалификация обучение");
$APPLICATION->SetTitle("Повышение квалификации");
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('iblock');
?>

<style type="text/css">
.right {width:685px; margin: 0px 0px 0px 0px; margin-right:15px;}
.course_box {	margin-right:0px;
				margin-bottom: 0px;
				padding: 0px;
				padding-bottom:0px;
				cursor:pointer;
				border-bottom:1px solid rgba(28, 28, 28, 0.32);
			}
.course_box2:hover { background: #FFF; box-shadow: 0 0 10px 5px rgba(0,0,0,.5);}
.tbl-cell-text { 	color:#2e3d4c;
					margin: 0px;
					margin-right: 25px;
					margin-bottom:10px; 
					margin-top: 10px;
					text-align:right;
				}
.onecolumn a 	{	
					font-size: 15px;
					line-height: 0px;
					color: #4C5461;
				}				
.tbl-cell-title {	padding: 0px; 
					padding-top:12px;
					padding-bottom:0px;
					margin-left:45px;
					margin-right:10px;
					margin-top: 0px;
					margin-bottom:25px;
				}
.tbl-more {
				display:block;
				text-decoration:none;
				background: #2146A4;
				width: 90%;
				text-align: center;
				color: #FFFFFF;
				margin-left: 19%;
				margin-top: 12px;
				font-size: 12px;
				font-weight: bold;
				box-shadow: 3px 2px 6px #000000;
				border-radius:4px;
			}
.tbl-more:hover {
				background: #A1A0A0;
				box-shadow: 0px 0px 0px #000000;
			}
				
.tbl-title {color:#4C5461; font-size:15px; font-weight:bold; text-decoration: none; }
span.price {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}
span.volume {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}
span.duration {	font-weight:bold;
			color: rgba(188, 45, 0, 1);
			font-size:16px;
			display: inline;
			height: auto;
			margin: 0px 0px;
		}

.section_name {
				  font-size: 18px;
				  font-weight: bold;
				  padding-top: 30px;
				  padding-bottom: 0px;
				padding-left:40px;
			}

.newCourse {
				background: none repeat scroll 0% 0% #A42A21;
				text-align: center;
				color: #FFF;
				font-size: 16px;
				font-weight: bold;
				box-shadow: 3px 2px 6px #000;
				display: inline;
				padding-left: 5px;
				padding-right: 5px;
			}

.hitCourse {
				background: none repeat scroll 0% 0% #21A46E;
				text-align: center;
				color: #FFF;
				font-size: 16px;
				font-weight: bold;
				box-shadow: 3px 2px 6px #000;
				display: inline;
				padding-left: 5px;
				padding-right: 5px;
			}			
			
 img.ruble { height: 12px; }
</style>

<?
$arFilter = Array('IBLOCK_ID'=>"4", 'GLOBAL_ACTIVE'=>'Y', 'INCLUDE_SUBSECTIONS' => 'Y');
$arSections = CIBlockSection::GetList(Array('sort'=>'ASC'), $arFilter, true);
$sections = Array();
while($section = $arSections -> GetNext())
{	
	$SRT = 0;
	if($section['NAME']=='Юриспруденция'){$SRT=4;}
	if($section['NAME']=='Менеджмент'){$SRT=3;}
	if($section['NAME']=='Дизайн'){$SRT=2;}
	if($section['NAME']=='Для работников сферы образования'){$SRT=1;}
	if($section['NAME']=='PR и реклама'){$SRT=5;}
	if($section['NAME']=='Иностранные языки'){$SRT=6;}
	if($section['NAME']=='Повышение квалификации преподавателей'){$SRT=7;}
	$sections[$SRT]=$section;
}
	
	$courses = CIBlockElement::GetList( array(), array("=IBLOCK_ID"=>4,"ACTIVE"=>'Y'));

	while ($arElement = $courses->GetNext()){
		$CurrProp = Array();
		$buff = CIBlockElement::GetProperty(4,$arElement["ID"],Array(),Array());
		while ($ob = $buff->GetNext())
			{	if( $ob["CODE"]=="DURATION" or
					$ob["CODE"]=="DUR_DAY" or
					$ob["CODE"]=="VOLUME" or
					$ob["CODE"]=="CERTIFICATE" or
					$ob["CODE"]=="DIPLOMA" or
					$ob["CODE"]=="SHORT" 
				) 
				{$CurrProp[$ob["CODE"]] = $ob["~VALUE"];}

				if( $ob["CODE"]=="START_DATE" or
					$ob["CODE"]=="PRICE_STR"
				)
				{$CurrProp[$ob["CODE"]][] = $ob["~VALUE"];}
				
				if( $ob["CODE"]=="HITWORD" )
					{	$str = preg_split("/style:/",$ob["~VALUE"]);
						if(!empty($str[0])){$CurrProp[$ob["CODE"]][] = $str;}
					}
			}
		$arElement["Props"] = $CurrProp;
		if($CurrProp["SHORT"]=='Y'){
		foreach($sections as $cell=>$section) {
			if($section["ID"]==$arElement['IBLOCK_SECTION_ID']) {
				$SRT = 0;
	if($section['NAME']=='Юриспруденция'){$SRT=4;}
	if($section['NAME']=='Менеджмент'){$SRT=3;}
	if($section['NAME']=='Дизайн'){$SRT=2;}
	if($section['NAME']=='Для работников сферы образования'){$SRT=1;}
	if($section['NAME']=='PR и реклама'){$SRT=5;}
	if($section['NAME']=='Иностранные языки'){$SRT=6;}
	if($section['NAME']=='Повышение квалификации преподавателей'){$SRT=7;}
				$sections[$SRT]['COURSES'][$arElement['ID']]=$arElement;
			}
		}}
		ksort($sections);
	};	
		//echo("<pre>"); print_r($sections); echo("</pre>");
?>

<table width="96%" style="background-color:white; margin-left:2%;" align="center">
		<tr style="border:1px solid rgba(28, 28, 28, 0.32);">
			<td width="30%"></td>
			<td width="25%" style="vertical-align:bottom"><b><div class="tbl-cell-text" style="text-align:center;"><?echo "Программа ";?></div></b></td>
			<td width="15%" style="vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center; margin-right:=15px"><b><?echo "Длительность ";?></b></div></td>
			<td width="15%" style="vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Запуск группы ";?></b></div></td>
			<td width="10%" style="vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Стоимость ";?></b></div></td>	
		</tr>
	</table>



<table width="96%" style="border:collapse;  margin-left:2%;" align="center">
<?foreach($sections as $section):?>
<?if(!empty($section['COURSES'])){?>
	<tr style=" border-bottom:1px solid rgba(28, 28, 28, 0.32);">
		<td width="30%" style="vertical-align:top;">
			<div class="section_name" ><?=$section['NAME']?></div>
		</td>
		
		<td width="70%">
		<table width="98%">
		<?$k=1;?>
		<?foreach($section['COURSES'] as $arElement):?>
			<tr style="border-top:<?if($k<>1){echo("solid");}?> 1px rgba(28, 28, 28, 0.32);">
			<?$k=$k+1;?>
				<td width="50%" style="vertical-align:middle">
					<div class="tbl-cell-title">
						<a class="tbl-title" href="#"><?=$arElement["NAME"]?></a>
						<?if($arElement["Props"]["NEW"]=='Y'){?><div class="newCourse">NEW</div><?}?>
						<?if(!empty($arElement["Props"]["HITWORD"])){?>
							<?foreach($arElement["Props"]["HITWORD"] as $HW){?>
								<div class="hitCourse" style="<?=$HW[1]?>"><?=$HW[0]?></div>
							<?}?>
						<?}?>
					</div>
				</td>
		
				<td width="17%" style="vertical-align:top">
					<div class="tbl-cell-text">
					<?$DUR=$arElement["Props"]["DURATION"]?>
					<?if (!empty($DUR)):?>						
							<?$MTH='мес.'?>
							<?if ($DUR==0.5){$MTH="нед."; $DUR="2";} ?> 
							<?if ($DUR==0.75){$MTH="нед."; $DUR="3";} ?>
							<?if ($DUR==0.25){$MTH="нед."; $DUR="1";} ?>
							<?if (!empty($arElement["Props"]["DUR_DAY"])){$MTH="дн."; $DUR=$arElement["Props"]["DUR_DAY"];} ?> 
							<span class="duration"><?=$DUR?></span> <b><?=$MTH?></b>
						<?endif?>
					</div>
				</td>
				

				
				<td width="14%" style="vertical-align:top">
					<div class="tbl-cell-text">
					<?if(!empty($arElement["Props"]["START_DATE"][0])){?>	
						<div>
							<?foreach($arElement["Props"]["START_DATE"] as $Start_Date){?>
							<span class="volume"><?=FormatDate("d", MakeTimeStamp($Start_Date))?></span>
							<b><?=FormatDate("M", MakeTimeStamp($Start_Date))?></b>
							<br/>
							<?}?>
						</div>
					<?}else{?>
						<div style="height:35px; background:url(/images/clock.png) no-repeat;     background-position: 50% 49%;"></div>
					<?}?>
					</div>
				</td>
				
				<td width="25%" style="vertical-align:top">
					<div class="tbl-cell-text">
					<?if(!empty($arElement["Props"]["PRICE_STR"])){?>	
						<div>
							<?foreach($arElement["Props"]["PRICE_STR"] as $Price){?>
							<span class="price"><?=$Price?></span>
							<b><img src="/images/ruble.gif" class="ruble" /></b>
							<br/>							
							<?}?>
							<a class="tbl-more" href="<?=$arElement["DETAIL_PAGE_URL"]?>">ПОДРОБНЕЕ</a>
						</div>
					<?}?>
					</div>
				</td>
			</tr>
        <?endforeach;?>
		</table>
		</td>
	</tr>

<?}?>
	<?endforeach;?>
</table>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>