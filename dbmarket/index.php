<?php
require_once "inc/functions.php";
require_once "inc/connection_data.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/header.php"; ?>

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
                        $brands = getNamesFromId($connection, "brands");
                        $categories = getNamesFromId($connection, "categories");

                        $sql = "SELECT * FROM products";
                        $result = runQuery($sql, $connection);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row["id"] . '</td><td>' . $row["quantity"] . '</td><td>' . $row["name"] . '</td><td>' . $brands[$row["brand_id"]] . '</td><td> ' . $row["description"] . '</td><td>' . $row["price"] . '</td><td>' . $categories[$row["category_id"]] . '</td><td>BUY</td><td>Modify</td><td>DEL</td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php include_once "parts/form_insert_product.php"; ?>
        </div>
        </div>
    </container>
    <?php
    if ($connection) {
        closeConnection($connection);
    }
    ?>
</body>

</html>