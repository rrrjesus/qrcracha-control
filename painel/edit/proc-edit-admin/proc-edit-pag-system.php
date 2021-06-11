<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditPagSystem = filter_input(INPUT_POST, 'btnEditPagSystem', FILTER_SANITIZE_STRING);
if ($btnEditPagSystem) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } else {
        $result_usuario = "SELECT id FROM pag_system WHERE name_pag='" . $dados['name_pag'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>O formulário : " . $dados['name_pag'] . " <br>Já está sendo utilizado!</div>";
        }

        $result_usuario = "SELECT id FROM pag_system WHERE caminho='" . $dados['caminho'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>O caminho : " . $dados['caminho'] . "<br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_usuario = "UPDATE pag_system set name_pag='" . $dados['name_pag'] . "', caminho='" . $dados['caminho'] . "', usuarioalt='$usuariologin', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'>Página : " . $dados['caminho'] . " <br>Atualizada com sucesso!</div>";

        } else {
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Erro ao atualizar a página : " . $dados['caminho'] . "!</div>";
        }
    }

}
?>