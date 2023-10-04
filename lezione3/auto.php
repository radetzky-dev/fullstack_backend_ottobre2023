<?php

/**
 * showCars
 *
 * @param  mixed $cars
 * @return void
 */
function showCars($cars)
{
    foreach ($cars as $value) { //solo il valore
        echo "Marca : " . ucfirst($value) . '<br>';
    }
    echo "<hr>";
}

$cars = ["audi", "fiat", "mercedes", "ferrari", "auto" => "mini"];
showCars($cars);
$cars[] = "Bentley";
showCars($cars);
unset($cars[0]);
unset($cars[2]);
$cars[] = "Lancia";
unset($cars["auto"]);

echo "<pre>";
print_r($cars);
echo "</pre>";

showCars($cars);
