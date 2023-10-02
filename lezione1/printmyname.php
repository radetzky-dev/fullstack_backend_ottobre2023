<?php

/*
This is a comment multi
lines
commenti
*/

// this is a single line comment

# another comment type - meno usata

$name ="Paolo";

printMyName($name);
printMyName("Maria");

// Questo stampa il mio nome
echo "My name is $name";


/**
 * print_my_name
 * funzione per stampare il nome
 * @param  mixed $name
 * @return void
 */
function printMyName($name) {
    echo "<strong>Hello " . $name . "!</strong><br>";
}
