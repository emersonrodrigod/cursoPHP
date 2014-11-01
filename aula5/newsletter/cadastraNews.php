<?php

$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "insert into newsletter (
            codigo,
            email,
            nome
         ) values (
            null,
            '$email',
            '$nome'
         )";

$resultado = mysql_query($sql);

if($resultado){
    echo "Email cadastro com sucesso! Agora você receberá as novidados do nosso site";
}else {
    echo "Erro ao cadastrar email";
}
        

