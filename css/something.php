<?
	include($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
	CModule::IncludeModule('iblock');
	
	$sections4 = CIBlockSection::GetList (
											  Array("NAME" => "ASC"),
											  Array("IBLOCK_ID" => 4),
											  false,
											  Array('ID', 'NAME', 'CODE')
											);
	
	$sections25 = CIBlockSection::GetList (
											  Array("NAME" => "ASC"),
											  Array("IBLOCK_ID" => 25),
											  false,
											  Array('ID', 'NAME', 'CODE')
											);	
	
	$seclist = Array();
	while($section = $sections4->GetNext()){
		$seclist["PP"][$section["NAME"]]=$section['ID'];}
		
	while($section = $sections25->GetNext()){
		$seclist["PK"][$section["NAME"]]=$section['ID'];}
	
	$secID = Array();
	foreach($seclist["PP"] as $name=>$idPP){
		$secID[$idPP]=$seclist["PK"][$name];
	}
	
	
		$dbEl = CIBlockElement::GetList(Array(), Array("IBLOCK_TYPE"=>"content", "IBLOCK_ID"=>4));
		$allElements =Array();

		while($obEl = $dbEl->GetNextElement())
		{   
			$props = $obEl->GetProperties();
			$fields = $obEl->GetFields();
			echo("<pre>");
			//print_r($fields);
			echo("</pre>");
			$allElements[$fields["ID"]] = $fields;
			foreach($props as $code=>$item)
			$allElements[$fields["ID"]]["props"][$code] = $item["VALUE"];
		}
	
	
	
	
	foreach($allElements as $ID=>$element){
			$el = new CIBlockElement;
			
			$arLoadProductArray = Array(  
										   'IBLOCK_SECTION_ID' => $secID[$element["IBLOCK_SECTION_ID"]],  
										   'IBLOCK_ID' => 25,
										   'PROPERTY_VALUES' => $element["props"],  
										   'NAME' => $element["NAME"],  
										   'ACTIVE' => $element["ACTIVE"],
										   'PREVIEW_TEXT' => $element['PREVIEW_TEXT'],  
										   'DETAIL_TEXT' => $element['DETAIL_TEXT'],  
										   'DETAIL_PICTURE' => $element['DETAIL_PICTURE'],
										   'SORT' => $element['SORT'],
										   'TAGS' => $element['TAGS'],
										);
			
			//echo("<pre>");
			//print_r($arLoadProductArray);
			//echo("</pre>");
			if( $arLoadProductArray['PROPERTY_VALUES']['VOLUME']<=144){
				$el->Add($arLoadProductArray);
			}
	}
?>