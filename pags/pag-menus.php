<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 09/06/2017
 * Time: 13:52
 */

include_once '../conexao.php';

if (isset($_GET["pag"])) {
    $pag = $_GET["pag"];
}

$consulta_pag = "SELECT * FROM pag_system WHERE name_pag='$pag'";
$resultado_pag = $conectar->query($consulta_pag);
$editar_pag = mysqli_fetch_assoc($resultado_pag);

//mysqli_close($conectar);


if (!empty($pag)) {  //se a variavel pag não estiver vazia
    if (file_exists($editar_pag['caminho'])) { //se o arquivo existir
        include $editar_pag['caminho'];  //inclui o arquivo
    } else {
        include "bem-vindo.php";
    }
} else {
    include "bem-vindo.php";
}
?>