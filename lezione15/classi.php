<?php

class Vegetable
{
    public $edible;
    public $color;

    public $name;

    public function __construct($edible, $color = "green", $name = "ortaggio")
    {
        $this->edible = $edible;
        $this->color = $color;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getType()
    {
        return "Sono un vegetale!";
    }

    public function isEdible()
    {
        return $this->edible;
    }

    public function getColor()
    {
        return $this->color;
    }
}

class Spinach extends Vegetable
{
    public $cooked = false;

    public const SAPORE = "AMARO";

    public function __construct()
    {
        parent::__construct(true, "green", 'spinacio');
    }

    public function cook()
    {
        $this->cooked = true;
    }

    //sovrascrivo il metodo
    public static function getType()
    {
        return "Sono uno spinacio!";
    }

    public function isCooked()
    {
        return $this->cooked;
    }
}

echo "Che tipo sono? " . Vegetable::getType() . '<br>';

$cicoria = new Vegetable(true, "verde", "cicoria");
echo 'Sono ' . $cicoria->getName() . ' edibile ' . $cicoria->isEdible() . ' colore ' . $cicoria->getColor() . '<br>';

echo "Che tipo sono? " . Spinach::getType() . '<br>';

$spinacio = new Spinach();
echo 'Sono ' . $spinacio->getName() . ' edibile ' . $spinacio->isEdible() . ' colore ' . $spinacio->getColor() . ' cucinato' . $spinacio->isCooked() . '<br>';
$spinacio->cook();
echo 'Sono ' . $spinacio->getName() . ' edibile ' . $spinacio->isEdible() . ' colore ' . $spinacio->getColor() . ' cucinato' . $spinacio->isCooked() . '<br>';

echo Spinach::SAPORE;
echo "<hr>";

if ($cicoria instanceof Vegetable) {
    echo "The object is Vegetable<br>";

}

// The object is also an instance of the class it is derived from
if ($spinacio instanceof Spinach) {
    echo "The object is Spinach Cucinato?" . $spinacio->isCooked() . "<br>";

}

if ($spinacio instanceof Person) {
    echo "The object is Vegetable<br>";
} else {
    echo "Non è di tipo Person<br>";
}

echo "<hr>";
class Fruit
{
    public $name;
    public $color;

    function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function tipo()
    {
        echo "frutto<br>";
    }

    function __destruct()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

$apple = new Fruit("Apple", "red");
$apple->tipo();
$apple->tipo();
$apple->tipo();


$sum = function ($val1, $val2) {
    return $val1 + $val2;
};

echo $sum(3, 4); // Output: 7

echo "<hr>";

$myObject = new class {
    private $a;
    public function set($a)
    {
        $this->a = $a;
    }
    public function get()
    {
        return $this->a;
    }
};
$myObject->set(54);
echo $myObject->get(),'<br>'; // 54