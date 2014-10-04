<?php

$numero = $_POST['numero'];
$texto = $numero;
$soma = 0;

for ($i = $numero; $i > 1; $i--) {
    $texto = $texto . "*" . ($i - 1);
    $soma = $soma + $i * $i - 1;
}

$texto = $texto . " = ";
echo "o Fatorial de $numero eh: " . $texto . $soma;
