<?php
include_once '../Conexao.php';

$year = isset($_GET['year']) ? $_GET['year'] : $today = date("Y");

$id_system = 1;
// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$get_hash_cracha = $_GET['crypto'] ?? ''; // Recebendo a hash do cracha via GET mesmo

$conexao = conexao::getInstance();
$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = :id';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->bindValue(':id', $id_system);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);

$stmsystem = null;

$pag_system = $systemfetch->pag_principal;
$unidade_name = $systemfetch->unidade_name;
$title = $systemfetch->title;
$description = $systemfetch->description;
$author = $systemfetch->author;
$icon = $systemfetch->icon;

$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = 1';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);

$stmsystem = null; //

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo,
        setor, hash_cracha, lixeira FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

//Encerra a conexão
$smt = null;

?>


<head>
    <!--<head>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$systemfetch->description?>">
    <meta name="author" content="<?=$systemfetch->author?>">
    <link rel="icon" href="<?='../'.$systemfetch->icon?>">

    <title>cracha <?=strtolower($user->nome.' '.$user->sobrenome)?></title>

    <link rel="canonical" href="https://informaticast11.com.br/controle-rge/authentic/search.php?id=<?=$id?>&crypto=<?=$get_hash_cracha?>/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap5/bootstrap.min.css" rel="stylesheet">
    <!-- CSS para Fontes Customizadas Fontawesome https://fontawesome.com/ -->
    <link href="../assets/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/brands.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/light.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/regular.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/solid.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/svg-with-js.css" rel="stylesheet"> <!--load all styles -->
    <link href="../assets/fontawesome/css/v4-shims.css" rel="stylesheet"> <!--load all styles -->

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>