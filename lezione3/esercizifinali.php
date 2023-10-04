<?php

/*
1)
$color = array('white', 'green', 'red');

Output :

green
red
white

2)
$x = array(1, 2, 3, 4, 5);
Delete an element from the above PHP array. After deleting the element, integer keys must be normalized.
array(5) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) }
array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(5) }
 */

$color = array('white', 'green', 'red');
sort($color);
echo "<ul>";
foreach ($color as $y) {
    echo "<li>$y</li>";
}
echo "</ul>";

$x = array(1, 2, 3, 4, 5);
var_dump($x);
unset($x[3]);
$x = array_values($x);
echo '<br>';
var_dump($x);

echo '<br>';
$y = array(1, 2, "re", "pa", 5);
echo "<pre>";
print_r($y);
echo "</pre>";
unset($y[1]);
$y = array_values($y);
echo '<br>';
echo "<pre>";
print_r($y);
echo "</pre>";
