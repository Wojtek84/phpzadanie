<?php

class Currency {
    private $name;
    private $code;
    private $mid;
	private $value;
	
	public function exchange($currency)
	{
		//check whether bid is non zero to avoid division by zero
		if($this->mid == 0)
		{
		return 0;
		}
		
		//calculate rate between currencies
		$rate =  $currency->mid / $this->mid;
		
		//calculate value after exchange
		$this->value = $currency->value * $rate;
		
		return $rate;
	}
	
	public function __construct($args, $budget)
	{
		$this->name = $args['currency'];
		$this->code = $args['code'];
		$this->mid = $args['mid'];
		$this->value = $budget;
	}
	
	public function print_currency()
	{
		return round($this->value, 2)." (".$this->code.")";
	}
	
	public function print_rate($budget)
	{
		return round($budget, 4)." ".$this->code;
	}
	
	public function store_exchange($currency_to, $rate)
	{
		$op_date = date("Y-m-d");
		$sql_string = "INSERT INTO table_history (operation_date, currency_from, currency_to, budget, rate, result) VALUES ('".$op_date."', '".$this->code."', '".$currency_to->code."', ".$this->value.", ".$rate.", ".$currency_to->value.");";
		return $sql_string;
	}
}

?>