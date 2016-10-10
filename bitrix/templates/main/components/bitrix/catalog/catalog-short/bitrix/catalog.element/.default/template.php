<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<style>
   table.Program {
		width:100%;
   }

   .Program td {
	text-align: justify;
	padding-bottom: 1%;
	padding-right: 8%;
	padding-left: 4%;
   }
   
   .Program-item td {
		background-color:rgba(91, 161, 233, 0.23);
		padding: 4px;
		padding-left: 10px; 		
   }
     
   tr.Program-item {
		border-top: 1px solid black; 
		border-bottom: 1px solid black;
   }


.LRelevance_Bot 	{
					color:#0675db;
					font-size: 18px;
				}
				
.LRelevance_Ref_Bot	{
					color: #4C5461;

				}
				
.LRelevance_Ref_Bot:hover {text-decoration:none;}
				
.LRelevance_Item_Bot{
					margin-top: 10px;
					margin-left: 15px;
				}

.duration-description	{
							font-size:18px;
						}

.program_description ul	{ 
							list-style: disc;
							margin-left: 15px;
							margin-bottom: 15px;
							margin-top: 5px;
						}

.program_description li	{ 
							padding-left: 0px;
							color: rgb(46, 61, 76);
						}

.text_in_line_wrapper{
    border-top: 1px solid #067ADA;
    width: 100%;
    text-align: center;
	margin-top:30px;
}

.text_in_line_content{
    background-color: white;
    top: -10px;
    padding-left: 10px;
    padding-right: 10px;
    position: relative;
    color: #067ADA;
    font-weight: bold;
	display:inline;
}
</style>

<div class="program_description">

	<div class="title"><? echo $arResult["NAME"];?></div>
	
    <div><?=$arResult["DETAIL_TEXT"]?></div>

	
	<div class="section">
		<div class="title">��������� ���������</div>
		
		<?if(!empty($arResult["PROPERTIES"]["DISCOUNTS"]["VALUE"])){?>
			<?foreach($arResult["PROPERTIES"]["PRICE_STR"]["VALUE"] as $PRC){?>
				<div style="font-size:20px;text-align:center;">
					<div style="text-decoration:line-through;display:inline;"><?=$PRC?></div>
					<div style="display:inline; background: url(/images/ruble.gif) no-repeat;background-size: contain;background-position: 50% 45%;color: rgba(255, 255, 255, 0);">p</div>
					���� �� �������: <?=current($arResult["PROPERTIES"]["DISCOUNTS"]["VALUE"])?>
					<?next($arResult["PROPERTIES"]["DISCOUNTS"]["VALUE"])?>
					<div style="display:inline; background: url(/images/ruble.gif) no-repeat;background-size: contain;background-position: 50% 45%;color: rgba(255, 255, 255, 0);">p</div>
				</div>
			<?}?>
			<?}else{?>
				<div style="font-size:20px;text-align:center;">
					<?foreach($arResult["PROPERTIES"]["PRICE_STR"]["VALUE"] as $PRC){?>
						<?echo($PRC."  ");?>
						<div style="display:inline; background: url(/images/ruble.gif) no-repeat;background-size: contain;background-position: 50% 45%;color: rgba(255, 255, 255, 0);">p</div>
					<?}?>
				</div>
			<?}?>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["~VALUE"]["TEXT"]?></p>
	</div>



	<div class="section">
		<?if (!empty($arResult["PROPERTIES"]["VOLUME"]["VALUE"])):?>
		<?$VOLUME = $arResult["PROPERTIES"]["VOLUME"]["VALUE"];?>
			<?
			$LD = substr($VOLUME,-1);
			$L2D = 0;
			if ($VOLUME>9) {$L2D = substr($VOLUME,-2);}
			if(!empty($VOLUME))
			{ 
				if ($LD==1) {$VOL=' ������������� ���)';} 
				if ( ($LD<5) and ($LD>1)) {$VOL=' ������������� ����)';} 
				if ((($L2D>10) and ($L2D<15)) or (($LD>4)and($LD<10)) or  ($LD==0)) {$VOL=' ������������� �����)';}
			}
		$VOL = '( <b>'. $VOLUME.'</b>' . $VOL;
			?>
		<?endif?>

		<?$DUR=$arResult["PROPERTIES"]["DURATION"]["VALUE"]?>
		<?if (!empty($DUR)):?>
		<div class="title">������������ ���������</div>
		<?
		$DURM=explode('-',$DUR);
		$MD = max($DURM[0],$DURM[1]);
		$MD = str_replace(',','.',$MD);
		$LD =  substr( $MD, -1);
		$MTH='���.';
		if ( $LD==1 ) {$MTH= '�����';}
		if ( ($LD<5) and ($LD>1) ) {$MTH='������';} 
		if ( ($LD>4) and ($LD<=9) ) {$MTH='�������';}
		if ( ($MD<2) and ($MD>1) ) {$MTH='������';} 
		if ($DUR==0.5){$MTH="������"; $DUR="2";} 
		if ($DUR==0.75){$MTH="������"; $DUR="3";}
		if ($DUR==0.25){$MTH="������"; $DUR="1";}
		?> 

		<?if(!empty($arResult["PROPERTIES"]["DUR_DAY"]["VALUE"])){
				$MTH="����"; 
				$DUR=$arResult["PROPERTIES"]["DUR_DAY"]["VALUE"] ;  
				if( $DUR%10==1 ){$MTH="����";} 
				if( ($DUR%10<5) and ($DUR%10>1)){$MTH="���";}
			}?>
		<p style="font-size:20px;text-align:center;">
			<b><?=$DUR?></b> <?=$MTH .' '.$VOL?>
		<p>
		<?endif?>
	</div>

	
	<div class="section">
		<div class="title">���������� ��������</div>
		<?if (!empty($arResult["DISPLAY_PROPERTIES"]["DOCUMENT"]["~VALUE"]["TEXT"])){?>
					<p style="font-size:20px;text-align:center;"><?=$arResult["DISPLAY_PROPERTIES"]["DOCUMENT"]["~VALUE"]["TEXT"]?></p>
		<?}else{?>
			<?if($arResult["PROPERTIES"]["VOLUME"]["VALUE"]>=256){?>
				<p style="font-size:20px;text-align:center;">������ ���� / ���������� ���� (��� ��� �� ������� ����� ������������)</p>
			<?}?>
			<?if($arResult["PROPERTIES"]["VOLUME"]["VALUE"]<256){?>
				<p style="font-size:20px;text-align:center;">������������� ���� � ��������� ������������</p>
			<?}?>
		<?}?>

		<? $DOCEX = $arResult["PROPERTIES"]["CERTIFICATE"]["VALUE"]?>
		<?if (!empty($DOCEX)):?>
					<p style="text-align:center">
					 <a href="<?=$DOCEX?>" 
						rel="prettyphoto" 
						style="padding: 0px 5px;" >
						<img src="<?=$DOCEX?>" 
							 align="center" style="width:200px"  />
					</a>
					</p>
		<?endif?>
		<? $DOCEX = $arResult["PROPERTIES"]["DIPLOMA"]["VALUE"]?>
		<?if (!empty($DOCEX)):?>
					<p style="text-align:center">
					 <a href="<?=$DOCEX?>" 
						rel="prettyphoto" 
						style="padding: 0px 5px;" >
						<img src="<?=$DOCEX?>" 
							 align="center" style="width:200px"  />
					</a>
					</p>
		<?endif?>
	</div>

	<div class="section">
		<div class="title">����� ��������</div>
		<?if (!empty($arResult["DISPLAY_PROPERTIES"]["FORM"]["~VALUE"]["TEXT"])){?>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["FORM"]["~VALUE"]["TEXT"]?></p>
		<?}else{?>
			<p class="text_courses">
				��������� ����� ������� ������� ��� ���� ������ ��������:� 
				<br />
				 - �������� ������ 
				<br />
				 - ������ ��������� ��� 
				<br />
				 - ��������
			</p>
		<?}?>
	</div>


	<div class="section">
		<?if (!empty($arResult["DISPLAY_PROPERTIES"]["PROGRAMM"]["~VALUE"]["TEXT"])):?>
					<div class="title">��������� ��������</div>
					<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["PROGRAMM"]["~VALUE"]["TEXT"]?></p>
		<?endif?>

		<div align="right">
			<p style="margin-top:10px; margin-left:-20px;float:left;width:100%;"><a href="/onlinerequest/" data-reveal-id="subscribetop_reveal" id="subscribetop" style="width:150px;">�������� ������</a></p>
		</div>
	</div>

	<div class="section">
	<?$relevance = $arResult["PROPERTIES"]["RELEVANCE"]["VALUE"];
	if(!empty($relevance[0])){?>
		<hr style="height:1px; color:#1974C3; margin-top: 96px;
		margin-bottom: 25px;
		margin-left: -5px;
		margin-right: 0px;">
		<div class="LRelevance_Bot">��� ����� ����� ���������:</div>
		<?foreach($relevance as $item){
			$buff = CIBlockElement::GetList(Array(),Array('ID'=>$item,'IBLOCK_ID'=>4),false,false,Array('DETAIL_PAGE_URL','NAME'));
			while($ob=$buff->getNext()){?>
			<div class="LRelevance_Item_Bot">
				<a class="LRelevance_Ref_Bot" href="<?=$ob['DETAIL_PAGE_URL']?>"><?echo($ob['NAME'])?></a>
			</div>
			<?}?>
		<?}?>
	<?}?>
	</div>
	
	<div class="section">
		<?if (!empty($arResult["PROPERTIES"]["TEACHERS"]["VALUE"])):?>
			<div class="title">�������������</div>
		
			<?foreach($arResult["PROPERTIES"]["TEACHERS"]["VALUE"] as $arPrep):?>
				<div class="teacher">
					<div class="photo" style="background-image:url(<?=$arPrep["src"]?>);"> </div>
					<div class="description">
						<a class="name" href="<?=$arPrep["link"]?>" class="p"><?=$arPrep["name"]?></a>
						<div><?=$arPrep["text"]?></div>
					</div>
				</div>
			<?endforeach?>

		<?endif?>
	</div>

<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="icon" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir">
</div> 
</div>

