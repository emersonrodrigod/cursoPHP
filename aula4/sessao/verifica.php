<?php
session_start();
$usuario = 'emerson';
$senha = '123456';

if($_POST['usuario'] == $usuario and $_POST['senha'] == $senha){
    $_SESSION['logado'] = true;
    header("location:restrito.php");
}
else {
    echo "Usuário ou senha invalidos!";
}
