<?php
include_once '../Conexao.php';
//https://github.com/kazuhikoarase/qrcode-generator/tree/master/php
// Biblioteca qrcode
require_once '../qrcode/qrcode.php';

$conexao = conexao::getInstance();
$usuarioid = isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : '';
?>

<!doctype html>
<html lang="pt-BR">

<?php require(__DIR__ . '/head_auth.php'); ?>

<body>

<?php

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET

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
endif;
?>


<div class="container py-3">
    
    <style type="text/css" media="print">
        @page {size:  auto;   /* auto is the initial value */ margin: 0mm;  /* this affects the margin in the printer settings */ }
            html {background-color: #FFFFFF; margin: 0px;  /* this affects the margin on the html before sending to printer */}
            body {margin: 0mm 1mm 0mm mm; /* margin you want for the content */}
            .foto {color: #D3D3D3;}
        
    /* @media print {}*/

        
    </style>

    <?php //require(__DIR__ . '/header_auth.php'); ?>
    
    <script type="text/javascript">
        window.print();
    </script>

    <main>
    <fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

        <div class="container-fluid">

            <div class="cracha">
            <div class="row mb-0 justify-content-center">
                <div class="col-6 mb-0 text-center">
                    <p class="display-1 text-dark" style="font-size: 80px;font-weight: 900">CCB</p>
                </div>
            </div>

            <div class="row mb-2 ms-2 justify-content-center">
                <div class="col-2 text-center">
                    <img height="125" width="105" src="../<?php if (file_exists('../'.$user->foto))
                    {echo $user->foto;}
                    else{ echo 'sistema/imagens/padrao.jpg';}?>" class="img">
                </div>
                <div class="col-7 text-center foto">
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">RGE SETOR <?=$user->adm?></p>
                    <p class="h6 text-dark ms-2 mt-0 mb-0" style="font-size: 40px;font-weight: 500"><?=$user->nome?></p>
                    <p class="h6 text-dark mt-0 mb-0 ms-2" style="font-size: 20px;font-weight: 800"><?=$user->setor?></p>
                    <p class="h6 text-secondary mt-0 mb-0 ms-2 foto" style="font-size: 40px;font-weight: 900">RGE <?=date('Y')?></p>
                </div>

            </div>

            <div class="row mb-0 mt-0 justify-content-center">
                <div class="col-7 mb-0 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.60rem">"Atividade de caráter voluntário não gerando vínculo de qualquer espécie"</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-7 mb-0 text-center">
                    <p class="h6 text-dark fw-bold ms-4">Congregação Cristã no Brasil</p>
                </div>
            </div>
            <div class="row mb-0 mt-0 justify-content-center">
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido durante a RGE <?=date('Y')?>"</p>
                </div>
            </div>

            <div class="row" style="font-size: 0.80rem; margin-left:75px">
                <div class="col-8 text-start fw-bold">
                    <p class="text-dark mt-0 mb-0"><?=$user->nome.' '.$user->sobrenome?></p>
                    <p class="text-dark mt-0 mb-0">ADMINISTRAÇÃO: <?=$user->adm.'-'.$user->cidade?></p>
                </div>
            </div>
            <div class="row mt-2 justify-content-center">
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
            <div class="row mt-2">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

            <div class="row mb-0 mt-0  justify-content-center">
                <div class="col-8 text-start">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px">- Este cartão de identificação é pessoal e intransferível,</p>
                    <p class="text-dark fw-bold mb-0 mt-0" style="font-size: 0.70rem; margin-left:10px">de propriedade da CONGREGAÇÃO CRISTÃ NO BRASIL</p>
                    <p class="text-dark fw-bold mb-0 mt-0" style="font-size: 0.70rem; margin-left:10px">ADMINISTRAÇÃO <?=$user->adm?>, devendo ser apresentado </p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem; margin-left:10px">e/ou devolvido quando solicitado.</p>
                </div>
                <br>
                <div class="col-8 text-start">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px">- Só terá valor com a apresentação do documento de</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem; margin-left:10px">identidade.</p>
                </div>
                <br>
                <div class="col-8 text-start">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px">- Em caso de perda ou extravio, comunicar</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem; margin-left:10px">imediatamente à Administração local ou à Regional.</p>
                </div>
                
                <div class="col-8 text-start mb-1">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px"><strong>Para verificar a autenticidade do crachá escaneie</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem; margin-left:10px">o qr code abaixo</strong></p>
                </div>
            
                <div class="col-8 text-center">
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
                
                <div class="col-8 text-start mt-3">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px"><strong>Telefone de Contato</strong>: (11) 2241-5079</p>
                </div>
                
                <div class="col-8 text-start">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem; margin-left:10px"><strong>E-mail de Suporte</strong>: informatica.setor11@gmail.com</p>
                </div>
            </div>
            <br><br><br><br><br><br>

        </div>
    </fieldset>

    </main>

</div>



</body>
</html>
