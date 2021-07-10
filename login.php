<?php
// Recebe os dados enviados pela submissão
$emailget = (isset($_GET['email'])) ? $_GET['email'] : '';
?>

<form class="needs-validation p-2" novalidate id="head-login" method="POST" action="locked/valida-login.php">

        <div class="text-center pt-3">
            <img class="mb-3 pt-2" src="imagens/logo/jacana_controle_qrcode.png">
            <p class="h6 mb-3 fw-bold text-black"><i class="far fa-lock-alt me-2"></i>E-mail</p>
        </div>

    <div class="row mb-2 row justify-content-center">
        <div class="col-10 col-md-4">
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $emailget ?>"
                <?php
                    if (isset($_GET['erro']) && $_GET['erro'] == "true"): echo '';
                    else: echo 'autofocus';
                    endif;
                ?>
               data-toggle="tooltip" data-placement="top" required title="Digite seu e-mail !!!" placeholder="email@email.com">
        </div>
    </div>

    <div class="text-center pt-3">
        <p class="h6 mb-3 fw-bold text-black"><i class="far fa-key me-2"></i>Senha</p>
    </div>

    <div class="row mb-3 row mb-4 justify-content-center">
        <div class="col-10 col-md-4">
            <?php
                if (isset($_GET['erro']) && $_GET['erro'] == "true"):
                    echo '<div class="text-center"><label class="col-form-label col-form-label-sm text-danger"><strong> Senha Inválida !!!</strong></label></div>';
                endif;
            ?>
                <input type="password" id="senha" name="senha" data-toggle="tooltip" data-placement="top" required
                       <?php if (isset($_GET['erro']) && $_GET['erro'] == "true"): echo 'autofocus title="Senha incorreta !!!, mínimo de 6 caracteres contendo um número e um caractere"';
                                else: echo 'title="Sua senha deve ter mínimo de 6 caracteres contendo um número e um caractere"'; endif;?>

                   placeholder="*****" maxlength="12" class="form-control">
        </div>
    </div>

    <div class="row pt-3 justify-content-center text-center">
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-success text-center mb-3" data-toggle="tooltip" data-placement="right" title="Clique para validar seu login"><i class="fa fa-unlock px-2"></i> Acessar Sistema</button>
            <a class="btn btn-danger text-center mb-3" href="<?=$pag_system?>?pag=esqueci-senha" role="button" data-toggle="tooltip" data-placement="right" title="Caso tenha esquecido sua senha clique no botão"><i class="fa fa-question-circle px-2"></i> Esqueceu Senha?</a>
        </div>
    </div>
</form>
