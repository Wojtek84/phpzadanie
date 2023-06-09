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
			<H1>Historia wykonywanych przeliczeń walut</H1>
			<p>&nbsp;</p>
			<table cellpadding='0' cellspacing='0'>
				<tr class='rate-header'>
					<td class='rate-value'>Data</td>
					<td class='rate-code'>Waluta źródłowa</td>
					<td class='rate-code'>Waluta docelowa</td>
					<td class='rate-value'>Kwota</td>
					<td class='rate-value'>Kurs</td>
					<td class='rate-value'>Wynik</td>
				</tr>
				<?php
					load_history();
				?>
			</table>
		</div>
	</body>
<html>