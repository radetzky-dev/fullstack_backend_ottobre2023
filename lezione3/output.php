<?php

print "ciao<br>"."ddd<br>";
echo "Hello world!<br>";

$myVar="prova";

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
$a[] ="Nuovo elemento";
$a["k"] ="inserito con k";

//aggiorna elementi
$a["z"] ="NUOVA pesca più buona";
$a[0] = 51;

//cancella elementi
unset($a['b']);
unset($a[1]);

//mostra array
echo "<pre>";
print_r($a);
echo "</pre>";