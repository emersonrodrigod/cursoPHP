<?php
require('./verifica.php');

function verificaCodigo($codigo) {
    foreach ($_SESSION['produtos'] as $produto) {
        if ($codigo == $produto['codigo']) {
            return true;
        }

        return false;
    }
}

if (isset($_POST['codigo'])) {

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $validade = $_POST['validade'];
    $precoCompra = $_POST['precoCompra'];
    $precoVenda = $_POST['precoVenda'];

    if ($nome == "emerson") {
        echo '<div class="alert alert-error">Não é permitido cadastrar produtos com esse nome</div>';
    } elseif (verificaCodigo($codigo)) {
        echo '<div class="alert alert-error">Código já cadastrado</div>';
    } else {
        $_SESSION['produtos'][] = array(
            'codigo' => $codigo,
            'nome' => $nome,
            'validade' => $validade,
            'precoCompra' => $precoCompra,
            'precoVenda' => $precoVenda
        );

        echo '<div class="alert alert-success">Produto cadastro com sucesso!!</div>';
    }
}

if (isset($_GET['acao']) and $_GET['acao'] == 'excluir') {
    unset($_SESSION['produtos'][$_GET['id']]);
    echo '<div class="alert alert-success">Produto removido com sucesso!</div>';
}
?>

<html>
    <head>
        <title>Cadastro de produtos</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" />
    </head>
    <body>
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <form method="post" class="form form-horizontal well" action="">
                        <fieldset>
                            <legend>Cadastrar novo produto</legend>
                            <div class="control-group">
                                <label class="control-label" for="codigo">Codigo</label>
                                <div class="controls">
                                    <input type="text" id="codigo" name="codigo" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Nome</label>
                                <div class="controls">
                                    <input type="text" name="nome" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">validade</label>
                                <div class="controls">
                                    <input type="text" name="validade" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">preço de compra</label>
                                <div class="controls">
                                    <input type="text" name="precoCompra" required/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">preço de venda</label>
                                <div class="controls">
                                    <input type="text" name="precoVenda" required/>
                                </div>
                            </div>

                            <input type="submit" value="cadastrar" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row-fluid"

                 <div class="span12">

                    <h3>Produtos cadastrados</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Validade</th>
                                <th>Preco Compra</th>
                                <th>Preco Venda</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['produtos'])) : ?>
                                <?php
                                foreach ($_SESSION['produtos'] as $codigo => $produto) {
                                    echo "<tr>";
                                    echo "<td>" . $produto['codigo'] . "</td>";
                                    echo "<td>" . $produto['nome'] . "</td>";
                                    echo "<td>" . $produto['validade'] . "</td>";
                                    echo "<td>" . $produto['precoCompra'] . "</td>";
                                    echo "<td>" . $produto['precoVenda'] . "</td>";
                                    echo '<td><a href="produtos.php?acao=excluir&id=' . $codigo . '">excluir</a></td>';
                                    echo "</tr>";
                                }
                                ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </body>
</html>


