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

<div style="clear: both"></div>

<div class="row-fluid">
    <div class="span6">
        <h4>Gastos por Categoria</h4>
        <hr/>
        <div id="piechart"></div>
    </div>

    <div class="span6">
        <h4>Receitas por Categoria</h4>
        <hr/>
        <div id="receitas"></div>
    </div>
</div>

<?php
$sql = "select categoria.nome as categoria, sum(valor) as valor from lancamento inner join categoria on (categoria.id = lancamento.id_categoria) where tipo = 'D' group by categoria.nome";
$resultado = mysql_query($sql);

$dados = array(array("Categoria", "Valor"));
$maior = 0;
$categoria;

while ($linha = mysql_fetch_assoc($resultado)) {
    if ($maior < $linha['valor']) {
        $maior = $linha['valor'];
        $categoria = $linha['categoria'];
    }
    array_push($dados, array($linha['categoria'], round($linha['valor'])));
}

$grafico = json_encode($dados);
?>

<?php
$sqlReceita = "select categoria.nome as categoria, sum(valor) as valor from lancamento inner join categoria on (categoria.id = lancamento.id_categoria) where tipo = 'R' group by categoria.nome";
$resultadoReceita = mysql_query($sqlReceita);

$dadosReceita = array(array("Categoria", "Valor"));

while ($linha = mysql_fetch_assoc($resultadoReceita)) {
    array_push($dadosReceita, array($linha['categoria'], round($linha['valor'])));
}

$graficoReceita = json_encode($dadosReceita);
?>

<div class="alert alert-error">
    <strong>Cuidado! Você está gastando muito com a categoria <?php echo $categoria; ?></strong>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

    google.load("visualization", "1", {packages: ["corechart"]});
    google.setOnLoadCallback(drawChart);
    google.setOnLoadCallback(drawChartR);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $grafico; ?>);

        var options = {
            title: 'Gastos por categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    function drawChartR() {

        var data = google.visualization.arrayToDataTable(<?php echo $graficoReceita; ?>);

        var options = {
            title: 'Receitas por categoria'
        };

        var chartR = new google.visualization.PieChart(document.getElementById('receitas'));

        chartR.draw(data, options);
    }

</script>
