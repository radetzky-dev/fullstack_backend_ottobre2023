<?php

interface Animal
{
    public function makeSound();

    public function mangia($cibo);
}

abstract class Quadrupedi
{
    public $zampe;

    abstract protected function ali();
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

    public function ali()
    {
        return "Non ho ali!<br>";
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
echo $animal1->ali();
$animal1->makeSound();
echo $animal1->getType();
echo "Ho " . $animal1->getZampe() . ' zampe!<br>';

echo "Mangio il ".$animal1->cosaMangia()."<br>";

echo "<hr>";

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}


class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
echo "<hr>";

trait Ciao{
   public function saluta(){
        echo "ciao<br>";
    }

    public function boh()
    {
        echo "non so cosa dire<br>";
    }
}
class MyHello {
    use Ciao;
}

$o1 = new MyHello();
$o1->saluta();
$o1->boh();