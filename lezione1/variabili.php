<?php

$a = 10;
$c = 15;
$d = 1;

function sum($a, $b)
{
    global $c;

    return $a + $b + $c + $GLOBALS['d'];
}
echo sum($a, 10);
