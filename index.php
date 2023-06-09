<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Kursy Walut</title>
		<script src="./public/scripts/script.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="./public/styles/style.css" /> 
	</head>
	<body>
		<div class="page">
			<div class='menu' id='menu'>
				<H1> - MENU - </H1>
				<button class='button' type='button' id='btn-1' onclick="open_page('application/show_stored.php');">Pokaż zapisane kursy walut</button>
				<p>&nbsp;</p>
				<button class='button' type='button' id='btn-2' onclick="open_page('application/calculator.php');">Kalkulator walut</button>
				<p>&nbsp;</p>
				<button class='button' type='button' id='btn-3' onclick="open_page('application/show_history.php');">Historia przeliczania walut</button>
				<p>&nbsp;</p>
				<button class='button' type='button' id='btn-3' onclick="open_page('application/nbp_currencies.php?action=show');" >Pokaż aktualne kursy z NBP</button>
				<p>&nbsp;</p>
				<button class='button' type='button' id='btn-3' onclick="open_page('application/nbp_currencies.php?action=store');" >Zapisz aktualne kursy z NBP</button>
			</div>
			<div id='dashboard' class='dashboard'>
				<iframe id='main-frame' name='main-frame' src='' style='border: 0px dotted navy; height: 96%; width: 98%;'>
			
				</iframe>
			</div>
		</div>
	</body>
<html>