<?	
	$ind = 1;
	$Progs = Array();
	$buff = CIBlockElement::GetProperty(21,702,Array(),Array("CODE"=>"POP_PROGS"));
	while ($ob = $buff->GetNext())
			{	
				$Progs[$ind]["ID"] = $ob["~VALUE"]; 
				$ind = $ind+1;
			}

	$buff = CIBlockElement::GetProperty(21,702,Array(),Array("CODE"=>"NAMES"));
	$ind = 1;
	while ($ob = $buff->GetNext())
			{	
				$Progs[$ind]["NAME"] = $ob["~VALUE"]; 
				$ind = $ind+1;
			}

	$arSelect = Array("ID","NAME","DETAIL_PAGE_URL");
	?><ul><?	
	foreach($Progs as $Prog)
	{
		$buff = CIBlockElement::GetList(Array('sort'=>'ASC'), Array("ID"=>$Prog["ID"]), false,false,$arSelect);

		while ($ob = $buff->GetNext()){
		?><li style="list-style:none;">
			<a href="<?=$ob["DETAIL_PAGE_URL"]?>"><? echo $Prog['NAME']?></a>
		</li><?
		}
	}
	?></ul>
