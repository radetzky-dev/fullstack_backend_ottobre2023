<?php
require_once "inc/connection_data.php";

$connection = connectToDB($config);
if ($connection) {
    $link = "";
    $title = "-";
    $sql = "SELECT * FROM stats";
    $result = runQuery($sql, $connection);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Book ID</th><th>Browser</th><th>Browser Version</th><th>Operating System</th><th>OS Version</th><th>Content Type</th><th>Device Type</th><th>IP</th><th>Refer</th><th>Query String</th><th>Stat Date</th><th>Stat Time</th><th>Create Time</th></tr>';

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

        echo '</table>';
    } else {
        echo "Nessun dato trovato nella tabella 'stats'.";
    }
  /*
    SELECT book_id, stat_date, COUNT(*) as total
FROM stats
GROUP BY book_id, stat_date;

SELECT book_id, DATE_FORMAT(stat_date, '%Y-%m') as month, COUNT(*) as total
FROM stats
GROUP BY book_id, month;


SELECT book_id, YEAR(stat_date) as year, WEEK(stat_date) as week, COUNT(*) as total
FROM stats
GROUP BY book_id, year, week;


  */
}
