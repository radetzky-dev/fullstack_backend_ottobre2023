<?php

$a = array("a" => "apple", "b" => "banana", "z" => "pesca");
$b = array("h" => "melone", "a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b: \n";
var_dump($c);

echo "<hr>";
$c = $b + $a; // Union of $b and $a
echo "Union of \$b and \$a: \n";
var_dump($c);

$a = array("apple", "banana");
$b = array(1 => "banana", "0" => "apple");

var_dump($a == $b); // bool(true)
var_dump($a === $b); // bool(false)

var_dump($a != $c);

var_dump($a !== $b); // bool(false)