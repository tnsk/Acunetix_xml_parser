<?php
set_time_limit(0);
/*
* yhytnsk 
* Date : 14-10-2015
*/
$config["kritik"]	=true;//red
$config["orta"]		=true;//orange
$config["dusuk"]	=true;//blue
$config["bilgi"]	=true;//green

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
	if($config["kritik"]==true)
	{
		if($x["color"] == "red")
		{
			echo "Bulgu ".$say.") ".$x->Name." \n";
			echo "URL : ".$xml->Scan->StartURL.$x->Affects."\n";
			echo "Parametre : ".$x->Parameter."\n";
			echo "Method : ".MetotGetir($x->TechnicalDetails->Request)."\n";
			echo "Request : \n".temizle(nl2br($x->TechnicalDetails->Request))."\n";
			echo "\n\n";
			
			$say = $say+1;
		}
	}
	if($config["orta"]==true)
	{
		if($x["color"] == "orange")
		{
			echo "Bulgu ".$say.") ".$x->Name." \n";
			echo "URL : ".$xml->Scan->StartURL.$x->Affects."\n";
			echo "Parametre : ".$x->Parameter."\n";
			echo "Method : ".MetotGetir($x->TechnicalDetails->Request)."\n";
			echo "Request : \n".temizle(nl2br($x->TechnicalDetails->Request))."\n";
			echo "\n\n";
			
			$say = $say+1;
		}
	}
	if($config["dusuk"]==true)
	{
		if($x["color"] == "blue")
		{
			echo "Bulgu ".$say.") ".$x->Name." \n";
			echo "URL : ".$xml->Scan->StartURL.$x->Affects."\n";
			echo "Parametre : ".$x->Parameter."\n";
			echo "Method : ".MetotGetir($x->TechnicalDetails->Request)."\n";
			echo "Request : \n".temizle(nl2br($x->TechnicalDetails->Request))."\n";
			echo "\n\n";
			
			$say = $say+1;
		}
	}
	if($config["bilgi"]==true)
	{
		if($x["color"] == "green")
		{
			echo "Bulgu ".$say.") ".$x->Name." \n";
			echo "URL : ".$xml->Scan->StartURL.$x->Affects."\n";
			echo "Parametre : ".$x->Parameter."\n";
			echo "Method : ".MetotGetir($x->TechnicalDetails->Request)."\n";
			echo "Request : \n".temizle(nl2br($x->TechnicalDetails->Request))."\n";
			echo "\n\n";
			
			$say = $say+1;
		}
	}
	
}


?>
