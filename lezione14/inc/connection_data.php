<?php
//Vars -> mettere in un file a parte
$host = "localhost";
$port = "3306";
$dbName = "students";
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


/**
 * connectDb
 *
 * @param  mixed $config
 * @return PDO
 */
function connectDb($config): PDO|null
{
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
        //echo "Impossibile connettersi " . $exception->getMessage();
        return null;
    }
}

function closeDbConnection(PDO $connection)
{
    return $connection = null;
}