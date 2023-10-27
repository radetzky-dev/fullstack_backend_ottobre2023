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

if($cicoria instanceof Vegetable) {
  echo "The object is Vegetable<br>";

}

// The object is also an instance of the class it is derived from
if($spinacio instanceof Spinach) {
  echo "The object is Spinach Cucinato?".$spinacio->isCooked()."<br>";

}

if($spinacio instanceof Person) {
    echo "The object is Vegetable<br>";
  } else
  {
    echo "Non è di tipo Person<br>";
  }