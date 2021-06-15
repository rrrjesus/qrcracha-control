<?php
/** * Pois, que adianta ao homem ganhar o mundo inteiro e perder a sua alma? Marcos 8:36
 * Antes que tudo se inicie expresso minha total gratidão ao Senhor Deus em Cristo Jesus por me conceder a cada dia a oportunidade de expressar o imenso
    amor que eu sinto por ele e por sua criação. Aqui também retrato o amor que recebi na Uvis Jaçanã de pessoas especiais, algumas já se aposentaram
    do emprego público, mas deixaram um legado de comprometimento e amor pela profissão e principalmente pelo "ser humano" * *

 * Sistema criado e desenvolvido por Rodolfo Romaioli Ribeiro de Jesus, durante o desenvolvimento a opiniões de usuários na sua grande maioria trabalhadores
 * do serviço público da Uvis Jaçanã Tremembé ajudaram no rumo a ser tomado e melhorias a serem implantadas. Todos os direitos reservados.

 * @author Rodolfo R. R. de Jesus <rodolfo.romaioli@gmail.com>
 * @version 2.1 * @copyright GPL © 2021, jaçanã controle ltda.
 * @access public
 * @package sistema/painel
 * @subpackage controle/crachá
 * @conexao Classe conexao. */

error_reporting(-1); // Inserindo melhorias e exibindo erros

include_once 'conexao.php';

?>

<?php
session_unset();
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <?php require(__DIR__ . '/head.php'); ?>

    <style type="text/css">
        #index{
            width: auto;
            height: 500px;
            background-image: url('imagens/ccb_jacana.jpg');
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
            background-color: #cccccc;
        }
    </style>
</head>

<body>

<header>
    <?php require(__DIR__ . '/nav-bar.php'); ?>
</header>

<main class="form-signin" id="index">

    <!-- Login Celular -->
    <?php require(__DIR__ . '/login.php'); ?>

</main>

<!-- FOOTER -->
<?php require(__DIR__ . '/footer.php'); ?>

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

