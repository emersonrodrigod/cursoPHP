<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $conexao = @mysql_connect('localhost', 'root', '');
                mysql_select_db('curso');

                $sql = "select * from newsletter";

                $resultado = mysql_query($sql);
                ?>

                <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $linha['codigo']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['email']; ?></td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </body>
</html>


