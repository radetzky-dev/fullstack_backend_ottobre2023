<?php

function foo()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs <br>";
    if ($numargs >= 2) {
        echo "Second argument is: " . func_get_arg(1) . "<br>";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "Argument $i is: " . $arg_list[$i] . "<br>";
    }
}

/**
 * sumAllElements
 *
 * @return string
 */
function sumAllElements(): string
{
    $somma = 0;
    $arg_list = func_get_args();
    for ($i = 0; $i < func_num_args(); $i++) {
        if (is_numeric($arg_list[$i])) {
            $somma = $somma + $arg_list[$i];
        } else {
            if (is_string($arg_list[$i])) {
                echo "Il valore " . $arg_list[$i] . " non è numerico non lo conto<br>";
            } else {
                echo "Il parametro non è numerico non lo conto<br>";
            }
        }
    }
    return $somma;
}

/**
 * simpleSum
 *
 * @param  int $a
 * @param  int $b
 * @return int
 */
function simpleSum(int $a, int $b): int
{
    return $a + $b;
}

/**
 * simpleSumNoSign
 *
 * @param  mixed $a
 * @param  mixed $b
 * @return int
 */
function simpleSumNoSign($a, $b) : int
{
    if (is_numeric($a) && is_numeric($b)) {
        return $a + $b;
    }
    return 0;
}

foo(1, 2, 3);

foo("paolo", "mario", "silvia", "maria", "dario");
$myArr = ["auto" => "mini", "ferrari"];

echo "Somma di due numeri " . simpleSum(3, 2) . "<br>";
echo "Somma di due numeri " . simpleSumNoSign("p", 2) . "<br>";

echo "Somma di vari numeri " . sumAllElements(2, true, 1, "paolo", 1, 1, $myArr) . "<br>";
