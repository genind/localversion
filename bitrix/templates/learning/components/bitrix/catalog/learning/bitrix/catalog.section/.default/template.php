<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('iblock');
?>
<style>
.right {width:685px; margin: 0px 0px 0px 0px; margin-right:15px;}
.course_box {	margin-right:0px;
				margin-bottom: 0px;
				padding: 0px;
				padding-bottom:0px;
				border-bottom:1px solid rgba(28, 28, 28, 0.32);
			}
.course_box2:hover { background: #FFF; box-shadow: 0 0 10px 5px rgba(0,0,0,.5);}
.tbl-cell-text { 	color:#2e3d4c;
					margin: 0px;
					margin-right: 10px;
					margin-bottom:25px; 
					margin-top: 12px;
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
					margin-left:15px;
					margin-right:15px;
					margin-top: 0px;
					margin-bottom:25px;
				}
.tbl-more {
				background: #2146A4;
				padding: 4px 16% 4px 16%;
				text-align: center;
				color: #FFFFFF;
				font-size: 12px;
				font-weight: bold;
				box-shadow: 3px 2px 6px #000000;
				border-radius: 4px;
				text-decoration: none;
				cursor: pointer;
			}
.tbl-more:hover {
				background: #A1A0A0;
				box-shadow: 0px 0px 0px #000000;
				text-decoration:none;
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

	.discount	{
				  margin: 0px;
				  padding: 1px;
				  padding-left: 5px;
				  background: rgb(33, 164, 110);
				  color: rgb(255, 255, 255);
				  font-weight: normal;
				  box-shadow: 1px 1px 2px #000000;
		//text-shadow: 0px 0px 1px black;
				}

 img.ruble { height: 12px; }

</style>
<?	
    $Courses = Array();
	foreach($arResult["ITEMS"] as $cell=>$arElement):
		$CurrProp = Array();
		$buff = CIBlockElement::GetProperty($arElement["IBLOCK_ID"],$arElement["ID"],Array(),Array());
		while ($ob = $buff->GetNext())
			{	if( $ob["CODE"]=="DURATION" or
					$ob["CODE"]=="DUR_DAY" or
					$ob["CODE"]=="VOLUME" or
					$ob["CODE"]=="CERTIFICATE" or
					$ob["CODE"]=="DIPLOMA" or
					$ob["CODE"]=="NEW"
				) 
				{$CurrProp[$ob["CODE"]] = $ob["~VALUE"];}

				if( $ob["CODE"]=="START_DATE" or
					$ob["CODE"]=="DISCOUNTS" or
					$ob["CODE"]=="PRICE_STR"
				)
				{$CurrProp[$ob["CODE"]][] = $ob["~VALUE"];}
				
				if( $ob["CODE"]=="HITWORD" )
					{	$str = preg_split("/style:/",$ob["~VALUE"]);
						if(!empty($str[0])){$CurrProp[$ob["CODE"]][] = $str;}
					}
			}
		$arElement["Props"] = $CurrProp;
		$Courses[$arElement["ID"]] = $arElement;
	endforeach;	
//echo("<pre>"); print_r($Courses); echo("</pre>");
?>
	
<table  style=" width:100%; background-color:white">
		<tr style="border:1px solid rgba(28, 28, 28, 0.32);">
			<td style="width:35%; vertical-align:bottom"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Программа ";?></b></div></td>
			<td style="width:15%; vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center; margin-right:=15px"><b><?echo "Длительность ";?></b></div></td>
			<td style="width:15%; vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Объём ";?></b></div></td>
			<td style="width:20%; vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Запуск группы ";?></b></div></td>
			<td style="width:20%; vertical-align:bottom;"><div class="tbl-cell-text" style="text-align:center;"><b><?echo "Стоимость ";?></b></div></td>	
		</tr>
	</table>





	<?foreach($Courses as $arElement):?>
		<div class="course_box">
			<table style="width:100%;">
			<tr>
				<td style="width:35%; vertical-align:top">
					<div class="tbl-cell-title">
						<a class="tbl-title" href="#"><?=$arElement["NAME"]?>
						<?if($arElement["Props"]["NEW"]=='Y'){?><div class="newCourse">NEW</div><?}?>
							<?if(!empty($arElement["Props"]["HITWORD"])){?>
								<?foreach($arElement["Props"]["HITWORD"] as $HW){?>
									<div class="hitCourse" style="<?=$HW[1]?>"><?=$HW[0]?></div>
								<?}?>
							<?}?>
						</a>
					</div>
				</td>
		
				<td style="width:17%; vertical-align:top">
					<div class="tbl-cell-text">
					<?$DUR=$arElement["Props"]["DURATION"]?>
					<?if (!empty($DUR)):?>						
							<?$MTH='мес.'?>
							<?if ($DUR==0.5){$MTH="нед."; $DUR="2";} ?> 
							<?if ($DUR==0.75){$MTH="нед."; $DUR="3";} ?>
							<?if (!empty($arElement["Props"]["DUR_DAY"])){$MTH="дн."; $DUR=$arElement["Props"]["DUR_DAY"];} ?>
							<?if ($DUR==0.25){$MTH="нед."; $DUR="1";} ?> 
							<span class="duration"><?=$DUR?></span> <b><?=$MTH?></b>
						<?endif?>
					</div>
				</td>

				<td style="width:14%; vertical-align:top">
					<div class="tbl-cell-text">
					<?if(!empty($arElement["Props"]["DURATION"])){?>
						<div>
							<span class="duration"><?=$arElement["Props"]["VOLUME"]?></span>
							<b><?echo "ак.ч."?></b>
						</div>
					<?}?>
					</div>
				</td>
				
				<td style="width:14%; vertical-align:top">
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

				<td style="width:25%; vertical-align:top">
					<div class="tbl-cell-text">
					<?if(!empty($arElement["Props"]["PRICE_STR"])){?>	
						<div>
							<div>
							<?$disc=current($arElement["Props"]["DISCOUNTS"])?>
							<?if(!empty($disc)){
								foreach($arElement["Props"]["PRICE_STR"] as $key=>$Price){?>
									<span style="text-decoration:line-through;" class="price"><?=$Price?></span>
									<b><img src="/images/ruble.gif" class="ruble"  alt="рублей"/></b>
								<div class="discount" style="display:inline;"><?=current($arElement["Props"]["DISCOUNTS"])?></div>
									<?next($arElement["Props"]["DISCOUNTS"])?>
									<br/>
								<?}?>
							<?}else{?>
							<?foreach($arElement["Props"]["PRICE_STR"] as $Price){?>
								<span class="price"><?=$Price?></span>
								<b><img src="/images/ruble.gif" class="ruble" alt="рублей" /></b>
								<br/>							
							<?}}?>
							</div>
							<div style="margin-top:5px;"><a class="tbl-more" href="<?=$arElement["DETAIL_PAGE_URL"]?>">ПОДРОБНЕЕ</a></div>
						</div>
					<?}?>
					</div>
				</td>
			</tr>
			</table>
		</div>
        <?endforeach;?>	

