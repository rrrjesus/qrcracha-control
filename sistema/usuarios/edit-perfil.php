
<?php
// Recebe o id do cliente do cliente via session
/** @var TYPE_NAME $id_user */
$id_user = ($usuarioid ?? '');

if(empty($hashsession)):
    header("Location: $pag_system");
endif;

if(empty($usuarioid)):
    header("Location: $pag_system");
endif;

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();

$sql = 'SELECT id,foto, nome, sobrenome, datanascimento, cpf, email, celular, setor, senha, status, sexo, nivel_acesso_id, usuariocad FROM usuarios WHERE id = :id';
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id_user);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

// Formata a data no formato nacional
$array_data     = explode('-', $user->datanascimento);
$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
?>
<?=$button->AlertSession()?>
<div class="container-fluid row p-2 ms-0">
    <div class="col-sm-4">
        <div class="card shadow-lg mb-3">
            <div class="card-body text-center mb-1">
                <a href="<?php if (file_exists($usuariofoto))
                {echo $usuariofoto;}
                else{ echo 'sistema/imagens/foto_exists.png';}?>">
                <img class="img-thumbnail rounded-circle mb-3" height="100" width="100" src="<?php if (file_exists($user->foto))
                {echo $user->foto;}
                else{ echo 'sistema/imagens/padrao.jpg';}?>" alt="Card image cap">
                </a>
                <h5 class="card-title fs-5 mb-1"><?=$user->nome.' '.$user->sobrenome?></h5>
                <p <?php if($user->datanascimento == NULL) : echo '<p><a href="'.$pag_system.'?pag=edicao_perfil_usuario" class="card-text text-danger mb-1"><strong><i class="fa fa-calendar-day fa-muted me-2"></i> DATA DE NASCIMENTO : COMPLETE SUAS INFORMAÇÕES</strong></a></p>';
                elseif($user->datanascimento == 0000-00-00) : echo '<p><a href="'.$pag_system.'?pag=edicao_perfil_usuario" class="card-text text-danger mb-1"><strong><i class="fa fa-calendar-day fa-muted me-2"></i> DATA DE NASCIMENTO : COMPLETE SUAS INFORMAÇÕES</strong></a></p>';
                else: echo 'class="card-text mb-1"><strong><i class="fa fa-calendar-day fa-muted me-2"></i>DATA DE NASCIMENTO : '.$data_formatada.'</strong></p>'; endif;?>
                <p <?php if($user->email == NULL) : echo '<p><a href="'.$pag_system.'?pag=edicao_perfil_usuario" class="card-text text-danger mb-1"><strong><i class="fa fa-envelope-o fa-muted me-2"></i> EMAIL : COMPLETE SUAS INFORMAÇÕES</strong></a></p>';
                else: echo 'class="card-text mb-1"><strong><i class="fa fa-envelope-o fa-muted me-2"></i>EMAIL : '.$user->email.'</strong></p>'; endif;?>
                <p <?php if($user->cpf == NULL) : echo '<p><a href="'.$pag_system.'?pag=edicao_perfil_usuario" class="card-text text-danger mb-1"><strong><i class="fa fa-files-o fa-muted me-2"></i> CPF : COMPLETE SUAS INFORMAÇÕES</strong></a></p>';
                else: echo 'class="card-text mb-1"><strong><i class="fa fa-files-o fa-muted me-2"></i>CPF : '.$user->cpf.'</strong></p>'; endif;?>
                <p <?php if($user->celular == NULL) : echo '<p><a href="'.$pag_system.'?pag=edicao_perfil_usuario" class="card-text text-danger mb-1"><strong><i class="fa fa-mobile-phone fa-muted me-2"></i> CELULAR : COMPLETE SUAS INFORMAÇÕES</strong></a></p>';
                else: echo 'class="card-text mb-1"><strong><i class="fa fa-mobile-phone fa-muted me-2"></i>CELULAR : '.$user->celular.'</strong></p>'; endif;?>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card shadow-lg mb-3">
            <div class="card-body text-center mb-3">
                <h5 class="card-title mb-3"> SENHA</h5>
                <img class="img-fluid mb-3" height="100" width="100" src="sistema/imagens/chave-icon.png" alt="Card image cap">
                <p class="card-text h6 mb-3">Torne sua senha mais forte ou altere-a se alguém mais a souber.</p>
                <a href="<?=$pag_system.'?pag=alteracao_senha'?>" class="card-link mb-3"><strong>ALTERAR SENHA </strong></a>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card shadow-lg mb-3">
            <div class="card-body text-center mb-3">
                <h5 class="card-title mb-3">INFORMAÇÕES</h5>
                <img class="img-fluid mb-3" height="100" width="100" src="sistema/imagens/icon-edit-user.jpg" alt="Card image cap">
                <p class="card-text h6 mb-3">Mantenha suas informações atualizados no <?=$systemfetch->title?>.</p>
                <a href="<?=$pag_system.'?pag=edicao_perfil_usuario'?>" class="card-link mb-3"><strong>ATUALIZAR INFORMAÇÕES </strong></a>
            </div>
        </div>
    </div>
</div>
