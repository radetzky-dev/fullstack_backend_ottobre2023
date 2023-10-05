<?php

$addresses = array(
    'via tal dei tali 81 roma italia',
    ['via tal 81', 'roma', 'italia'],
    "2",
    null,
    ["mario", "rossi", "roma", "italia"],
);

echo "Ecco gli indirzzi trovati:<br>";
foreach ($addresses as $value) {

    if (is_string($value)) {
        echo "Indirizzo: " . $value . "<br>";
    } elseif (is_array($value)) {
        $indirizzo = implode(" ", $value);
        echo $indirizzo;
        echo "<br>";
    }

}
