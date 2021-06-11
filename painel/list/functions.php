<?php
/**
 * Created by PhpStorm.
 * User: sms
 * Date: 28/06/2017
 * Time: 10:18
 */
function completePayment($cod)
{

    switch ($cod) {
        default:
            $color = '<button class="btn btn-default">';
            break;

        case 'INATIVO':
            $color = '<button class="btn btn-danger">';
            break;

        case 'ATIVO':
            $color = '<button class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true">';
            break;
    }

    return $color;

}

?>

<?php
function niveluser($nivel) {

    switch ($nivel) {
        default:
            $user = '';
            break;

        case '0':
            $user = 'INATIVO';
            break;

        case '1':
            $user = 'ADMINISTRADOR';
            break;

        case '2':
            $user = 'AVANÇADO';
            break;

        case '3':
            $user = 'USUÁRIO';
            break;

        case '4':
            $user = 'VISITANTE';
            break;
    }

    return $user;

}

?>