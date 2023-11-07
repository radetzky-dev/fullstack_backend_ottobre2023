<?php
require_once "inc/connection_data.php";


/**
 * loadBooks
 *
 * @param  mixed $connection
 * @return array
 */
function loadBooks($connection): array
{
    $sql = "SELECT * FROM books";
    $result = runQuery($sql, $connection);
    $titles = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $titles[$row["id"]] = $row["title"];
        }
    }
    return $titles;
}


/**
 * showDaily
 *
 * @param  mixed $connection
 * @param  mixed $titles
 * @return void
 */
function showDaily($connection, $titles)
{

    $dailySql = " SELECT book_id, stat_date, COUNT(*) as total
     FROM stats GROUP BY book_id, stat_date order by stat_date DESC";
    $result = runQuery($dailySql, $connection);

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead><th>BOOK</th><th>DATA</th><th>TOTALE</th><th>DETTAGLI</th></thead><tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $titles[$row["book_id"]] . '</td>';
            echo '<td>' . $row['stat_date'] . '</td>';
            echo '<td>' . $row['total'] . '</td>';
            echo '<td><a href="?op=details&id=' . $row["book_id"] . '">DETTAGLI</a></td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
    }
}

function showStatsForSingleBook($connection, $titles, $id)
{
    $sql = "SELECT * FROM stats where book_id='$id'";
    $result = runQuery($sql, $connection);

    if ($result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead><th>Book ID</th><th>Browser</th><th>Browser Version</th><th>Operating System</th><th>OS Version</th><th>Content Type</th><th>Device Type</th><th>IP</th><th>Refer</th><th>Query String</th><th>Stat Date</th><th>Stat Time</th></thead><tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $titles[$row["book_id"]] . '</td>';
            echo '<td>' . $row['browser'] . '</td>';
            echo '<td>' . $row['browser_v'] . '</td>';
            echo '<td>' . $row['so'] . '</td>';
            echo '<td>' . $row['so_v'] . '</td>';
            echo '<td>' . $row['c_type'] . '</td>';
            echo '<td>' . $row['device_type'] . '</td>';
            echo '<td>' . $row['ip'] . '</td>';
            echo '<td><a href="' . $row['refer'] . '" target="_blank">ref</a></td>';
            echo '<td>' . $row['qstring'] . '</td>';
            echo '<td>' . $row['stat_date'] . '</td>';
            echo '<td>' . $row['stat_time'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    }
}


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

                $titles = loadBooks($connection);

                if (isset($_GET['op']) && $_GET['op'] == 'details') {
                    showStatsForSingleBook($connection, $titles, $_GET['id']);
                } else {
                    showDaily($connection, $titles);
                }


                closeConnection($connection);
            }

            ?>
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