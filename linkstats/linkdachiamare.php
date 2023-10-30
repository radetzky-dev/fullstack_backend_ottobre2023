<?php
require_once "inc/connection_data.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/header.php"; ?>

<body>
    <container>
        <div class="container">
            <h3>
                Books
            </h3>

            <h3>Libri</h3>

            <a href="index.php?libro=1" target="_blank">Io mi chiamo Chico</a><br>
            <a href="index.php?libro=friends" target="_blank">Friends</a><br>
            <a href="index.php?libro=checosavisietepersi" target="_blank">Che cosa vi siete persi</a><br>

            <hr>
            <a href="stats.php" target="_blank">Statistiche</a>
            <table class="table table-bordered" id="tabella">
                <thead thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titolo libro</th>
                        <th>Link</th>
                        <th>cover</th>
                        <th>Mod</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $connection = connectToDB($config);
                    if ($connection) {
    
                        $sql = "SELECT * FROM books";
                        $result = runQuery($sql, $connection);
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr><td>' . $row["id"] . '</td><td>' . $row["title"] . '</td><td>' . $row["booklink"] . '</td><td><img src="' . $row["cover"] . '" title="cover" width=150></td><td>Modify</td><td>LINK</td></tr>';
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
</body>

</html>