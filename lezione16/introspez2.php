<?php
interface Person
{
    // costanti
    const COSTANTE = "valore";
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
if (interface_exists("Person")) {
    echo "L'interfaccia Person esiste <br><br />";
}
$classes = get_declared_classes();
echo "Sono disponibili le seguenti classi:<br />";
print_r($classes);
if (in_array("Student", $classes)) {
    print "<br /><br />Classe Student dichiarata";
    $student = new Student();
    $methods = get_class_methods($student);
    echo "<br /><br />Sono disponibili i seguenti metodi:<br />";
    print_r($methods);
    $vars = get_class_vars(get_class($student));

    var_dump(method_exists($student, "getName"));


    if (method_exists($student, "setName")) {
        $student->setName("Mario", "Rossi");
    }

    if (method_exists($student, "getName")) {
        echo $student->getName();
    }

    echo "<br>";

    if (method_exists($student, "getJob")) {
        echo $student->getJob();
    } else {
        echo "Il metodo non esiste!";
    }

}

echo "<hr>";

class myclass
{


    var $var1; // this has no default value...
    var $var2 = "xyz";
    var $var3 = 100;
    private $var4 ="privata";

    var $test ="Questo è un test";
    // constructor
    function __construct()
    {
        return (true);
    }

    // method 1
    function myfunc1()
    {
        return (true);
    }

    // method 2
    function myfunc2()
    {
        return (true);
    }

    function myfunc3()
    {
        return (true);
    }


    public function myfunc4()
    {
        return get_class_vars(get_class($this));
    }
}

$class_methods = get_class_methods('myclass');


foreach ($class_methods as $method_name) {
    echo "$method_name<br>";
}

echo "<hr>";

$class_methods = get_class_methods(new myclass());

foreach ($class_methods as $method_name) {
    echo "$method_name<br>";
}

echo "<hr>";
$my_class = new myclass();

$class_vars = get_class_vars(get_class($my_class));

foreach ($class_vars as $name => $value) {
    echo "$name : $value<br>";
}

echo "<hr>";
$test =  new myclass();


foreach ($test->myfunc4() as $name => $value) {
    echo "$name : $value<br>";
}
