<?php

$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain; // prints @example.com

echo "<hr>";
$user = strstr($email, '@', true);
echo $user; // prints name

echo "<hr>";
$email  = 'name.surnameMIOexample.com';
$domain = strstr($email, 'MIO');
echo $domain; // prints @example.com

echo "<hr>";
$user = strstr($email, 'MIO', true);
echo $user; // prints name

echo "<hr>";
echo strstr($email, 'mio'); // ko
echo "<hr>";
//case insensitive
echo stristr($email, 'mIo'); // outputs ER@EXAMPLE.com

echo "<hr>";

//case insensitive
$findme    = 'a';
$mystring1 = 'xyz';
$mystring2 = 'dABC';

//posizione parte da 0
$pos1 = stripos($mystring1, $findme);
$pos2 = stripos($mystring2, $findme);

// Nope, 'a' is certainly not in 'xyz'
if ($pos1 === false) {
    echo "The string '$findme' was not found in the string '$mystring1' <br>";
}

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' is the 0th (first) character.
if ($pos2 !== false) {
    echo "We found '$findme' in '$mystring2' at position $pos2 <br>";
}


//sensitive
$mystring ="bAI";
$pos = strrpos($mystring, "b");
if ($pos === false) { // note: three equal signs
    echo "non presente<br>";
} else
{ 
    echo "presente alla posizione $pos <br>";
}

