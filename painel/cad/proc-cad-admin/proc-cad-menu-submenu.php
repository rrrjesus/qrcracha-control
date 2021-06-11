<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../../../locked/seguranca-admin.php';
include_once '../../../conexao.php';

$btnCadMenuSubMenu = filter_input(INPUT_POST, 'btnCadMenuSubMenu', FILTER_SANITIZE_STRING);
if ($btnCadMenuSubMenu) {
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } else {
        $result_menu_submenu = "SELECT id FROM menu_sub WHERE id='" . $dados['id_menu'] . "'";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (($resultado_menu_submenu) AND ($resultado_menu_submenu->num_rows != 1)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>O SubMenu id : " . $dados['id_menu'] . " <br>Não existe !</div>";
        }
        $result_menu_submenu = "SELECT id FROM menu_sub_sub WHERE pag='" . $dados['pag'] . "'";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (($resultado_menu_submenu) AND ($resultado_menu_submenu->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>A Página : " . $dados['pag'] . " <br>Já está sendo utilizada!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_menu_submenu = "INSERT INTO menu_sub_sub (id_menu_sub, nome, pag, usuariocad, criado) VALUES (
						'" . $dados['id_menu'] . "',
						'" . $dados['nome'] . "',
                        '" . $dados['pag'] . "',
                        '$usuariologin',
                        NOW()
						)";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (mysqli_insert_id($conectar)) {
            $_SESSION['msgcad'] = "<div class='alert alert-success text-center'>O Menu SubMenu: " . $dados['nome'] . " <br>Cadastrado com sucesso!</div>";
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger text-center'>Erro ao cadastrar o menu submenu: " . $dados['nome'] . "!</div>";
        }
    }

}
?>