<?php
/**
 * Created by Rodolfo R R Jesus.
 * Date: 09/06/2017
 * Time: 13:52
 */
error_reporting(-1);
session_start();
include_once '../locked/seguranca-admin.php';
include_once '../functions.php';
include_once '../conexao.php';

error_reporting(-1);

$usuarioid = $_SESSION['usuarioId'];
$usuarionome = $_SESSION['usuarioNome'];
$usuariosobrenome = $_SESSION['usuarioSobreNome'];
$usuarionomesocial = $_SESSION['usuarioNomeSocial'];
$usuariologin = $_SESSION['usuarioLogin'];
$usuarioniveldeacesso = $_SESSION['usuarioNivelAcesso'];
$usuariofoto = $_SESSION['usuarioFoto'];

?>
<!doctype html>
<html lang="en">
<head>

    <?php require(dirname(__FILE__) . './head-admin.php'); ?>
    <!-- https://demo.themesberg.com/volt-pro/pages/dashboard/dashboard.html -->
    <!-- <link href="volt.css" rel="stylesheet"> -->

</head>

<body>

<div class="container-fluid">
    <?php require(dirname(__FILE__) . './header.php'); ?>
</div>

<div class="container-fluid my-md-4 bd-layout">

    <?php require(dirname(__FILE__) . './sidebar.php'); ?>

    <main>

        <?php require(dirname(__FILE__) . '/../pags/pag-admin.php'); ?>

    </main>
</div>

<script src="../assets/js/jquery/validation/1.15.0.jquery.validate.min.js"></script>
<script src="../assets/js/jquery/validation/1.13.0.additional-methods.min.js"></script>
<script src="../assets/js/1.4.1.jquery.maskedinput.js"></script>

<!-- Bootstrap core JavaScript -->
<!-- ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../assets/js/vendor/popper.min.js"></script>
<script src="../bootstrap.bundle.js"></script>
<script src="../bootstrap.min.js"></script>
<script src="bootstrappanel.bundle.min.js"></script>
<script src="chartist.min.js"></script>
<script src="chartist-plugin-tooltip.min.js"></script>

<!-- Menus sidebar painel -->
<script type="text/javascript" src="../assets/js/sidebars.js"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="../assets/js/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap 4 Addon -->
<script type="text/javascript" src="../assets/js/jquery.smartmenus.bootstrap-4.js"></script>
</body>
</html>
