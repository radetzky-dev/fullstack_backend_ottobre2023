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