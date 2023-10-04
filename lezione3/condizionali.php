<?php

//ternary condition
$marks = 399;
echo ($marks >= 40) ? "pass" : "Fail";

echo "<hr>";
$is_user_logged_in = true;

$title = $is_user_logged_in ? 'Logout' : 'Login';

echo "Action: $title";

echo "<hr>";
//if
$a = 7;
$b = 5;
$c = "7";

if ($a > $b) {
    echo "a is bigger than b<br>";
}

if ($a == $c) {
    echo "Uguali ma non identici<br>";
}

if ($is_user_logged_in) {
    echo "Utente loggato<br>";
}