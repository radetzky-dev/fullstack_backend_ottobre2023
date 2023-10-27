<?php
require_once "inc/connection_data.php";

$connection = connectToDB();

if ($connection) {
    echo "Conesso correttamente al database!<br>";

    //TODO compio le varie operazioni

    closeConnection($connection);
}