<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ($arResult["NavShowAlways"] || $arResult["NavPageCount"] > 1):?>
<ul id="pages">


   <?for ($PAGE_NUMBER=$arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER<=$arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER++):?>
      <?if ($PAGE_NUMBER == $arResult["NAV"]["PAGE_NUMBER"]):?>
         <li><span><?=$PAGE_NUMBER?></span></li>
      <?else:?>
         <li><a href="<?=$arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER]?>"><?=$PAGE_NUMBER?></a></li>
      <?endif;?>
   <?endfor;?>

   

   <div class="clear"></div>
</ul>
<?endif;?>