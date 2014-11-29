<!DOCTYPE html>
<html>
    <head>
        <title>Controle Financeiro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css" />

        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>

        <div class="container">
            <h1>Controle financeiro</h1>

            <form class="form-horizontal" action="seguranca/entrar.php" method="post">
                <div class="control-group">
                    <label class="control-label" for="login">Login</label>
                    <div class="controls">
                        <input type="text" name="login" id="login" placeholder="Login">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="senha">Senha</label>
                    <div class="controls">
                        <input type="password" name="senha" id="senha" placeholder="senha">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Entrar</button>
                    </div>
                </div>
            </form>
        </div>

    </body>
</html>