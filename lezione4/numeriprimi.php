<html>
    <head>
        <title>Numeri primi</title>
    </head>
    <style>
        .notprime {
            font-size: 20px;
            color: red;
            font-weight: 300;
            display: inline;
            border: 1px solid red;
            width: 20px !important;
        }

        .prime {
            font-size: 20px;
            color: blue;
            font-weight: 700;
            display: inline;
            border: 1px solid blue;
            width: 20px !important;

        }
        </style>
<body>

<h2>Blue is a prime number</h2>
<?php

//ciclo sui primi 100 numeri 1-100

function primeCheck($number)
{
    if ($number == 1) {
        return 0;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return 0;
        }
    }
    return 1;
}

function primeOrNot($number)
{
    $flag = primeCheck($number);
    if ($flag == 1) {
        echo "<div class='prime'>" . $number . "</div> ";
    } else {
        echo "<div class='notprime'>" . $number . "</div> ";
    }
}

//check 1 - 100
for ($i = 1; $i <= 100; $i++) {
    primeOrNot($i);
    if ($i % 10 == 0) {
        echo "<br>";
    }
}

?>
</body>
</html>