<?php
require 'conexao/conecta.php';

$id = $_GET['id'];

$sql = "delete from conta where id = $id";

$resultado = mysql_query($sql);

if($resultado){
    header("location:index.php?pagina=conta");
}else {
    echo "Erro ao excluir o registro: " . mysql_error(); 
}
?>
