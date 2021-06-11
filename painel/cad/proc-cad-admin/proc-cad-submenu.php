<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../../../locked/seguranca-admin.php';
include_once '../../../conexao.php';

$btnCadSubMenu = filter_input(INPUT_POST, 'btnCadSubMenu', FILTER_SANITIZE_STRING);
if ($btnCadSubMenu) {
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } else {
        $result_pag = "SELECT id FROM menu_sub WHERE nome='" . $dados['nome'] . "'";
        $resultado_pag = mysqli_query($conectar, $result_pag);
        if (($resultado_pag) AND ($resultado_pag->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>O SubMenu : " . $dados['nome'] . " <br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_pag = "INSERT INTO menu_sub (id_menu, nome, pag, usuariocad, criado) VALUES (
						'" . $dados['id_menu'] . "',
						'" . $dados['nome'] . "',
                        '" . $dados['pag'] . "',
                        '$usuariologin',
                        NOW()
						)";
        $resultado_pag = mysqli_query($conectar, $result_pag);
        if (mysqli_insert_id($conectar)) {
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center'>Menu : " . $dados['nome'] . " <br>Cadastrado com sucesso!</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Erro ao cadastrar o menu : " . $dados['nome'] . "!</div>";
        }
    }

}
?>