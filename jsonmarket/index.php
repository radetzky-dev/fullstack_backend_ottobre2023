<?php

function readContentFile($fileNameWithPath): string
{
    $content = "";

    if (!$myfile = fopen($fileNameWithPath, "r")) {
        return "";
    }
    $content = fread($myfile, filesize($fileNameWithPath));
    fclose($myfile);
    return $content;
}


function writeContentIntoFile($fileNameWithPath, $content): bool
{
    $action = "wb"; //crealo

    if (!$fp = fopen($fileNameWithPath, $action)) {
        return false;
    }
    if (fwrite($fp, $content) === false) {
        return false;
    }
    fclose($fp);
    return true;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $myFile = readContentFile("data/prodotti.json");
    $strumentiMusicali = json_decode($myFile, true);

    echo "<pre>";
    // print_r($strumentiMusicali);
    echo "</pre>";

    echo "<br>DA INSERIRE<br>";

    var_dump($_REQUEST);

    $newElem = ['id' => 1, 'marca' => $_REQUEST['marca'], 'name' => $_REQUEST['description'], 'price' => $_REQUEST['price'], 'number' => $_REQUEST['qta']];

    $category = $_REQUEST['tipo'];
    $strumentiMusicali['items'][$category][] = $newElem;

    echo "<pre>";
    print_r($strumentiMusicali);
    echo "</pre>";

    $jsonString = json_encode($strumentiMusicali);
    $result = writeContentIntoFile("data/prodotti.json", $jsonString);
    die();
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
                        <th>Qta</th>
                        <th>Marca</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Categoria</th>
                        <th>Buy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $myFile = readContentFile("data/prodotti.json");
                    $strumentiMusicali = json_decode($myFile, true);
                    $categorie = [];

                    foreach ($strumentiMusicali['items'] as $key => $strumenti) {
                        foreach ($strumenti as $strumento) {
                            echo '<tr><td>' . $strumento['number'] . '</td><td>' . $strumento['marca'] . ' </td><td>' . $strumento['name'] . '</td><td> ' . $strumento['price'] . '</td><td> ' . $key . '</td><td>BUY</td></tr>';
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