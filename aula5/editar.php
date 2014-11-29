<?php
$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$codigo = $_GET['codigo'];

$sql = "select * from produtos where codigo = $codigo";

$resultado = mysql_query($sql);

$produto = mysql_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post" action="editaProduto.php">
            <fieldset>
                <legend>Cadastro de produtos</legend>
                <label>Código</label>
                <input type="text" disabled="true"  value="<?php echo $produto['codigo'];?>"/>
                <input type="hidden" name="codigo" value="<?php echo $produto['codigo'];?>"/>
                <br/>

                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo $produto['nome'];?>"/>
                <br/>

                <label>Validade</label>
                <input type="text" name="validade" value="<?php echo $produto['validade'];?>"/>
                <br/>

                <label>Preço de Compra</label>
                <input type="text" name="precoCompra" value="<?php echo $produto['precoCompra'];?>"/>
                <br/>

                <label>Preço Venda</label>
                <input type="text" name="precoVenda" value="<?php echo $produto['precoVenda'];?>"/>
                <br/>

                <input type="submit" value="cadastrar"/>
            </fieldset>
        </form>
    </body>
</html>
