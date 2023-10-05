<?php

//Write a function to reverse a string
//paolo -> oloap

function reverseString($str1)
{
    //echo "DEBUG ".$str1."<br>";
    $n = strlen($str1);
    if ($n == 1) {
        return $str1;
    } else {
        $n--;
        return reverseString(substr($str1, 1, $n)) . substr($str1, 0, 1);
    }
}

/**
 * reverseName
 *
 * @param  mixed $name
 * @return string
 */
function reverseName(string $name): string
{
    return implode(array_reverse(str_split($name)));
}

$names = ["paolo", "sergio", "maria", "sonia"];

foreach ($names as $name) {
    echo "Reverse name with Array $name -> " . reverseName($name) . "<br>";
    echo "Reverse name with string $name -> ". reverseString($name). "<br>";
}
