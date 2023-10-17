<?php
require_once "inc/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //  var_dump($_GET);
    if (isset($_GET['op']) && ($_GET['op'] == "delete") && isset($_GET['id'])) {
        //echo "Cancello id... " . $_GET['id'];

        //carico array
        $myFile = readContentFile($pathData);
        $strumentiMusicali = json_decode($myFile, true);
        $exit = false;


        foreach ($strumentiMusicali['items'] as $key => $strumenti) {
            foreach ($strumenti as $mykey => $strumento) {
                //   echo $strumento['id'] . ' vs ' . $_GET['id'] . '<br>';
                if ($strumento['id'] == $_GET['id']) {
                    // echo "DA CANCELLARE!!!! $key-$mykey <br>";
                    unset($strumentiMusicali['items'][$key][$mykey]);
                    $exit = true;
                }
                if ($exit) {
                    break;
                }
            }
            if ($exit) {
                break;
            }
        }

        $jsonString = json_encode($strumentiMusicali);
        $result = writeContentIntoFile($pathData, $jsonString);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $myFile = readContentFile($pathData);
    $strumentiMusicali = json_decode($myFile, true);

    $newElem = ['id' => uniqid(), 'marca' => $_REQUEST['marca'], 'name' => $_REQUEST['description'], 'price' => $_REQUEST['price'], 'number' => $_REQUEST['qta']];

    $category = $_REQUEST['tipo'];
    $strumentiMusicali['items'][$category][] = $newElem;

    $jsonString = json_encode($strumentiMusicali);
    $result = writeContentIntoFile($pathData, $jsonString);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <container>
        <div class="container">
            <h3>JsonMusicMarket</h3>
            <table class="table table-bordered" id="tabella">
                <thead thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Qta</th>
                        <th>Marca</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Categoria</th>
                        <th>Buy</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!isset($strumentiMusicali)) {
                        $myFile = readContentFile($pathData);
                        $strumentiMusicali = json_decode($myFile, true);
                    }

                    /*
                    echo "<pre>";
                    print_r($strumentiMusicali);
                    echo "</pre>";
                    */

                    $categorie = [];

                    foreach ($strumentiMusicali['items'] as $key => $strumenti) {
                        foreach ($strumenti as $strumento) {

                            $delete = "<a href='" . $_SERVER['PHP_SELF'] . "?op=delete&id=" . $strumento['id'] . "' class='btn btn-primary'>Elimina</a>";

                            echo '<tr><td>' . $strumento['id'] . '</td><td>' . $strumento['number'] . '</td><td>' . $strumento['marca'] . ' </td><td>' . $strumento['name'] . '</td><td> ' . $strumento['price'] . '</td><td> ' . $key . '</td><td>BUY</td><td>' . $delete . '</td></tr>';
                            $categorie[] = $key;

                        }

                    }
                    ?>
                </tbody>
            </table>
            <?php
            $instruments = array_unique($categorie);

            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="testo">Qta</label>
                    <input type="numeric" class="form-control" id="qta" name="qta" placeholder="1" required>
                    <label for="testo">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="marca" required>
                    <label for="testo">Descrizione</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="description" required>
                    <label for="testo">Price</label>
                    <input type="numeric" class="form-control" id="price" name="price" placeholder="price" required>

                    <select id="tipo" name="tipo">
                        <?php
                        foreach ($instruments as $key => $value) {
                            echo '<option value="' . $value . '">' . $value . '</option>';
                        }
                        ?>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Aggiungi prodotto testo</button>
            </form>
        </div>
    </container>
</body>

</html>