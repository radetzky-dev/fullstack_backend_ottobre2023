<?php
require_once "inc/connection_data.php";

$connection = connectToDB();

if ($connection) {
    $stmt = $connection->prepare("insert into classes (room) VALUES (?)");

    $room = "158-78";
    $stmt->execute([$room]);
    echo "Inserimento avvenuto con successo!<br>";

    //BIND dei parametri
    $stmt = $connection->prepare("insert into student (name,advisor_id,class1,class2,class3) VALUES (?,?,?,?,?)");

    $stmt->bind_param("siiii", $name, $adv_id, $c1, $c2, $c3);
    $name = "Matteo";
    $adv_id = 2;
    $c1 = 2;
    $c2 = 1;
    $c3 = 1;
    $stmt->execute();

    echo "Inserimento avvenuto con successo!<br>";

    closeConnection($connection);
}