<?php
require_once "inc/connection_data.php";

$connection = connectDb($config);

if ($connection) {
    //INSERT
    $insertQry ="INSERT INTO student (name,advisor_id,class1,class2,class3) VALUES ('Paolo',2,2,3,2)";
    $sth = $connection->prepare($insertQry);
    $sth->execute();
    //$sth = null;

    //Mostra tutto
    $sql = "SELECT * FROM student";
    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute();
    $records = $sth->fetchAll();
    echo "<h4>Mostra tutti i risultati</h4>";
    foreach ($records as $record) {
        echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
    }

    $connection = closeDbConnection($connection);


} else {
    echo "Impossibile connettersi al DB!<br>";
}