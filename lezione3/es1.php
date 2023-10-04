<?php
$name = "Mario";
$age = 12;
//check se una persona può votare in base all'età

/**
 * checkAge
 *
 * @param  mixed $age
 * @param  mixed $name
 * @param  mixed $legalAge
 * @return void
 */
function checkAge(int $age, string $name, int $legalAge = 18): void
{
    echo "Per votare occorrono $legalAge anni, tu ne hai $age<br>";
    echo ($age >= $legalAge) ? "$name, puoi votare" : "$name, <b>non</b> puoi votare.";
    echo "<br>";
}

$people = array(
    "Mario" => 25,
    "Piero" => 21,
    "Marisa" => 32,
    "Sonia" => 5,
);

foreach ($people as $name => $age) {
    checkAge($age, $name);
}

$people = array(
    array("mario", 21),
    array("anna", 15),
    array("gianni", 6),
);

for ($i = 0; $i < count($people); $i++) {
    checkAge($people[$i][1], $people[$i][0]);
}

foreach ($people as $singlePerson) {
    checkAge($singlePerson[1], $singlePerson[0]);
}