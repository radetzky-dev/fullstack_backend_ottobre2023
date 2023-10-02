<?php

$a = 10;
$c = 15;
$d = 1;

function sum($a, $b)
{
    $myName ="mario";
    global $c;
    echo "Ciao sono $myName";

    return $a + $b + $c + $GLOBALS['d'];
}

function testStatic()
{
    static $num =10;
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
