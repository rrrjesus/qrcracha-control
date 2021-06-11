<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(-1);

// Recebe o id do cliente do cliente via GET
$id_user = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_user) && is_numeric($id_user)):

    // Captura os dados do cliente solicitado
    $conexao = conexao::getInstance();
    $sql = 'SELECT id,foto, nome, sobrenome, nomesocial, datanascimento, cpf, email, telefone, celular, setor, login, senha, status, sexo, nivel_acesso_id, acessotid, navuser, usuariocad FROM usuarios WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_user);
    $stm->execute();
    $user = $stm->fetch(PDO::FETCH_OBJ);

    if(!empty($user)):

        // Formata a data no formato nacional
        $array_data     = explode('-', $user->datanascimento);
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

    endif;

endif;
?>
<fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

    <form class="needs-validation" novalidate action="index.php?pag=proc-action-user" method="post" id='edit_user' enctype='multipart/form-data'>

        <div class="row mb-3">
            <div class="col-md-1 mb-1">
                <a href="<?php if (file_exists('imagens/'.$user->login.'/fotologin/'.$user->foto))
                {echo 'imagens/'.$user->login.'/fotologin/'.$user->foto;}
                else{ echo 'imagens/foto_exists.png';}?>">
                    <img  height="90" width="90" src="<?php if (file_exists('imagens/'.$user->login.'/fotologin/'.$user->foto))
                    {echo 'imagens/'.$user->login.'/fotologin/'.$user->foto;}
                    else{ echo 'imagens/foto_exists.png';}?>" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
                </a>
            </div>
            <div class="col-md-4 mb-1">
                <label for="formFileSm" class="form-label"> <strong> Extensões aceitas : .bmp ,.png, .svg, .jpeg e .jpg </strong></label>
                <input class="form-control form-control-sm" name="foto" id="foto" value="foto" type="file">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4 mb-1">
                <label class="mb-2" for="inputNome"><strong><i class="fa fa-user fa-muted"></i> Nome</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: RODOLFO" class="form-control"
                       name="nome" value="<?=$user->nome?>" placeholder="NOME" id="nome"
                       onchange="upperCaseF(this)" autofocus>

            </div>

            <div class="col-md-4 mb-1">
                <label class="mb-2" for="inputSobreNome"><strong><i class="fa fa-user fa-muted"></i> SobreNome</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control"
                       name="sobrenome" value="<?=$user->sobrenome?>" placeholder="SOBRENOME" id="sobrenome"
                       onchange="upperCaseF(this)">

            </div>

            <div class="col-md-4 mb-1">
                <label class="mb-2" for="inputNome"><strong><i class="fa fa-user fa-muted"></i> Nome Social</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: RODS" class="form-control"
                       name="nomesocial" value="<?=$user->nomesocial?>" placeholder="NOME SOCIAL" id="nomesocial"
                       onchange="upperCaseF(this)">

            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 mb-1">
                <label class="mb-2" for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted"></i> Nascimento</strong></label>
                <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control"
                       name="datanascimento" value="<?=$data_formatada?>" placeholder="07/02/1981" id="datanascimento">

            </div>

            <div class="col-md-2 mb-1">
                <label class="mb-2" for="inputCpf"><strong><i class="fa fa-file-alt fa-muted"></i> CPF</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control"
                       name="cpf" value="<?=$user->cpf?>" placeholder="222.689.135-87" id="cpf">
            </div>

            <div class="col-md-4 mb-1">
                <label class="mb-2" for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted"></i> E-mail</strong></label>
                <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                       class="form-control" name="email" value="<?=$user->email?>" placeholder="exemplo@exemplo.com.br">
            </div>

            <div class="col-md-3 mb-1">
                <label class="mb-2" for="inputsetor"><strong><i class="fa fa-globe fa-muted fa-fw"></i> Setor</strong></label>
                <select class="form-control" data-toggle="tooltip" title="Ex: AMBIENTAL"
                        name="setor" id="setor">
                    <option value="0"<?php if ($user->setor == 0) {echo 'selected';}?>>ADMINISTRATIVO</option>
                    <option value="1"<?php if ($user->setor == 1) {echo 'selected';}?>>AMBIENTAL</option>
                    <option value="2"<?php if ($user->setor == 2) {echo 'selected';}?>>EPIDEMIOLOGICA</option>
                    <option value="3"<?php if ($user->setor == 3) {echo 'selected';}?>>SANITÁRIA</option>
                    <option value="4"<?php if ($user->setor == 4) {echo 'selected';}?>>VISITANTE</option>
                    <option value="5"<?php if ($user->setor == 5) {echo 'selected';}?>>RH</option>
                    <option value="6"<?php if ($user->setor == 6) {echo 'selected';}?>>PROTOCOLO</option>
                </select>
            </div>

            <div class="col-md-1 mb-1">
                <label class="mb-2" for="inputStatus"><strong><i class="fa fa-file-alt fa-muted"></i> Tid</strong></label>
                <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                        id="acessotid" name="acessotid">
                    <option value="0"<?php if ($user->acessotid == 0) {echo 'selected';}?>>NAO</option>
                    <option value="1"<?php if ($user->acessotid == 1) {echo 'selected';}?>>SIM</option>
                </select>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-2 mb-3">
                <label class="mb-2" for="inputEmail"><strong><i class="fa fa-phone fa-muted"></i> Telefone</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: (11)22406868"
                       class="form-control" name="telefone"
                       value="<?php if($user->telefone == ''){echo '(11)22406868';}
                       else{echo $user->telefone;}?>"
                       id="telefone" placeholder="(11)22406868">
            </div>

            <div class="col-md-2 mb-3">
                <label class="mb-2" for="inputUsuario"><strong><i class="fa fa-phone-square fa-muted"></i> Celular</strong></label>
                <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control"
                       id="celular" name="celular" value="<?=$user->celular?>" placeholder="(11)991065284">
            </div>

            <div class="col-md-2 mb-3">
                <label class="mb-2" for="inputUsuario"><strong><i class="fa fa-sign-out-alt fa-muted"></i> Login</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: D788796" class="form-control"
                       id="login" name="login" value="<?=$user->login?>" placeholder="D123456 " onchange="upperCaseF(this)">
            </div>

            <div class="col-md-2 mb-3">
                <label class="mb-2" for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted"></i> Status</strong></label>
                <input <?php if ($user->status == 0) : echo 'class="form-control bg-danger text-white" value="INATIVO"'; else: echo 'class="form-control bg-success text-white" value="ATIVO"'; endif;?> data-toggle="tooltip" title="Ex: ATIVO" name="status" id="status">
            </div>

            <div class="col-md-3 mb-3">
                <label class="mb-2" for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted"></i> Nível de Acesso</strong></label>
                <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                        name="nivel_acesso_id" id="nivel_acesso_id">
                    <option value="0"<?php if ($user->nivel_acesso_id == 0) {echo 'selected';}?>>INATIVO</option>
                    <option value="1"<?php if ($user->nivel_acesso_id == 1) {echo 'selected';}?>>ADMINISTRADOR</option>
                    <option value="2"<?php if ($user->nivel_acesso_id == 2) {echo 'selected';}?>>AVANÇADO</option>
                    <option value="3"<?php if ($user->nivel_acesso_id == 3) {echo 'selected';}?>>USUÁRIO</option>
                </select>
            </div>

            <div class="col-md-1 mb-3">
                <label class="mb-2" for="inputSexo"><strong><i class="fa fa-transgender fa-muted"></i> Sexo</strong></label>
                <select <?php if ($user->sexo == 0) : echo 'class="form-control bg-danger text-white"';
                elseif ($user->sexo == 1) : echo 'class="form-control bg-primary text-white"';
                else : echo 'class="form-control bg-warning text-white"'; endif;?> data-toggle="tooltip" title="Ex: FEMININO"
                                                                                   name="sexouser" id="sexouser">
                    <option class="bg-danger" value="0"<?php if ($user->sexo == 0) {echo 'selected';}?>>F</option>
                    <option class="bg-primary" value="1"<?php if ($user->sexo == 1) {echo 'selected';}?>>M</option>
                    <option class="bg-warning" value="2"<?php if ($user->sexo == 2) {echo 'selected';}?>>I</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="edit" value="edit_user">
                <input type="hidden" name="id" value="<?=$user->id?>">
                <input type="hidden" name="foto_atual" value="<?=$user->foto?>">

                <button type="submit" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                        class="btn btn-outline-success mb-2 mr-sm-4"><i
                            class="fa fa-floppy-o"></i> <u>G</u>RAVAR&nbsp;
                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href='<?=$pag_system?>?pag=edit-perfil-user' type='button' data-toggle="tooltip" title="SAIR" accesskey="L"
                   class="btn btn-outline-danger mb-2 mr-sm-4">  <i class="fa fa-remove"></i> &nbsp;<u>S</u>AIR&nbsp;&nbsp;</a>
            </div>
        </div>
    </form>
</fieldset>



