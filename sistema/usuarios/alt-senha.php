<fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

<form class="needs-validation" novalidate action="<?=$pag_system?>?pag=proc-action-user" method="post" id="edicao_senhas">

    <div class="form-row d-flex justify-content-center">
        <div class="col-md-4 mb-3 text-center">
            <label class="col-form-label col-form-label-sm mb-2" for="inputNovaSenha"><strong><i class="fa fa-lock fa-muted"></i> Nova Senha</strong></label>
                <input required type="password" class="form-control form-control-sm" data-toggle="tooltip"
                       title="Digite a nova senha" name="senhas" id="senhas" placeholder="********" autofocus>
        </div>
    </div>

    <div class="form-row d-flex justify-content-center">
        <div class="col-md-4 mb-3 text-center">
            <label class="col-form-label col-form-label-sm mb-2" for="inputRepitaNovaSenha"><strong><i class="fa fa-lock fa-muted"></i> Repita Nova Senha</strong></label>
            <input required type="password" class="form-control form-control-sm" data-toggle="tooltip"
                   title="Repita a nova senha" name="novasenhas" id="novasenhas" placeholder="********">
        </div>
    </div>

    <input type="hidden" name="acao" value="editar_senha">
    <input type="hidden" name="id" value="<?=$usuarioid?>">

    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
            <?=$button->BtnSair($pag_system);?>
        </div>
    </div>
</form>
</fieldset>


