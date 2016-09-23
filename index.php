<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Институт переподготовки и повышения квалификации кадров, курсы ДПО");
$APPLICATION->SetTitle("Институт повышения квалификации и переподготовки кадров Российского университета дружбы народов");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"info_index",
	Array(
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "50",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array("DETAIL_TEXT","DETAIL_PICTURE"),
		"PROPERTY_CODE" => array("LINK","DETAIL_PICTURE"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
		)
	);?> 	 <?
CModule::IncludeModule("iblock");
$arResult = Array();

$result = CIBlockElement::GetList(	array("DATE_ACTIVE_FROM" =>"DES"), 
	array("=IBLOCK_ID"=>Array(1,13,14),"ACTIVE"=>'Y',">=DATE_ACTIVE_FROM" => array(ConvertTimeStamp(time()-86400*500, "FULL"))  ));
while ($ACTION = $result->GetNext()){
	$flag = false;
	$Item["NAME"] = $ACTION["NAME"];
	$Item["DETAIL_PAGE_URL"] = $ACTION["DETAIL_PAGE_URL"];

	if(!empty($ACTION["PREVIEW_PICTURE"])){	
		$flag = true;
		$Item["image"][$ACTION["PREVIEW_PICTURE"]]["PATH"] = CFile::GetPath($ACTION["PREVIEW_PICTURE"]);	
		$buff = CFile::GetByID($ACTION["PREVIEW_PICTURE"]);
		while ($ob = $buff->GetNext()){
			$Item["image"][$ACTION["PREVIEW_PICTURE"]]["DESCRIPTION"] = $ob["DESCRIPTION"];}
			$MINI = CFile::ResizeImageGet ( $ACTION["PREVIEW_PICTURE"] , array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL );
			$Item["image"][$ACTION["PREVIEW_PICTURE"]]["MINI"] = $MINI["src"];
		}

		$buff = CIBlockElement::GetProperty($ACTION["IBLOCK_ID"],$ACTION["ID"],Array(),Array());
		while ($ob = $buff->GetNext())
		{	
			if( ($ob["CODE"]=="IMAGES") and !empty($ob["~VALUE"]) )
			{
				$Item["image"][$ob["~VALUE"]]["PATH"] = CFile::GetPath($ob["~VALUE"]);
				$pic = CFile::GetByID($ob["~VALUE"]);
				while ($bp = $pic->GetNext())
				{
					$Item["image"][$ob["~VALUE"]]["DESCRIPTION"] = $bp["DESCRIPTION"];
					if(empty($bp["DESCRIPTION"])){
						$Item["image"][$ob["~VALUE"]]["DESCRIPTION"] = $ACTION["PREVIEW_TEXT"];} 
					}
					$MINI = CFile::ResizeImageGet ( $ob["~VALUE"] , array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_PROPORTIONAL );
					$Item["image"][$ob["~VALUE"]]["MINI"] = $MINI["src"];
					$flag = true;
				}
				if( ($ob["CODE"]=="VIDEO") and !empty($ob["VALUE"]["author"]))
					{	$Item["VIDEO"][$ob["PROPERTY_VALUE_ID"]]["DESCRIPTION"] = $ob["VALUE"]["desc"];
				$Item["VIDEO"][$ob["PROPERTY_VALUE_ID"]]["PATH"] = "https://www.youtube.com/watch?v=".$ob["VALUE"]["author"];
				$Item["VIDEO"][$ob["PROPERTY_VALUE_ID"]]["MINI"] = "https://img.youtube.com/vi/".$ob["VALUE"]["author"]."/mqdefault.jpg";
				$flag = true;
			}	
		}
		if($flag){$arResult["GALLERY"][$ACTION["ID"]] =$Item;}	
		unset($Item);
	};	
	
	//echo("<pre>");print_r($arResult["GALLERY"]); echo("</pre>");
	?>	 				 
	<div style="color: rgb(229, 233, 235); font-size: 20px; font-weight: 600;"> 
		<table style="width: 100%; text-shadow: rgba(0, 0, 0, 0.682353) 1px 1px 1px; text-align: center;"> 
			<tbody> 
				<tr> <td style="width: 33%;">НОВОСТИ И СОБЫТИЯ</td> <td style="width: 33%;">ПОПУЛЯРНЫЕ ПРОГРАММЫ</td> <td style="width: 33%;">МЕРОПРИЯТИЯ</td> </tr>
			</tbody>
		</table>
	</div>
	
	<div class="info_part"> 			 <a href="/news/" class="gonews" ></a> <a href="learning/manager/" class="allcurses" ></a> <a href="/actions/" class="goreviews" ></a> 
		<div class="news_part"><?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"news_index",
			Array(
				"IBLOCK_TYPE" => "-",
				"IBLOCK_ID" => $_REQUEST["ID"],
				"NEWS_COUNT" => "3",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"FILTER_NAME" => "",
				"FIELD_CODE" => array(0=>"",1=>"",),
				"PROPERTY_CODE" => array(0=>"",1=>"",),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "Y",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
				)
				);?></div>
				
		<div class="raspisanie"><?$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"napravleniya",
			Array(
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "4",
				"NEWS_COUNT" => "4",
				"SORT_BY1" => "NAME",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "",
				"SORT_ORDER2" => "",
				"FILTER_NAME" => "POP_COURSES",
				"FIELD_CODE" => array(0=>"CODE",1=>"bukhgalterskiy-uchet-i-nalogooblozhenie",2=>"upravlenie-personalom",3=>"yuriskonsult",4=>"perevodchik-v-sfere-professionalnoy-kommunikatsii",5=>"shkola-kopiraytinga",6=>"",),
				"PROPERTY_CODE" => array(0=>"",1=>"",),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.y G:i",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
				)
				);?></div>
				
				<div class="naprav"> 	 
<!-- <div style="	text-align: center;
					margin-top: 10px;
					padding-bottom: 11px;
					margin-bottom: 5px;
					border-bottom: solid 1px #4369ac;">
	<a id="bxid_549434" style="	
					color: #e5e9eb;
					font-size: 20px;
					margin-bottom: 5px;
					text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.68);
					border-top: solid 1px #4369ac;" href="http://ippkrudn.ru/news/1707/" >До конца скидки осталось</a>

		<img id="bxid_646121" src="/bitrix/images/fileman/htmledit2/script.gif"  />
	</div> -->
	<?
	$arrFilter = array(
		"ACTIVE" =>"Y",
		array(
			"LOGIC" => "OR",
			array("IBLOCK_ID" => "24")  
			),
		); 

	if ($_REQUEST['SCODE']) {
		$arrFilter['SECTION_CODE'] = $_REQUEST['SCODE'];
	}


	$APPLICATION->IncludeComponent("custom:news.list", "photos-main-actions", array(
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "24",
		"NEWS_COUNT" => "25",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "NAME",
			2 => "TAGS",
			3 => "PREVIEW_TEXT",
			4 => "",
			),
		"PROPERTY_CODE" => array(
			0 => "DATE",
			1 => "LINK",
			2 => "",
			),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/actions/#SECTION_CODE#/#ID#/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => $_REQUEST["SID"],
		"PARENT_SECTION_CODE" => $_REQUEST["SCODE"],
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "pagenav",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
		),
	false
	);?> </div>
</div>

<!--
<div style="clear: both;"> </div>
 <img id="bxid_707266" class="bxed-hr" src="/bitrix/images/fileman/htmledit2/break_page.gif"  /> 

 <div class="bottom-block-header"></div>

<div class="info_part1"> 
  <div class="news_part1"> 				 <img id="bxid_63891" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />
	 			</div>
 			 
 </div>

<div class="bottom_block_footer"></div>
-->

<div style="color: white; float: left; margin-top: 40px; margin-bottom: 50px;"> 	 
	<div style="text-align: center; margin-top: 0px; margin-bottom: -10px; font-size: 30px; text-shadow: rgba(0, 0, 0, 0.682353) 1px 1px 1px; font-weight: 600; border-style: solid; border-top-width: 2px; border-top-color: rgb(255, 255, 255); padding-top: 30px; width: 1011px;">ПРЕИМУЩЕСТВА ОБУЧЕНИЯ В ИНСТИТУТЕ</div>
	
	<table style="font-size: 17px; font-style: oblique; width: 1088px;"> 	 
		<tbody> 
			<tr> 		<td style="padding-top: 50px; height: 70px; text-align: center; width: 337px; color: rgb(39, 73, 147); font-style: normal; font-weight: bold; font-size: 18px; font-family: sans-serif; padding-left: 0px; background-image: url(&quot;/images/main_advantages_line.png&quot;); background-color: white; background-position: 2px 0px;"> 
				<div style="padding-left: 30px; padding-right: 30px; padding-top: 0px;">Учебный раздаточный материал изучаемого курса</div>
			</td> 		<td style="color: rgb(39, 73, 147); text-align: center; padding-top: 50px; height: 70px; width: 337px; font-style: normal; font-weight: bold; font-size: 18px; font-family: sans-serif; background-image: url(&quot;/images/main_advantages_line.png&quot;); background-size: 1088px 121px; background-position: -309px 0px; background-repeat: no-repeat;"> 
			<div>Доступ ко всем видео-урокам</div>
		</td> 		<td style="color: rgb(39, 73, 147); text-align: center; width: 414px; font-style: normal; font-weight: bold; font-size: 18px; font-family: sans-serif; background-image: url(&quot;/images/main_advantages_line.png&quot;); background-position: -760px 0px; background-repeat: no-repeat;"> 
		<div style="padding-right: 60px;">Бесплатная консультация с одним из преподавателей Института</div>
	</td> 	</tr>
	
	<tr style="text-align: center; word-spacing: 4px; line-height: 25px;"> 		<td style="padding: 10px 30px 10px 35px;">Весь учебный раздаточный материал Вам предоставляется от Института и уже входит в стоимость обучения</td> 		<td style="padding: 10px 10px 0px 0px;">В подарок от нашего Института Вы получаете доступ ко всем видео-урокам наших специалистов самых различных направлений</td> 		<td style="padding: 10px 60px 0px 0px;">Независимо от выбора направления обучения, Вам предоставляется возможность получить консультацию с одним из преподавателей Института следующих направлений: HR, PR, Финансы</td> 	</tr>
</tbody>
</table>
</div>

<div style="text-align: center;
margin-top: 0px;
color:white;
margin-bottom: -10px;
font-size: 30px;
text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.68);
font-weight: 600;
border-style: solid;
border-top: 2px solid rgb(255, 255, 255);
padding-top: 30px;
width:100%;
clear: both;">ФОТО / ВИДЕО ГАЛЕРЕЯ</div>

<div class="photo" style="padding-top:40px; margin-bottom:30px; width:98%; margin-left:1%; clear: both;">
	<?if($arResult['GALLERY']) {?>        
		<script type="text/javascript">
			$(document).ready(function(){
				$('#carousel_gallery').jCarouselLite({
					visible: 5,
					btnNext: ".right_arr_carousel_gallery",
					btnPrev: ".left_arr_carousel_gallery"               
				});
				
			});
		</script>
		
		<div class="carousel" id="carousel_gallery" style="height:150px;">
			<div class="left_arr left_arr_carousel_gallery"></div>
			<ul>
				<?foreach($arResult['GALLERY'] as $Item):?>
				<?foreach($Item["image"] as $img){?>
					<li style="background-image:url(<?echo($img["MINI"])?>);">
						<a href="<?=$img["PATH"]?>" style="display:block;width: 100%;height: 100%;" title="prettyPhoto_gallery__1__" ></a>							
						<div class="title" style="display:none;"><a href="<?=$Item["DETAIL_PAGE_URL"]?>"><?=$Item["NAME"]?></a></div>
						<div class="description" style="display:none;"><?echo($img["DESCRIPTION"])?></div>
					</li>
					<?}?>
					<?$x=0?>
					<?foreach($Item["VIDEO"] as $video){?>
						<?$x=$x+1;?>
						<li id="<?echo(" k=".$k." d=".$d." x=".$x)?>" style="background-image:url(<?echo($video["MINI"])?>)">
							<a href="<?echo($video["PATH"])?>" style="display:block;width: 100%;height: 100%;" title="prettyPhoto_gallery__1__" ></a>							
							<div class="title" style="display:none;"><a href="<?echo($Item["DETAIL_PAGE_URL"])?>"><?=$Item["NAME"]?></a></div>
							<div class="description" style="display:none;"><?echo($video["DESCRIPTION"])?></div>							
						</li>
						<?}?>
						<?endforeach;?>
					</ul>
					<div class="right_arr right_arr_carousel_gallery"></div>
				</div>
				
				<div style="clear: both"></div>	
				<?}//photos if end?>
			</div> <!--end photo-->  
			
			<div style="text-align: center; margin-top: 0px; color: white; margin-bottom: -10px; font-size: 30px; text-shadow: rgba(0, 0, 0, 0.682353) 1px 1px 1px; font-weight: 600; border-style: solid; border-top-width: 2px; border-top-color: rgb(255, 255, 255); padding-top: 30px; width: 100%; clear: both;">ПАРТНЕРЫ</div>
			
			<div class="photo partners" style="padding-top: 40px; margin-bottom: 30px; width: 98%; margin-left: 1%; clear: both;"> 
				<script type="text/javascript">
					$(document).ready(function(){
						$('#carousel_partners').jCarouselLite({
							visible: 4,
							btnNext: ".right_partners_gallery",
							btnPrev: ".left_partners_gallery"               
						});
						
					});
					$(function(){
						$('#carousel_partners li').hover(function(){
							var img = this.style.backgroundImage;
							var img_name = img.substring(0,img.length-8);
							this.style.backgroundImage = img_name+'.png")';
						},function(){
							var img = this.style.backgroundImage;
							var img_name = img.substring(0,img.length-6);
							this.style.backgroundImage = img_name+'-2.png")';
						});
					});
				</script>
				
				<div class="carousel" id="carousel_partners" style="height: 150px;"> 				 
					<div class="left_arr left_partners_gallery">&lt;</div>
					
					<ul> 					 
						<li style="background-image: url(&quot;/images/partners/dme-2.png&quot;); background-size: 100%;"> 						<a href="http://www.dme.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/obuchebe-2.png&quot;); background-size: 90%; background-position: 80% 50%;"> 						<a href="http://obuchebe.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/navigator-2.png&quot;); background-size: 80%; background-position: 100% 50%;"> 						<a href="http://fulledu.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/rustudy-2.png&quot;); background-size: 45%;"> 						<a href="http://rustudy.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/vsetreningi-2.png&quot;); background-size: 100%; background-position: 100% 75%;"> 						<a href="http://vsetreningi.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/avecs-2.png&quot;); background-size: 60%; background-position: 80% 50%;"> 						<a href="http://avecs.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/bella-2.png&quot;); background-size: 55%;"> 						<a href="http://www.bella-tzmo.ru/ru_RU" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/fagps-2.png&quot;); background-size: 50%;"> 						<a href="http://www.fagps.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/genetika-2.png&quot;); background-size: 100%;"> 						<a href="http://genetika.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/goznak-2.png&quot;); background-size: 50%;"> 						<a href="http://goznak.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/intek-2.png&quot;); background-size: 80%; background-position: 0px 21px;"> 						<a href="http://www.airport.kg/ru/intek.php" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/ktrv-2.png&quot;); background-size: 100%;"> 						<a href="http://www.ktrv.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/marchi-2.png&quot;); background-size: 30%;"> 						<a href="http://www.marhi.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/mdm_bank-2.png&quot;); background-size: 100%;"> 						<a href="http://www.mdm.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/medcity-2.png&quot;); background-size: 90%;"> 						<a href="http://www.medcity.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/metall_resurs-2.png&quot;); background-size: 95%;"> 						<a style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/nspk-2.png&quot;); background-size: 80%;"> 						<a href="http://www.nspk.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/oboron_energo-2.png&quot;); background-size: 75%;"> 						<a href="http://oboronenergo.su/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/outsourcing_expert-2.png&quot;); background-size: 90%;"> 						<a href="http://expert-outsourcing.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/rostelecom-2.png&quot;); background-size: 80%;"> 						<a href="http://www.rostelecom.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/surgut_airport-2.png&quot;); background-size: 70%;"> 						<a href="http://www.airport-surgut.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/tec_inspect-2.png&quot;); background-size: 100%;"> 						<a href="http://www.ti-ees.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a></li>
						
						<li style="background-image: url(&quot;/images/partners/uzapad_mskobr-2.png&quot;); background-size: 40%;"> 						<a href="http://uzapad.mskobr.ru/" style="display:block;width: 100%;height: 100%;" target="_blank" ></a> 					</li>
						
						<li style="background-image: url(&quot;/images/partners/voyage-2.png&quot;); background-size: 100%;"> 						<a href="http://www.voyaje.com/ru/complex/one/18" style="display:block;width: 100%;height: 100%;" target="_blank" ></a> 					</li>
					</ul>
					
					<div class="right_arr right_partners_gallery">&gt;</div>
				</div>
				
				<div style="clear: both;"></div>
			</div>
			
			<!--end partners-->
			
			<div style="clear: both;"> </div>
			<hr class="bottom-divider" style="margin-top:10px;" /> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>