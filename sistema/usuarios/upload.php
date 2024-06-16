<?php

// Receber a imagem
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_DEFAULT);
//var_dump($imagem);

// Separa as informações da imagem base64 pelo ";"
list($type, $imagem) = explode(';', $imagem);
list(, $imagem) = explode(',', $imagem);

// Desconverter a imagem base64
$imagem = base64_decode($imagem);

// Atribuir a extensão da imagem PNG
$imagem_nome = time() . '.png';

// Realizar o upload da imagem
file_put_contents('../imagens/cropper/' . $imagem_nome, $imagem);