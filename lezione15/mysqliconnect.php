<?php
require_once "inc/connection_data.php";

$connection = connectToDB();

if ($connection) {
    echo "Conesso correttamente al database!<br>";

    $sql = "SELECT * FROM student";
    $result = $connection->query($sql);

    echo "<pre>";
    print_r($result->num_rows);
    echo "</pre>";

    echo "RISULTATI ARRAY<br>";
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . ' ' . $row["name"] . '<br>';
    }

    $result = $connection->query($sql);
    echo "RISULTATI StandardClass OBJ<br>";
    while ($row = $result->fetch_object()) {
        echo $row->id . ' ' . $row->name . '<br>';
    }

    $sql = "SELECT * FROM classi_studenti_professori";
    echo "RISULTATI con metodo diverso<br><hr>";
    $result = mysqli_query($connection, $sql);
    echo "NOME STUDENTE | PROFESSORE | AULA <br>";
    while ($row = $result->fetch_object()) {
        // var_dump($row);
        echo $row->STUDENTE . ' | ' . $row->PROFESSORE . ' | ' . $row->CLASSE1 . '<br>';
    }


    closeConnection($connection);
}