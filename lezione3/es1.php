<?php
$legalAge = 21;
$name ="Mario";
$age =12;
//check se una persona può votare in base all'età

function checkAge($age, $name, $legalAge = 18)
{
    echo "Per votare occorrone $legalAge anni, tu ne hai $age<br>";
    echo ($age >= $legalAge) ?  "$name, puoi votare" : "$name, non puoi votare.";
    echo "<br>";
}

//array con le informazioni nome e age per almeno 3 persone e con un ciclo testiamo
//con la funzione

checkAge($age,$name);