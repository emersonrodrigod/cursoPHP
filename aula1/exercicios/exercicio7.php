<?php

$salario = 100;

if ($salario >= 300) {
    $novoSalario = $salario + ($salario * 30) / 100;
} else {
    $novoSalario = $salario + ($salario * 50) / 100;
}

echo "Salário antigo = $salario <br/>";
echo "Novo salário = $novoSalario";
