<?php
$myClass = new stdClass();
$myClass->name = "Paolo";
var_dump($myClass);
echo "<hr>";
$data = serialize($myClass);
var_dump($data);
echo "<hr>";
$test = unserialize($data);
var_dump($test);

echo "<hr>";
echo "array";
echo "<hr>";


$myObj = array("Red", "Green", "Blue");
var_dump($myObj);
echo "<hr>";
$data = serialize($myObj);
var_dump($data);

//qui lo scrivo in un file

echo "<hr>";
$test = unserialize($data);
var_dump($test);

echo "<hr>";

class demoSleepWakeup {
    public $resourceM;
    public $arrayM;

    public function __construct() {
        $this->resourceM = fopen("demo.txt", "w");
        $this->arrayM = array("ciao","paolo"); // Enter code here
    }


    public function __sleep() {
        return array('arrayM');
    }

    public function __wakeup() {
        $this->resourceM = fopen("demo.txt", "w");
        $this->arrayM= array ("Uno","due");
    }
 
    
}
echo "<hr>";
echo "DEMO<br>";
$obj = new demoSleepWakeup();
var_dump($obj);
echo "<hr>";
$serializedStr = serialize($obj);
var_dump($serializedStr);
echo "<hr>";
var_dump(unserialize($serializedStr));

