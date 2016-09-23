<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
//start generation arr for options
foreach($arResult["arrProp"] as $value)
{
   $arSelect[] = "PROPERTY_".$value["CODE"];
}
$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>IntVal($arParams["IBLOCK_ID"])), false, Array("nPageSize"=>false), $arSelect);
while($ob = $res->GetNext())
{
   foreach($arResult["arrProp"] as $value)
   {
      $arSelOpt[$value["CODE"]][] = $ob["PROPERTY_".$value["CODE"]."_VALUE"];
   }
}
foreach($arResult["arrProp"] as $value)
{
   $arSelOpt[$value["CODE"]] = array_unique($arSelOpt[$value["CODE"]]);
}
//end generation arr for options
?> 
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
   <fieldset>
      <?foreach($arResult["ITEMS"] as $arItem):
         if(array_key_exists("HIDDEN", $arItem)):
            echo $arItem["INPUT"];
         endif;
      endforeach;?>
      <?foreach($arResult["ITEMS"] as $arItem):?>
         <?if(!array_key_exists("HIDDEN", $arItem)):?>
            <?
            foreach($arResult["arrProp"] as $val)
            {
               if($val["NAME"] == $arItem["NAME"])
               {
                  echo "{$arItem["NAME"]}: ";
                  echo '<select style="width:150px;" onсhange="'.$arResult["FILTER_NAME"]."_form".'" name="arrFilter_pf['.$val["CODE"].']">';
                  echo '<option disabled>'."Выберите из списка:".'</option>';
                  foreach($arSelOpt[$val["CODE"]] as $value)
                  {
                     echo '<option value="'."{$value}".'">'."{$value}".'</option>';
                  }
                  echo '</select>';
               }
            }
            ?>
         <?endif?>
      <?endforeach;?>
      <input  class="submit" type="submit" name="set_filter" value="Показать" />
   </fieldset>
</form>
