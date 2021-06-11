<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 12/06/2017
 * Time: 14:23
 */
error_reporting(0);
ob_start();

if (($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNivelAcesso'] <> 1) || ($_SESSION['usuarioLogin'] == "") || ($_SESSION['usuarioSenha'] == "")) {
    unset($_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioNivelAcesso'],
        $_SESSION['usuarioLogin'],
        $_SESSION['usuarioSenha']);
    //Mensagem de Erro
    $_SESSION['loginErro'] = "Área restrita para usuários cadastrados";

    //Manda o usuário para a tela de index
    header("Location: ../index.php");
}