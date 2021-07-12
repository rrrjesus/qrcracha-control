<?php

/**/

//https://github.com/kazuhikoarase/qrcode-generator/tree/master/php
// Biblioteca qrcode
require_once 'qrcode/qrcode.php';

$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$get_hash_cracha = $_GET['crypto'] ?? ''; // Recebendo a hash do cracha via GET mesmo

if (!empty($id) && is_numeric($id)): // Valida se existe um id e se ele é numérico

$conexao = conexao::getInstance(); // Instanciando uma conexão segura através da classe conexão

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo,
            setor, hash_cracha, lixeira FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

if(!empty($user)): // If caso encontre o id do usuário solicitado
    if ($user->lixeira == 1) : // If caso o id tenha sido enviado a lixeira
        echo '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>O '.$id.' ESTÁ DESATIVADO !!!</strong></div>';
    endif;

    if ($get_hash_cracha !== $user->hash_cracha) : // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
        $_SESSION['msgsuccess'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>ERRO AO CONSULTAR O USUÁRIO !!!</strong></div>';
    endif;

    if ($stm->rowCount() < 1) : // If caso o usuário não seja encontrado !!!
        $_SESSION['msgsuccess'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
    endif;


        $array_data     = explode('-', $user->datanascimento); // Formata a data no formato nacional
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
endif;

else : // Caso não encontre o usuário !!!
    $_SESSION['msgsuccess'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
    <strong>ID: '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
endif;


if($stm->rowCount() < 1): ?>
    <div class="d-grid mb-2"><button disabled type="button" class="btn btn-outline-danger fw-bold btn-block pt-1 pb-1"><i
                    class="far fa-user px-2"></i> ID: <?=$id?> - USUÁRIO NÃO AUTENTICADO !!!</button></div>
<?php else:?>

    <div class="d-grid mb-2"><button disabled type="button" class="btn btn-outline-success fw-bold btn-block pt-1 pb-1"><i
                    class="far fa-user px-2"></i> ID: <?=$id?> - USUÁRIO AUTENTICADO !!!</button></div>

<?=$button->AlertSession()?>

    <div class="container-fluid">

        <div class="row mb-1">
            <div class="col-12 mb-1 text-center">
                <h1 class="display-1 text-dark fw-bold">CCB</h1>
            </div>
        </div>

        <div class="row mb-2 text-center">
            <div class="col-3 mb-1">
                <img height="105" width="105" src="<?php if (file_exists('sistema/imagens/'.$user->id.'/fotologin/'.$user->foto))
                {echo 'sistema/imagens/'.$user->id.'/fotologin/'.$user->foto;}
                else{ echo 'sistema/imagens/padrao.jpg';}?>" class="img">
            </div>
            <div class="col-9">
                <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2 ps-5">RGE JAÇANÃ/SUPORTE TI</p>
                <h1 class="display-6 text-dark ms-3 mt-0 mb-0"><?=$user->nome?></h1>
                <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">INFORMÁTICA</p>
                <p class="h2 text-secondary fw-bold ms-2">RGE 2021</p>
            </div>

        </div>

        <div class="row mb-1 mt-1">
            <div class="col-12 mb-0 text-center">
                <p class="text-dark fw-bold" style="font-size: 0.60rem">"Atividade de caráter voluntário não gerando vínculo de qualquer espécie"</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-0 text-center">
                <p class="h6 text-dark fw-bold ms-4">Congregação Cristã no Brasil</p>
            </div>
        </div>
        <div class="row mb-0 mt-0 text-center">
            <div class="col-12 text-center">
                <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido de 7 de Setembro de 2021 a 14 de Setembro de 2021"</p>
            </div>
        </div>
        <div class="row" style="font-size: 0.80rem">
            <div class="col-12 text-start fw-bold">
                <p class="text-dark mt-0 mb-0"><?=$user->nome.' '.$user->sobrenome?></p>
                <p class="text-dark mt-0 mb-0">BR-21-0868 - Jaçanã - SÃO PAULO </p>
            </div>
        </div>
        <div class="row" style="font-size: 0.80rem">
            <div class="col-3 text-start fw-bold">
                <p class="text-dark mt-0 mb-0">Adm.: SETOR JAÇANÃ</p>
            </div>
            <div class="col-2 text-start fw-bold">
                <p class="text-dark mt-0 mb-0">0297713</p>
            </div>
        </div>
        <div class="row" style="font-size: 0.80rem">
            <div class="col-3 text-start fw-bold">
                <p class="text-dark mt-0 mb-0">RGA.: SÃO PAULO </p>
            </div>
            <div class="col-2 text-start fw-bold">
                <p class="text-dark mt-0 mb-0">A0011406533</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 text-center fw-bold">
                <?php
                $qr = new QRCode();

                // Defina o nível de correção de erro
                // QR_ERROR_CORRECT_LEVEL_L : 7% ,LEVEL_M : 15%, LEVEL_Q : 25%, LEVEL_H : 30%
                $qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);

                $qr->setTypeNumber(16); // Defina o número do modelo (tamanho grande) 1-40

                // Defina os dados (string de caracteres *)
                $qr->addData('http://'.HOST.'/'.SYSTEM.'/'.PAGSYSTEM.'?pag=autenticacao_cracha&id='.$user->id.'&crypto='.$user->hash_cracha);
                $qr->make(); // Crie um código QR
                $qr->printSVG(); // saída HTML
                ?>
            </div>
        </div>

    </div>

<?php endif;?>

