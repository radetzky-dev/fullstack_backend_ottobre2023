<?php
echo 'Current PHP version: ' . phpversion();

$number = cal_days_in_month(CAL_GREGORIAN, 6, 2023); // 31
echo "<br>There were {$number} days in giugno 2003";


$var = 'test';
//echo "This var is set so I will print $var.";

unset($var);

//$var = null;

// This will evaluate to TRUE so the text will be printed.
if (isset($var)) {
    echo "This var is set so I will print $var.";
}

echo "<hr>";
$var = "";

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all';
}
echo "<hr>";
// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set ';
}
echo "<hr>";