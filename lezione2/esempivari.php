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

?>

<h2>Comparazione</h2>

<?php

$a=10;
$b="10";
$c= 10;
$d = 4;

var_dump($a == $b);
var_dump($a === $b);
var_dump($a === $c);

var_dump($a != $d);

var_dump($a != $b);
var_dump($a !== $b);

var_dump($a > $d);
var_dump($a < $d);
var_dump($a > $b);
var_dump($b >= $a);

var_dump("1" =="01");
var_dump("2" =="000002");

var_dump($a && $b);

$myVar = true;
$otherVar= false;

if($otherVar && $myVar )
{ 
    echo "ok";
}