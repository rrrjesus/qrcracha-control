<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditUsuario = filter_input(INPUT_POST, 'btnEditUsuario', FILTER_SANITIZE_STRING);
if ($btnEditUsuario) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'><strong>NECESSÁRIO PREENCHER TODOS OS CAMPOS !!!</strong></div>";
    } else {
        $result_usuario = "SELECT id FROM usuarios WHERE nome='" . $dados['nome'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'><strong>O USUÁRIO</strong> : " . $dados['nome'] . "<br><strong>JÁ ESTÁ SENDO UTILIZADO !!!</strong></div>";
        }

        $result_usuario = "SELECT id FROM usuarios WHERE email='" . $dados['email'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'><strong>O E-MAIL</strong> : " . $dados['email'] . "<br>Já está sendo utilizado!</div>";
        }
        $result_usuario = "SELECT id FROM usuarios WHERE login='" . $dados['login'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'><strong>O LOGIN</strong> " . $dados['login'] . "<br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_usuario = "UPDATE usuarios set nome='" . $dados['nome'] . "', email='" . $dados['email'] . "', login='" . $dados['login'] . "', nivel_acesso_id='" . $dados['nivel_de_acesso'] . "', status='" . $dados['status'] . "', acessotid='" . $dados['acessotid'] . "', usuarioalt='" . $dados['usuario_edit'] . "', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>USUÁRIO</strong> : " . $dados['nome'] . " - <strong>ATUALIZADO COM SUCESSO !!!</strong></div>";
            header("Location: index.php");

        } else {
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO ATUALIZAR USUÁRIO</strong> : " . $dados['nome'] . " !!!</div>";
        }
    }

}
?>