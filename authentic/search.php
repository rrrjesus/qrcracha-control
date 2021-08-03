<?php
include_once '../Conexao.php';

$conexao = conexao::getInstance();

$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = 1';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <!--<head>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$systemfetch->description?>">
    <meta name="author" content="<?=$systemfetch->author?>">
    <link rel="icon" href="<?='../'.$systemfetch->icon?>">

    <title><?=$systemfetch->title?></title>

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

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$get_hash_cracha = $_GET['crypto'] ?? ''; // Recebendo a hash do cracha via GET mesmo

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo,
        setor, hash_cracha, lixeira FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

//Encerra a conexão
$smt = null;

    if(!empty($user)): // If caso encontre o id do usuário solicitado
        if ($user->lixeira == 1) : // If caso o id tenha sido enviado a lixeira
            $_SESSION['msgerr'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <i class="fa fa-qrcode me-2"></i><strong>O '.$user->nome.' ESTÁ DESATIVADO !!!</strong></div>';
        endif;

        if ($stm->rowCount() < 1) : // If caso o usuário não seja encontrado !!!
            $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                <i class="fa fa-qrcode me-2"></i><strong> QRCODE DE CRACHÁ NÃO ENCONTRADO !!!</strong></div>';
        endif;
    endif;

else :
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
    <i class="fa fa-qrcode me-2"></i> <strong> QRCODE DE CRACHÁ NÃO ENCONTRADO !!!</strong></div>';
endif;

if($stm->rowCount() < 1):
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
        <i class="fa fa-qrcode me-2"></i><strong> QRCODE ID: '.$id.' - CRACHÁ NÃO AUTENTICADO !!!</strong></div>';
elseif ($get_hash_cracha !== $user->hash_cracha) : // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                <i class="fa fa-qrcode me-2"></i> <strong>ERRO NO HASH DO CRACHÁ !!!</strong></div>';
else:
$_SESSION['msgsuccess'] = '<div class="alert alert-success pb-1 pt-1 text-center text-uppercase" role="alert">
    <i class="fa fa-qrcode me-2"></i><strong> QRCODE DE CRACHÁ AUTENTICADO !!!</strong></div>';

endif;
?>


<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="img-fluid rounded-circle me-2" height="70" width="70" src="../imagens/inf_menu.png">
                <span class="fs-4">JAÇANA CONTROLE</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none fw-bold fs-6" href="https://informaticast11.com.br/controle-rge-st11/">Sistema</a>
                <a class="me-3 py-2 text-dark text-decoration-none fw-bold fs-6" href="https://informaticast11.com.br/">Site</a>
            </nav>
        </div>
    </header>

    <main>
            <div class="container">
                <div class="row justify-content-center pb-5 pt-1">
        <div class="card col-sm-6 shadow-lg mb-1 mt-1 bg-body rounded pe-0 ps-0">
            <div class="card-header text-center fw-bold pt-1 pb-1">
                <h4 class="my-0 fw-normal"><i class="fa fa-address-card-o me-2"></i> AUTENTICAÇÃO DE CRACHÁ </h4>
            </div>
            <div class="card-body">
                <?php /** @var msgerro $_SESSION */
                    if (isset($_SESSION['msgerro'])) : echo $_SESSION['msgerro']; unset($_SESSION['msgerro']); endif;
                    if (isset($_SESSION['msgerr'])) : echo $_SESSION['msgerr']; unset($_SESSION['msgerr']); endif;
                    if (isset($_SESSION['msgsuccess'])) : echo $_SESSION['msgsuccess']; unset($_SESSION['msgsuccess']); endif;
                ?>

                <div class="container justify-content-center">
                <div class="row mb-2 align-items-center text-center">
                    <div class="row align-items-center mb-1">
                        <div class="col-sm-9 col-md-12 text-center">
                            <h1 class="display-1 text-dark fw-bold">CCB</h1>
                        </div>
                    </div>

                <?php if(!empty($user)): // If caso encontre o id do usuário solicitado?>
                    <div class="col-sm-3 col-md-2 mb-1">
                        <img height="105" width="105" src="<?php if (file_exists('../'.$user->foto))
                        {echo '../'.$user->foto;}
                        else{ echo '../sistema/imagens/padrao.jpg';}?>" class="img">
                    </div>
                    <div class="col-sm-8 col-md-7 mb-1">
                        <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2 ps-5">RGE JAÇANÃ/SUPORTE TI</p>
                        <h1 class="display-6 text-dark ms-3 mt-0 mb-0"><?=$user->nome?></h1>
                        <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">INFORMÁTICA</p>
                        <p class="h2 text-secondary fw-bold ms-2">RGE 2021</p>
                    </div>
                </div>

                    <div class="row align-items-center mb-1 mt-1">
                        <div class="col-sm-9 col-md-12 text-center">
                            <p class="text-dark fw-bold" style="font-size: 0.60rem">"Atividade de caráter voluntário não gerando vínculo de qualquer espécie"</p>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-sm-9 col-md-12 text-center">
                            <p class="h6 text-dark fw-bold ms-4">Congregação Cristã no Brasil</p>
                        </div>
                    </div>
                    <div class="row align-items-center mb-0 mt-0 text-center">
                        <div class="col-sm-9 col-md-12 text-center">
                            <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido de 7 de Setembro de 2021 a 14 de Setembro de 2021"</p>
                        </div>
                    </div>
                    <div class="row align-items-center" style="font-size: 0.80rem">
                        <div class="col-12 text-start fw-bold">
                            <p class="text-dark mt-0 mb-0"><?=$user->nome.' '.$user->sobrenome?></p>
                            <p class="text-dark mt-0 mb-0">ADMINISTRAÇÃO - SETOR JAÇANÃ - SÃO PAULO </p>
                        </div>
                    </div>
                <?php else:
                    echo '';
                endif;
                ?>

                </div>
<!-- Aqui o cracha-->
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
