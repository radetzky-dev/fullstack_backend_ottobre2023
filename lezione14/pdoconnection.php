<?php
require_once "inc/connection_data.php";

$connection = connectDb($config);

if ($connection) {
    echo "Connessione avvenuta con successo!<br>";
    //TODO qui possiamo compiere operazioni sul database

    $connection = closeDbConnection($connection);
    if (is_null($connection)) {
        echo "Disconnesso con successo<br>";
    }
} else {
    echo "Impossibile connettersi al DB!<br>";
}

