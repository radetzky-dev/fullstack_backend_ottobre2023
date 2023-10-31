<?php
require_once "inc/connection_data.php";

$connection = connectToDB($config);
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/header.php"; ?>

<body>
    <container>
        <div class="container">
            <h3>
                Books </h3>
            <?php
                if (isset($_GET["op"]) && isset($_GET["id"])) {
                        // var_dump($_POST["title"]);
                        if ($connection) {
                            $sql = "DELETE FROM books WHERE id=".$_GET["id"];
                            //SCRIVERE NEL DB
                            $result = runQuery($sql, $connection);
                        }
                    }

            if (isset($_POST["title"])) {
                // var_dump($_POST["title"]);
                if ($connection) {
                    $sql = "INSERT INTO books (title,booklink,cover) VALUES ('" . $_POST["title"] . "','" . $_POST["link"] . "','" . $_POST["cover"] . "')";
                    //SCRIVERE NEL DB
                    $result = runQuery($sql, $connection);
                }
            }

            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Title <input type="text" name="title" id="title" required>
                Amazon link <input type="text" name="link" id="link" required>
                Cover link<input type="text" name="cover" id="cover">
                <input type="submit" value="Inserisci">
            </form>
            <br>
            <a href="stats.php" target="_blank">Vedi statistiche</a>
            <table class="table table-bordered" id="tabella">
                <thead thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titolo libro</th>
                        <th>Link</th>
                        <th>cover</th>
                        <th>Mod</th>
                        <th>Dest Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($connection) {
                        $sql = "SELECT * FROM books";
                        $result = runQuery($sql, $connection);
                        while ($row = $result->fetch_assoc()) {
                            $link = "index.php?id=" . $row["id"];
                            $delete = "linkdachiamare.php?op=delete&id=". $row["id"];

                            echo '<tr><td>' . $row["id"] . '</td><td>' . $row["title"] . '</td><td>' . $row["booklink"] . '</td><td><img src="' . $row["cover"] . '" title="cover" width=150></td><td><a href="' . $delete . '" class="btn btn-primary" onclick="return confirmDelete();">Elimina</a></td><td><a href="' . $link . '" target="_blank">Clicca</a></td></tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>
        </div>
    </container>
    <?php
    if ($connection) {
        closeConnection($connection);
    }
    ?>
        <script>
        function confirmDelete() {
            return confirm("Sei sicuro di voler cancellare?");
        };
    </script>
</body>

</html>