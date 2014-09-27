<?php

/**
 * Estruturas de controle
 * Se e Senão
 * 
 * A sintaxe é sempre SE(Condição) então faça alguma coisa
 * 
 * if(condição){
 *      Código se verdadeiro
 * }
 * else {
 *      Código se falso
 * }
 */
$numero1 = 10;
$numero2 = 15;


/**
 * Testar se o numero1 é maior do que o numero2
 * se for verdadeiro escreva o numero1 é maior que o numero2
 * se não escreva o numero1 é menor que o numero2 
 */
if ($numero1 > $numero2) {
    echo "O numero 1 é maior que o numero 2<br/>";
} else {
    echo "O numero 1 é menor que o numero 2<br/>";
}

if ($numero1 >= 10 and $numero2 <= 10) {
    echo "Verdadeiro";
} else {
    echo "Falso";
}
?>

