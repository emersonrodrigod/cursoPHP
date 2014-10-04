<?php

//Recebe o ano de nascimento da pessoa
$anoNascimento = 1999;
$idade = 2014 - $anoNascimento;

echo "Idade = $idade <br/>";

if ($idade >= 18) {
    echo "Você pode dirigir e votar <br/>";
} elseif ($idade >= 16 and $idade < 18) {
    echo "Você já pode votar";
} else {
    echo "Você poderá votar daqui a " . (16 - $idade) . " ano(s) <br/>";
    echo "Você poderá dirigir daqui a " . (18 - $idade) . " ano(s) <br/>";
}