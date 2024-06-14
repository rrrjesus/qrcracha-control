<?php
include_once '../Conexao.php';

$conexao = conexao::getInstance();

$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = 1';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);

$stmsystem = null; //

?>

<!doctype html>
<html lang="pt-BR">

<?php require(__DIR__ . '/head_auth.php'); ?>

<body>

<?php

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$get_hash_cracha = $_GET['crypto'] ?? ''; // Recebendo a hash do cracha via GET mesmo

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$sql = "SELECT usuarios.id, usuarios.foto, usuarios.nome, usuarios.sobrenome, setor.nome_setor AS setor, usuarios.adm, usuarios.cidade, usuarios.hash_cracha, usuarios.lixeira,setor.id as id_setor
        FROM usuarios LEFT JOIN setor ON usuarios.setor = setor.id WHERE usuarios.id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

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

    <?php require(__DIR__ . '/header_auth.php'); ?>

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
                        <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">RGE JAÇANÃ</p>
                        <h1 class="display-6 text-dark ms-3 mt-0 mb-0"><?=$user->nome?></h1>
                        <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2"><?=$user->setor?></p>
                        <p class="h2 text-secondary fw-bold ms-2">RGE 2022</p>
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
                            <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido somente para 17 de abril e 11 de setembro de <?=date('Y')?>.</p>
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
