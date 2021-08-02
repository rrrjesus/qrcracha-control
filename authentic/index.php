<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Pricing example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

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
<body>

<?php

include_once '../Conexao.php';

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$get_hash_cracha = $_GET['crypto'] ?? ''; // Recebendo a hash do cracha via GET mesmo

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$conexao = conexao::getInstance();

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo,
        setor, hash_cracha, lixeira FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

    if(!empty($user)): // If caso encontre o id do usuário solicitado
        if ($user->lixeira == 1) : // If caso o id tenha sido enviado a lixeira
            echo '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>O '.$user->nome.' ESTÁ DESATIVADO !!!</strong></div>';
        endif;

        if ($get_hash_cracha !== $user->hash_cracha) : // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
            $_SESSION['msgsuccess'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>ERRO AO CONSULTAR O USUÁRIO '.$user->nome.' !!!</strong></div>';
        endif;

        if ($stm->rowCount() < 1) : // If caso o usuário não seja encontrado !!!
            $_SESSION['msgsuccess'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        endif;


        $array_data     = explode('-', $user->datanascimento); // Formata a data no formato nacional
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
    endif;

else :
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
    <strong>USUÁRIO - NÃO ENCONTRADO !!!</strong></div>';
endif;

?>


<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="img-fluid rounded-circle me-2" height="70" width="70" src="../imagens/inf_menu.png">
                <span class="fs-4">SISTEMA JAÇANA CONTROLE</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="https://informaticast11.com.br/controle-rge-st11/">Acessar</a>
            </nav>
        </div>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Pricing</h1>
            <p class="fs-5 text-muted">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It’s built with default Bootstrap components and utilities with little customization.</p>
        </div>
    </header>

    <main>
            <div class="container">
                <div class="row justify-content-center pb-5 pt-5">
        <div class="card col-sm-6 shadow-lg mb-5 mt-5 bg-body rounded pe-0 ps-0">
            <div class="card-header text-center fw-bold pt-1 pb-1">
                        <h4 class="my-0 fw-normal">Pro</h4>
            </div>
            <div class="card-body">
                <?php
                /** @var msgerro $_SESSION */
                if (isset($_SESSION['msgerro'])) :
                    echo $_SESSION['msgerro'];
                    unset($_SESSION['msgerro']);
                endif;
                ?>
                <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
            </div>
        </div>
                </div>
            </div>

    </main>

    <!-- Arquivo para exibir o footer-->

    <footer class="text-sm-start section mb-0 py-3 navbar-dark bg-success text-white fs-6">

        <div class="row">
            <div class="col-12 col-lg-4 mb-lg-0"><p class="mb-0 text-center text-xl-left ms-3">Jaçanã Controle © 2021 - <?=$today = date('Y')?><span
                        class="current-year"></span> - versão: 1.0</p></div>

            <div class="col-12 col-lg-4 mb-lg-0"><p class="mb-0 text-center text-xl-center">Desenvolvido por : Rodolfo R R de Jesus</p></div>

            <div class="col-12 col-lg-4">
                <ul class="list-inline list-group-flush list-group-borderless text-center text-xl-right mb-0">
                    <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-question-circle me-2" style="color: #fafafb"></i><a target="_blank" href="index.php" class="link-light">Sobre</a></li>
                    <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-globe-americas me-2" style="color: #1da1f2"></i><a target="_blank" href="https://<?=HOST?>/sisdamwebsite/" class="link-light">Site</a></li>
                    <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-whatsapp me-1" style="color: #fafafb"></i>
                        <!-- Link original -> "https://wa.me/5511991091365?text=Olá,%20meu%20amigo/a!%0AEsse%20é%20o%20suporte%20do%20Sistema%20SisdamWeb%0A.Como%20podemos%20te%20ajudar?"
                                Link encurtado -> "https://bit.ly/3m7H0iQ" no site -> https://app.bitly.com/ -->
                        <a target="_blank" href="https://bit.ly/3cCLMkG" class="link-light">Whatsapp</a></li>
                    <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-mail-bulk me-1" style="color: #0a53be"></i> <a href="mailto:informatica.setor11@gmail.com" target="_blank" class="link-light">Contato</a></li>
                </ul>
            </div>
        </div>

    </footer>
</div>



</body>
</html>
