<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/iblock/include.php");
   include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/include/public_tools.php");
   $arrPath = pathinfo($_SERVER["REQUEST_URI"]);

   $rsIblock = GetIBlockList("catalog", Array("6"));
   $arIblock = $rsIblock->Fetch();
   $rsSection = GetIBlockSectionList($arIblock["ID"], false, Array("ID"=>"ASC"));
   
   $aMenuLinksNew = array();
   while ($arSection = $rsSection->Fetch())
   {
      $SECTION_URL = "/dirname/".$arSection["CODE"].".php";
      $arrAddLinks = array();
      
      $aMenuLinksNew[] = array(
         $arSection["NAME"],
         $SECTION_URL,
         $arrAddLinks,
         array(
            "FROM_IBLOCK" => true,
            "IS_PARENT" => true,
            "DEPTH_LEVEL" => 1)
      );
      
      $rsItem = GetIBlockElementListEx("catalog", Array(), Array(), Array("ACTIVE_FROM"=>"DESC", "SORT"=>"ASC", "NAME"=>"DESC"), 10, Array("SECTION_ID"=>$arSection["ID"], "INCLUDE_SUBSECTIONS"=>"Y"));
      while ($arItem = $rsItem->Fetch())
      {
         $aMenuLinksNew[] =   array(
            $arItem["NAME"],
            $SECTION_URL,
            $arrAddLinks,
            array(
               "FROM_IBLOCK" => true,
               "IS_PARENT" => false, 
               "DEPTH_LEVEL" => 2, 
            )
         );   
      }
   }
?>