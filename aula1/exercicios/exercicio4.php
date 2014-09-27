<?php

$a = 10;
$b = 5;
$c = 50;
$d = 30;

$soma = $a + $c;
$multiplicacao = $b * $d;

if ($soma > $multiplicacao) {
    echo "A+C é maior do que B*D";
} elseif ($soma == $multiplicacao) {
    echo "A+C é igual a B*D";
} else {
    echo "A+C é menor a B*D";
}

