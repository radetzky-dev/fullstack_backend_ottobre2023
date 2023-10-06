<?php

function getBirthdayCountdown(DateTime $birthdate): DateInterval{
 //ToDo testare

}

$dates = [
	'19-9-1970',
	'20-9-1980',
	'21-12-1980',
	'28-11-1980',
	'12-10-1990',
	'21-10-1980',
	'1-2-1980',
	'29-2-1980'
	];

foreach ($dates as $date){
	$interval = getBirthdayCountdown(
		DateTime::createFromFormat('j-n-Y', $date));
	$suffix = $interval->days > 1 ? 'i' : 'o';
	echo PHP_EOL;
	echo 'Al tuo compleanno manca ' . $interval->days . ' giorn' . $suffix;
}