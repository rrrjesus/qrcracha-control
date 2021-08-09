<?php

//https://github.com/kazuhikoarase/qrcode-generator/tree/master/php
// Biblioteca qrcode
require_once 'qrcode/qrcode.php';

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? '';
$get_session = $_GET['session'] ?? '';

// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$conexao = conexao::getInstance();

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo, setor, adm, cidade, hash_cracha, usuariocad, criado, usuarioalt, alterado, loginenvioemailsenha, chavesetsenha, datapedidochavesetsenha, datafeitonovasenha, dataenvioemailsenha, emailenviadosenha, resetsenha, dataresetsenha, date_alter_senha FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

$set = $user->setor;
$adm = $user->adm;
$cid = $user->cidade;

    // Caso o id tenha sido enviado a lixeira
    if ($get_session <> $hashprimary) :
        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR O USUÁRIO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

    if ($stm->rowCount() < 1):
        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

else :
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
    <strong>ERRO AO EDITAR: '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
    header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
endif;
?>

<script type="text/javascript">
    /* window.print(); */
</script>

    <fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

        <div class="container-fluid">

            <div class="row mb-1">
                <div class="col-7 mb-1 text-center">
                    <p class="display-1 text-dark" style="font-size: 74px;font-weight: 900">CCB</p>
                </div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-2 mb-1">
                        <img height="105" width="105" src="<?php if (file_exists($user->foto))
                        {echo $user->foto;}
                        else{ echo 'sistema/imagens/padrao.jpg';}?>" class="img">
                </div>
                <?php $set_user = $tables->set_user($conexao, $set);?>
                <?php $adm_user = $tables->adm_user($conexao, $adm);?>
                <?php $_user = $tables->adm_user($conexao, $adm);?>
                <?php $adm_user = $tables->adm_user($conexao, $adm);?>
                <div class="col-10 text-start">
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">RGE <?=$adm_user?> / <?=$set_user?></p>
                    <h1 class="display-6 text-dark ms-3 mt-0 mb-0"><?=$user->nome?></h1>
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2"><?=$set_user?></p>
                    <p class="h2 text-secondary fw-bold ms-2">RGE <?=$year?></p>
                </div>

            </div>

            <div class="row mb-1 mt-1">
                <div class="col-7 mb-0 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.60rem">"Atividade de caráter voluntário não gerando vínculo de qualquer espécie"</p>
                </div>
            </div>

            <div class="row">
                <div class="col-6 mb-0 text-center">
                    <p class="h6 text-dark fw-bold ms-4">Congregação Cristã no Brasil</p>
                </div>
            </div>
            <div class="row mb-0 mt-0 text-center">
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido de 7 de Setembro de 2021 a 14 de Setembro de 2021"</p>
                </div>
            </div>

            <div class="row" style="font-size: 0.80rem">
                <div class="col-6 text-start fw-bold">
                    <p class="text-dark mt-0 mb-0"><?=$user->nome.' '.$user->sobrenome?></p>
                    <p class="text-dark mt-0 mb-0">ADMINISTRAÇÃO: <?=$user->adm?></p>
                    <p class="text-dark mt-0 mb-0">CIDADE: <?=$user->cidade?></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-7 text-center fw-bold">
                    <?php
                    $qr = new QRCode();

                    // Defina o nível de correção de erro
                    // QR_ERROR_CORRECT_LEVEL_L : 7% ,LEVEL_M : 15%, LEVEL_Q : 25%, LEVEL_H : 30%
                    $qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);

                    $qr->setTypeNumber(8); // Defina o número do modelo (tamanho grande) 1-40

                    // Defina os dados (string de caracteres *)
                    $qr->addData('http://'.HOST.'/'.SYSTEM.'/authentic/search.php?id='.$user->id.'&crypto='.$user->hash_cracha);
                    $qr->make(); // Crie um código QR
                    $qr->printSVG(); // saída HTML
                    ?>
                </div>
            </div>

        </div>
