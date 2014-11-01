<?php
$conexao = @mysql_connect('localhost', 'root', '');
mysql_select_db('curso');

$sql = "select * from produtos";

$resultado = mysql_query($sql);
?>
<html>
    <head>
        <title>Listagem de produtos</title>
        <meta charset="UTF-8"/>
    </head>
    <body>

        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Validade</th>
                    <th>Preço de Compra</th>
                    <th>Preço de Venda</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $linha['codigo']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['validade']; ?></td>
                        <td><?php echo $linha['precoCompra']; ?></td>
                        <td><?php echo $linha['precoVenda']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </body>
</html>
