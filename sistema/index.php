<?php require './seguranca/verifica.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Controle Financeiro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" />
        <link rel="stylesheet" href="css/estilos.css" />

        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>

        <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php">Controle Financeiro</a>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Painel de Controle</a></li>
                            <li><a href="index.php?pagina=lancamento">Lançamentos</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?pagina=categoria">Categorias</a></li>
                                    <li><a href="index.php?pagina=conta">Contas</a></li>
                                    <li><a href="#">Usuários</a></li>
                                </ul>
                            </li>
                            <li><a href="seguranca/sair.php">Sair</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div>
            </div><!-- /navbar-inner -->
        </div>

        <div style="margin-top: 80px;"></div>

        <div id="conteudo" class="container">
            <?php
            $pagina = (isset($_GET['pagina']) ? $_GET['pagina'] : '');

            switch ($pagina) {
                case '' : include './incial.php';
                    break;
                case 'conta' : include './conta/index.php';
                    break;
                case 'cadastroConta' : include './conta/cadastrar.php';
                    break;
                case 'excluirConta' : include './conta/excluir.php';
                    break;
                case 'editarConta' : include './conta/editar.php';
                    break;
                case 'categoria' : include './categoria/index.php';
                    break;
                case 'cadastroCategoria' : include './categoria/cadastrar.php';
                    break;
                case 'editarCategoria' : include './categoria/editar.php';
                    break;
                case 'excluirCategoria' : include './categoria/excluir.php';
                    break;
                case 'lancamento' : include './lancamento/index.php';
                    break;
                case 'cadastroLancamento' : include './lancamento/cadastrar.php';
                    break;
                case 'pagarLancamento' : include './lancamento/pagar.php';
                    break;
                case 'estornarLancamento' : include './lancamento/estornar.php';
                    break;
                case 'excluirLancamento' : include './lancamento/excluir.php';
                    break;
                case 'lanc' : include './lancamento/lancamento.php';
                    break;
            }
            ?>
        </div>

        <footer class="container">
            <hr/>
            <h5>Sistema desenvolvido no curso de PHP do IVB</h5>
        </footer>
    </body>
</html>
