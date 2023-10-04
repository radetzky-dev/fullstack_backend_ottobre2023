<?php

$count =0;

function incrementByCopy(int $valore)
{
    return ++$valore;
}

function incrementByRef (int &$valore)
{
    $valore++;
}

$valore = incrementByCopy($count);
echo "Count $count <br>";
echo "Valore $valore <br>";

incrementByRef($count);
echo "Count $count <br>";
echo "Valore $valore <br>";
incrementByRef($count);
echo "Count $count <br>";


function foo(&$var)
{
    $var++;
}

$a=5; $b=2;
foo($a);
foo($b);
echo $a;
echo "<br>".$b;


