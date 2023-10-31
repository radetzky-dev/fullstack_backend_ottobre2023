<?php
require_once "inc/connection_data.php";
require_once 'vendor/autoload.php';
use UAParser\Parser;
use Detection\MobileDetect;

// Ottieni il parametro 'libro' dall'URL
$bookTitle = $_GET['id'];
$connection = connectToDB($config);
$link = "errorpage.php";
if ($connection) {
    $link = "";
    $title = "-";
    $sql = "SELECT title, booklink FROM books where id=" . $_GET['id'];
    $result = runQuery($sql, $connection);
    while ($row = $result->fetch_assoc()) {
        $link = $row["booklink"];
        $title = $row["title"];
    }
    // echo "Per il <b>$title</b> link da caricare $link<br>";
}

// Ottieni la data e l'ora corrente in formato italiano
date_default_timezone_set('Europe/Rome');
$currentDateTime = date('d/m/Y H:i:s');

$ua = $_SERVER['HTTP_USER_AGENT'];
$parser = Parser::create();
$result = $parser->parse($ua);
$detect = new MobileDetect();
$detect->setUserAgent($ua);
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');


$sql = "INSERT INTO stats (book_id,browser, browser_v,so,so_v,c_type,device_type,ip,refer,qstring) VALUES (" . $_GET['id'] . ",'" . $result->ua->family . "','" . $result->ua->toVersion() . "','" . $result->os->family . "','" . $result->os->toVersion() . "','" . $result->device->family . "','" . $deviceType . "','" . $_SERVER['REMOTE_ADDR'] . "','" . $_SERVER['HTTP_REFERER'] . "','" . $_SERVER['QUERY_STRING'] . "')";

//var_dump($sql);

//SCRIVERE NEL DB
$result = runQuery($sql, $connection);

if ($connection) {
    closeConnection($connection);
}

header("Location: " . $link);

