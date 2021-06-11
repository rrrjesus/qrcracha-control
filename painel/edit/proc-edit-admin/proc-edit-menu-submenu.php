<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditMenuSubMenu = filter_input(INPUT_POST, 'btnEditMenuSubMenu', FILTER_SANITIZE_STRING);
if ($btnEditMenuSubMenu) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Necessário preencher todos os campos!</div>";
    } else {
        $result_menu_submenu = "SELECT id FROM menu_sub WHERE id='" . $dados['id_menu'] . "'";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (($resultado_menu_submenu) AND ($resultado_menu_submenu->num_rows != 1)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>O SuMenu id : " . $dados['id_menu'] . " <br>Não existe !</div>";
        }
        $result_menu_submenu = "SELECT id FROM menu_sub_sub WHERE pag='" . $dados['pag'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (($resultado_menu_submenu) AND ($resultado_menu_submenu->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>A Página : " . $dados['pag'] . " <br>Já está sendo utilizada!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_menu_submenu = "UPDATE menu_sub_sub set id_menu='" . $dados['id_menu'] . "', nome='" . $dados['nome'] . "', pag='" . $dados['pag'] . "', usuarioalt='$usuariologin', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_menu_submenu = mysqli_query($conectar, $result_menu_submenu);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'><strong>Menu SubMenu</strong> : " . $dados['nome'] . " - <br><strong>Atualizado com sucesso!</strong></div>";
            header("Location: $admin?pag=list-menu&menu=$menu_edit");
        } else {
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Erro ao atualizar o menu submenu : " . $dados['nome'] . " - " . $dados['pag'] . "!</div>";
        }
    }

}
?>