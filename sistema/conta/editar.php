<?php
require 'conexao/conecta.php';

//Recupera o registro para alteração
$id = $_GET['id'];
$sql = "select * from conta where id = $id";
$resultado = mysql_query($sql);
$conta = mysql_fetch_assoc($resultado);

//Altera o registr no banco de dados
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $saldoInicial = $_POST['saldoInicial'];

    $sql = "update conta set nome =  '$nome', saldoInicial = $saldoInicial where id = $id";

    $resultado = mysql_query($sql);

    if ($resultado) {
        header("location:index.php?pagina=conta");
    } else {
        echo "Ocorreu um erro ao Editar os dados" . mysql_error();
    }
}
?>

<div class="row-fluid">
    <div class="span12">
        <h2>Cadastro de contas - Editar</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <form class="form-horizontal well" action="" method="post">
            <div class="control-group">
                <label class="control-label" for="nome">Nome</label>
                <div class="controls">
                    <input type="text" name="nome" id="nome" placeholder="Nome da conta" value="<?php echo $conta['nome']; ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="saldoInicial">Saldo Inicial</label>
                <div class="controls">
                    <input type="text" name="saldoInicial" id="saldoInicial" placeholder="Saldo inicial da conta" value="<?php echo $conta['saldoInicial']; ?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Cadastrar</button>
                    <a href="index.php?pagina=conta" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

