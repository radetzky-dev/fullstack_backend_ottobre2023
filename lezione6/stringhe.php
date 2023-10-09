<?php

$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain; // prints @example.com

echo "<hr>";
$user = strstr($email, '@', true);
echo $user; // prints name

echo "<hr>";
$email  = 'name.surnameMIOexample.com';
$domain = strstr($email, 'MIO');
echo $domain; // prints @example.com

echo "<hr>";
$user = strstr($email, 'MIO', true);
echo $user; // prints name