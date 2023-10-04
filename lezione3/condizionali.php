<?php

//ternary condition
$marks = 399;
echo ($marks >= 40) ? "pass" : "Fail";

echo "<hr>";
$is_user_logged_in = true;

$title = $is_user_logged_in ? 'Logout' : 'Login';

echo "Action: $title";

$v = 1;

$r = (1 == $v) ? 'Yes' : 'No'; // $r is set to 'Yes'

echo $r . "<br>";

echo "<hr>";
//if
$a = 7;
$b = 5;
$c = "7";

if ($a) {
    echo "sempre true<br>";
}

if ($a > $b) {
    echo "a is bigger than b<br>";
}

$a = 4;
if ($a > $b) {
    echo "a is greater than b<br>";
} else {
    echo "ELSE a is NOT greater than b<br>";
}

if ($a == $c) {
    echo "Uguali ma non identici<br>";
}

if ($is_user_logged_in) {
    echo "Utente loggato<br>";
}

echo "<hr>";
//else if

$t = date("H");

if ($t < "10") {
    echo "Have a good morning!";
} elseif ($t>="10" && $t < "11") {
    echo "Ora del caffè";
} elseif ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}

echo "<hr>";
$b = 4;
if ($a > $b) {
    echo "a is greater than b<br>";
} elseif ($a == $b) {
    echo "ELSE IF sono uguali <br>";
} else {
    echo "ELSE a is NOT greater than b<br>";
}

echo "<hr>";
//switch
$i = 22;
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
    case 7:
        echo "i equals 1 o a 7";
        break;
    case 2:
    case 9:
        echo "i equals 2 o a 9";
        break;
    default:
        echo "i diversi da tutti";
}
