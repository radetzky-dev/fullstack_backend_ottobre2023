<?php

if ($_POST) {

    $output_format = 'j-m-Y';
    $utc_output_format = 'j-m-Y'; // UTC



    $sDateString = $_POST['date'];

    if (!empty($sDateString)) {
        echo 'Data arrivata: ' . $sDateString . "<br>";

        try {
            $sDate = new DateTime($sDateString);
            $sDate->setTimezone(new DateTimeZone('Europe/Rome'));
        } catch (Exception $e) {
            echo 'Formato della data invalido: ' . $e;
            exit;
        }

        // No __toString() for this object...
        echo 'Data corrente: ' . $sDate->format($output_format) . "<br>";
        $startDate = $sDate;

        $ten_days =10;
        $interval_format = "P{$ten_days}D";
        $startDate->add(new DateInterval($interval_format));
        $startDate->setTimezone(new DateTimeZone('UTC'));
        echo 'Data fra 10 giorni: ' . $startDate->format($utc_output_format) . "<br>";

        // Add 3 weeks and display in UTC format
        $weeks_to_add = 3;
        $interval_format = "P{$weeks_to_add}W";
        $sDate->add(new DateInterval($interval_format));
        $sDate->setTimezone(new DateTimeZone('UTC'));
        echo 'Data dopo altre 3 settimane: ' . $sDate->format($utc_output_format) . "<br>";



    } else {
        echo 'Data vuota';
    }
}

?>

<html>
    <body>
    <form method="post">
    Date: <input type="text" name="date" maxlength="20" />
    <br />
    <input type="submit" value="Submit" />
  </form>
