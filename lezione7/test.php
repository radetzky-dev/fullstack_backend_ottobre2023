<?php
//https://aulab.it/guide/34/operatori-e-dati-truthy-falsy-in-php
$variaQualsiasi = false;


if ( !$variaQualsiasi )
{
    echo "1 - condizione falsa<br>";
}

if ( $variaQualsiasi !== true )
{
    echo "2 - condizione falsa<br>";
}

while (!$variaQualsiasi) {
        $variaQualsiasi  = true;
        echo"3 - Ora condizione verificata!<br>";
    }


