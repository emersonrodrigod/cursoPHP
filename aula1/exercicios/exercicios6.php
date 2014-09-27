<?php

$nota1 = 7;
$nota2 = 7;
$nota3 = 7;
$nota4 = 9.3;

$soma = $nota1 + $nota2 + $nota3 + $nota4;
$media = $soma / 4;

echo "Média do aluno = $media <br/>";

if ($media >= 7.0) {
    echo "Aluno aprovado!";
} else {
    echo "Aluno reprovado :(";
}