<?php
require_once "inc/connection_data.php";

$connection = connectDb($config);

if ($connection) {
    echo "Connessione avvenuta con successo!<br>";
    //TUTTI I VALORI
    $sql = "SELECT * FROM student";
    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute();
    $records = $sth->fetchAll();
    foreach ($records as $record) {
        echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
    }

    //SINGOLO VALORE
    $sql = "SELECT count(*) as TOTALE_STUDENTI FROM student";
    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute();
    //un solo risultato
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    echo "Totale studenti: " . $result['TOTALE_STUDENTI'] . "<br>";

    //SINGOLA COLONNA
    $sth = $connection->prepare("SELECT name, advisor_id FROM student");
    $sth->execute();
    $result = $sth->fetchColumn();
    echo "(prima riga, prima colonna) name = $result<br>";

    $result = $sth->fetchColumn(1);
    echo "(seconda riga, seconda colonna) advisor_id = $result<br>";

    $connection = closeDbConnection($connection);
    if (is_null($connection)) {
        echo "Disconnesso con successo<br>";
    }
} else {
    echo "Impossibile connettersi al DB!<br>";
}

