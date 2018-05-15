<?php
class fibonacci
{
	public $original = array(8,7,9,2,4,5,6,3,1,28,10,15,27,38,22,11,17,29,65,30,21,22,26,29,19);
	public $serieFibonacci = array();

	public function calcularSerie()
	{
		array_push($this->serieFibonacci,$this->original[0]);
		for($i = 1; $i < 25; $i++)
		{
			array_push($this->serieFibonacci, $this->serieFibonacci[$i-1] + $this->original[$i]);						 
		}	
	}
								  
	public function mostrarArrays()
	{
		echo "Original: ";
		for($i = 0; $i < 25; $i++)
		{
			echo $this->original[$i].", ";						 
		}
		
		echo "<br>Fibonacci: ";
		for($i = 0; $i < 25; $i++)
		{
			echo $this->serieFibonacci[$i].", ";						 
		}
	}
}

$a = new fibonacci();
$a->calcularSerie();
$a->mostrarArrays();

?>
