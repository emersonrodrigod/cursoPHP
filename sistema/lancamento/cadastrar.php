<?php
require 'conexao/conecta.php';

if (isset($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $vencimento = date("Y-d-m", strtotime($_POST['vencimento']));
    $situacao = $_POST['situacao'];
    $conta = $_POST['id_conta'];
    $categoria = $_POST['id_categoria'];
    $tipo = $_POST['tipo'];
    
    $dataLancamento = date("Y-m-d");

    $sql = "insert 
            into lancamento values (
                null, 
                '$dataLancamento', 
                '$descricao', 
                $valor, 
                $categoria, 
                $conta, 
                '$tipo', 
                '$situacao', 
                '$vencimento'
            )";

    $resultado = mysql_query($sql);

    if ($resultado) {
        header("location:index.php?pagina=lancamento");
    } else {
        echo "Ocorreu um erro ao cadastrar os dados" . mysql_error();
    }
}
?>

<div class="row-fluid">
    <div class="span12">
        <h2>Lançamentos - Cadastrar</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <form class="form-horizontal well" action="" method="post">
            <div class="control-group">
                <label class="control-label" for="descricao">Descrição</label>
                <div class="controls">
                    <input type="text" name="descricao" id="descricao" required="true">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="valor">Valor</label>
                <div class="controls">
                    <input type="text" name="valor" id="valor" required="true">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="tipo">Tipo</label>
                <div class="controls">
                    <select name="tipo" required="">
                        <option value="D">Despesa</option>
                        <option value="R">Receita</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="vencimento">Vencimento</label>
                <div class="controls">
                    <input type="text" name="vencimento" id="vencimento" required="true" value="<?php echo date("d/m/Y"); ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="categoria">Categoria</label>
                <div class="controls">
                    <select name="id_categoria" required="">
                        <option value="">Selecione uma categoria</option>
                        <?php
                        $sql = "select * from categoria";
                        $resultado = mysql_query($sql);
                        ?>

                        <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                        <option value="<?php echo $linha['id']?>"><?php echo $linha['nome'];?></option>
                        <?php endwhile; ?>

                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="conta">Conta</label>
                <div class="controls">
                    <select name="id_conta" required="">
                        <option value="">Selecione uma conta</option>
                        <?php
                        $sql = "select * from conta";
                        $resultado = mysql_query($sql);
                        ?>

                        <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                        <option value="<?php echo $linha['id']?>"><?php echo $linha['nome'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="situacao">Situação</label>
                <div class="controls">
                    <select name="situacao" required="">
                        <option value="A">Aberto</option>
                        <option value="P">Pago</option>
                    </select>
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
