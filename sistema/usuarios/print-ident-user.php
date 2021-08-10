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

$sql = "SELECT usuarios.id, usuarios.foto, usuarios.nome, usuarios.sobrenome, setor.nome_setor AS setor, usuarios.adm, usuarios.cidade, usuarios.hash_cracha, setor.id as id_setor
        FROM usuarios LEFT JOIN setor ON usuarios.setor = setor.id WHERE usuarios.id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

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
    window.print();
</script>

    <fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

        <div class="container-fluid">

            <div class="cracha" style="border-style: dotted;padding-bottom: 18px;padding-right: 0px;padding-left:0px;padding-top: 18px">
            <div class="row mb-1 justify-content-center">
                <div class="col-6 mb-0 text-center">
                    <p class="display-1 text-dark" style="font-size: 80px;font-weight: 900">CCB</p>
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-2 mb-1 text-center">
                    <img height="125" width="105" src="<?php if (file_exists($user->foto))
                    {echo $user->foto;}
                    else{ echo 'sistema/imagens/padrao.jpg';}?>" class="img">
                </div>
                <div class="col-5 text-center">
                    <p class="h6 text-dark fw-bold mt-0 mb-0 ms-2">RGE SETOR <?=$user->adm?></p>
                    <p class="h6 text-dark ms-2 mt-0 mb-0" style="font-size: 40px;font-weight: 500"><?=$user->nome?></p>
                    <p class="h6 text-dark mt-0 mb-0 ms-2" style="font-size: 20px;font-weight: 800"><?=$user->setor?></p>
                    <p class="h6 text-secondary mt-0 mb-0 ms-2" style="font-size: 40px;font-weight: 900">RGE <?=$year?></p>
                </div>

            </div>

            <div class="row mb-1 mt-0 justify-content-center">
                <div class="col-7 mb-0 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.60rem">"Atividade de caráter voluntário não gerando vínculo de qualquer espécie"</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 mb-0 text-center">
                    <p class="h6 text-dark fw-bold ms-4">Congregação Cristã no Brasil</p>
                </div>
            </div>
            <div class="row mb-0 mt-0 justify-content-center">
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold" style="font-size: 0.70rem">"Válido de 7 de Setembro de 2021 a 14 de Setembro de 2021"</p>
                </div>
            </div>

            <div class="row justify-content-center" style="font-size: 0.80rem">
                <div class="col-7 text-start fw-bold">
                    <p class="text-dark mt-0 mb-0"><?=$user->nome.' '.$user->sobrenome?></p>
                    <p class="text-dark mt-0 mb-0">ADMINISTRAÇÃO: <?=$user->adm?></p>
                    <p class="text-dark mt-0 mb-0">CIDADE: <?=$user->cidade?></p>
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

            <div class="row mb-0 mt-0 justify-content-center">
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem">- Este cartão de identificação é pessoal e intransferível,</p>
                    <p class="text-dark fw-bold mb-0 mt-0" style="font-size: 0.70rem">de propriedade da CONGREGAÇÃO CRISTÃ NO BRASIL - </p>
                    <p class="text-dark fw-bold mb-0 mt-0" style="font-size: 0.70rem">ADMINISTRAÇÃO <?=$user->adm?>, devendo ser apresentado</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem"> e/ou devolvido quando solicitado.</p>
                </div>
                <br>
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem">- Só terá valor com a apresentação do documento de</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem">identidade.</p>
                </div>
                <br>
                <div class="col-7 text-center">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem">- Em caso de perda ou extravio, comunicar imediatamente</p>
                    <p class="text-dark fw-bold" style="font-size: 0.70rem"> à Administração local ou à Regional.</p>
                </div>
                <br>
                <br>
                <div class="col-6 text-center">
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem">Verification Code: <?=$user->id.$user->hash_cracha?></p>
                    <p class="text-dark fw-bold mb-0" style="font-size: 0.70rem">Suporte: informatica.setort11@gmail.com</p>
                </div>
            </div>
            <br><br><br><br><br><br>

        </div>
    </fieldset>
