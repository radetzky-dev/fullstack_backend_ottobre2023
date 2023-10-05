<!DOCTYPE html>
     <html>
     <head>
  <title>Scacchiera</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style>
    .black {
        background-color: #000000;
    }
    .white {
        background-color: #FFFFFF;
    }
    </style>
  </head>
  <body>
  <h3>Schacchiera</h3>
   <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
      <?php
for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 8; $col++) {
        $total = $row + $col;
        if ($total % 2 == 0) {
            echo "<td height=30px width=30px class='black'></td>";
        } else {
            echo "<td height=30px width=30px class='white'></td>";
        }
    }
    echo "</tr>";
}
?>
  </table>
  </body>
  </html>