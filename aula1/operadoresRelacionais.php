<?php

/**
 * Operadores relacionas
 * sendo =, !=, >=, <=, >, <, ===
 * 
 * Precisam comparar dois ou mais valores sempre
 * Retornar verdadeiro ou falso
 * falso no php pode ser false ou vazio
 * verdadeiro no PHP pode ser 1 ou true
 */

$numero1 = 10;
$numero2 = 50;
$resultado = false;

$resultado = $numero1 == $numero2;
echo "Operador igual(==) - $numero1 = $numero2? $resultado <br/>";

$resultado = $numero1 != $numero2;
echo "Operador diferente(!=) - $numero1 != $numero2? $resultado<br/>";

$resultado = $numero1 >= $numero2;
echo "Operador Maior ou igual(>=) - $numero1 >= $numero2? $resultado<br/>";

$resultado = $numero1 <= $numero2;
echo "Operador Menor ou igual(<=) - $numero1 <= $numero2? $resultado<br/>";

$resultado = $numero1 < $numero2;
echo "Operador Menor que(<) - $numero1 < $numero2? $resultado<br/>";

$resultado = $numero1 > $numero2;
echo "Operador Maior que(>) - $numero1 > $numero2? $resultado<br/>";

$numero1 = 10;
$numero2 = 10.0;
$resultado = false;

$resultado = $numero1 === $numero2;
echo "Operador identico(===) - $numero1 === $numero2? $resultado<br/>";
