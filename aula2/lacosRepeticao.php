<?php

/*
 * Laços de repetição são comandos que repetem instruçoes
 * são eles:
 * For e While
 */

/*
 * FOR : Estrutra
 * 
 * for(instrucao1 = inicio; instrucao2 = condicao; intrucao3 = incremento){
 *  código a ser executado
 * }
 */

for ($i = 5; $i < 10; $i++) {
    echo "emerson <br/>";
}

/*
 * While : Estrutura
 * 
 * while(condicao) {
 *  instrucao
 * }
 */

$numero = 0;
$numero2 = 100;
while ($numero < 100 and $numero2 != 100) {
    echo "Emerson <br/>";
    $numero ++;

    if ($numero == 80) {
        $numero2 = 0;
    }
}
