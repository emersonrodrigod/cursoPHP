<?php
if (isset($_POST['numero1'])) {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacao = $_POST['operacao'];

    if ($operacao == "+") {
        echo soma($numero1, $numero2);
    } elseif ($operacao == "-") {
        echo subtracao($numero1, $numero2);
    } elseif ($operacao == "*") {
        echo multiplicacao($numero1, $numero2);
    } else {
        if ($numero2 == 0) {
            echo "Não existe divisão por zero";
        } else {
            echo divisao($numero1, $numero2);
        }
    }
}

function soma($num1, $num2) {
    return $num1 + $num2;
}

function subtracao($num1, $num2) {
    return $num1 - $num2;
}

function divisao($num1, $num2) {
    return $num1 / $num2;
}

function multiplicacao($num1, $num2) {
    return $num1 * $num2;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            form {
                background: #f1f1f1;
                height: 100px;
                width: 200px;
            }  
        </style>
    </head>
    <body>
        <form method="post" action="">
            <label>Numero 1</label>
            <input type="text" name="numero1">
            <select name="operacao">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <label>Numero 2</label>
            <input type="text" name="numero2">

            <input type="submit" value="Calcular">

        </form>
    </body>
</html>
