<?php

function getBirthdayCountdown(DateTime $birthdate): DateInterval
{

    $today = new DateTime('now');
    $todayYear = (int) $today->format('Y');
    $todayMonth = (int) $today->format('n');
    $todayDay = (int) $today->format('j');

    $birthday = new DateTime();
    $birthdayDay = (int) $birthdate->format('j');
    $birthdayMonth = (int) $birthdate->format('n');

    //in questi due casi ha già compiuto gli anni quest'anno
    if ($birthdayMonth < $todayMonth) {
        $todayYear++;
    }

    if ($birthdayMonth == $todayMonth && $birthdayDay < $todayDay) {
        $todayYear++;
    }

    $birthday->setDate($todayYear, $birthdayMonth, $birthdayDay);

    return $birthday->diff($today);
}

$dates = [
    '19-9-1970',
    '20-9-1980',
    '21-12-1980',
    '28-11-1980',
    '12-10-1990',
    '21-10-1980',
    '1-2-1980',
    '07-10-1990',
];

foreach ($dates as $date) {
    $interval = getBirthdayCountdown(
        DateTime::createFromFormat('j-n-Y', $date));
    $suffix = $interval->days > 1 ? 'i' : 'o';
    $prefix = $interval->days > 1 ? 'no' : '';

    echo 'Sie nato il '.$date.' e al tuo compleanno manca'.$prefix.' ' . $interval->days . ' giorn' . $suffix.'<br>';
}
