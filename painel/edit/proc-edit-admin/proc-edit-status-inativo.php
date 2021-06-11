<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
 * Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
 * Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
 */
error_reporting(0);
include_once '../../../locked/seguranca-admin.php';
include_once '../../../conexao.php';
?>

<?php
#Recolhendo os dados do formulário
$id = mysqli_real_escape_string($conectar, $_POST["id"]);
$status = mysqli_real_escape_string($conectar, $_POST["status"]);
$login = mysqli_real_escape_string($conectar, $_POST["login"]);
$email = mysqli_real_escape_string($conectar, $_POST["email"]);

?>

<form class="form-horizontal" id="proc_edit_sinan">
    <?php

    $sql = $conectar->query("SELECT id FROM usuarios WHERE status='ATIVO' AND id='$id'");

    if ($sql->num_rows > 0) { ?>
        <?php $conectar->query("UPDATE usuarios SET status='INATIVO', usuarioalt = '$usuariologin', alterado = NOW() WHERE id = '$id'")
                $_SESSION['msginativo'] = "<div class='alert alert-danger text-center'><strong>LOGIN</strong> : $login - <strong>EMAIL</strong> : $email - <strong>INATIVADO COM SUCESSO</strong></div>";
                header("Location: menu-principal.php?pag=list-user"); ?>

        <!-------------------------------------------------------------------------------------------------------------------------->

    <?php } else {
        if (!$conectar->query("UPDATE usuarios SET status='ATIVO', usuarioalt = '$usuariologin', alterado = NOW() WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a><h4><strong><div class="alert alert-danger text-center" role="alert">ERROR:02 FALHA DE SICRONIZAÇÃO COM A TABELA !!! SE PERSISTIR CONTATE: sisdamjt@gmail.com</h4></strong></div>');

        $_SESSION['msgativo'] = "<div class='alert alert-success text-center'><strong>LOGIN</strong> : $login - <strong>EMAIL</strong> : $email - <strong>ATIVADO COM SUCESSO !!!</strong></div>";
        header("Location: menu-principal.php?pag=list-user");

    } ?>

</form>

