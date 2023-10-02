<?php

$a = 10.81;
$c = -15;
$d = 1;

var_dump($a);

function sum($a, $b)
{
    $myName = "Mario";

    var_dump($myName);

    $mySurname = "Rossi";
    global $c;
    echo 'Ciao sono ' . $myName . " " . $mySurname.'<br>';

    return $a + $b + $c + $GLOBALS['d'];
}

function testStatic()
{
    static $num = 10;
    echo $num;
    $num++;
}

echo sum($a, 10);
echo "<hr>";
testStatic();
echo "<hr>";
testStatic();
echo "<hr>";
testStatic();
echo "<hr>";
testStatic();
