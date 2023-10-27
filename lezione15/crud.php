<?php
require_once "inc/connection_data.php";

$connection = connectToDB();

if ($connection) {
    $stmt = $connection->prepare("insert into classes (room) VALUES (?)");

    $room = "148-78";
    $stmt->execute([$room]);
    echo "Inserimento avvenuto con successo!<br>";

    closeConnection($connection);
}