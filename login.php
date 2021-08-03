<?php
// Recebe os dados enviados pela submissão
$emailget = (isset($_GET['email'])) ? $_GET['email'] : '';
?>

<div class="container-fluid">
    <div class="container">
<div class="row justify-content-center pb-5 pt-5">

    <div class="card col-sm-6 shadow-lg mb-5 mt-5 bg-body rounded pe-0 ps-0">
        <div class="card-header text-center fw-bold pt-1 pb-1">

            <img class="img-fluid rounded-circle me-2" height="70" width="70" src="imagens/inf_menu.png">
            <h4 class="pt-2">SISTEMA JAÇANA CONTROLE</h4>
        </div>

        <div class="card-body" style="background-color: #c7c8ce">

        <form class="needs-validation p-2" novalidate id="head-login" method="POST" action="locked/valida-login.php">

            <div class="text-center pt-3">
                <p class="h6 mb-3 fw-bold text-black"><i class="far fa-lock-alt me-2"></i>E-mail</p>
            </div>

            <div class="row mb-2 row justify-content-center">
                <div class="col-8 col-md-6">
                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $emailget ?>"
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

            <div class="row mb-2 row justify-content-center">
                <div class="col-8 col-md-6">
                    <?php
                        if (isset($_GET['erro']) && $_GET['erro'] == "true"):
                            echo '<div class="text-center"><label class="col-form-label col-form-label-sm text-danger"><strong> Senha Inválida !!!</strong></label></div>';
                        endif;
                    ?>
                        <input type="password" class="form-control form-control-sm" id="senha" name="senha" data-toggle="tooltip" data-placement="top" required
                               <?php if (isset($_GET['erro']) && $_GET['erro'] == "true"): echo 'autofocus title="Senha incorreta !!!, mínimo de 6 caracteres contendo um número e um caractere"';
                                        else: echo 'title="Sua senha deve ter mínimo de 6 caracteres contendo um número e um caractere"'; endif;?>
                           placeholder="*****" maxlength="12">
                </div>
            </div>

            <div class="row pt-3 justify-content-center text-center">
                <div class="col-8 col-md-6">
                    <button type="submit" class="btn btn-success text-center mb-3" data-toggle="tooltip" data-placement="right" title="Clique para validar seu login"><i class="fa fa-unlock px-2"></i> Acessar Sistema</button>
                    <a class="btn btn-danger text-center mb-3" href="<?=$pag_system?>?pag=esqueci-senha" role="button" data-toggle="tooltip" data-placement="right" title="Caso tenha esquecido sua senha clique no botão"><i class="fa fa-question-circle px-2"></i> Esqueceu Senha?</a>
                </div>
            </div>
        </form>
    </div>
        <div class="card-footer pb-5"></div>
</div>
</div>
</div>
</div>
