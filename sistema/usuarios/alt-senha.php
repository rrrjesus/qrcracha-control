<?php

if(empty($hashsession)): // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR SENHA DE USUÁRIO !!!</strong></div>';
    header("Location: $pag_system?pag=edicao_perfil");
endif;
?>

<fieldset <?php if (($usuariostatus == 0)) :  echo 'disabled'; endif; ?>>

<form class="needs-validation" novalidate action="<?=$pag_system.'?pag=acao_usuarios'?>" method="post" id="edicao_senha">

    <div class="form-row d-flex justify-content-center">
        <div class="col-md-4 mb-3 text-center">
            <label class="col-form-label col-form-label-sm mb-2" for="inputNovaSenha"><strong><i class="fa fa-lock fa-muted"></i> Nova Senha</strong></label>
                <input required type="password" class="form-control form-control-sm" data-toggle="tooltip"
                       title="Digite a nova senha" name="senha" id="senha" placeholder="********" autofocus>
        </div>
    </div>

    <div class="form-row d-flex justify-content-center">
        <div class="col-md-4 mb-3 text-center">
            <label class="col-form-label col-form-label-sm mb-2" for="inputRepitaNovaSenha"><strong><i class="fa fa-lock fa-muted"></i> Repita Nova Senha</strong></label>
            <input required type="password" class="form-control form-control-sm" data-toggle="tooltip"
                   title="Repita a nova senha" name="novasenha" id="novasenha" placeholder="********">
        </div>
    </div>
</fieldset>
    <input type="hidden" name="acao" value="editar_senha">
    <input type="hidden" name="id" value="<?=$usuarioid?>">

    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
            <?=$button->BtnSair($pag_system);?>
        </div>
    </div>
</form>


