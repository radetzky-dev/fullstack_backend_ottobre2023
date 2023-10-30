<?php
require_once 'vendor/autoload.php';
use UAParser\Parser;
use Detection\MobileDetect;

// Mappatura dei titoli dei libri agli URL
$bookToUrlMap = array(
    "iomichiamochico" => "https://www.amazon.it/Io-sono-Chico-Francesco-Taverna/dp/8891589748/ref=zg_bs_g_books_sccl_1/258-3209401-9156556?psc=1",
    "friends" => "https://www.amazon.it/%C2%ABFriends%C2%BB-amanti-Terribile-Matthew-Perry/dp/8893951436/ref=zg_bs_g_books_sccl_2/258-3209401-9156556?psc=1",
    "checosavisietepersi" => "https://www.amazon.it/Che-cosa-vi-siete-persi/dp/8817184713/ref=zg_bs_g_books_sccl_7/258-3209401-9156556?psc=1",
    // Aggiungi qui altre mappature
);

// Ottieni il parametro 'libro' dall'URL
$bookTitle = $_GET['libro'];

// Ottieni l'IP del chiamante
$callerIp = $_SERVER['REMOTE_ADDR'];

// Ottieni la data e l'ora corrente in formato italiano
date_default_timezone_set('Europe/Rome');
$currentDateTime = date('d/m/Y H:i:s');

$ua =  $_SERVER['HTTP_USER_AGENT'];

$parser = Parser::create();
$result = $parser->parse($ua);

print $result->ua->family;            // Safari
echo "<br>";
print $result->ua->toVersion();       // 6.0.2
echo "<br>";

print $result->os->family;            // Mac OS X
echo "<br>";
print $result->os->toVersion();       // 10.7.5
echo "<br>";

print $result->device->family;        // Other
echo "<br>";

$detect = new MobileDetect();
$detect->setUserAgent($ua);
// Finally, check for "mobile".
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
echo "Device $deviceType<br>";

echo "IP ".$_SERVER['REMOTE_ADDR']."<br>";
echo "REF ".$_SERVER['HTTP_REFERER']."<br>";
echo "REF ".$_SERVER['QUERY_STRING']."<br>";
echo "Book ".$bookTitle."<br>";

$date = date('d-m-Y'); // Ottiene la data corrente nel formato "YYYY-MM-DD"
$time = date('H:i:s'); // Ottiene l'ora corrente nel formato "HH:MM:SS"

echo "Date ".$date."<br>";
echo "Time ".$time."<br>";


die();
$file = fopen("link_info.txt", "a");
fwrite($file, $data);
fclose($file);


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
