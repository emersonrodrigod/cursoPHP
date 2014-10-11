<?php

//declarando uma variavel do tipo array
$conjunto = array();

//atribuindo valores a um array
$produtos = array('CocaCola','Omo','Guarana antartica','Alcool da ilha');

for($i = 0; $i < count($produtos); $i++ ){
    echo $produtos[$i] . "<br/>";
}


$produtos[0] = 'cocaCola';
$produtos[1] = 'Omo';

//echo $produtos[1];

$produtos[] = 'cocaCola';
$produtos[] = 'Guarana';

//echo $produtos[1];

