<?php

//Declaration of DOMDocuemnt classes for tables to store data from NBP
$tableA = new DOMDocument;
$tableB = new DOMDocument;
$tableC = new DOMDocument;

function load_xml($url)
{
	//curl initialization
	$ch = curl_init($url);
	
	// Set the curl URL option
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	// Execute curl & store data in a variable

	curl_close($ch);
	
	if($ch) //check wheter xml is correct
	{
          return curl_exec($ch);
	}
    else
	{
          echo false;
	}
}

function load_from_NBP()  //function retrieve current currencies rates
{
	//variables to use
	global $tableA, $tableB, $tableC;
	$api_url = "http://api.nbp.pl";
	
	//loading xmls
	$xmlA = load_xml($api_url."/api/exchangerates/tables/a?format=xml");
	$xmlB = load_xml($api_url."/api/exchangerates/tables/a?format=xml");
	$xmlC = load_xml($api_url."/api/exchangerates/tables/a?format=xml");
	
	if($xmlA == false || $xmlB == false || $xmlC == false) //check wheter xmls are valid
	{
		return false;
	}
	
	//loading xmls to DOMDocuments if eveything is ok
	$tableA->loadXml($xmlA);
	$tableB->loadXml($xmlB);
	$tableC->loadXml($xmlC);

	return true;
}

function store_to_db($table_name)
{
	//global variables to use
	global $tableA, $tableB, $tableC;
	
	//load database configuration
	include '../config/db_config.php';
	
	$tab_name = "table_".strtolower($table_name->getElementsByTagName('Table')->item(0)->nodeValue);
	$sql_string = "";
	
	
	//Check wheter we can connect to mysql database
	try {
			$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return false;
		}
	//$i<$table_name->getElementsByTagName('Rate')->length
	for($i=0; $i<2; $i++)
	{
		$rate = $tableA->getElementsByTagName('Rate')->item($i)->childNodes;
		$sql_string = "UPDATE table_a SET mid = ".$rate[2]->nodeValue." WHERE code = '".$rate[1]->nodeValue."';";
	    $result = mysqli_query($db, $sql_string, MYSQLI_STORE_RESULT);
	}
	
	//save info about rates table (like date, number) to database
	$sql_info = "UPDATE table_info SET no = '".$table_name->getElementsByTagName('No')->item(0)->nodeValue."', effectivedate = '".$table_name->getElementsByTagName('EffectiveDate')->item(0)->nodeValue."' WHERE tablename = '".$tab_name."';";

	$result = mysqli_query($db, $sql_info);

	//Close connection to database
	mysqli_close ($db);
	return true;
}


function drawTable($table)  //draws tables with data from NBP APi
{
	$table_name = $table->getElementsByTagName('Table')->item(0)->nodeValue;
	$no = $table->getElementsByTagName('No')->item(0)->nodeValue;
	$effectivedate = $table->getElementsByTagName('EffectiveDate')->item(0)->nodeValue;

	echo "<H2>Tabela ".$table_name." z dnia ".$effectivedate." (".$no.")</H2>";
	echo "<table cellpadding='0' cellspacing='0'>";
	echo "<tr class='rate-header'>";
	echo "<td class='rate-currency'>Waluta</td>";
	echo "<td class='rate-code'>Kod</td>";
	if($table_name == 'C')  //In table C we have column 'bid' & 'ask" instead of 'mid'
	{
		echo "<td class='rate-value'>Kupno</td>";
		echo "<td class='rate-value'>Sprzedaż</td>";
	}
	else
	{
		echo "<td class='rate-value'>Kurs do PLN</td>";
	}
	echo "</tr>";
	
	for($i = 0; $i<$table->getElementsByTagName('Rate')->length; $i++)
	{
		echo "<tr class='rate'>";
		echo "<td class='rate-currency'>".$table->getElementsByTagName('Currency')->item($i)->nodeValue."</td>";
		echo "<td class='rate-code'>".$table->getElementsByTagName('Code')->item($i)->nodeValue."</td>";
		if($table_name == 'C')  //In table C we have column one more column - 'ask'
		{
			echo "<td class='rate-value'>".$table->getElementsByTagName('Bid')->item($i)->nodeValue."</td>";
			echo "<td class='rate-value'>".$table->getElementsByTagName('Ask')->item($i)->nodeValue."</td>";
		}
		else
		{
			echo "<td class='rate-value'>".$table->getElementsByTagName('Mid')->item($i)->nodeValue."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}


//main function
if(!isset($_GET['action'])) //check wherter action to perform was specified
{
	die();
}
else
{
	$action = $_GET['action'];
	switch ($action) 
		{
			case 'show':
				echo "<html>";
				echo "<head>";
			    echo "<link rel='stylesheet' type='text/css' media='screen' href='/public/styles/style.css' />"; 
				echo "<script src='/phpzadanie/public/scripts/script.js'></script>";
				echo "</head>";
				echo "<body>";
				echo "<H1>Kursy walut z NBP &nbsp;<button class='button' type='submit' id='btn-store' onclick=\"document.location.href ='/application/nbp_currencies.php?action=store';\">Zapisz</button></form></H1>";
				$was_load_ok = load_from_NBP();
				if($was_load_ok == true) //check wheter data from NBP was loaded correctly
				{
					DrawTable($tableA);  //Drawing tables on webpage
					echo "<p>&nbsp;</p>";
					DrawTable($tableB);  //Drawing tables on webpage
					echo "<p>&nbsp;</p>";
					DrawTable($tableC);  //Drawing tables on webpage
				}
				else
				{
					echo "<H1>Niestety nie uda&#322;o sie pobra&#263; aktualnych kurs&#243;w walut ze strony NBP, spr&#243;buj ponownie p&#243;&#378;niej</H1>".$was_load_ok;
				}	
				echo "</body>";
				echo "</html>";
				break;
			case 'store':
				$was_load_ok = load_from_NBP();
				if($was_load_ok == true) //check wheter data from NBP was loaded correctly
				{
					echo "<H1>Aktualne kursy walut zosta&#322;y pobrane ze strony NBP</H1>";
					$was_saved_A = store_to_db($tableA);
					$was_saved_B = store_to_db($tableB);
					$was_saved_C = store_to_db($tableC);
					if($was_saved_A == true && $was_saved_B == true && $was_saved_C == true) //check wheter data was saved to mysql database correctly
					{
						echo "<H1>Aktualne kursy walut zosta&#322;y zapisane do bazy danych</H1>";
					}
					else
					{
						echo "<H1>Niestety nie uda&#322;o sie zapisa&#263; aktualnych kurs&#243;w walut do bazy, spr&#243;buj ponownie p&#243;&#378;niej</H1>";
					}
				}	
				break;
		}
}
?>