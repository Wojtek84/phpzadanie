<?php
	//requires filesi
	include 'currency.php';
	include 'db_currencies.php';
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Kursy Walut</title>
		<script src="/public/scripts/script.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="/public/styles/style.css" /> 
	</head>
	<body>
			<div id='content' class='content'>
				<H1>Kalkulator walut na podstawie kursów średnich w NBP</H1>
				<form name='calculator' class='calculoator' method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
						<label for="budget">Kwota: </label>
						<input type="number" name="budget" id="budget" pattern='[0-9,]{1,}' step="0.01" placeholder="np. 100 lub 12.75" required>&nbsp;
						<label for="currency_from">Waluta: </label>
						<select name='currency_from' id='currency_from' required>
							<?php load_currencies(); //load all currencies from database to combobox ?> 
						</select>&nbsp;
						<input type="button" name="switch" onclick='switch_currencies();' value='<- ->' >&nbsp;
						<label for="currency_to">Przelicz na: </label>
						<select name='currency_to' id='currency_to' required>
							<?php load_currencies(); //load all currencies from database to combobox ?> 
						</select>&nbsp;
						<input type="submit" value="Przelicz">
                        <p>&nbsp;</p>
						<label for="result">Wynik: </label>
						<div class='result'>
						<?php
							if(isset($_POST['budget'])) //Check whether form was sumbitted
							{
								//loading selectd currencies from database
								$curr_f_arr = load_currency_data($_POST['currency_from']);
								$curr_t_arr = load_currency_data($_POST['currency_to']);
								
								//check wheter data was loaded correctly
								if($curr_f_arr != null && $curr_t_arr != null)
								{
									//Creating class instances for currencies
									$currency_from = new Currency($curr_f_arr, $_POST['budget']);
									$currency_to = new Currency($curr_t_arr, 0);
									
									//Calculating exchange
									$rate = $currency_to->exchange($currency_from);
								
									//Display result for user
									echo "<span style='color: blue; font-weight: bold; font-size: 1.5em;'>".$currency_from->print_currency()." = ".$currency_to->print_currency()."</span>";
									echo "<span style='color: black; font-size: 1.2em;'> (kurs średni: ".$currency_from->print_rate(1)." = ".$currency_to->print_rate($rate).")</span>"; 
									
									//store to database as history
									$sql_string = $currency_from->store_exchange($currency_to, $rate);
									store_history($sql_string);
								}
								else
								{
									echo "Wystąpił problem z połączeniem do bazy danych, spróbuj ponownie później";
								}
							}
						?>
						</div>
				</form>
			</div>
			<?php
				//if form was submited before its time to set form fields to previous state instead of default values
					if(isset($_POST['budget'])) //Check whether form was sumbitted
					{
						echo "<script>set_form(".$_POST['budget'],", '".$_POST['currency_from']."', '".$_POST['currency_to']."');</script>";
					}
			?>
	</body>
<html>