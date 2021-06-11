<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../conecta.php';

$btnCadPagForm = filter_input(INPUT_POST, 'btnCadPagForm', FILTER_SANITIZE_STRING);
if ($btnCadPagForm) {
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } else {
        $result_usuario = "SELECT id FROM pag_system WHERE name_pag='" . $dados['name_pag'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>A página : " . $dados['name_pag'] . " <br>Já está sendo utilizada!</div>";
        }
        $result_usuario = "SELECT id FROM pag_system WHERE caminho='" . $dados['caminho'] . "'";
        $resultado_usuario = mysqli_query($conectar, $result_usuario);
        if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>O caminho : " . $dados['caminho'] . " <br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_usuario = "INSERT INTO pag_system (name_pag, caminho, usuariocad, criado) VALUES (
						'" . $dados['name_pag'] . "',
						'" . $dados['caminho'] . "',
                        '$usuariologin',
                        NOW()
						)";
        $resultado_usario = mysqli_query($conectar, $result_usuario);
        if (mysqli_insert_id($conectar)) {
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center'>Página : " . $dados['name_pag'] . " cadastrada com sucesso!</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Erro ao cadastrar a página : " . $dados['página'] . "!</div>";
        }
    }

}
?>