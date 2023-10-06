<?php
echo "In secondi dal 1970<br>";
echo 'Now: '. time();

echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";

echo "<hr>";


echo date('l jS \of F Y h:i:s A');
echo "<hr>";
echo date("l");
echo "<hr>";
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));
echo "<hr>";
$tomorrow  = date("l j F Y",mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
echo "DOMANI ".$tomorrow."<br>";
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
echo $nextyear."<br>";
echo "<hr>";
$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
$today = date("d.m.y");                         // 03.10.01
echo "Oggi in formato italiano ".$today."<br>";
$today = date("j, n, Y");                       // 10, 3, 2001
$today = date("dmY");                           // 20010310
echo "Oggi in formato italiano ".$today."<br>";
$today = date("d-m-Y H:i");                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)
echo "Oggi in formato italiano ".$today."<br>";
$ora = date("H:i");
echo "Sono le ".$ora."<br>";
echo "Ottobre 6, 2023 is on a " . date("l", mktime(0, 0, 0, 10, 6, 2023));
echo "<hr>";
$today = getdate();
echo "<pre>";
print_r($today);
echo "</pre>";

echo $today['mday']."-".$today['mon']."-".$today['year']."<br>";
echo "<hr>";
echo "<hr>";
echo "<hr>";
echo "<hr>";



