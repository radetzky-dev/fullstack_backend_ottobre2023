<?php
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

echo "<hr>";

print "Original Object:<br>";
print_r($obj);

echo "<hr>";

print "Cloned Object:<br>";
print_r($obj2);

echo "<hr>";

class MyClass {
    public $color;
    public $amount;

    public $x;
    public $y;
  }
  
  $obj = new MyClass();
  $obj->color = 'red';
  $obj->amount = 5;
  $obj->x = "mario";
  $obj->y = "prova";

  echo "<hr>";
  $copy = clone $obj;
  $copy->x="Maria";
  print_r($copy);
