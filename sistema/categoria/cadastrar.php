<?php
require 'conexao/conecta.php';

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
 
    $sql = "insert into categoria values (null, '$nome')";
    
    $resultado = mysql_query($sql);
    
    if($resultado){
        header("location:index.php?pagina=categoria");
    }
    else {
        echo "Ocorreu um erro ao cadastrar os dados" . mysql_error();
    }
}

?>

<div class="row-fluid">
    <div class="span12">
        <h2>Cadastro de Categorias - Cadastrar</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <form class="form-horizontal well" action="" method="post">
            <div class="control-group">
                <label class="control-label" for="nome">Nome</label>
                <div class="controls">
                    <input type="text" name="nome" id="nome" placeholder="Nome da categoria">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Cadastrar</button>
                    <a href="index.php?pagina=categoria" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
