<?php

/**
 * Operadores Lógicos
 * fazem parte da algebra booleana
 * E = and ou &&
 * OU = or ||
 * NÃO = !
 */

$numero1 = 10;
$numero2 = 15;
$resultado = false;

$resultado = $numero1 > 10 and $numero2 < 10;
echo "numero1 eh maior que 10 E numero2 eh menor 10? $resultado<br/>";

$resultado = $numero1 == 10 or $numero2 < 10;
echo "numero1 eh igual a 10 OU numero2 eh menor 10? $resultado<br/>";

$resultado = !($numero1 == 10) and !($numero2 < 10);
echo "NAO numero1 eh igual a 10 OU NAO numero2 eh menor 10? $resultado<br/>";

?>

