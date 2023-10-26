<?php
require_once "inc/connection_data.php";
require_once "inc/functions.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['find'])) {
        $findWord = trim($_POST['find']);
        echo "<p>Cerco: " . $findWord . "</p>";
        if ($findWord != "") {
            $records = findStudent($findWord, $config);
            $numResults = count($records);
            echo "<h4>Risultati trovati: $numResults</h4>";
            $count = 0;
            foreach ($records as $record) {
                $count++;
                echo $count . ') ', $record['name'] . ' ' . $record['advisor_id'] . '<br>';
            }
        } else {
            echo "Inserisci almeno un carattere per effettuare le ricerca!<br>";
        }
    }

    if (isset($_POST["operation"]) && ($_POST["operation"] == 'insert')) {
        $connection = connectDb($config);
        if ($connection) {
            $insertQry = "INSERT INTO student (name,advisor_id,class1,class2,class3) VALUES (?,?,?,?,?)";
            $sth = $connection->prepare($insertQry);
            $arrayQry[] = $_POST["name"];
            $arrayQry[] = $_POST["id_advisor"];
            $arrayQry[] = $_POST["class1"];
            $arrayQry[] = $_POST["class2"];
            $arrayQry[] = $_POST["class3"];
            $sth->execute($arrayQry); //TODO check constraint
            //  $sth->debugDumpParams(); //debug
            echo "Inserito con successo!<br>";
        }
    }

    if (isset($_POST["operation"]) && ($_POST["operation"] == 'insertok')) {
        $connection = connectDb($config);
        if ($connection) {
            $insertQry = "INSERT INTO student (name,advisor_id,class1,class2,class3) VALUES ('" . $_POST["name"] . "'," . $_POST["id_advisor"] . "," . $_POST["class1"] . "," . $_POST["class2"] . "," . $_POST["class3"] . ")";

            //  var_dump($insertQry);

            //     $insertClas ="INSERT INTO classes (room) VALUES (" . $_POST["class1"] . ")";
            try {
                $connection->beginTransaction();
                //     $connection->exec($insertClas);
                $connection->exec($insertQry);
                $connection->commit();
                echo "Inserito con successo!<br>";
            } catch (PDOException $e) {
                $connection->rollBack();
                echo "Errore nell'inserimento<br>";
            }
        }
    }

}

?>
<h4>Ricerca studente</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Cerca studente <input type="text" name="find" id="find">
    <button type="submit" class="btn btn-primary">cerca</button>
</form>
<h4>Lista degli studenti</h4>
<?php
$records = showTableContent($config, 'student');
echo "<h4>Mostra tutti gli studenti</h4>";
foreach ($records as $record) {
    echo $record['name'] . ' ' . $record['advisor_id'] . '<br>';
}
?>

<h4>Inserisci studente NON SICURO</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nome <input type="text" name="name" id="name">
    id_advisor <input type="number" name="id_advisor" id="id_advisor">
    class1 <input type="number" name="class1" id="class1">
    class2 <input type="number" name="class2" id="class2">
    class3 <input type="number" name="class3" id="class3">
    <input type="text" name="operation" id="operation" value="insert" hidden>
    <button type="submit" class="btn btn-primary">Inserisci</button>
</form>

<?php
$advisors = showTableContent($config, 'advisor');
$classes = showTableContent($config, 'classes');
?>

<h4>Inserisci studente SICURO</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Nome studente <input type="text" name="name" id="name">
    Professore <select name="id_advisor" id="id_advisor">
        <?php
        foreach ($advisors as $advisor) {
            echo ("<option value=" . $advisor['id'] . ">" . $advisor['advisor_name']) . "</option>";
        }
        ?>
    </select>
    class1 <select name="class1" id="class1">
        <?php
        foreach ($classes as $classe) {
            echo ("<option value=" . $classe['id'] . ">" . $classe['room']) . "</option>";
        }
        ?>
    </select>
    class2 <select name="class2" id="class2">
        <?php
        foreach ($classes as $classe) {
            echo ("<option value=" . $classe['id'] . ">" . $classe['room']) . "</option>";
        }
        ?>
    </select>
    class3 <select name="class3" id="class3">
        <?php
        foreach ($classes as $classe) {
            echo ("<option value=" . $classe['id'] . ">" . $classe['room']) . "</option>";
        }
        ?>
    </select>
    <input type="text" name="operation" id="operation" value="insertok" hidden>
    <button type="submit" class="btn btn-primary">Inserisci</button>
</form>