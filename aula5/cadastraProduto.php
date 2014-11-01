<?php

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$validade = $_POST['validade'];
$precoVenda = $_POST['precoVenda'];
$precoCompra = $_POST['precoCompra'];

$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$sql = "insert into produtos(
            codigo, 
            nome, 
            validade,
            precoCompra,
            precoVenda
        ) values (
           $codigo,
           '$nome',
           '$validade',
           $precoCompra,
           $precoVenda
        )";

$resultado = mysql_query($sql);

if($resultado == true){
    header("location:lista.php");
}else {
    echo "Erro ao cadastrar o dado";
}