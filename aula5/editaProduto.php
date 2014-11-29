<?php

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$validade = $_POST['validade'];
$precoVenda = $_POST['precoVenda'];
$precoCompra = $_POST['precoCompra'];

$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$sql = "update produtos set 
            nome = '$nome',
            validade = '$validade',
            precoVenda = $precoVenda,
            precoCompra = $precoCompra
        where codigo = $codigo";

$resultado = mysql_query($sql);

if($resultado == true){
    header("location:lista.php");
}else {
    echo "Erro ao editar o dado";
}

    
?>
