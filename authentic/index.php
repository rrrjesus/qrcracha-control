<?php
include_once '../Conexao.php';

$conexao = conexao::getInstance();

$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = 1';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);


?>

<!doctype html>
<html lang="pt-BR">

<?php require(__DIR__ . '/head_auth.php'); ?>

<body>

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

                <div class="container justify-content-center">
                <div class="row mb-2 align-items-center text-center">
                    <div class="row align-items-center mb-1">
                        <div class="col-sm-9 col-md-12 text-center">
                            <h1 class="display-1 text-dark fw-bold">CCB - <?=$systemfetch->unidade_name?></h1>
                        </div>
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
