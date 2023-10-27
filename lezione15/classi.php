<?php

class Vegetable
{
    public $edible;
    public $color;

    public $name;

    public function __construct($edible, $color = "green", $name ="ortaggio")
    {
        $this->edible = $edible;
        $this->color = $color;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
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

class Spinach extends Vegetable {
    public $cooked = false;

    public function __construct()
    {
        parent::__construct(true, "green",'spinacio');
    }

    public function cook()
    {
        $this->cooked = true;
    }

    public function isCooked()
    {
        return $this->cooked;
    }
}

$cicoria = new Vegetable (true,"verde","cicoria");
echo 'Sono '.$cicoria->getName() . ' edibile '.$cicoria->isEdible () . ' colore '.$cicoria->getColor () .'<br>';

$spinacio = new Spinach ();
echo 'Sono '.$spinacio->getName() . ' edibile '.$spinacio->isEdible () . ' colore '.$spinacio->getColor () .' cucinato'.$spinacio->isCooked () .'<br>';
$spinacio->cook();
echo 'Sono '.$spinacio->getName() . ' edibile '.$spinacio->isEdible () . ' colore '.$spinacio->getColor () .' cucinato'.$spinacio->isCooked () .'<br>';