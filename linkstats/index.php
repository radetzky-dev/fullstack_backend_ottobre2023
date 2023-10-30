<?php
require_once "inc/connection_data.php";
require_once 'vendor/autoload.php';
use UAParser\Parser;
use Detection\MobileDetect;


// Ottieni il parametro 'libro' dall'URL
$bookTitle = $_GET['id'];
$connection = connectToDB($config);
if ($connection) {
    $link="";
    $title="-";
    $sql = "SELECT title, booklink FROM books where id=". $_GET['id'];
    $result = runQuery($sql, $connection);
    while ($row = $result->fetch_assoc()) {
        $link = $row["booklink"];
        $title = $row["title"];
    }

    echo "Per il <b>$title</b> link da caricare $link<br>";
}


// Ottieni la data e l'ora corrente in formato italiano
date_default_timezone_set('Europe/Rome');
$currentDateTime = date('d/m/Y H:i:s');

$ua = $_SERVER['HTTP_USER_AGENT'];

$parser = Parser::create();
$result = $parser->parse($ua);

print $result->ua->family; // Safari
echo "<br>";
print $result->ua->toVersion(); // 6.0.2
echo "<br>";

print $result->os->family; // Mac OS X
echo "<br>";
print $result->os->toVersion(); // 10.7.5
echo "<br>";

print $result->device->family; // Other
echo "<br>";

$detect = new MobileDetect();
$detect->setUserAgent($ua);
// Finally, check for "mobile".
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
echo "Device $deviceType<br>";

echo "IP " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "REF " . $_SERVER['HTTP_REFERER'] . "<br>";
echo "REF " . $_SERVER['QUERY_STRING'] . "<br>";
echo "Book " . $bookTitle . "<br>";

$date = date('d-m-Y'); // Ottiene la data corrente nel formato "YYYY-MM-DD"
$time = date('H:i:s'); // Ottiene l'ora corrente nel formato "HH:MM:SS"

echo "Date " . $date . "<br>";
echo "Time " . $time . "<br>";


//TODO insert dei parametri DA COMPLETARE
$sql = "INSERT INTO stats (book_id,browser, browser_v) VALUES (".$_GET['id'].",'".$result->ua->family."','".$result->ua->toVersion()."')";

var_dump($sql);

//$result = runQuery($sql, $connection);


if ($connection) {
    closeConnection($connection);
}


die();
//SCRIVERE NEL DB


//leggere destinazione da db
// Controlla se il titolo del libro esiste nella mappatura
if (array_key_exists($bookTitle, $bookToUrlMap)) {
    // Se esiste, reindirizza all'URL corrispondente
    header("Location: " . $bookToUrlMap[$bookTitle]);
    exit();
} else {
    // Se non esiste, reindirizza a una pagina di errore o gestisci l'errore in altro modo
    header("Location: errorPage.php");
    exit();
}
