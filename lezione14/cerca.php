<?php
require_once "inc/connection_data.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
}

$connection = connectDb($config);

if ($connection) {
    echo "Connessione avvenuta con successo!<br>";
    //TUTTI I VALORI
    $sql = "SELECT * FROM student WHERE name LIKE :param1";

    $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->execute(array('param1' => '%mm%'));
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
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Cerca nome studente <input type="text" name="find" id="find" >
    <button type="submit" class="btn btn-primary">cerca</button>
</form>