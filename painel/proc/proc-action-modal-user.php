<!-- Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados -->

<?php
error_reporting(-1);

include_once '../conecta.php';
include_once '../locked/seguranca-admin.php';

error_reporting(-1);
// Recebe os dados enviados pela submissão
$action          = (isset($_GET['action'])) ? $_GET['action'] : '';
$id              = (isset($_GET['id'])) ? $_GET['id'] : '';
$nome            = (isset($_GET['nome'])) ? $_GET['nome'] : '';
$email           = (isset($_GET['email'])) ? $_GET['email'] : '';
$status          = (isset($_GET['status'])) ? $_GET['status'] : '';
$nivel_acesso_id = (isset($_GET['nivel_acesso_id'])) ? $_GET['nivel_acesso_id'] : '';
$login           = (isset($_GET['login'])) ? $_GET['login'] : '';
$resetsenha      = (isset($_GET['resetsenha'])) ? $_GET['resetsenha'] : '';

if($action == 'reset'):

    $sql = 'UPDATE usuarios SET resetsenha=:resetsenha, senha=:senha,usuarioalt=:usuarioalt, alterado=NOW(), dataresetsenha=NOW() ';
    $sql .= 'WHERE id = :id';

        $conexao = conexao::getInstance();
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':resetsenha', $resetsenha);
        $stm->bindValue(':senha', '2ca28977ca2c7ae97aee1e9af6304d4b2383a9ab');
        $stm->bindValue(':usuarioalt', $usuariologin);
        $stm->bindValue(':id', $id);
        $retorno = $stm->execute();

        if ($retorno):
            $_SESSION['msgedit'] = '<div class="alert alert-success" role="alert">
            <strong>SENHA DE : </strong>'.$nome.' <strong> - RESETADA COM SUCESSO !!!</strong></div>';
            header("Location: index.php");
        else:
            $_SESSION['msgerro'] = '<div class="alert alert-danger text-center" role="alert">
            <strong>ERRO AO RESETAR SENHA DE : '.$nome.' !!!</strong></div>';
        endif;

endif;
?>


