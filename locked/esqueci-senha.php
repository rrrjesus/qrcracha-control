<?php
error_reporting(-1);
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php
include_once 'head.php';
?>

<body role="document">

<div class="container">
    <div class="card card-container">
        <div class="text-center">
            <h4><strong>Esqueceu a senha ?</strong></h4>
        </div>
        <img id="logo-img" class="logo-img" src="imagens/livrologin.png"/>
        <form class="form-signin" id="esqueci-senha" method="POST" action="alterasenha/envia-nova-senha.php">
            <div class="alert alert-success" role="alert">
                Informe seu e-mail e enviaremos instruções para você criar sua senha.
            </div>
            <input type="text" id="inputEmail" class="form-control" data-toggle="tooltip" data-placement="right"
                   title="Digite seu email cadastrado - Ex: a@a.com" name="email" placeholder="email" autofocus>
            <button class="btn btn-lg btn-primary btn-block btn-signin" data-toggle="tooltip" data-placement="right"
                    title="Entrar no Sistema SisdamJT" type="submit">Enviar
            </button>
            <div class="signin-help">
                <p class="text-center text-danger">
                    <?php
                    if (isset($_SESSION['loginErro'])) {
                        echo $_SESSION['loginErro'];
                        unset($_SESSION['loginErro']);
                    }
                    ?>
                </p>
            </div>
            <h5 class="text-center">Login Sisdam Web ? <a href="index.php">Clique aqui</a></h5><br>
            <h5>
                <div class="text-center">Desenvolvido por Rodolfo R R de Jesus</div>
            </h5>
            <h5>
                <div class="text-center">Contato:<a href=# data-toggle=tooltip title="Email do Suporte">sisdamjt@gmail.com</a>
                </div>
            </h5>
        </form>
    </div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/jquery/validation/1.15.1.jquery.validate.min.js"></script>
<script src="assets/js/jquery/validation/1.13.1.additional-methods.min.js"></script>

</body>
</html>
