<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

        	<h1><?=$arResult["NAME"]?></h1>
			<?if (!empty($arResult["DETAIL_TEXT"])):?>
                        <p>
			 <?=$arResult["DETAIL_TEXT"]?>
			</p>
                        <?endif?>
  
                        <?if (!empty($arResult["DISPLAY_PROPERTIES"]["CEL"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/program-target.png" alt="" /></p>
			<p class="bigtext"><?=$arResult["DISPLAY_PROPERTIES"]["CEL"]["~VALUE"]["TEXT"]?></p>
<?endif?> 
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["AUDITORIA"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/auditory-target.png" alt="" /></p>
			<p class="bigtext"><?=$arResult["DISPLAY_PROPERTIES"]["AUDITORIA"]["~VALUE"]["TEXT"]?></p>
<?endif?>
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["FORM"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/study-form.png" alt="" /></p>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["FORM"]["~VALUE"]["TEXT"]?></p>
<?endif?>
<?if (!empty($arResult["MOD"])):?>
			<br/><p style="margin:0;"><img src="/images/teachers.png" alt="" /></p>
                        <?$j=0;?>
			<?foreach($arResult["MOD"] as $arPrep):?><br/>
                        <div style="<?if($j>0):?>margin-top:20px;<?endif?> clear:both; float:left;">
                        <img src="<?=$arPrep["src"]?>" alt="<?=$arPrep["name"]?>" class="ph" />
                        <a href="<?=$arPrep["link"]?>" class="p"><?=$arPrep["name"]?></a><br/>
                        <div class="r"><?=$arPrep["text"]?></div>
                        </div>
                        <?$j++;?>
                        <?endforeach?><br/>
<?endif?>
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["TIME"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/program-timing.png" alt="" /></p>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["TIME"]["~VALUE"]["TEXT"]?></p>
<?endif?>
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["DOCUMENT"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/document.png" alt="" /></p>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["DOCUMENT"]["~VALUE"]["TEXT"]?></p>
<?endif?>
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["PRICE"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/program-cost.png" alt="" /></p>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["~VALUE"]["TEXT"]?></p>
<?endif?>
<?if (!empty($arResult["DISPLAY_PROPERTIES"]["PROGRAMM"]["~VALUE"]["TEXT"])):?>
			<br/><p><img src="/images/program-list.png" alt="" /></p>
			<p class="text_courses"><?=$arResult["DISPLAY_PROPERTIES"]["PROGRAMM"]["~VALUE"]["TEXT"]?></p>
<?endif?>
			<p style="margin-top:70px;"><a href="/entrance/request/" id="subscribe"></a></p>
<?//var_dump($arResult["MOD"]);?>