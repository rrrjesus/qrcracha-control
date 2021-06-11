<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
ob_start();

//if (isset($_SESSION['usuarioId'])) {unset($_SESSION['usuarioId']);}

if (($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNivelAcesso'] == "") || ($_SESSION['usuarioLogin'] == "") || ($_SESSION['usuarioSenha'] == "")) {
    unset($_SESSION['usuarioId'],
        $_SESSION['usuarioNome'],
        $_SESSION['usuarioNivelAcesso'],
        $_SESSION['usuarioLogin'],
        $_SESSION['usuarioSenha']);
    //Mensagem de Erro
    $_SESSION['loginErro'] = "Área restrita para usuários cadastrados";

    //Manda o usuário para a tela de index
    //header("Location: http://10.47.171.110/sisdamweb-2/index.php");


}

// Por último, destrói a sessão
/*session_destroy();*/
?>
