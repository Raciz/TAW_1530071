<?php
$numeros = array(12,9,17,45,67,15,10,19,25);

echo "Ascendente: ";
sort($numeros);
print_r($numeros);

echo "<br>";

echo "Descendente: ";
rsort($numeros);
print_r($numeros);

echo "<br><br>";

//----------------------------------------------------------------

echo "<b>Francisco Isaac Perales Morales</b>, Cd. Victoria. <br><br>";

//----------------------------------------------------------------
$numeros2 = array(1,2,3,4,5,6,7,8,9,10);

for($i = 0; $i < 10; $i++)
{
	echo $numeros2[$i]."<br>";
}

?>