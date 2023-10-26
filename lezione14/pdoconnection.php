<?php
//Vars

function connectDb(): PDO
{
    $host = "localhost";
    $port = "3306";
    $dbName = "students";
    $user = "root";
    $password = "";

    $config = new stdClass();
    $config->host = $host;
    $config->port = $port;
    $config->db = $dbName;
    $config->user = $user;
    $config->password = $password;
    $config->options = [];

    try {
        $conn = new PDO(
            "mysql:host={$config->host};dbname={$config->db}",
            $config->user,
            $config->password,
            $config->options
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $exception) {
        echo "Impossibile connettersi " . $exception->getMessage();
        exit;
    }
}

$connection = connectDb();

if ($connection) {
    echo "Connessione avvenuta con successo!<br>";
    //qui possiamo compiere operazioni sul database
    $connection = null;
    echo "Disconnesso<br>";
}

