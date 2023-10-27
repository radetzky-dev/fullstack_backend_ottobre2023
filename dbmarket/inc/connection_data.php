<?php

//Vars che servono per la connessione
$host = "localhost";
$port = "3306";
$dbName = "jsonmusicmarket";
$user = "root";
$password = "";

//Config class for connection
$config = new stdClass();
$config->host = $host;
$config->port = $port;
$config->db = $dbName;
$config->user = $user;
$config->password = $password;
$config->options = [];

function connectToDB(stdClass $config): mysqli|null
{
    try {
        //$mysqli = new mysqli("127.0.0.1", "user", "password", "database", 3306);
        return new mysqli($config->host, $config->user, $config->password, $config->db, $config->port);

    } catch (Exception $e) {

        echo "Errore di connessione " . $e->getMessage();
        return null;
    }
}

function closeConnection(mysqli $connection): void
{
    $connection->close();
    //echo "Connessione chiusa<br>";
}