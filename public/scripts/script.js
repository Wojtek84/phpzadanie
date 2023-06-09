
function open_page(name) //loading selected page to iframe
{
	var new_url = "./" + name;
	iframe = document.getElementById("main-frame");
	iframe.src = new_url;
}

function switch_currencies() //switching currencies in calculator form
{
	var currency_from = document.getElementById("currency_from").value;
	var currency_to = document.getElementById("currency_to").value;
	document.getElementById("currency_from").value = currency_to;
	document.getElementById("currency_to").value = currency_from;
}

function set_form(budget, currency_from, currency_to)
{
	document.getElementById("budget").value = budget;
	document.getElementById("currency_from").value = currency_from;
	document.getElementById("currency_to").value = currency_to;
}