<?php

$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$codigo = $_GET['codigo'];

$sql = "delete from produtos where codigo = $codigo";

$resultado = mysql_query($sql);

if ($resultado == true) {
    header("location:lista.php");
} else {
    echo "Erro ao excluir o produto";
}
