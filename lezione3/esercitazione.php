<?php

//UNO
for ($i = 1; $i <= 10; $i++) {
    if ($i != 1) {
        echo "-" . $i;
    } else {echo $i;}
}
echo "<hr>";

//SOMMA
$n = 30;
$i = 0;
$sum = 0;

while ($i <= $n) {
    echo "Sommo $i <br>";
    $sum += $i;
    $i++;
}
echo "Totale $sum <br>";

echo "<hr>";
$somma = 0;

for ($i = 0; $i <= 30; $i++) {
    $somma += $i;
}
echo $somma;

echo "<hr>";


//ASTERISCHI

/**
 * showAsterisk
 *
 * @param  mixed $num
 * @return string
 */
function showAsterisk($num): string
{
    $result = "";
    for ($i = 1; $i <= $num; $i++) {
        $result = $result . '*';
    }
    return $result;
}

for ($i = 1; $i <= 10; $i++) {
    echo showAsterisk($i) . "<br>";
}

echo "<hr>";
