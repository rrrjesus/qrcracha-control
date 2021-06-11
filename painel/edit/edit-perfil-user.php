<?php

error_reporting(-1);
include_once 'proc-edit-admin/proc-edit-perfil.php';
include_once 'proc-edit-admin/proc-edit-senha.php';

// Recebe o id do cliente do cliente via GET
$id_user = $usuarioid;

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();

$sql = 'SELECT id,foto, nome, sobrenome, nomesocial, datanascimento, cpf, email, telefone, celular, setor, login, senha, status, sexo, nivel_acesso_id, acessotid,usuariocad FROM usuarios WHERE id = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_user);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

// Formata a data no formato nacional
$array_data     = explode('-', $user->datanascimento);
$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
?>


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Geral</a></li>
    <li class="nav-item"><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Atualizar Perfil</a></li>
    <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Atualizar Senha</a></li>
</ul>

<p>
    <?php
    if (isset($_SESSION['msgperfilerro'])) {echo $_SESSION['msgperfilerro'];unset($_SESSION['msgperfilerro']);
    } elseif (isset($_SESSION['msgperfil'])) {echo $_SESSION['msgperfil'];unset($_SESSION['msgperfil']);
    } elseif (isset($_SESSION['msgsenhaerro'])) {echo $_SESSION['msgsenhaerro'];unset($_SESSION['msgsenhaerro']);
    } elseif (isset($_SESSION['msgsenha'])) {echo $_SESSION['msgsenha'];unset($_SESSION['msgsenha']);
    } else {echo '';}
    ?>
</p>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <form>
            <div class="form-row">
                <div class="col-md-8 mb-1">
                    <img  height="90" width="90" src="<?php if (file_exists('imagens/'.$user->login.'/fotologin/'.$user->foto))
                    {echo 'imagens/'.$user->login.'/fotologin/'.$user->foto;}
                    else{ echo 'imagens/foto_exists.png';}?>" class="img-thumbnail rounded-circle float-none">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-1">
                    <label <?php if($user->nome == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputNome"><strong><i class="fa fa-user fa-muted"></i> Nome</strong></label>
                    <button disabled <?php if($user->nome == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->nome?></button>
                </div>

                <div class="col-md-4 mb-1">
                    <label <?php if($user->sobrenome == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputSobreNome"><strong><i class="fa fa-user fa-muted"></i> SobreNome</strong></label>
                    <button disabled <?php if($user->sobrenome == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->sobrenome?></button>
                </div>

                <div class="col-md-4 mb-1">
                    <label <?php if($user->nomesocial == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputNomeSocial"><strong><i class="fa fa-user fa-muted"></i> Nome Social</strong></label>
                    <button disabled <?php if($user->nomesocial == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left" > COMPLETE SEU CADASTRO !!!';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left" >'.$user->nomesocial;}?></button>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2 mb-1">
                    <label <?php if($user->datanascimento == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted"></i> Nascimento</strong></label>
                    <button disabled <?php if($user->datanascimento == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$data_formatada?></button>
                </div>

                <div class="col-md-2 mb-1">
                    <label <?php if($user->cpf == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputCpf"><strong><i class="fa fa-file-alt fa-muted"></i> CPF</strong></label>
                    <button disabled <?php if($user->cpf == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->cpf?></button>
                </div>

                <div class="col-md-4 mb-1">
                    <label <?php if($user->email == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted"></i> E-mail</strong></label>
                    <button disabled <?php if($user->email == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->email?></button>
                </div>

                <div class="col-md-3 mb-1">
                    <label <?php if($user->setor == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputsetor"><strong><i class="fa fa-globe fa-muted fa-fw"></i> Setor</strong></label>
                    <button disabled
                    <?php if ($user->setor == 0) {echo 'class="btn btn-outline-success form-control-plaintext text-left">ADMINISTRATIVO';}
                    elseif ($user->setor == 1) {echo 'class="btn btn-outline-success form-control-plaintext text-left">AMBIENTAL';}
                    elseif ($user->setor == 2) {echo 'class="btn btn-outline-success form-control-plaintext text-left">EPIDEMIOLOGICA';}
                    elseif ($user->setor == 3) {echo 'class="btn btn-outline-success form-control-plaintext text-left">SANITÁRIA';}
                    elseif ($user->setor == 4) {echo 'class="btn btn-outline-success form-control-plaintext text-left">VISITANTE';}
                    elseif ($user->setor == 5) {echo 'class="btn btn-outline-success form-control-plaintext text-left">RH';}
                    elseif ($user->setor == 6) {echo 'class="btn btn-outline-success form-control-plaintext text-left">PROTOCOLO';}
                    else {echo 'class="btn btn-outline-warning form-control-plaintext text-left">SISDAMWEB';}
                    ?></button>
                </div>

                <div class="col-md-1 mb-1">
                    <label <?php if($user->acessotid == '0'){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputStatus"><strong><i class="fa fa-file-alt fa-muted"></i> Tid</strong></label>
                    <button disabled <?php if ($user->acessotid == 0) {echo 'class="btn btn-outline-danger form-control-plaintext" >NAO';}
                    else {echo 'class="btn btn-outline-success form-control-plaintext" >SIM';}?></button>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label <?php if($user->telefone == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputEmail"><strong><i class="fa fa-phone fa-muted"></i> Telefone</strong></label>
                    <button disabled <?php if ($user->telefone == '') {echo 'class="btn btn-outline-danger form-control-plaintext text-left">(11) 22406868';}
                    else {echo 'class="btn btn-outline-success form-control-plaintext text-left" >'.$user->telefone;;}?></button>
                </div>

                <div class="col-md-2 mb-3">
                    <label <?php if($user->celular == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputUsuario"><strong><i class="fa fa-phone-square fa-muted"></i> Celular</strong></label>
                    <button disabled <?php if ($user->celular == '') {echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}
                    else {echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->celular?></button>
                </div>

                <div class="col-md-2 mb-3">
                    <label <?php if($user->login == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputUsuario"><strong><i class="fa fa-sign-out-alt fa-muted"></i> Login</strong></label>
                    <button disabled <?php if($user->login == ''){echo 'class="btn btn-outline-danger form-control-plaintext text-left"';}else{echo 'class="btn btn-outline-success form-control-plaintext text-left"';}?>><?=$user->login?></button>
                </div>

                <div class="col-md-2 mb-3">
                    <label <?php if($user->status == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted"></i> Status</strong></label>
                    <button disabled <?php if ($user->status == 0) {echo 'class="btn btn-outline-danger form-control-plaintext" >INATIVO';}
                    else {echo 'class="btn btn-outline-success form-control-plaintext" >ATIVO';}?></button>
                </div>

                <div class="col-md-3 mb-3">
                    <label <?php if($user->nivel_acesso_id == ''){echo 'class="btn-outline-danger disabled"';}else{echo 'class="btn-outline-success disabled"';}?> for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted"></i> Nível de Acesso</strong></label>
                    <button disabled
                    <?php if ($user->nivel_acesso_id == 0) {echo 'class="btn btn-outline-success form-control-plaintext text-left">INATIVO';}
                    elseif ($user->nivel_acesso_id == 1) {echo 'class="btn btn-outline-success form-control-plaintext text-left">ADMINISTRADOR';}
                    elseif ($user->nivel_acesso_id == 2) {echo 'class="btn btn-outline-success form-control-plaintext text-left">AVANÇADO';}
                    elseif ($user->nivel_acesso_id == 3) {echo 'class="btn btn-outline-success form-control-plaintext text-left">USUÁRIO';}
                    else {echo 'class="btn btn-outline-warning form-control-plaintext text-left">VISITANTE';}
                    ?></button>
                </div>

                <div class="col-md-1 mb-3">
                    <label <?php if ($user->sexo == 0) {echo 'class="btn-outline-pink disabled"';}
                    elseif ($user->sexo == 1) {echo 'class="btn-outline-primary disabled"';}
                    else {echo 'class="btn-outline-dark disabled"';}?> for="inputSexo"><strong><i class="fa fa-transgender fa-muted"></i> Sexo</strong></label>
                    <button disabled <?php if ($user->sexo == 0) {echo 'class="btn btn-outline-pink form-control-plaintext">F';}
                    elseif ($user->sexo == 1) {echo 'class="btn btn-outline-primary form-control-plaintext">M';}
                    else {echo 'class="btn btn-outline-dark form-control-plaintext" >I';}?></button>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <form class="needs-validation" novalidate action="index.php?pag=proc-action-user" method="post" id='user' enctype='multipart/form-data'>

            <div class="form-row">
                <div class="col-md-6 mb-1">
                    <label for="inputNome"> <strong> Extensões aceitas : .bmp ,.png, .svg, .jpeg e .jpg </strong></label>
                    <img  height="90" width="90" src="<?php if (file_exists('imagens/'.$user->login.'/fotologin/'.$user->foto))
                    {echo 'imagens/'.$user->login.'/fotologin/'.$user->foto;}
                    else{ echo 'imagens/foto_exists.png';}?>" class="img-thumbnail rounded float-left" height="190" width="150" id="foto-cliente">
                </div>
                <input type="file" class="form-control-file mb-1" name="foto" id="foto" value="foto">
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-1">
                    <label for="inputNome"><strong><i class="fa fa-user fa-muted"></i> Nome</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: RODOLFO" class="form-control"
                           name="nome" value="<?=$user->nome?>" placeholder="NOME" id="nome"
                           onchange="upperCaseF(this)" autofocus>

                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputSobreNome"><strong><i class="fa fa-user fa-muted"></i> SobreNome</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control"
                           name="sobrenome" value="<?=$user->sobrenome?>" placeholder="SOBRENOME" id="sobrenome"
                           onchange="upperCaseF(this)">

                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputNomeSocial"><strong><i class="fa fa-user fa-muted"></i> Nome Social</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: RODS" class="form-control"
                           name="nomesocial" value="<?=$user->nomesocial?>" placeholder="NOME SOCIAL" id="nomesocial"
                           onchange="upperCaseF(this)">

                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2 mb-1">
                    <label for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted"></i> Nascimento</strong></label>
                    <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control"
                           name="datanascimento" value="<?=$data_formatada?>" placeholder="07/02/1981" id="datanascimento">

                </div>

                <div class="col-md-2 mb-1">
                    <label for="inputCpf"><strong><i class="fa fa-file-alt fa-muted"></i> CPF</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control"
                           name="cpf" value="<?=$user->cpf?>" placeholder="222.689.135-87" id="cpf">
                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted"></i> E-mail</strong></label>
                    <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                           class="form-control" name="email" value="<?=$user->email?>" placeholder="exemplo@exemplo.com.br">
                </div>

                <div class="col-md-3 mb-1">
                    <label for="inputSetor"><strong><i class="fa fa-globe fa-muted fa-fw"></i> Setor</strong></label>
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
                    <label for="inputTid"><strong><i class="fa fa-file-alt fa-muted"></i> Tid</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                            id="acessotid" name="acessotid">
                        <option value="0"<?php if ($user->acessotid == 0) {echo 'selected';}?>>NAO</option>
                        <option value="1"<?php if ($user->acessotid == 1) {echo 'selected';}?>>SIM</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label for="inputTelefone"><strong><i class="fa fa-phone fa-muted"></i> Telefone</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: (11)22406868"
                           class="form-control" name="telefone"
                           value="<?php if($user->telefone == ''){echo '(11)22406868';}
                           else{echo $user->telefone;}?>"
                           id="telefone" placeholder="(11)22406868">
                </div>

                <div class="col-md-2 mb-3">
                    <label for="inputCelular"><strong><i class="fa fa-phone-square fa-muted"></i> Celular</strong></label>
                    <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control"
                           id="celular" name="celular" value="<?=$user->celular?>" placeholder="(11)991065284">
                </div>

                <div class="col-md-2 mb-3">
                    <label for="inputLogin"><strong><i class="fa fa-sign-out-alt fa-muted"></i> Login</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: D788796" class="form-control"
                           id="login" name="login" value="<?=$user->login?>" placeholder="D123456 " onchange="upperCaseF(this)">
                </div>

                <div class="col-md-2 mb-3">
                    <label for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted"></i> Status</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: ATIVO"
                            name="status" id="status">
                        <option value="0"<?php if ($user->status == 0) {echo 'selected';}?>>INATIVO</option>
                        <option value="1"<?php if ($user->status == 1) {echo 'selected';}?>>ATIVO</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted"></i> Nível de Acesso</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                            name="nivel_acesso_id" id="nivel_acesso_id">
                        <option value="0"<?php if ($user->nivel_acesso_id == 0) {echo 'selected';}?>>INATIVO</option>
                        <option value="1"<?php if ($user->nivel_acesso_id == 1) {echo 'selected';}?>>ADMINISTRADOR</option>
                        <option value="2"<?php if ($user->nivel_acesso_id == 2) {echo 'selected';}?>>AVANÇADO</option>
                        <option value="3"<?php if ($user->nivel_acesso_id == 3) {echo 'selected';}?>>USUÁRIO</option>
                    </select>
                </div>

                <div class="col-md-1 mb-3">
                    <label for="inputSexo"><strong><i class="fa fa-transgender fa-muted"></i> Sexo</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: FEMININO"
                            name="sexouser" id="sexouser">
                        <option value="0"<?php if ($user->sexo == 0) {echo 'selected';}?>>F</option>
                        <option value="1"<?php if ($user->sexo == 1) {echo 'selected';}?>>M</option>
                        <option value="2"<?php if ($user->sexo == 2) {echo 'selected';}?>>I</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-5 mb-1">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="edit" value="edit_user_perfil">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <input type="hidden" name="foto_atual" value="<?=$user->foto?>">
                    <button
                            type="submit" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                            class="btn btn-outline-success btn-icon-panel" id='botao'><span class="icon text-white-50">
                    <i class="fas fa-check"></i></span><span class="text"><u>G</u>RAVAR</span></button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='././<?php echo $admin?>' data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                       class="btn btn-outline-info btn-icon-panel"><span class="icon text-white-50">
                    <i class="fas fa-list"></i></span><span class="text"> <u>L</u>ISTAR</span>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='././<?php echo $admin?>' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                       class="btn btn-outline-danger btn-icon-panel"><span class="icon text-white-50">
                    <i class="fas fa-remove"></i></span><span class="text"> <u>S</u>AIR</span>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

        <form class="needs-validation" novalidate action="index.php?pag=proc-action-user" method="post" id='edicao_senha' enctype='multipart/form-data'>

            <div class="form-row">
                <div class="col-md-4 mb-1">
                    <label for="inputSenha">Nova Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="***********" id="senha">
                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputNovaSenha">Nova Senha</label>
                    <input type="password" class="form-control" name="novasenha" placeholder="***********" id="novasenha">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-5 mb-1">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <button
                            type="submit" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS"
                            class="btn btn-outline-success btn-icon-panel" id='botao'><span class="icon text-white-50">
                    <i class="fas fa-check"></i></span><span class="text"><u>G</u>RAVAR</span></button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href='././<?php echo $admin?>' data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                       class="btn btn-outline-danger btn-icon-panel"><span class="icon text-white-50">
                    <i class="fas fa-remove"></i></span><span class="text"> <u>S</u>AIR</span>
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
