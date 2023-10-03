<?php

$myVar = null;

if (is_null($myVar))
{
    echo "Variabile senza valore<br>";
}
$hello ="Hello world";

echo "Prima ". $hello;

echo "<br>";

$hello = null;

echo "Ora ".$hello;
?>

<h2>Operatori aritmetici</h2>

<?php
$x=2;
var_dump($x);

$x=$x+2;
echo "x vale ".$x."<br>";
$x++;

$x += 5;

echo "x vale ".$x."<br>";

$x--;
echo "x vale ".$x."<br>";

$x=$x-3;
$x -= 4;
echo "x vale ".$x."<br>";
$x=$x*3;
echo "x vale ".$x."<br>";


$x=$x/2;
echo "x vale ".$x."<br>";
var_dump($x);

echo (5 % 3)."<br>";

