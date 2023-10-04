<?php

//while
$i = 3;
$sum = 0;
while ($i < 6){
  $sum = $sum + $i;
  echo "$sum <br>";
  $i++;
}
echo "Risultato finale $sum<br>";

//do while
$x = 6;
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);

//for

for ($i = 3; $i < 8; $i++) {
    echo $i.'<br>';
}

$people = array(
    array('name' => 'Kalle', 'salt' => 856412),
    array('name' => 'Pierre', 'salt' => 215863),
    array('name' => 'mario', 'salt' => 222)
);

for($i = 0; $i < count($people); ++$i) {
    $people[$i]['salt'] = mt_rand(000000, 999999);
}

var_dump($people);


for($i=5; $i>=0; $i--)
{
echo $i.'<br>';
}


$arr = array(1, "secondo", 3, "ultimo","ultimissimo!!!");
foreach ($arr as $pippo) {
   echo "Valore $pippo <br>";
}

$a = array(1, 2, 3, 17,89);

foreach ($a as $v) {
    echo "Current value of $v<br>";
}

$a = array(
    "Mario" => 25,
    "Piero" => 21,
    "Marisa" => 32,
    "Sonia" => 5
);

echo "<hr>";
echo $a["Mario"];

foreach ($a as $chiave => $valore) {
    echo "la chiave è $chiave e il valore è $valore <br>";
}

//Scorrere array bidimensionale
echo "<hr>";
$a = array();
$a[0][0] = "elem 1 primo array";
$a[0][1] = "elem 2 primo array";
$a[1][0] = "elem 1 SECONDO array";
$a[1][1] = "elem 2 SECONDO array";

var_dump($a);

echo "<hr>";

foreach ($a as $v1) {
    echo "Array <br>";
    foreach ($v1 as $v2) {
        echo "$v2<br>";
    }
}

//list

$info = array('coffee', 'brown', 'caffeine','prova importante!');

// Listing all the variables
list($drink, $color, $power,$prova) = $info;
echo "$drink is $color and $power makes it special.<br>";
echo "Questa è una <b>$prova</b><br>";