<?php
// dichiarazione della classe Introspezione
class Introspezione
{
    // metodi
    public function note()
    {
        echo "Superclasse della classe Sample<br />";
    }
}
// definizione della sottoclasse Sample
class Sample extends Introspezione
{
    public function note()
    {
        echo "Classe: " . get_class($this), "<br />";
        echo "Classe di derivazione: " . get_parent_class($this), "<br />";
    }
}
interface Person
{
    // costanti
    const COSTANTE = "valore";

    const PROVA = "prova di costante";
    // definizione dei metodi
    public function getName();
    public function setName($name, $lastname);
}
class Student implements Person
{
    public $name = "";
    public $lastname = "";
    // implementazione dei metodi
    public function getName()
    {
        // corpo del Metodo
        echo "$this->name $this->lastname";
    }
    public function setName($name, $lastname)
    {
        // corpo del Metodo
        $this->name = $name;
        $this->lastname = $lastname;
    }
}
// istanziamo la ReflectionClass, passando come parametro nel costruttore il nome della classe.
$sample = new ReflectionClass("Sample");
// restituisce il nome della classe genitore di un oggetto o di una classe
$parent = $sample->getParentClass();
echo $sample->getName() . " è una sottoclasse di " . $parent->getName() . "<br />";
$reflection = new ReflectionClass("Student");
$interfaceNames = $reflection->getInterfaceNames();
if (in_array("Person", $interfaceNames)) {
    echo "<br />Student implements Person<br />";
}
// ReflectionClass::getMethods - i metodi relativi a quella classe
$methods = $reflection->getMethods();
echo "<br />Sono disponibili i seguenti metodi:<br />";
print_r($methods);
// ReflectionClass::getConstants - array associativo contenente i nomi e i valori delle costanti
$constants = $reflection->getConstants();
echo "<br /><br />Sono disponibili le seguenti costanti:<br />";
foreach ($constants as $name => $value) {
    echo $name . '=>' . $value . PHP_EOL;
}
// ReflectionClass::hasMethod - (Controllo se un metodo è definito in una classe)
if ($reflection->hasMethod("setName")) {
    echo "<br /><br />Il metodo setName() esiste per Student";
}

echo "<hr>";
class MiaClasse
{
    public function name()
    {
        echo "My name is ", get_class($this), "<br>";
    }
}

// create an object
$bar = new MiaClasse();

// external call
echo "Its name is ", get_class($bar), "<br>";

// internal call
$bar->name();

echo "<hr>";
function getStudents($obj)
{
    if (!is_object($obj)) {

        return false;
    }

    return $obj->students;
}

// Declare a new class instance and fill up
// some values
$obj = new stdClass();
$obj->students = array('Kalle', 'Ross', 'Felipe');

var_dump(getStudents(null));
echo "<br>";
var_dump(getStudents($obj));


echo "<hr>";

class Foo
{
    private $a;
    public $b = 1;
    public $c;
    private $d;
    static $e = "prova";

    public function test()
    {
        echo "da dentro<br>";
        var_dump(get_object_vars($this));
    }
}

$test = new Foo;
echo "da fuori<br>";
var_dump(get_object_vars($test));
echo "<hr>";

$test->test();

echo "<hr>";
echo Foo::$e;