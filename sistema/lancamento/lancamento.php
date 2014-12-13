<?php
require '../conexao/conecta.php';
$situacao = '';
if (isset($_GET['situacao']) && $_GET['situacao'] != '') {
    $situacao = $_GET['situacao'];
    $sql = "select 
            lancamento.id as id, 
            descricao,
            vencimento,
            valor, 
            situacao, 
            categoria.nome as categoria,
            tipo
        from 
            lancamento join categoria on (
                id_categoria = categoria.id
            )
        where situacao = '" . $_GET['situacao'] . "'";
} else {

    $sql = "select 
            lancamento.id as id, 
            descricao,
            vencimento,
            valor, 
            situacao, 
            categoria.nome as categoria,
            tipo
        from 
            lancamento join categoria on (
                id_categoria = categoria.id
            )";
}

$resultado = mysql_query($sql);
?>

<div class="row-fluid">
    <div class="span12">
        <h2>Lançamentos</h2>
    </div>
</div>

<div class="row-fluid">
    <div class="span6">
        <a class="btn btn-primary" href="index.php?pagina=cadastroLancamento">Novo Lançamento</a>
    </div>

    <div class="span6 pull-right">
        <form class="form">
            <select name="filtro" id="filtro">
                <option value="">Todos os lançamentos</option>
                <option value="P" <?php echo ($situacao == 'P' ? 'selected' : '') ?>>Lançamentos Pagos</option>
                <option value="A" <?php echo ($situacao == 'A' ? 'selected' : '') ?>>Lançamentos em aberto</option>
            </select>
        </form>
    </div>

</div>

<br/>

<div class="row-fluid">
    <div class="span12">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Vencimento</th>
                    <th>Valor</th>
                    <th >Situação</th>
                    <th width="15%" style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($linha = mysql_fetch_assoc($resultado)) : ?>
                    <tr>
                        <td><?php echo $linha['descricao']; ?></td>
                        <td><?php echo $linha['categoria']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($linha['vencimento'])); ?></td>
                        <td class="<?php echo($linha['tipo'] == 'D' ? 'valorDespesa' : 'valorReceita'); ?>">
                            R$ <?php echo number_format($linha['valor'], 2, ',', '.'); ?>
                        </td>
                        <td><?php echo ($linha['situacao'] == 'A' ? 'Aberto' : 'Pago'); ?></td>
                        <td style="text-align: center;">
                            <?php if ($linha['situacao'] == 'A') : ?>
                                <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=pagarLancamento" class="btn btn-mini btn-success confirma" title="Pagar Lançamento"><i class="icon-check"></i></a>
                            <?php endif; ?>

                            <?php if ($linha['situacao'] == 'P') : ?>
                                <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=estornarLancamento" class="btn btn-mini btn-primary confima" title="Estornar Lançamento"><i class="icon-check"></i></a>
                            <?php endif; ?>

                            <a href="index.php?id=<?php echo $linha['id']; ?>&pagina=excluirLancamento" class="btn btn-mini btn-danger confirma" title="Excluir Lançamento"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$sqlReceitas = "select sum(valor) as valor from lancamento where tipo = 'R' and situacao = 'P'";
$Resultadoreceitas = mysql_query($sqlReceitas);
$receitas = mysql_fetch_assoc($Resultadoreceitas);

$sqlDespesas = "select sum(valor) as valor from lancamento where tipo = 'D' and situacao = 'P'";
$ResultadoDespesas = mysql_query($sqlDespesas);
$despesas = mysql_fetch_assoc($ResultadoDespesas);

$saldoGeral = $receitas['valor'] - $despesas['valor'];
?>


<div class="row-fluid">
    <div class="span4 offset8">
        <h4>Total de Receitas : <span class="valorReceita">R$ <?php echo number_format($receitas['valor'], 2, ',', '.'); ?></span></h4>
        <h4>Total de Despesas : <span class="valorDespesa">R$ <?php echo number_format($despesas['valor'], 2, ',', '.'); ?></span></h4>
        <h3>
            Saldo Geral : 
            <span class="<?php echo ($saldoGeral < 0 ? 'valorDespesa' : 'valorReceita') ?>">
                R$ <?php echo number_format($saldoGeral, 2, ',', '.'); ?>
            </span>
        </h3>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#filtro").on('change', function() {
            var valor = $(this).val();
            $("#lancamento").html("Carregando...");
            $("#lancamento").load("lancamento/lancamento.php?situacao=" + valor);
        });

        $('.confirma').click(function() {
            var url = $(this).attr('href');
            var answer = confirm("Realmente executar esta ação?")
            if (answer) {
                window.location = url;
            } else {
                return false;
            }
        });
    });
</script>

