<?php

require 'conexao/conecta.php';

//Recupera o registro para alteração
$id = $_GET['id'];

$sql = "update lancamento set situacao = 'P' where id = $id";
$resultado = mysql_query($sql);

if ($resultado) {
    header("location:index.php?pagina=lancamento");
}
?>
