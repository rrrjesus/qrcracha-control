<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 28/06/2017
 * Time: 10:18
 */
error_reporting(-1);

include_once 'conexao.php';

/** Função para desabilitar formulários*/
function disabled($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
    if ($usuarioid == 1)
        echo 'disabled';
    elseif ($usuariostatus == 0)
        echo 'disabled';
    elseif ($usuarioniveldeacesso == 4)
        echo 'disabled';
    else
        echo '';
}

function disabledcad($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
    if ($usuarioid == 1)
        echo 'disabled';
    elseif ($usuariostatus == 0)
        echo 'disabled';
    elseif ($usuarioniveldeacesso == 4)
        echo 'disabled';
    else
        echo '';
}

function disablededit($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
    if ($usuarioid == 1)
        echo 'disabled';
    elseif ($usuariostatus == 0)
        echo 'disabled';
    elseif ($usuarioniveldeacesso == 4)
        echo 'disabled';
    else
        echo '';
}

/** Função para desabilitar formulários*/
function displaynone($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
    if ($usuarioid == 1)
        echo 'display: none;';
    elseif ($usuariostatus == 0)
        echo 'display: none;';
    elseif ($usuarioniveldeacesso == 4)
        echo 'display: none;';
    else
        echo '';
}

/** Função para desabilitar formulários*/
function displaynoneadmin($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
    if ($usuarioid == 1)
        echo 'display: none;';
    elseif ($usuariostatus == 0)
        echo 'display: none;';
    elseif ($usuarioniveldeacesso <> 1)
        echo 'display: none;';
    else
        echo '';
}




function buttonColor($buttonact) {

    switch ($buttonact) {
        default:
            $coloract = '<button class="btn btn-outline-primary">???</button>';
            break;

        case '0':
            $coloract = '<button class="btn btn-outline-danger btn-circle"><strong>NAO</strong></button>';
            break;

        case '1':
            $coloract = '<button class="btn btn-outline-success btn-circle"><strong>SIM</strong></button>';
            break;
    }

    return $coloract;

}



function completePayment($cod) {

    switch ($cod) {
        default:
            $color = '<button class="btn btn-outline-primary"></button>';
            break;

        case '0':
            $color = '<button class="btn btn-outline-danger btn-icon-panel"><span class="icon text-white-50">
                <i class="fas fa-close"></i></span><span class="text">NAO</span></button>';
            break;

        case '1':
            $color = '<button class="btn btn-outline-success btn-icon-panel"><span class="icon text-white-50">
                <i class="fas fa-check"></i></span><span class="text">SIM</span></button>';
            break;
    }

    return $color;

}

function niveluser($nivel) {
    switch ($nivel) {
        default: $user = ''; break;
        case '0': $user = 'INATIVO'; break;
        case '1': $user = 'ADMINISTRADOR'; break;
        case '2': $user = 'AVANÇADO'; break;
        case '3': $user = 'USUÁRIO'; break;
        case '4': $user = 'VISITANTE'; break;}
    return $user;
}

?>