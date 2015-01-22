<?php
set_time_limit(0);
/*
* yhytnsk 
* Date : 14-10-2015
* sadece kritik seviyedeki açıkları ekrana dökmektedir. ilgili kısmı düzeltmek isteyenler 
*/
$xml = simplexml_load_file("acunetin_report.xml");


$taramalar = $xml->Scan->ReportItems->ReportItem;

function temizle($gelen)
{
	$temiz = str_replace("<br />","",$gelen);
	return $temiz;
}

function MetotGetir($gelen)
{
	$getmi = strpos($gelen,"GET");
	if($getmi)
		{
			return "GET";
		}
		else
		{
			return "POST";
		}
}

$say = 1;
foreach($taramalar as $x)
{
	if($x["color"] == "red")
	{
		//echo $x->Name."<br>";
		echo "Bulgu ".$say.") ".$x->Name." \n";
		echo "URL : ".$xml->Scan->StartURL.$x->Affects."\n";
		echo "Parametre : ".$x->Parameter."\n";
		echo "Method : ".MetotGetir($x->TechnicalDetails->Request)."\n";
		echo "Request : \n".temizle(nl2br($x->TechnicalDetails->Request))."\n";
		
		
		
		echo "\n\n";
		$say = $say+1;
	}
	
}


?>
