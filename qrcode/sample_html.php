<?php

require_once("qrcode.php");

//---------------------------------------------------------

print("<h4>Especifique explicitamente o número do modelo</h4>");

$qr = new QRCode();

// Defina o nível de correção de erro
// QR_ERROR_CORRECT_LEVEL_L : 7%
// QR_ERROR_CORRECT_LEVEL_M : 15%
// QR_ERROR_CORRECT_LEVEL_Q : 25%
// QR_ERROR_CORRECT_LEVEL_H : 30%
$qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);

// Defina o número do modelo (tamanho grande)
// 1-40
$qr->setTypeNumber(8);

// Defina os dados (string de caracteres *)
// * Japonês é SJIS
$qr->addData('http://'.HOST.'/'.SYSTEM.'/'.PAGSYSTEM.'?pag=autenticacao_cracha&id='.$user->id.'&session='.$hashprimary.'&crypto='.$user->hash_cracha);

// Crie um código QR
$qr->make();

// saída HTML
$qr->printHTML();

//---------------------------------------------------------

print("<h4> Tipo Ventilador Automático </h4>");

// Crie um código QR com o menor número de modelo
$qr = QRCode::getMinimumQRCode('http://'.HOST.'/'.SYSTEM.'/'.PAGSYSTEM.'?pag=autenticacao_cracha&id='.$user->id.'&session='.$hashprimary.'&crypto='.$user->hash_cracha, QR_ERROR_CORRECT_LEVEL_L);

// saída HTML
$qr->printHTML();

?>
