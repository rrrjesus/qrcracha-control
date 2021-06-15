<?php

?>

<form class="needs-validation p-2" novalidate id="head-login" method="POST" action="locked/valida-login.php">

        <div class="text-center">
            <img class="mb-4 pt-3" src="imagens/ccb-logo-sm.png">
            <h1 class="h5 mb-3 fw-normal text-white"><i class="far fa-lock-alt me-2"></i>E-mail</h1>
        </div>

    <div class="row mb-3 row justify-content-center">
        <div class="col-8 col-md-4">
            <input type="email" class="form-control" id="email" name="email" data-toggle="tooltip" data-placement="right" required
                title="Digite seu e-mail !!!" placeholder="email@email.com" autofocus>

        </div>
    </div>

    <div class="text-center">
        <h1 class="h5 mb-3 fw-normal text-white"><i class="far fa-key me-2"></i>Senha</h1>
    </div>

    <div class="row mb-3 row justify-content-center">
        <div class="col-8 col-md-4">
            <input type="password" id="senha" name="senha" data-toggle="tooltip" data-placement="right" required
                   title="Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere"
                   placeholder="*****" maxlength="12" class="form-control">

        </div>
    </div>

    <div class="row mb-3 row justify-content-center">
        <div class="col-5 col-md-2">
            <button type="submit" class="btn btn-success btn-sm text-center" data-toggle="tooltip" data-placement="right" title="Clique para validar seu login"><i class="fa fa-unlock px-2"></i> Acessar Sistema</button>
        </div>
            <div class="dropdown-divider text-white"></div>
        <div class="col-5 col-md-2">
            <a class="btn btn-danger btn-sm" href="<?=$pag_system?>?pag=esqueci-senha" role="button" data-toggle="tooltip" data-placement="right" title="Caso tenha esquecido sua senha clique no botão"><i class="fa fa-question-circle"></i> Esqueceu Senha?</a>
        </div>
    </div>
</form>
