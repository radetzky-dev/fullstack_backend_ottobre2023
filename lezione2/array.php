
<h2>Esempi sugli array</h2>
<?php

//inizia da 0
$myVar = "Skoda";

$cars = array("Volvo", "Ferrari", "Fiat", "Saab", 12, true, 33.4, $myVar);

//stampa il contenuto dell'array

echo "La tua auto è una " . $cars[1] . "<br>";
echo "La tua auto è una " . $cars[3] . "<br>";
echo "La tua auto è una " . $cars[7] . "<br>";

var_dump($cars);

echo "<hr>";
$array = array(1, 2, 3, 4, 5, 8 => "mario", 4 => "quarta", 19, 3 => 13);
print_r($array);

echo "Stampa la posizione 4 " . $array[4] . "<br>";
echo "Stampa la posizione 3 " . $array[3] . "<br>";

//se vuoi che cominci da uno
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);

$foo = array('bar' => 'baz', 'mario' => 'Rossi', "Bianchi");
print_r($foo);

echo "Hello {$foo['bar']}!<br>"; // Hello baz!
echo "Cognome {$foo['mario']}!<br>";
echo "Test " . $foo[0] . "<br>";

echo "<hr>";
$numbers = array(1, 2, 3, 4, 5, 6);

$fruits = array(
    "fruits" => array("a" => "orange", "b" => "banana", "c" => "apple"),
    "numbers" => $numbers,
    "holes" => array("first", 5 => "second", "third"),
);

var_dump($fruits);

echo "<hr>";
echo "Orange " . $fruits['fruits']['a'] . "<br>";
echo "First " . $fruits['holes'][0] . "<br>";
echo "Apple " . $fruits['fruits']['c'] . "<br>";
echo "second " . $fruits['holes'][5] . "<br>";
echo "third " . $fruits['holes'][6] . "<br>";
echo "3 " . $fruits['numbers'][2] . "<br>";

echo "<hr><h2>Array multi dimensionale</h2>";

$cars = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2),
    array("Land Rover", 17, 15),
);

echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Riga numero $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>" . $cars[$row][$col] . "</li>";
    }
    echo "</ul>";
}