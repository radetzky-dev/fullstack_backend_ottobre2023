<?php

print "ciao<br>" . "ddd<br>";
echo "Hello world!<br>";

$myVar = "prova";

$a = array("a" => "apple", "b" => "banana", "z" => "pesca", 3, true);

var_dump($a);

echo "<pre>";
print_r($a);
echo "</pre>";

?>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur molestiae inventore corrupti hic. Dolorem, dolorum, obcaecati maiores natus odit hic neque voluptatum architecto fugit enim asperiores quibusdam? Delectus, reiciendis tenetur.</p>

<?=$myVar;?>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus esse quae, ipsum veritatis at praesentium dicta provident eum blanditiis quod earum dignissimos deleniti odit? Aliquam modi necessitatibus voluptatem perspiciatis nihil.</p>

<?php

//aggiunge elementi
$a[] = "Nuovo elemento";
$a["k"] = "inserito con k";

//aggiorna elementi
$a["z"] = "NUOVA pesca più buona";
$a[0] = 51;

//cancella elementi
unset($a['b']);
unset($a[1]);

//mostra array
echo "<pre>";
print_r($a);
echo "</pre>";

//conta elementi array
$b[0] = 1;
$b[1] = 3;
$b[2] = 5;
var_dump(count($b));

//cerca in un array
$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}

//cambia ordine
shuffle($os);
echo "<pre>";
print_r($os);
echo "</pre>";

//ordine inverso
$input = array("uno", 4.0, "tre");
$reversed = array_reverse($input);
$preserved = array_reverse($input, true);

print_r($input);
echo "<hr>";
print_r($reversed);
echo "<hr>";
print_r($preserved);
echo "<hr>";

//merge
$array1 = array("primo");
$array2 = array(1 => "data");
$result = array_merge($array1, $array2);

var_dump($result);

echo "<hr>";
$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));
echo "<hr>";
$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));
echo "<hr>";
$array = array("size" => "XL", "color" => "gold");
print_r(array_values($array));