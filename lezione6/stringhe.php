<?php

$email = 'name@example.com';
$domain = strstr($email, '@');
echo $domain; // prints @example.com

echo "<hr>";
$user = strstr($email, '@', true);
echo $user; // prints name

echo "<hr>";
$email = 'name.surnameMIOexample.com';
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
$findme = 'a';
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
$mystring = "bAI";
$pos = strrpos($mystring, "b");
if ($pos === false) { // note: three equal signs
    echo "non presente<br>";
} else {
    echo "presente alla posizione $pos <br>";
}

echo "<hr>";
$rest = substr("abcdef", -1);    // returns "f"
echo $rest;
echo "<hr>";
$rest = substr("abcdef", -2);    // returns "ef"
echo $rest;
echo "<hr>";
$rest = substr("abcdef", -3, 1); // returns "d"
echo $rest;

echo "<hr>";
$rest = substr("abcdef", 1, 2);
echo $rest;

echo "<hr>";
$rest = substr("abcdef", 0, 3);
echo $rest;

echo "<hr>";
$text ="   [dasdas s dfsdf sd sdf]    ";
$trimmed = trim($text);
var_dump($trimmed);

echo "<hr>";
$text ="***[dasdas s dfsdf sd sdf]**";
$trimmed = trim($text,'*');
var_dump($trimmed);
echo "<hr>";
$trimmed = ltrim($text,'*');
var_dump($trimmed);
echo "<hr>";
$trimmed = rtrim($text,'*');
var_dump($trimmed);

echo ">>>>>>>>>>";
echo "<hr>";
// Provides: <body text='black'>
$bodytag ="mario Rossi verdi";
echo $bodytag.'<br>';
$bodytag = str_replace("rossi", "GIALLI", $bodytag );
echo "sensitive " . $bodytag.'<br>';

$bodytag = str_ireplace("rossi", "GIALLI", $bodytag );
echo "insensitive ".$bodytag.'<br>';

echo ">>>>>>>>>><br>";

$input = array('A: XXX', 'B: XXX', 'C: XXX');
// A simple case: replace XXX in each string with YYY.
echo implode('; ', substr_replace($input, 'YYY', 3, 3))."<br>";

echo "<hr>";
$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);

print_r($arr1);
print_r($arr2);

echo "<hr>";
echo strrev("Hello world!"); // outputs "!dlrow olleH"

echo "<hr>";
if (str_contains('abc def', ' de')) {
    echo "lo contiene!<br>";
}


echo "<hr>";
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtolower($str);
echo $str;

echo "<hr>";
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtoupper($str);
echo $str;

echo "<hr>";
$foo = 'hello world!';
$foo = ucfirst($foo);
echo $foo;

echo "<hr>";
$foo = 'HelloWorld';
$foo = lcfirst($foo);
echo $foo;

echo "<hr>";
$text = '<p>Test paragraph.</p><br><hr><!-- Comment --> <a href="#fragment">Other text</a>';
echo strip_tags($text);

echo "<hr>";
$string = 'The lazy fox jumped over the fence';

if (str_ends_with($string, 'fence')) {
    echo "The string ENDS with 'fence'<br>";
}

if (str_starts_with($string, 'The')) {
    echo "The string START with 'THE'<br>";
}

echo "<br>";
preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
echo "<pre>";
print_r($matches);
echo "</pre>";

echo "<hr>";
$text = "The quick brown fox jumped over the lazy dog.";
echo $text;

echo "<hr>";
$newtext = wordwrap($text, 10, "<br />", true);
echo $newtext;

