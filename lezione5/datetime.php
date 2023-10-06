<?php

echo "In secondi dal 1970<br>";
echo 'Now: ' . time();

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
$tomorrow = date("l j F Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
echo "DOMANI " . $tomorrow . "<br>";
$nextyear = mktime(0, 0, 0, date("m"), date("d"), date("Y") + 1);
echo $nextyear . "<br>";
echo "<hr>";
$today = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm
$today = date("d.m.y"); // 03.10.01
echo "Oggi in formato italiano " . $today . "<br>";
$today = date("j, n, Y"); // 10, 3, 2001
$today = date("dmY"); // 20010310
echo "Oggi in formato italiano " . $today . "<br>";
$today = date("d-m-Y H:i"); // 2001-03-10 17:16:18 (the MySQL DATETIME format)
echo "Oggi in formato italiano " . $today . "<br>";
$ora = date("H:i");
echo "Sono le " . $ora . "<br>";
echo "Ottobre 6, 2023 is on a " . date("l", mktime(0, 0, 0, 10, 6, 2023));
echo "<hr>";
$today = getdate();
echo "<pre>";
print_r($today);
echo "</pre>";

echo $today['mday'] . "-" . $today['mon'] . "-" . $today['year'] . "<br>";
echo "<hr>";

$italian_timezone = new DateTimeZone("Europe/Rome");
$utc_timezone = new DateTimeZone("UTC");
$tallinn_timezone = new DateTimeZone("Europe/Tallinn");
// Create a new DateTime object in the UTC format

$datetime = new DateTime("2023-01-01 11:00:00", $utc_timezone);
// Convert the DateTime object to the timezone of Tallinn
$datetime->setTimezone($tallinn_timezone);
// Display the result in the YYYY-MM-DD HH:MM:SS format
echo "TALLIN " . $datetime->format('Y-m-d H:i:s') . '<br>';

// Convert the DateTime object to the timezone of Tallinn
$datetime->setTimezone($italian_timezone);
// Display the result in the YYYY-MM-DD HH:MM:SS format
echo "ROMA " . $datetime->format('Y-m-d H:i:s') . '<br>';

echo "<hr>";

echo "DATETIME<br>";
$date = new DateTime();
$tomorrow = $date->modify('+1 day');
echo "OGGI ". $date->format('Y-m-d');
echo " DOMANI ". $tomorrow->format('Y-m-d');

echo "<br>DATETIMEIMMUTABLE<br>";
$date = new DateTimeImmutable();
$tomorrow = $date->modify('+1 day');
echo "OGGI ".$date->format('Y-m-d');
echo " DOMANI ".$tomorrow->format('Y-m-d');


echo "<hr>";

//Le variabili per creare le date https://www.php.net/manual/en/datetimeimmutable.createfromformat.php

$date = DateTimeImmutable::createFromFormat('Ymd', '20231006');
echo $date->format('d-m-Y');
echo "<hr>";

echo 'Current time: ' . date('Y-m-d H:i:s') . "<br>";
$format = 'd-m-Y';
$date = DateTimeImmutable::createFromFormat($format, '15-02-2005');
echo "Format: $format; " . $date->format('d-m-Y H:i:s') . "<br>";

echo "<hr>";
$date = new DateTimeImmutable();
$newDate = $date->setDate(2023,10, 6);
echo $newDate->format('d-m-Y');

echo "<hr>";
$date = new DateTimeImmutable('2001-01-01');

$newDate = $date->setTime(14, 55,19);
echo $newDate->format('Y-m-d H:i:s') . "<br>";

$newDate = $date->setTime(14, 55, 45);
echo $newDate->format('Y-m-d H:i:s') . "<br>";

echo "<hr>";
$date = new DateTimeImmutable('2006-12-12');
$newDate = $date->modify('+1 day');
echo $newDate->format('d-m-Y');

echo "<hr>";

$one_year = new DateInterval('P1Y');
$one_year_ago = new DateTime();

echo $one_year_ago->format('d-m-Y').'<br>';
$one_year_ago->sub($one_year);
echo $one_year_ago->format('d-m-Y').'<br>';
$one_year_ago->add($one_year);
$one_year_ago->add($one_year);
echo $one_year_ago->format('d-m-Y');
echo "<hr>";
echo "<hr>";
echo "<hr>";
