
<h2>Esempi sugli array</h2>
<?php

//inizia da 0
$myVar = "Skoda";

$cars = array ("Volvo", "Ferrari", "Fiat","Saab",12, true,33.4, $myVar);

//stampa il contenuto dell'array

echo "La tua auto è una ". $cars[1]."<br>";
echo "La tua auto è una ". $cars[3]."<br>";
echo "La tua auto è una ". $cars[7]."<br>";

var_dump ($cars);

echo "<hr>";
$array = array(1, 2, 3, 4,5, 8 => "mario",  4 => "quarta", 19, 3 => 13);
print_r($array);

echo "Stampa la posizione 4 ".$array[4]."<br>";
echo "Stampa la posizione 3 ".$array[3]."<br>";


//se vuoi che cominci da uno
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);

$foo = array('bar' => 'baz', 'mario' => 'Rossi', "Bianchi");
print_r($foo);

echo "Hello {$foo['bar']}!<br>"; // Hello baz!
echo "Cognome {$foo['mario']}!<br>";
echo "Test ".$foo[0]."<br>";