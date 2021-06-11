<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditSenha = filter_input(INPUT_POST, 'btnEditSenha', FILTER_SANITIZE_STRING);
if ($btnEditSenha) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    //var_dump($dados);
    if (!$erro) {
        //var_dump($dados);
        $dados['senhanova1'] = sha1(md5($dados['senhanova1']));

        $result_usuario = "UPDATE usuarios set senha='" . $dados['senhanova1'] . "', status='ATIVO', usuarioalt='$usuariologin', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgsenha'] = "<div class='alert alert-success text-center'>Senha atualizada com sucesso!</div>";

        } else {
            $_SESSION['msgsenhaerro'] = "<div class='alert alert-danger'>Erro ao atualizar senha!</div>";
        }
    }

}
?>