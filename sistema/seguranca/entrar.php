<?php

session_start();

require '../conexao/conecta.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "select * from usuario where login = '$login' and senha = '$senha'";

$resultado = mysql_query($sql);

if (mysql_num_rows($resultado) == 1) {
    $_SESSION['logado'] = true;
    header("location:../index.php");
} else {
    $_SESSION['logado'] = false;
    echo "Usuário ou senha inválidos";
}