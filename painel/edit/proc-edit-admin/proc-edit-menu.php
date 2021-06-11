<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../../locked/seguranca-admin.php");

$btnEditMenu = filter_input(INPUT_POST, 'btnEditMenu', FILTER_SANITIZE_STRING);
if ($btnEditMenu) {
    include_once '../../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Necessário preenche o campo!</div>";
    } else {
        $result_menu = "SELECT id FROM menu_principal WHERE nome='" . $dados['nome'] . "' AND id<>'" . $dados['id'] . "'";
        $resultado_menu = mysqli_query($conectar, $result_menu);
        if (($resultado_menu) AND ($resultado_menu->num_rows > 0)) {
            $erro = true;
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>O menu : " . $dados['nome'] . " <br>Já está sendo utilizado!</div>";
        }
    }


    //var_dump($dados);
    if (!$erro) {
        $result_menu = "UPDATE menu_principal set nome='" . $dados['nome'] . "', usuarioalt='$usuariologin', alterado= NOW() WHERE id='" . $dados['id'] . "'";
        $resultado_menu = mysqli_query($conectar, $result_menu);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgedit'] = "<div class='alert alert-success text-center'>Menu : " . $dados['nome'] . " <br>Atualizado com sucesso!</div>";
            header("Location: $admin?pag=list-menu&menu=$menu_edit");
        } else {
            $_SESSION['msgerro'] = "<div class='alert alert-danger text-center'>Erro ao atualizar o menu : " . $dados['nome'] . "!</div>";
        }
    }

}
?>