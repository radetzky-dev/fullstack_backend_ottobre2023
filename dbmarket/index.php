<?php
require_once "inc/functions.php";
require_once "inc/connection_data.php";
session_start();

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
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th>Categoria</th>
                        <th>Buy</th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = connectToDB($config);

                    if ($connection) {
                        $sql = "SELECT * FROM products";
                        $result = $connection->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>'.$row["id"].'</td><td>'.$row["quantity"].'</td><td>'.$row["name"].'</td><td>'.$row["brand_id"] . '</td><td> ' . $row["description"] . '</td><td>'.$row["price"].'</td><td>'.$row["category_id"].'</td><td>BUY</td><td>Modify</td><td>DEL</td></tr>';
                        }
                        closeConnection($connection);
                    }

                    ?>
                </tbody>
            </table>


            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $categorie = ['chitarre', 'violini'];
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
                                <thead>
                                    <th>Marca</th>
                                    <th>Prezzo</th>
                                </thead>

                                <?php
                                $totalCart = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $obj) {
                                        $deleteCart = "<tr><td><a href='" . $_SERVER['PHP_SELF'] . "?op=deletecart&id=" . $obj[0] . "'>$deleteIcon" . $obj[2] . "</a></td><td>€ " . $obj[1] . "</td></tr>";
                                        $totalCart = $totalCart + $obj[1];
                                        echo $deleteCart;
                                    }
                                }
                                echo "</table>";
                                ?>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="text" name="amount" id="amount" value="<?php echo $totalCart; ?>"
                                        readonly>
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

</body>

</html>