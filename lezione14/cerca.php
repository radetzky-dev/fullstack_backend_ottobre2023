<?php
require_once "inc/connection_data.php";
require_once "inc/functions.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['find']))) {

    $findWord = trim($_POST['find']);
    echo "<p>Cerco: " . $findWord . "</p>";
    if ($findWord != "") {
        $records = findStudent($findWord, $config);
        $numResults = count($records);
        echo "<h4>Risultati trovati: $numResults</h4>";
        $count=0;
        foreach ($records as $record) {
            $count++;
            echo $count.') ',$record['name'] . ' ' . $record['advisor_id'] . '<br>';
        }
    } else {
        echo "Inserisci almeno un carattere per effettuare le ricerca!<br>";
    }
}

?>
<h4>Ricerca studente</h4>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Cerca studente <input type="text" name="find" id="find">
    <button type="submit" class="btn btn-primary">cerca</button>
</form>