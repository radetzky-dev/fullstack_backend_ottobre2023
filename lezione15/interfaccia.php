<?php

interface Animal
{
    public function makeSound();

    public function mangia($cibo);
}

class Quadrupedi
{
    public $zampe;

    public function __construct($zampe)
    {
        $this->zampe = $zampe;
    }

    public function getZampe()
    {
        return $this->zampe;
    }
}

class Cat implements Animal
{
    public $cibo ="";
    public function makeSound()
    {
        echo "Meow<br>";
    }

    public function mangia($cibo)
    {
        $this->cibo=$cibo;
    }

    public function cosaMangia()
    {
        return $this->cibo;
    }
}

class Dog extends Quadrupedi implements Animal
{
    public $cibo ="";
    public function makeSound()
    {
        echo "Bau<br>";
    }

    public function getType()
    {
        return "I'm a dog<br>";
    }


    public function mangia($cibo)
    {
        $this->cibo=$cibo;
    }

    public function cosaMangia()
    {
        return $this->cibo;
    }
}

$animal = new Cat();
$animal->mangia("topo");
$animal->makeSound();
echo "Mangio il ".$animal->cosaMangia()."<br>";

$animal1 = new Dog(4);
$animal1->mangia("gatto");
$animal1->makeSound();
echo $animal1->getType();
echo "Ho " . $animal1->getZampe() . ' zampe!<br>';

echo "Mangio il ".$animal1->cosaMangia()."<br>";