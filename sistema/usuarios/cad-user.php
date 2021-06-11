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

<div class="d-grid mb-3"><button disabled type="button" class="btn btn-outline-success btn-lg btn-block fw-bold pt-1 pb-1"><i class="far fa-file-invoice px-2"></i> CADASTRAR USUÁRIO - <?=$get_year?></button></div>

<?=$button->AlertSession()?>

<form class="needs-validation" novalidate action="menu-principal.php?pag=action-user&session=<?=$hashprimary?>" method="post" id='user' enctype='multipart/form-data'>

    <div class="row mb-3">
        <div class="col-md-1 mb-1">
            <a href="imagens/foto_exists.png" target="_blank">
                <img  height="90" width="90" src="imagens/foto_exists.png" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
            </a>
        </div>
        <div class="col-md-4 mb-1">
            <label for="formFileSm" class="form-label"> <strong> Extensões aceitas : .bmp ,.png, .svg, .jpeg e .jpg </strong></label>
            <input class="form-control form-control-sm" name="foto" id="foto" value="foto" type="file">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="inputNome"><strong><i class="fa fa-user fa-muted m-3 m-3"></i> Nome</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: RODOLFO" class="form-control"
                   name="nome" placeholder="NOME" id="nome"
                   onchange="upperCaseF(this)" autofocus>

        </div>

        <div class="col-md-4 mb-3">
            <label for="inputSobreNome"><strong><i class="fa fa-user fa-muted m-3"></i> SobreNome</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control"
                   name="sobrenome" placeholder="SOBRENOME" id="sobrenome"
                   onchange="upperCaseF(this)">

        </div>

        <div class="col-md-4 mb-3">
            <label for="inputNomeSocial"><strong><i class="fa fa-user fa-muted m-3"></i> Nome Social</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: RODS" class="form-control"
                   name="nomesocial" placeholder="NOME SOCIAL" id="nomesocial"
                   onchange="upperCaseF(this)">

        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted m-3"></i> Nascimento</strong></label>
            <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control"
                   name="datanascimento" placeholder="07/02/1981" id="datanascimento">

        </div>

        <div class="col-md-2 mb-3">
            <label for="inputCpf"><strong><i class="fa fa-file-alt fa-muted m-3"></i> CPF</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control"
                   name="cpf" placeholder="222.689.135-87" id="cpf">
        </div>

        <div class="col-md-3 mb-3">
            <label for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted m-3"></i> E-mail</strong></label>
            <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                   class="form-control" name="email" placeholder="exemplo@exemplo.com.br">
        </div>

        <div class="col-md-1 mb-3">
            <label for="inputSexo"><strong><i class="fa fa-transgender fa-muted m-3"></i> Sexo</strong></label>
            <select class="form-control" data-toggle="tooltip" title="Ex: F ou M"
                    id="sexouser" name="sexouser">
                <option value="0">F</option>
                <option value="1">M</option>
                <option value="2">I</option>
            </select>
        </div>

        <div class="col-md-3 mb-3">
            <label for="inputSetor"><strong><i class="fa fa-globe fa-muted fa-fw m-3"></i> Setor</strong></label>
            <select class="form-control" data-toggle="tooltip" title="Ex: AMBIENTAL"
                    name="setor" id="setor">
                <option value="0">ADMINISTRATIVO</option>
                <option value="1">AMBIENTAL</option>
                <option value="2">EPIDEMIOLOGICA</option>
                <option value="3">SANITÁRIA</option>
                <option value="4">VISITANTE</option>
            </select>
        </div>

        <div class="col-md-1 mb-3">
            <label for="inputTid"><strong><i class="fa fa-file-alt fa-muted m-3"></i> Tid</strong></label>
            <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                    id="acessotid" name="acessotid">
                <option value="0">NAO</option>
                <option value="1">SIM</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 mb-3">
            <label for="inputTelefone"><strong><i class="fa fa-phone fa-muted m-3"></i> Telefone</strong></label>
            <input type="text" value="(11)22406868" data-toggle="tooltip" title="Ex: (11)22406868"
                   class="form-control" name="telefone" id="telefone" placeholder="(11)22406868)">
        </div>

        <div class="col-md-2 mb-3">
            <label for="inputCelular"><strong><i class="fa fa-phone-square fa-muted m-3"></i> Celular</strong></label>
            <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control"
                   id="celular" name="celular" placeholder="(11)991065284">
        </div>

        <div class="col-md-2 mb-3">
            <label for="inputLogin"><strong><i class="fa fa-sign-out-alt fa-muted m-3"></i> Login</strong></label>
            <input type="text" data-toggle="tooltip" title="Ex: D788796" class="form-control"
                   id="login" name="login" placeholder="D123456 " onchange="upperCaseF(this)">
        </div>
        <div class="col-md-2 mb-3">
            <label for="inputSenha"><strong><i class="fa fa-lock fa-muted m-3"></i> Senha</strong></label>
            <input class="form-control" type="password" data-toggle="tooltip" title="Ex: ddd123"
                   name="senha" id="senha" value="mudar123" placeholder="******">
        </div>

        <div class="col-md-2 mb-3">
            <label for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted m-3"></i> Status</strong></label>
            <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                    name="status" id="status">
                <option value="0">INATIVO</option>
                <option value="1">ATIVO</option>
            </select>
        </div>

        <div class="col-md-2 mb-3">
            <label for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted m-3"></i> Nível de Acesso</strong></label>
            <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                    name="nivel_acesso_id" id="nivel_acesso_id">
                <option value="0">INATIVO</option>
                <option value="1">ADMINISTRADOR</option>
                <option value="2">AVANÇADO</option>
                <option value="3">USUÁRIO</option>
                <option value="4">VISITANTE</option>
            </select>
        </div>

    </div>

    <div class="row text-center">
        <div class="col-md-12">
            <input type="hidden" name="acao" value="incluir">
            <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
            <?=$button->BtnListar($pag_system,$get_pag, $get_year, $get_sv2, $hashprimary);?>
            <?=$button->BtnSair($pag_system);?>
        </div>
    </div>
</form>



