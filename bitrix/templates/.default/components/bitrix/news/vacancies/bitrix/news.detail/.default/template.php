<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="teachers">
        	<h3 class="teach_header_inner"><?=$arResult["NAME"]?></h3>

			<?if (!empty($arResult["DETAIL_TEXT"])):?>
                        <p>
			 <?=$arResult["DETAIL_TEXT"]?>
			</p>
                        <?endif?>
                        
                        
<div style="clear:both;"></div>
<a href="/about/vacancies/" id="v-back-button"></a>
</div>