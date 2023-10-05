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

$values = array(false, true, null, 'abc', '23', 23, '23.5', 23.5, '', ' ', '0', 0);
foreach ($values as $value) {
    echo "is_string(";
    var_export($value);
    echo ") = ";
    echo var_dump(is_string($value));
    echo "<br>";
}
echo "<hr>";
$values = array(23, "23", 23.5, "23.5", null, true, false);
foreach ($values as $value) {
    echo "is_int(";
    var_export($value);
    echo ") = ";
    var_dump(is_int($value));
    echo "<br>";
}

echo "<hr>";

$yes = array('this', 'is', 'an array', 2, true);

echo is_array($yes) ? 'Array' : 'not an Array';
echo "<br>";

$no = 'this is a string';

echo is_array($no) ? 'Array' : 'not an Array';

echo "<hr>";
function get_students($obj)
{
    if (!is_object($obj)) {
        return false;
    }

    return $obj->students;
}

// Declare a new class instance and fill up
// some values
$obj = new stdClass();
$obj->students = array('Kalle', 'Ross', 'Felipe');

var_dump(get_students(null));
echo "<hr>";
var_dump(get_students($obj));

echo "<hr>";
$a = false;
$b = 0;

// Since $a is a boolean, it will return true
if (is_bool($a) === true) {
    echo "Yes, this is a boolean<br>";
}

// Since $b is not a boolean, it will return false
if (is_bool($b) === false) {
    echo "No, this is not a boolean<br>";
}

$foo = null;
var_dump(is_null($foo));

echo "<hr>";

function someFunction()
{
    echo "Funzione chiamata!<br>";
}

$functionVariable = 'someFunction';

if (is_callable($functionVariable, false, $callable_name)) {
    someFunction();
}

class StrValTest
{
    public function __toString()
    {
        return __CLASS__;
    }
}

// Prints 'StrValTest'
echo strval(new StrValTest);


echo "<hr>";
$myVar = "5";
echo "<br>START Variabile $myVar";
echo gettype($myVar);
echo "<hr>";
echo settype($myVar,"integer");
echo gettype($myVar);

echo "<br>FINISH Variabile $myVar";

echo "<hr>";
$myVar = "61adfsdf";
echo "<br>START Variabile $myVar";

echo gettype($myVar);
echo "<hr>";
echo settype($myVar,"integer");
echo gettype($myVar);

echo "<br>FINISH Variabile $myVar";

echo "<hr>";
$data = array(1, 1., NULL, new stdClass, 'foo');

foreach ($data as $value) {
    echo gettype($value), "<br>";
}
