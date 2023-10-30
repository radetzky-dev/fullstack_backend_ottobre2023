<?php
$myClass = new stdClass();
$myClass->name = "Paolo";
var_dump($myClass);
echo "<hr>";
$data = serialize($myClass);
var_dump($data);
echo "<hr>";
$test = unserialize($data);
var_dump($test);

echo "<hr>";
echo "array";
echo "<hr>";


$myObj = array("Red", "Green", "Blue");
var_dump($myObj);
echo "<hr>";
$data = serialize($myObj);
var_dump($data);

//qui lo scrivo in un file

echo "<hr>";
$test = unserialize($data);
var_dump($test);