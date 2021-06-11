<?php
$btnDeletePagAdmin = filter_input(INPUT_POST, 'btnDeletePagAdmin', FILTER_SANITIZE_STRING);
if ($btnDeletePagAdmin) {
    include_once '../../conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_st);

    //var_dump($dados);
    if (!$erro) {
        $result_pag = "DELETE FROM pag_admin WHERE id='" . $dados['id'] . "'";
        $resultado_pag = mysqli_query($conectar, $result_pag);
        if (mysqli_thread_id($conectar)) {
            $_SESSION['msgdel'] = "<div class='alert alert-success text-center'>Página apagada com sucesso!</div>";

        } else {
            $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'>Erro ao apagar a página!</div>";
        }
    }

}
?>

