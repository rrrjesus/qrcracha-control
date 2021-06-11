<?php
include_once 'Conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sisdamweb 404</title>
    <link rel="shortcut icon" href="imagens/sv2ico.ico  " type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
    <link href="assets/css/404.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="assets/css/locomotiva.css"></head>
<body>
<div class="fade">
    <div class="logo">
        <img src="imagens/icone-inicial.png">
    </div>
    <div class="mensagem">
        <h1>Ufa,<br/>encontramos você!</h1>
        <p>Parece que houve um erro na página ou você se perdeu ao navegar pelo Jaçana Controle.
            Aceite nossa ajuda para voltar à <a href="<?=PAGSYSTEM?>">página inicial</a>.</p>
    </div>
    <div class="ilha">
        <div class="farol">
            <div class="luz-farol"></div>
        </div>
    </div>
    <div class="oceano-bg"></div>
    <div class="oceano">
        <div class="barco"></div>
    </div>
</div>
</body>
</html>
