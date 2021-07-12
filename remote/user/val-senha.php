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

//Busca a validação com criptografia;
$senha = sha1(md5(mysqli_real_escape_string($conectar, $_GET["senhaatual"])));

$sql = "SELECT id FROM usuarios WHERE senha='" . $senha . "'";
$stm = $conexao->prepare($sql);
$stm->execute();

if ($stm->rowCount() != 0) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}

//Encerra a conexão
$stm = null;

?>


