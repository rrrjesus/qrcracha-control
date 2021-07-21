<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

$get_session = $_GET['session'] ?? '';

if($get_session !== $hashprimary):
    header("Location: $pag_system");
endif;

?>

<div class="d-grid mb-1"><button disabled type="button" class="btn btn-outline-success btn-block fw-bold pt-1 pb-1"><i class="far fa-file-invoice px-2"></i> CADASTRAR USUÁRIO - <?=$get_year?></button></div>

<?=$button->AlertSession()?>

<fieldset
    <?php if ($usuarioniveldeacesso > 2) :  echo 'disabled';
        elseif ($usuariostatus == 0) : echo 'disabled';
            elseif ($usuariolixeira == 1) : echo 'disabled';
                else: echo '';
                    endif; ?>>

<form class="needs-validation" novalidate action="<?=$pag_system.'?pag=acao_usuarios&session='.$hashprimary?>" method="post" id='user' enctype='multipart/form-data'>

    <div class="row mb-1">
        <div class="col-md-1 mb-1">
            <a href="sistema/imagens/padrao.jpg" target="_blank">
                <img  height="90" width="90" src="sistema/imagens/padrao.jpg" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
            </a>
        </div>
        <div class="col-md-4 mb-1">
            <label for="formFileSm" class="col-form-label col-form-label-sm"> <strong> Extensões aceitas : .bmp ,.png, .svg, .jpeg e .jpg </strong></label>
            <input class="form-control form-control-sm" name="foto" id="foto" value="foto" type="file">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputNome"><strong><i class="fa fa-user fa-muted me-3 ms-3"></i> Nome</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: RODOLFO" class="form-control form-control-sm"
                   name="nome" placeholder="NOME" id="nome"
                   onchange="upperCaseF(this)" autofocus>

        </div>

        <div class="col-md-5 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputSobreNome"><strong><i class="fa fa-user fa-muted me-3 ms-3"></i> SobreNome</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control form-control-sm"
                   name="sobrenome" placeholder="SOBRENOME" id="sobrenome"
                   onchange="upperCaseF(this)">

        </div>

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted ms-3 me-3"></i> Nascimento</strong></label>
            <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control form-control-sm"
                   name="datanascimento" placeholder="07/02/1981" id="datanascimento">

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputCpf"><strong><i class="fa fa-file-alt fa-muted ms-3 me-3"></i> CPF</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control form-control-sm"
                   name="cpf" placeholder="222.689.135-87" id="cpf">
        </div>

        <div class="col-md-2 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputSexo"><strong><i class="fa fa-transgender fa-muted ms-3 me-3"></i> Sexo</strong></label>
            <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: FEMININO"
                    id="sexouser" name="sexouser">
                <option value="0">F</option>
                <option value="1">M</option>
                <option value="2">I</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputCelular"><strong><i class="fa fa-phone-square fa-muted ms-3 me-3"></i> Celular</strong></label>
            <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control form-control-sm"
                   id="celular" name="celular" placeholder="(11)991065284">
        </div>

        <div class="col-md-4 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted ms-3 me-3"></i> E-mail</strong></label>
            <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                   class="form-control form-control-sm"
                name="email" placeholder="exemplo@exemplo.com.br">
        </div>

    </div>

    <div class="row">
        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputSenha"><strong><i class="fa fa-lock fa-muted ms-3 me-3"></i> Senha</strong></label>
            <input class="form-control form-control-sm" type="password" data-toggle="tooltip" title="Ex: ddd123"
                   name="senha" id="senha" value="mudar123" placeholder="******">
        </div>

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputSetor"><strong><i class="fa fa-globe fa-muted fa-fw ms-3 me-3"></i> Setor</strong></label>
            <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: INFORMÁTICA"
                    name="setor" id="setor">
                <?php
                    $conexao = conexao::getInstance(); // Instanciando uma conexão segura através da classe conexão
                    $sql = "SELECT id, nome_setor FROM setor";
                    $stm = $conexao->prepare($sql);
                    $stm->execute();
                    $setor = $stm->fetchAll(PDO::FETCH_OBJ);

                    $stm = null; //Encerra a conexão

                    foreach ($setor as $setor_for):
                ?>
                <option value="<?=$setor_for->id?>>"><?=strtoupper($setor_for->nome_setor)?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted ms-3 me-3"></i> Status</strong></label>
            <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: ATIVO/INATIVO"
                    name="status" id="status">
                <option value="0">INATIVO</option>
                <option value="1">ATIVO</option>
            </select>
        </div>

        <div class="col-md-3 mb-1">
            <label class="col-form-label col-form-label-sm" for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted ms-3 me-3"></i> Nível Acesso</strong></label>
            <select class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Ex: USUÁRIO"
                    name="nivel_acesso_id" id="nivel_acesso_id">
                <option value="1">ADMINISTRADOR</option>
                <option value="2">AVANÇADO</option>
                <option value="3">USUÁRIO</option>
            </select>
        </div>

    </div>
</fieldset>
    <div class="row text-center mt-3">
        <div class="col-md-12">
            <input type="hidden" name="acao" value="incluir">
            <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
            <?=$button->BtnListar($pag_system,$get_pag, $get_year, $hashprimary);?>
            <?=$button->BtnSair($pag_system);?>
        </div>
    </div>
</form>



