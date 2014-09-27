<?php

/**
 * Operadores aritmeticos são os operadores padrão da matemática
 * basica (+,-,*, /)
 */
$numero1 = 5;
$numero2 = 10;
$resultado = 0;

//Adição
$resultado = $numero1 + $numero2;
echo '$numero1 + $numero2 = ' . $resultado . '<br/>';

//subtração
$resultado = $numero1 - $numero2;
echo '$numero1 - $numero2 = ' . $resultado . '<br/>';

//multiplicação
$resultado = $numero1 * $numero2;
echo '$numero1 * $numero2 = ' . $resultado . '<br/>';

//divisão
$resultado = $numero1 / $numero2;
echo "$numero1 / $numero2 = " . $resultado . '<br/>';

//Módulo % resto da divisão
$resultado = $numero1 % 5;
echo "$numero1 % 5 = " . $resultado . '<br/>';

$resultado = $numero1 /2 + $numero2*5;

?>

