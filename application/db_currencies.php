<?php
function load_history()
{
	//load database configuration
	include '../config/db_config.php';
	
	//Check wheter we can connect to mysql database
	try {
			$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return null;
		}

	//colletc all currencies
	$result = mysqli_query($db, "SELECT * FROM table_history;");
	
	//Print rows
	while($row = $result->fetch_assoc())
	{
		echo "<tr class='rate'><td class='rate-value'>".$row['operation_date']."</td><td class='rate-code'>".$row['currency_from']."</td><td class='rate-code'>".$row['currency_to']."</td><td class='rate-value'>".$row['budget']."</td><td class='rate-value'>".$row['rate']."</td><td class='rate-value'>".$row['result']."</td></tr>";
	}
}

function store_history($sql)
{
	//load database configuration
	include '../config/db_config.php';
	
	//Check wheter we can connect to mysql database
	try {
			$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return null;
		}

	//colletc all currencies
	$result = mysqli_query($db, $sql);
	
	if(!$result) //store history failed
	{
		echo " | wystąpił problem z zapisem przeliczenia do bazy";
	}
}

function load_currency_data($code) //loads data of selected currency by its code
{
	//load database configuration
	include '../config/db_config.php';
	
	//Check wheter we can connect to mysql database
	try {
		$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return null;
		}

	//connecting to database and colletc all currencies
	$sql_string = "SELECT * FROM view_currencies WHERE code = '".$code."';";
	$result = mysqli_query($db, $sql_string);
	
	$row = $result->fetch_row();
	$currency_data['currency'] = $row[1];
	$currency_data['code'] = $row[2];
	$currency_data['mid'] = $row[3];
	
	$result->free();
	mysqli_close ($db);
	return $currency_data;
}


function load_currencies()//loads all currency names and codes to list in combno
{
	//load database configuration
	include '../config/db_config.php';

	//Check wheter we can connect to mysql database
	try {
			$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return false;
		}

	//connecting to database and colletc all currencies
	$sql_string = "SELECT code, currency FROM view_currencies ORDER BY 1;";
	$result = mysqli_query($db, $sql_string);

	//Adding currencies to combo
	while($row = $result->fetch_assoc())
	{
		echo "<option value='".$row["code"]."'>(".$row["code"].") ".$row["currency"]."</option>";
	}
	
	//Close connection to database
	$result->free();
	mysqli_close ($db);
	return true;
}

function load_table($table_name)
{
	//load database configuration
	include '../config/db_config.php';

	//Check wheter we can connect to mysql database
	try {
			$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		} catch (Exception $e) {
			return false;
		}

	//Colletcing all currencies
	$sql_string = "SELECT table_info.no, table_info.effectivedate, ".$table_name.".* FROM table_info, ".$table_name." WHERE table_info.tablename = '".$table_name."' and ".$table_name.".code <> 'PLN';";
	$result = mysqli_query($db, $sql_string);

	//printing table for user
	$info = $result->fetch_assoc();
	echo "<H2>Tabela ".strtoupper(substr($table_name, -1))." z dnia ".$info['effectivedate']." (".$info['no'].")</H2>";
	echo "<table cellpadding='0' cellspacing='0'>";
	echo "<tr class='rate-header'>";
	echo "<td class='rate-currency'>Waluta</td>";
	echo "<td class='rate-code'>Kod</td>";
	if($table_name == 'table_c')  //In table C we have column 'bid' & 'ask" instead of 'mid'
	{
		echo "<td class='rate-value'>Kupno</td>";
		echo "<td class='rate-value'>Sprzedaż</td>";
	}
	else
	{
		echo "<td class='rate-value'>Kurs do PLN</td>";
	}
	echo "</tr>";
	
	while ($row = $result->fetch_assoc())
	{
		echo "<tr class='rate'>";
		echo "<td class='rate-currency'>".$row['currency']."</td>";
		echo "<td class='rate-code'>".$row['code']."</td>";
		if($table_name == 'table_c')  //In table C we have column one more column - 'ask'
		{
			echo "<td class='rate-value'>".$row['bid']."</td>";
			echo "<td class='rate-value'>".$row['ask']."</td>";
		}
		else
		{
			echo "<td class='rate-value'>".$row['mid']."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";	
	$result->free();
	mysqli_close ($db);
}
?>