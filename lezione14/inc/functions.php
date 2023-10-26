<?php

/**
 * findStudent
 *
 * @param  mixed $studentName
 * @param  mixed $config
 * @return void
 */
function findStudent(string $studentName, stdClass $config): array
{
    $connection = connectDb($config);
    if ($connection) {
        $sql = "SELECT * FROM student WHERE name LIKE :param1";
        $sth = $connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(array('param1' => '%' . $studentName . '%'));
        $records = $sth->fetchAll();
        $connection = closeDbConnection($connection);
        return $records;
    } else {
        echo "Impossibile connettersi al DB!<br>";
        return [];
    }
}