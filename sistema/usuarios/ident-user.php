<?php

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? '';
$get_session = $_GET['session'] ?? '';



// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$conexao = conexao::getInstance();

$sql = "SELECT id, foto, login, nome, sobrenome, nomesocial, datanascimento, cpf, email, nivel_acesso_id, telefone, celular, status, sexo, setor, usuariocad, acessotid, criado, usuarioalt, alterado, loginenvioemailsenha, chavesetsenha, datapedidochavesetsenha, datafeitonovasenha, dataenvioemailsenha, emailenviadosenha, resetsenha, dataresetsenha, date_alter_senha FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

    // Caso o id tenha sido enviado a lixeira
    if ($get_session <> $hashprimary) :
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR O USUÁRIO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

    if ($stm->rowCount() < 1):
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

else :
    $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
    <strong>ERRO AO EDITAR: '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
    header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
endif;
?>

    <fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

        <div class="container-fluid">

            <div class="row mb-1">
                <div class="col-7 mb-1 text-center">
                    <h1 class="display-1 text-dark fw-bold">CCB</h1>
                </div>
            </div>

            <div class="row mb-3 text-center">
                <div class="col-2 mb-1">
                        <img height="105" width="105" src="<?php if (file_exists('sistema/imagens/'.$user->login.'/fotologin/'.$user->foto))
                        {echo 'sistema/imagens/'.$user->login.'/fotologin/'.$user->foto;}
                        else{ echo 'sistema/imagens/foto_exists.png';}?>" class="img">
                </div>
                <div class="col-10 text-start">
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">RGE JAÇANÃ/SUPORTE TI</p>
                    <h1 class="display-6 text-dark ms-3 mt-0 mb-0"><?=$user->nome?></h1>
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">INFORMÁTICA</p>
                    <p class="h2 text-secondary fw-bold ms-2">RGE 2021</p>
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
                <div class="col-5 text-start fw-bold">
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
            <div class="row">
                <div class="col-7 text-center fw-bold">
                    <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://192.168.15.122/<?=SYSTEM.'/'.PAGSYSTEM?>?pag=visual_cracha%id=<?=$user->id?>%nome=<?=$user->nome?>%sobrenome=<?=$user->sobrenome?>&choe=UTF-8" class="img-fluid float-left" height="150" width="150">
                </div>
            </div>

        </div>
