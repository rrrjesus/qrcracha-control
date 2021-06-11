<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditPerfil = filter_input(INPUT_POST, 'btnEditPerfil', FILTER_SANITIZE_STRING);
if ($btnEditPerfil) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msgperfilerro'] = "<div class='alert alert-danger'>Necessário preencher todos os campos!</div>";
    } else {
        $result_usuario = "SELECT id FROM usuarios WHERE nome='" . $dados['nome'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgperfilerro'] = "<div class='alert alert-danger'>O nome " . $dados['nome'] . "<br>Já está sendo utilizado!</div>";
        }

        $result_usuario = "SELECT id FROM usuarios WHERE email='" . $dados['email'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgperfilerro'] = "<div class='alert alert-danger'>O e-mail " . $dados['email'] . "<br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_usuario = "UPDATE usuarios set nome='" . $dados['nome'] . "', telefone='" . $dados['telefone'] . "',email='" . $dados['email'] . "', usuarioalt='$usuariologin', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgperfil'] = "<div class='alert alert-success text-center'>Perfil de " . $dados['nome'] . "<br>Atualizado com sucesso!</div>";

        } else {
            $_SESSION['msgperfilerro'] = "<div class='alert alert-danger'>Erro ao atualizar perfil de " . $dados['nome'] . "!</div>";
        }
    }

}
?>