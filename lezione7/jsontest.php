<?php
function readContentFile($fileNameWithPath): string
{
    $content = "";

    if (!$myfile = fopen($fileNameWithPath, "r")) {
        return "";
    }
    $content = fread($myfile, filesize($fileNameWithPath));
    fclose($myfile);
    return $content;
}

$myFile = readContentFile("data/data.json");
echo "<pre>";
var_dump(json_decode($myFile, true));
echo "</pre>";

echo "<hr>";

echo "<pre>";
print_r(json_decode($myFile));
echo "</pre>";

$myGlossary = json_decode($myFile);
echo $myGlossary->glossary->GlossDiv->title;

echo "<hr>";
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

echo "<pre>";
print_r(json_decode($json));
echo "</pre>";
$jsonObj = json_decode($json);
echo "Come obj standard class : " . $jsonObj->a . "<br>";

echo "<pre>";
var_dump(json_decode($json, true));
echo "</pre>";
$jsonArr = json_decode($json, true);
echo "Come array : " . $jsonArr['a'] . "<br>";


$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo json_encode($arr);


echo "<hr>";
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

var_dump(json_decode($jsonobj));
echo "<hr>";

var_dump(json_decode($jsonobj, true));