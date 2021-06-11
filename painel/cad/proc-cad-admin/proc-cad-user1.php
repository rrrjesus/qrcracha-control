<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../../../locked/seguranca-admin.php';
include_once '../../../conexao.php';

$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) {
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } elseif ((strlen($dados['senha'])) < 6) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>A senha deve ter no minímo 6 caracteres!</div>";
    } elseif (stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Caracter ( ' ) utilizado na senha é inválido!</div>";
    } else {
        $result_usuario = "SELECT id FROM usuarios WHERE login='" . $dados['login'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>O usuário : " . $dados['login'] . "<br>Já está sendo utilizado!</div>";
        }

        $result_usuario = "SELECT id FROM usuarios WHERE email='" . $dados['email'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>O e-mail : " . $dados['email'] . "<br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        //var_dump($dados);
        $dados['senha'] = sha1(md5($dados['senha']));

        $result_usuario = "INSERT INTO usuarios (foto, nome, sobrenome, datanascimento, cpf, email, login, senha, nivel_acesso_id, tel1, tel2, status, acessotid, usuariocad, criado) VALUES (
                        '../assets/img/" . $dados['foto'] . "',
						'" . $dados['nome'] . "',
                        '" . $dados['sobrenome'] . "',
                        '" . $dados['datanascimento'] . "',
                        '" . $dados['cpf'] . "',
						'" . $dados['email'] . "',
						'" . $dados['login'] . "',
						'" . $dados['senha'] . "',
                        '" . $dados['nivel_de_acesso'] . "',
                        '" . $dados['tel1'] . "',
                        '" . $dados['tel2'] . "',
                        '" . $dados['status'] . "',
                        '" . $dados['acessotid'] . "',
                        '$usuariologin',
                        NOW()
						)";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (mysqli_insert_id($conectar)) {
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center'><strong> Usuário :</strong> ".$dados['nome']." - <strong> Login :</strong>" . $dados['login'] . " <br>Cadastrado com sucesso!</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'><strong> Erro ao cadastrar o usuário : </strong>" . $dados['login'] . "!</div>";
        }
    }

}
?>