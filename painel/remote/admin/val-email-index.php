<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
//Tratando erros ;
error_reporting(0);
//Criar a conexao ;
include_once '../../conecta.php';

//Busca a validação ;

$query = $conectar->query("SELECT id FROM usuarios WHERE email='" . $_GET['email'] . "'");
if (mysqli_num_rows($query) != 0) {
    echo json_encode(true);
} else {
    echo json_encode(false);
}
//Encerra a conexão
$conectar->close(); ?>
