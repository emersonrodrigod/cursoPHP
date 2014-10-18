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
        echo "Não é permitido cadastrar produtos com esse nome";
    } elseif (verificaCodigo($codigo)) {
        echo "Código já cadastrado";
    } else {
        $_SESSION['produtos'][] = array(
            'codigo' => $codigo,
            'nome' => $nome,
            'validade' => $validade,
            'precoCompra' => $precoCompra,
            'precoVenda' => $precoVenda
        );

        echo "Produto cadastro com sucesso!!";
    }
}

if (isset($_GET['acao']) and $_GET['acao'] == 'excluir') {
    unset($_SESSION['produtos'][$_GET['id']]);
    echo $_GET['id'];
    echo "Produto removido com sucesso!";
}
?>

<html>
    <header>
        <title>Cadastro de produtos</title>
        <meta charset="UTF-8"/>
    </header>
    <body>
        <form method="post" action="">
            <fieldset>
                <legend>Cadastrar novo produto</legend>

                <label>Codigo</label>
                <input type="text" name="codigo" required/>
                <br/>

                <label>Nome</label>
                <input type="text" name="nome" required/>
                <br/>

                <label>validade</label>
                <input type="text" name="validade" required/>
                <br/>

                <label>preço de compra</label>
                <input type="text" name="precoCompra" required/>
                <br/>

                <label>preço de venda</label>
                <input type="text" name="precoVenda" required/>
                <br/>

                <input type="submit" value="cadastrar" />
            </fieldset>
        </form>
        <br/>

        <h3>Produtos cadastrados</h3>
        <table border="1" cellspacing="0" cellpadding="2">
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
    </body>
</html>


