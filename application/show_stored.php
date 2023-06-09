<?php
	//requires filesi
	include 'db_currencies.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Kursy Walut</title>
		<link rel="stylesheet" type="text/css" media="screen" href="/public/styles/style.css" /> 
	</head>
	<body>
		<div id='dashboard' class='dashboard' style="float: left; text-align: left;">
			<H1>Aktualne pobrane kursy walut</H1>
			<p>&nbsp;</p>
			<?php
				load_table('table_a');
				echo "<p>&nbsp;</p>";
				load_table('table_b');
				echo "<p>&nbsp;</p>";
				load_table('table_c');
			?>
		</div>
	</body>
<html>