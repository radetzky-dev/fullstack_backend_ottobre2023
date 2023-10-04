<?php
$legalAge = 21;
$name ="Mario";
$age =12;
//check se una persona può votare in base all'età

/*
if ($age >= $legaleAge) {
    echo $name . ", puoi votare";
} else {
    echo $name . ", non puoi votare. ";
}

*/
function checkAge($age, $name, $legalAge = 18)
{
    echo "Per votare occorrone $legalAge anni, tu ne hai $age<br>";
    echo ($age >= $legalAge) ?  "$name, puoi votare" : "$name, non puoi votare.";
    echo "<br>";
}

checkAge($age,$name);