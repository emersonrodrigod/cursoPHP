
<?php
session_start();

if ($_SESSION['logado'] != true) {
    header("location:index.php");
}

session_regenerate_id();
?>

Você está logado clique aqui para sair <a href="sair.php">Sair</a>

