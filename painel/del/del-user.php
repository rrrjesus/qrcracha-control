<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

error_reporting(0);
include_once '../../locked/seguranca-admin.php';

if ($conexao = $conectar->query($conectar)) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div>><div class="alert alert-danger text-center" role="alert">Erro 01 : Falha ao conectar !!! Se persistir contate: sisdamjt@gmail.com</div>');
$id = $_GET["id"];
$nome = $_GET["nome"];
$status = $_GET["status"];
$email = $_GET["email"];
$login = $_GET["login"];

if (!$conectar->query("DELETE FROM usuarios WHERE id = '$id'")) die ('<div class="form-system-group"><a href="javascript:history.back()" <button type=\'button\' class=\'btn btn-danger\' accesskey="V"><span class="glyphicon glyphicon-arrow-left"></span> <u>V</u>OLTAR</button></a></div><div class="alert alert-danger text-center" role="alert">Erro 02 : Falha de Sicronização com a Tabela !!! Se persistir contate: sisdamjt@gmail.com</div>');
$linhas = $conectar->affected_rows;

if ($conectar->affected_rows != 0) {
    header("Location: $admin?pag=list-user");
    $_SESSION['msgdel'] = "<div class='alert alert-success text-center'><strong>USUÁRIO </strong> : $nome - <strong>APAGADO COM SUCESSO !!!</strong></div>"; ?>

<?php } else {
    $_SESSION['msgdelerro'] = "<div class='alert alert-danger text-center'><strong>ERRO AO APAGAR USUÁRIO</strong> : $nome - <strong></div>";
    header("Location: $admin?pag=list-user"); ?>
<?php } ?>

<?php $conectar->close(); ?>
