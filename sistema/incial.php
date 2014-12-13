<?php
$total = 0;
require 'conexao/conecta.php';

$sql = "select * from conta";
$resultado = mysql_query($sql);

function recuperaSaldo($idConta) {
    $sqlReceitas = "select sum(valor) as valor from lancamento where tipo = 'R' and situacao = 'P' and id_conta = $idConta ";
    $Resultadoreceitas = mysql_query($sqlReceitas);
    $receitas = mysql_fetch_assoc($Resultadoreceitas);

    $sqlDespesas = "select sum(valor) as valor from lancamento where tipo = 'D' and situacao = 'P' and id_conta = $idConta";
    $ResultadoDespesas = mysql_query($sqlDespesas);
    $despesas = mysql_fetch_assoc($ResultadoDespesas);

    $saldoGeral = $receitas['valor'] - $despesas['valor'];
    return $saldoGeral;
}
?>


<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Conta</th>
            <th width="15%">Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
            <tr>
                <td><?php echo $linha['nome']; ?></td>
                <?php $saldo = recuperaSaldo($linha['id']) + $linha['saldoInicial']; ?>
                <td class="<?php echo($saldo < 0 ? 'valorDespesa' : 'valorReceita'); ?>">
                    R$ <?php echo number_format($saldo, 2, ',', '.'); ?>
                </td>
            </tr>
            <?php $total += $saldo; ?>
        <?php endwhile; ?>
    </tbody>
</table>

<div id="total" class="pull-right">
    <h3 class="<?php echo($total < 0 ? 'valorDespesa' : 'valorReceita'); ?>">
        R$ <?php echo number_format($total, 2, ',', '.'); ?>
    </h3>
</div>
