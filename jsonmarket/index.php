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


/*

foreach ($strumentiMusicali['items']['chitarre'] as $chitarra) {
    echo "<pre>";
    var_dump($chitarra);
    echo "</pre>";
}
echo "<hr>";
foreach ($strumentiMusicali['items']['bassi'] as $chitarra) {
    echo "<pre>";
    var_dump($chitarra);
    echo "</pre>";
}
echo "<hr>";
foreach ($strumentiMusicali['items']['tastiere'] as $chitarra) {
    echo "<pre>";
    var_dump($chitarra);
    echo "</pre>";
}
*/

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
            <button class='btn btn-primary'>Aggiungi prodotto</button>
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

                    foreach ($strumentiMusicali['items'] as $key => $strumenti) {
                        foreach ($strumenti as $strumento)
                        {
                            echo '<tr><td>'.$strumento['number'] .'</td><td>'. $strumento['marca'] .' </td><td>'. $strumento['name'].'</td><td> '. $strumento['price'].'</td><td> '.$key.'</td><td>BUY</td></tr>';
                   
                        }

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </container>
</body>

</html>