<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Институт переподготовки и повышения квалификации кадров, курсы ДПО");
$APPLICATION->SetTitle("Институт повышения квалификации и переподготовки кадров Российского университета дружбы народов");
?>




<?
	//код галереи
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

				

<div class="block">
		 		 
	<div class="info"> 
	<div class="info-left">	
		<div class="block-title">НОВОСТИ</div>
		<div class="news_part">
			<?$APPLICATION->IncludeComponent(	"bitrix:news.list", 
											"news_index",
											array(
												"IBLOCK_TYPE" => "-",
												"IBLOCK_ID" => $_REQUEST["ID"],
												"NEWS_COUNT" => "3",
												"SORT_BY1" => "ACTIVE_FROM",
												"SORT_ORDER1" => "DESC",
												"SORT_BY2" => "SORT",
												"SORT_ORDER2" => "ASC",
												"FILTER_NAME" => "",
												"FIELD_CODE" => array(
													0 => "",
													1 => "",
												),
												"PROPERTY_CODE" => array(
													0 => "",
													1 => "",
												),
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
											),
											false
										);?>
			<a href="/news/" class="allnews"></a>
		</div>
	</div> <!-- info-left -->
	<div class="info-right">
		<div class="block-title">КАЛЕНДАРЬ СОБЫТИЙ</div>
		<div class="calendar-block">	
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
			);?>
			
		</div> <!-- calendar-block -->
		
		<div class="block-title">ПОПУЛЯРНЫЕ КУРСЫ</div>
		<div class="pop-curses">
			<ul>
				<li><a href="/learning/bukhgalterskiy-uchet-i-nalogooblozhenie/bukhuchet/">Бухгалтерский учёт и налогообложение</a></li>
				<li><a href="/learning/manager/upravlenie-personalom/">Управление персоналом</a></li>
				<li><a href="/learning/yurisprudentsiya/yuriskonsult/">Юрисконсульт</a></li>
				<li><a href="/learning/languages/perevodchik-v-sfere-professionalnoy-kommunikatsii/">Переводчик в сфере профессиональной коммуникации</a></li>
				<li><a href="/learning/pr/shkola-kopiraytinga/">Школа копирайтинга</a></li>
			</ul>
			<a href="/learning/management/" class="allcurses"></a>
		</div> <!-- pop-curses -->						
	</div> <!-- info-right -->
	<div style="clear:both;"></div>
	</div> <!-- info -->
</div> <!-- block -->

<div class="block">
	<div class="dyrections">
		<div class="row">
		<div class="cell">
			<div class="title">Профессиональная переподготовка</div>
			<div class="description">Вид дополнительного профессионального образования, который позволяет в кратчайшие сроки освоить новую профессию. По завершению обучения выдается Диплом РУДН о профессиональной переподготовке с присвоением квалификации. Диплом о профессиональной переподготовке удостоверяет право на ведение новой профессиональной деятельности</div>
		</div>
		<div class="cell">		
			<div class="title">Повышение квалификации</div>
			<div class="description">Вид дополнительного профессионального образования, который позволяет повысить уровень Вашей квалификации: теоретических знаний, практических навыков и умений. По завершению обучения выдается Удостоверение РУДН о повышении квалификации в определенной профессиональной сфере деятельности.</div>
		</div>
		<div class="cell">				
			<div class="title">Тренинги</div>
			<div class="description">Вид дополнительного образования, направленный на развитие профессиональных и личностных навыков и умений. Проводится в активной и сложной форме в короткие сроки. По окончанию обучения выдается Удостоверение РУДН о повышении квалификации или Сертификат ИППК РУДН о прохождении тренинговой программы. </div>
		</div>
		</div>
	</div>
</div>

<div class="block">
	<div class="block-title">УЧЕБА В ИНСТИТУТЕ  - ЭТО:</div>
		<div class="advantages">
			<div class="row1">
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image1.png);"></div>
				</div>
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image2.jpeg);"></div>
				</div>
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image3.jpeg);"></div>
				</div>
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image4.png);"></div>
				</div>
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image5.jpeg);"></div>
				</div>
				<div  class="cell">
					<div style="background-image:url(/images/advantages/image6.jpeg);"></div>
				</div>
			</div>
			<div class="row2">
				<div  class="cell">
					<div>Лицензия на ведение образовательной деятельности №</div>
				</div>
				<div  class="cell">
					<div>Разработка программ под заказ для корпоративных клиентов</div>
				</div>
				<div  class="cell">
					<div>Дистанционная форма обучения по программам переподготовки</div>
				</div>
				<div  class="cell">
					<div>Перезачет  часов по программе на Диплом Переводчика</div>
				</div>
				<div  class="cell">
					<div>Раздаточный учебный материал по каждой из программ</div>
				</div>
				<div  class="cell">
					<div>Более 15 направлений  и 150 программ обучения</div>
				</div>
			</div>
		</div>
</div>


<div class="block">  
	<div class="block-title">ФОТОГАЛЕРЕЯ</div>

	<div class="main-gallery">
			<?if($arResult['GALLERY']) {?>        
            <script type="text/javascript">
            $(document).ready(function(){
                   $('#carousel_gallery').jCarouselLite({
                       visible: 5,
					   scroll: 3,
					   speed: 800,
                       btnNext: ".right_arr_carousel_gallery",
                       btnPrev: ".left_arr_carousel_gallery"               
                   });
                   
                });
            </script>
            
            <div class="carousel" id="carousel_gallery">
				<div class="left_arr_carousel_gallery"><div class="left_arr"><</div></div>
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
				<div class="right_arr_carousel_gallery"><div class="right_arr">></div></div>
            </div>
           
            <div style="clear: both"></div>	
			<?}//photos if end?>
	</div> <!--end photo-->  

	
				<div class="block-title"><a href="/about/partners/">ПАРТНЕРЫ</a></div>

	<div class="partners">       
            <script type="text/javascript">
            $(document).ready(function(){
                   $('#carousel_partners').jCarouselLite({
                       visible: 5,
					   scroll: 3,
					   speed: 800,
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
            
            <div class="carousel" id="carousel_partners">
				<div class="left_partners_gallery"><div class="left_arr"><</div></div>
                <ul>
					<li style="background-image:url('/images/partners/dme-2.png'); background-size:100%;">
						<a href="http://www.dme.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/obuchebe-2.png'); background-size:90%; background-position: 80% 50%">
						<a href="http://obuchebe.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/navigator-2.png'); background-size: 80%; background-position: 100% 50%;">
						<a href="http://fulledu.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/rustudy-2.png'); background-size:45%;">
						<a href="http://rustudy.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/vsetreningi-2.png'); background-size: 100%; background-position: 100% 75%;">
						<a href="http://vsetreningi.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/avecs-2.png'); background-size:60%; background-position: 80% 50%">
						<a href="http://avecs.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/bella-2.png'); background-size:55%;">
						<a href="http://www.bella-tzmo.ru/ru_RU" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/fagps-2.png'); background-size:50%;">
						<a href="http://www.fagps.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/genetika-2.png'); background-size:100%;">
						<a href="http://genetika.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/goznak-2.png'); background-size:50%;">
						<a href="http://goznak.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/intek-2.png'); background-size:80%;background-position: 0px 21px;">
						<a href="http://www.airport.kg/ru/intek.php" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/ktrv-2.png'); background-size:100%;">
						<a href="http://www.ktrv.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/marchi-2.png'); background-size:30%;">
						<a href="http://www.marhi.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/mdm_bank-2.png'); background-size:100%;ackground-position: -17px 50%;">
						<a href="http://www.mdm.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/medcity-2.png'); background-size:90%;">
						<a href="http://www.medcity.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/metall_resurs-2.png'); background-size:95%;">
						<a href="" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/nspk-2.png'); background-size:80%;">
						<a href="http://www.nspk.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/oboron_energo-2.png'); background-size:75%;">
						<a href="http://oboronenergo.su/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/outsourcing_expert-2.png'); background-size:90%;">
						<a href="http://expert-outsourcing.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/rostelecom-2.png'); background-size:80%;">
						<a href="http://www.rostelecom.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/surgut_airport-2.png'); background-size:70%;">
						<a href="http://www.airport-surgut.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/tec_inspect-2.png'); background-size:100%;">
						<a href="http://www.ti-ees.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a></li>
					<li style="background-image:url('/images/partners/uzapad_mskobr-2.png'); background-size:40%;">
						<a href="http://uzapad.mskobr.ru/" style="display:block;width: 100%;height: 100%;" target="_blank"></a>
					</li>
					<li style="background-image:url('/images/partners/voyage-2.png'); background-size:100%;">
						<a href="http://www.voyaje.com/ru/complex/one/18" style="display:block;width: 100%;height: 100%;" target="_blank"></a>
					</li>
                </ul>
				<div class="right_partners_gallery"><div class="right_arr ">></div></div>
            </div>
            <div style="clear: both"></div>	
	</div> <!--end partners-->
</div> <!-- block -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>