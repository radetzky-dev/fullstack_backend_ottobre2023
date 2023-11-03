<?php
require_once "inc/connection_data.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "parts/header.php"; ?>

<body>
    <container>
        <div class="container">

            <?php
            $connection = connectToDB($config);
            if ($connection) {
                $link = "";
                $title = "-";
                $sql = "SELECT * FROM stats";
                $result = runQuery($sql, $connection);

                if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered">';
                    echo '<thead><th>ID</th><th>Book ID</th><th>Browser</th><th>Browser Version</th><th>Operating System</th><th>OS Version</th><th>Content Type</th><th>Device Type</th><th>IP</th><th>Refer</th><th>Query String</th><th>Stat Date</th><th>Stat Time</th><th>Create Time</th></thead><tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['book_id'] . '</td>';
                        echo '<td>' . $row['browser'] . '</td>';
                        echo '<td>' . $row['browser_v'] . '</td>';
                        echo '<td>' . $row['so'] . '</td>';
                        echo '<td>' . $row['so_v'] . '</td>';
                        echo '<td>' . $row['c_type'] . '</td>';
                        echo '<td>' . $row['device_type'] . '</td>';
                        echo '<td>' . $row['ip'] . '</td>';
                        echo '<td>' . $row['refer'] . '</td>';
                        echo '<td>' . $row['qstring'] . '</td>';
                        echo '<td>' . $row['stat_date'] . '</td>';
                        echo '<td>' . $row['stat_time'] . '</td>';
                        echo '<td>' . $row['create_time'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody></table>';
                }
            }
            ?>
        </div>
        </div>
    </container>
</body>

</html>

<?php

/*  

              TODO vedere dati aggregati giorno per giorno per titolo 
              15 marzo chcio 7 -> + devere il dettaglio (che vediamo ora solo di un libro) poi 
              15 marzo altro libro 4
              16 marzo chcico 5

                  SELECT book_id, stat_date, COUNT(*) as total
              FROM stats
              GROUP BY book_id, stat_date;

              SELECT book_id, DATE_FORMAT(stat_date, '%Y-%m') as month, COUNT(*) as total
              FROM stats
              GROUP BY book_id, month;


              SELECT book_id, YEAR(stat_date) as year, WEEK(stat_date) as week, COUNT(*) as total
              FROM stats
              GROUP BY book_id, year, week;


              stats per mobile, sistema operativo, zona geografica (idea in fase di registrazione salvarsi la zona https://phpforever.com/php/get-geolocation-from-ip-address-using-php/)

                */