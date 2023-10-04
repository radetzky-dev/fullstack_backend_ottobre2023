<?php

//ternary condition
$marks=399;
echo ($marks>=40) ? "pass" : "Fail";

echo "<hr>";
$is_user_logged_in = false;

$title = $is_user_logged_in ? 'Logout' : 'Login';

echo "Action: $title";