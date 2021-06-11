<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */

//Tratando erros ;
error_reporting(0);

//Inclui a conexao ;
include_once '../../conexao.php';

// Inicia a conexao
$conexao = conexao::getInstance();

$sql = "SELECT id FROM usuarios WHERE email='" . $_GET['email'] . "'";
$stm = $conexao->prepare($sql);
$stm->execute();

if ($stm->rowCount()  != 0) {
    echo json_encode(false);
} else {
    echo json_encode(true);
}

//Encerra a conexão
$smt = null;


?>

