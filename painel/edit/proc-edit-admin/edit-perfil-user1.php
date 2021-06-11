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

print_r($user->nome)
?>


<div class="bd-example bd-example-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Visão gerals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Senha</a>
        </li>
    </ul>

    <p>
    <?php
    if (isset($_SESSION['msgperfilerro'])) {echo $_SESSION['msgperfilerro'];unset($_SESSION['msgperfilerro']);}
    if (isset($_SESSION['msgperfil'])) {echo $_SESSION['msgperfil'];unset($_SESSION['msgperfil']);}
    if (isset($_SESSION['msgsenhaerro'])) {echo $_SESSION['msgsenhaerro'];unset($_SESSION['msgsenhaerro']);}
    if (isset($_SESSION['msgsenha'])) {echo $_SESSION['msgsenha'];unset($_SESSION['msgsenha']);}
    ?>
    </p>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            </p>
            <h2>
                <i class="fa fa-user fa-muted"></i> <?=$user->nome?>
            </h2><br>
            <h3>Detalhes do Usuário</h3><br>
            <p><i class="fa fa-user fa-muted"></i><strong>
                    Login: </strong><?=$user->login?></p>
            <p><i class="fa fa-envelope-o fa-muted"></i><strong>
                    Email: </strong><?=$user->email?></p>
            <p><i class="fa fa-hand-o-right fa-muted"></i><strong>
                    Status: </strong><?=$user->status?></p>
            <p><i class="fa fa-calendar fa-muted"></i><strong> Criado em
                    : </strong><?=$user->criado?></p>
            <p><i class="fa fa-globe fa-muted fa-fw"></i> <a
                        href="http://<?php echo $servidor;?>/sisdamjt/">Sisdam Web</a>
            </p>
            <p><i class="fa fa-phone fa-muted fa-fw"></i><strong>
                    Tel: </strong><?=$user->telefone?></p>
            </p>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form class="form-horizontal" id="edicao_perfil" method="POST" action="">
                <div class="form-group"><br>
                    <div class="col-sm-5">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control"
                               value="<?=$user->nome?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <label><i class="fa fa-phone fa-fw"></i>Telefone de
                            Contato</label>
                        <input type="text" name="telefone" class="form-control"
                               value="<?=$user->telefone?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <label><i class="fa fa-envelope-o fa-fw"></i> Endereço de e-mail</label>
                        <input type="email" class="form-control" name="email"
                               value="<?=$user->email?>">
                    </div>
                </div>
                <input type="hidden" name="id"
                       value="<?=$user->id?>">
                <button type="submit" name="btnEditPerfil" value="EditarPerfil"
                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                class="glyphicon glyphicon-floppy-disk"></i></span>Atualizar
                    perfil
                </button>
                <a href='<?php echo $admin?>?link=2'>
                    <button type='button' data-toggle="tooltip" title="Cancelar"
                            class="btn btn-labeled btn-danger"><span
                                class="btn-label"><i
                                    class="glyphicon glyphicon-remove"></i></span>Cancelar
                    </button>
                </a>
                <br><br><br><br><br><br><br><br><br><br>
            </form>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
             <form class="form-horizontal" id="edicao_senha" method="POST" action="">
                <div class="form-group"><br>
                    <div class="col-sm-5">
                        <label>Senha Antiga</label>
                        <input type="password" name="senhaatual" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <label>Nova Senha</label>
                        <input type="password" name="senhanova1" id="senhanova1"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <label>Repetir Nova Senha</label>
                        <input type="password" name="senhanova2" id="senhanova2"
                               class="form-control">
                    </div>
                </div>
                <input type="hidden" name="id"
                       value="<?=$user->id?>">
                <button type="submit" name="btnEditSenha" value="EditarSenha"
                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                class="glyphicon glyphicon-floppy-disk"></i></span>Atualizar
                    senha
                </button>
                <a href='<?php echo $admin?>?link=2'>
                    <button type='button' data-toggle="tooltip" title="Cancelar"
                            class="btn btn-labeled btn-danger"><span
                                class="btn-label"><i
                                    class="glyphicon glyphicon-remove"></i></span>Cancelar
                    </button>
                </a>
                <br><br><br><br><br><br><br><br><br><br>
            </form>


        </div>
    </div>
</div>