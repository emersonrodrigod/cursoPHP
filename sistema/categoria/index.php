<?php
require 'conexao/conecta.php';

$sql = "select * from categoria";

$resultado = mysql_query($sql);
?>

<div class="row-fluid">
    <div class="span12">
        <h2>Cadastro de Categorias</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <a class="btn btn-primary" href="index.php?pagina=cadastroCategoria">Cadastrar nova Categoria</a>
    </div>

</div>

<br/>

<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="15%">#ID</th>
                    <th>Nome</th>
                    <th width="15%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $linha['id']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td>
                            <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=editarCategoria" class="btn btn-mini btn-primary"><i class="icon-pencil"></i></a>
                            <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=excluirCategoria" class="btn btn-mini btn-danger"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>


