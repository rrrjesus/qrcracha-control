<?php
error_reporting(-1);
// Use sempre session_status (), para verificar se uma sessão já foi iniciada e ativa.
session_start(); // inicia a sessão php

// inclui a classe pdo de conexao instaciada com getinstance
include_once 'locked/seguranca.php';
include_once 'Conexao.php';
include_once 'functions.php';
include_once 'classes/Tables.php';
include_once 'classes/Buttons.php';
include_once 'classes/Modal.php';

$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
$_SESSION['url'] = $url;

$usuarionome = isset($_SESSION['usuarioNome']) ? $_SESSION['usuarioNome'] : 'VISITANTE';
$usuariosobrenome = isset($_SESSION['usuarioSobreNome']) ? $_SESSION['usuarioSobreNome'] : 'JAÇANÃ CONTROLE';
$usuariocpf = isset($_SESSION['usuarioCpf']) ? $_SESSION['usuarioCpf'] : '12345678910';
$usuarioemail = isset($_SESSION['usuarioEmail']) ? $_SESSION['usuarioEmail'] : 'visitantequevisita@gmail.com';
$usuariostatus = isset($_SESSION['usuarioStatus']) ? $_SESSION['usuarioStatus'] : 0;
$usuarionivelacesso = isset($_SESSION['usuarioNivelAcesso']) ? $_SESSION['usuarioNivelAcesso'] : 0;
$usuariofoto = isset($_SESSION['usuarioFoto']) ? $_SESSION['usuarioFoto'] : 'imagens/padrao.jpg';

$hashsession = isset($_SESSION['hashenter']) ? $_SESSION['hashenter'] : '';

$haship = hash('sha3-256', $tables->get_client_ip());

$hashprimary = hash('sha3-256', $hashsession.$haship);

?>

<!doctype html>
<html lang="pt-BR">

<?php require(__DIR__ . '/head.php'); ?>

<body>

<header>
    <!-- Menu de Navegação -->
    <?php require(__DIR__ . '/nav-bar.php');?>
</header>

<div class="container-fluid" role="main" xmlns="http://www.w3.org/1999/html">
    <main>

        <?php require(__DIR__ . '/pags/pag-system.php');?>

    </main>

<?php
// FOOTER
require(__DIR__ . '/footer.php');
?>
</div>

<script src="assets/js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
<script src="assets/js/jquery/validation/1.13.0.additional-methods.min.js"></script>
<script src="assets/js/1.4.1.jquery.maskedinput.js"></script>

<!-- Bootstrap core JavaScript -->
<!-- ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="bootstrap.bundle.js"></script>
<script src="bootstrap.min.js"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="assets/js/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap 4 Addon -->
<script type="text/javascript" src="assets/js/jquery.smartmenus.bootstrap-4.js"></script>

</body>
</html>

