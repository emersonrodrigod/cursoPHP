<?php
require 'conexao/conecta.php';

$sql = "select * from conta";

$resultado = mysql_query($sql);
?>

<div class="row-fluid">
    <div class="span12">
        <h2>Cadastro de contas</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <a class="btn btn-primary" href="index.php?pagina=cadastroConta">Cadastrar nova Conta</a>
    </div>

</div>

<br/>

<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="15%">Saldo Inicial</th>
                    <th width="15%">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                <tr>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['saldoInicial']; ?></td>
                    <td>
                        <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=editarConta" class="btn btn-mini btn-primary"><i class="icon-pencil"></i></a>
                        <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=excluirConta" class="btn btn-mini btn-danger"><i class="icon-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>