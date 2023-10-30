<?php
require_once "inc/functions.php";
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $myFile = readContentFile($pathData);
    $strumentiMusicali = json_decode($myFile, true);

    $newElem = ['id' => uniqid(), 'marca' => $_REQUEST['marca'], 'name' => $_REQUEST['description'], 'price' => $_REQUEST['price'], 'number' => $_REQUEST['qta']];

    $category = $_REQUEST['tipo'];
    $strumentiMusicali['items'][$category][] = $newElem;

    $jsonString = json_encode($strumentiMusicali);
    $result = writeContentIntoFile($pathData, $jsonString);



} else {

    if (isset($_GET['op']) && isset($_GET['id'])) {

        if ($_GET['op'] === 'buy') {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            $_SESSION['cart'][] = [$_GET['id'], $_GET['price'], $_GET['marca']];
        }

        if ($_GET['op'] === 'deletecart') {

            //  var_dump($_SESSION['cart']);
            //  var_dump($_SESSION['cart'][$_GET['id']]);

            foreach ($_SESSION['cart'] as $key => $obj) {

                    // echo $_GET['id'].' vs '.$obj[0].' '.$key.'<br>';
                if ($obj[0] == $_GET['id']) {
                   // echo "cancello";
                    unset($_SESSION['cart'][$key]);
                }
            }

            // var_dump($_SESSION['cart']);
            // die();

        }

        if ($_GET['op'] === 'delete') {
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
            <h3>
                <?php echo $shopIcon; ?> JsonMusicMarket
            </h3>
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

                    $categorie = [];

                    foreach ($strumentiMusicali['items'] as $key => $strumenti) {
                        foreach ($strumenti as $strumento) {

                            $delete = "<a href='" . $_SERVER['PHP_SELF'] . "?op=delete&id=" . $strumento['id'] . "' class='btn btn-primary' onclick='return confirmDelete();'>$deleteIcon</a>";

                            $buy = "<a href='" . $_SERVER['PHP_SELF'] . "?op=buy&id=" . $strumento['id'] . "&price=".$strumento['price'] ."&marca=".$strumento['marca']."' class='btn btn-primary'>$cartIcon</a>";

                            echo '<tr><td>' . $strumento['id'] . '</td><td>' . $strumento['number'] . '</td><td>' . strtoupper($strumento['marca']) . ' </td><td>' . $strumento['name'] . '</td><td> ' . $strumento['price'] . '</td><td><strong>' . strtoupper($key) . '</strong></td><td>' . $buy . '</td><td>' . $delete . '</td></tr>';
                            $categorie[] = $key;

                        }

                    }
                    ?>
                </tbody>
            </table>


            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $instruments = array_unique($categorie);
                            ?>
                            <h5 class="card-title">Inserisci prodotto</h5>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="testo">Qta</label>
                                    <input type="numeric" class="form-control" id="qta" name="qta" placeholder="1"
                                        required>
                                    <label for="testo">Marca</label>
                                    <input type="text" class="form-control" id="marca" name="marca" placeholder="marca"
                                        required>
                                    <label for="testo">Descrizione</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder="description" required>
                                    <label for="testo">Price</label>
                                    <input type="numeric" class="form-control" id="price" name="price"
                                        placeholder="price" required>

                                    <select id="tipo" name="tipo" class="form-control">
                                        <?php
                                        foreach ($instruments as $key => $value) {
                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <?php echo $addIcon; ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Il tuo carrello</h5>
                            <table>
                                <thead><th>Marca</th><th>Prezzo</th></thead>

                            <?php
                            $totalCart=0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $obj) {
                                   $deleteCart = "<tr><td><a href='" . $_SERVER['PHP_SELF'] . "?op=deletecart&id=" . $obj[0] . "'>$deleteIcon".$obj[2]."</a></td><td>€ ".$obj[1]."</td></tr>";
                                   $totalCart=  $totalCart+$obj[1];
                                    echo $deleteCart;
                                }
                            }
                            echo "</table>";
                            ?>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="text" name="amount" id="amount" value="<?php echo $totalCart;?>" readonly>
                            <button type="submit" class="btn btn-primary">Paga</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </container>

    <script>
        function confirmDelete() {
            return confirm("Sei sicuro di voler cancellare?");
        };
    </script>

    <?php
    $var ="Prova";
    echo "<script>var mario = '$var'; console.log(mario); </script>";
    ?>

</body>

</html>