<?php
require_once "inc/connection_data.php";

$connection = connectDb($config);

if ($connection) {
    echo "Connessione avvenuta con successo!<br>";
    //TUTTI I VALORI
    $sql = "SELECT * FROM student WHERE name LIKE :param1 and advisor_id=:param2";
    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

    $sth->execute(array('param1' => '%mm%', 'param2' => 3));
    $records = $sth->fetchAll();
    foreach ($records as $record) {
        echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
    }

    $sth->execute(['param1' => '%k%', 'param2' => 2]);
    $records = $sth->fetchAll();
    foreach ($records as $record) {
        echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
    }

    echo "<hr>";
    $sql = "SELECT * FROM student WHERE name LIKE ? and advisor_id=?";
    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(['Jimmy', 3]);
    $records = $sth->fetchAll();
    foreach ($records as $record) {
        echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
    }

    $connection = closeDbConnection($connection);
    if (is_null($connection)) {
        echo "Disconnesso con successo<br>";
    }

} else {
    echo "Impossibile connettersi al DB!<br>";
}