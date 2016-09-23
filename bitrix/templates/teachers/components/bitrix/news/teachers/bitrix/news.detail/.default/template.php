<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<style>
	.detail-teacher-courses div.head {
		color: #0675db;
		font-size: 18px;
		margin-bottom:15px;
		margin-top:20px;
	}
	.detail-teacher-courses a {
		text-decoration: underline;
		color:#2e3d4c;
		padding-left:10px;
	}
	.detail-teacher-courses a:hover{
		text-decoration: none;
	}
	#teachers {
		text-indent: 20px;
		text-align:justify;
		line-height: 1.5;
	}
</style>

<div id="teachers">
        	<h3 class="teach_header_inner"><?=$arResult["NAME"]?></h3>

<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" style="" class="teach_photo_inner" />
			<?if (!empty($arResult["DETAIL_TEXT"])):?>
                        <p>
			 <?=$arResult["DETAIL_TEXT"]?>
			</p>
                        <?endif?>
<div style="clear:both;"></div>
</div>
<?if(!empty($arResult["PROPERTIES"]["COURSES"]["VALUE"])){?>
<div class="detail-teacher-courses">
<hr height="1" color="#c4ced7" style="margin-top:35px; margin-bottom:0px; margin-left:-10px; margin-right:-5px;">
	<div class="head">бедер йспяш:</div>
<?
	foreach( $arResult["PROPERTIES"]["COURSES"]["VALUE"] as $CID ){
		$res = CIBlockElement::GetList(Array(),Array("ID"=>$CID),false,false,Array("ID","NAME","IBLOCK_ID","DETAIL_PAGE_URL"));
		while($course = $res->GetNext()){
?><p><a href="<?=$course["DETAIL_PAGE_URL"]?>"><?=$course["NAME"]?></a></p><?
		}
	}
?>
<?}?>
</div>
