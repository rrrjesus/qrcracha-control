<?php

// Recebe o id do usuario solicitado via GET
$id = $_GET['id'] ?? '';
$get_session = $_GET['session'] ?? '';



// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):

$conexao = conexao::getInstance();

$sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo, setor, usuariocad, criado, usuarioalt, alterado, loginenvioemailsenha, chavesetsenha, datapedidochavesetsenha, datafeitonovasenha, dataenvioemailsenha, emailenviadosenha, resetsenha, dataresetsenha, date_alter_senha FROM usuarios WHERE id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

    // Caso o id tenha sido enviado a lixeira
    if ($get_lixeira == 1) :
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>PARA EDITAR O '.$id.' - É NECESSÁRIO REATIVÁ-LO ANTES !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&lixeira=1");
    endif;

    // Caso o id tenha sido enviado a lixeira
    if ($get_session <> $hashprimary) :
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR O USUÁRIO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

    if ($stm->rowCount() < 1):
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
    endif;

    if(!empty($user)):

        // Formata a data no formato nacional
        $array_data     = explode('-', $user->datanascimento);
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

    endif;
else :
    $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
    <strong>ERRO AO EDITAR: '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
    header("Location: $pag_system?pag=lista_usuarios&year=$get_year&session=$hashprimary");
endif;
?>

<div class="d-grid mb-3"><button disabled type="button" class="btn btn-outline-warning fw-bold btn-lg btn-block pt-1 pb-1"><i
            class="far fa-file-edit px-2"></i> EDITAR USUÁRIO - <?=$get_year?></button></div>

<?=$button->AlertSession()?>

    <fieldset <?php if ($usuarioid == 1) :  echo 'disabled'; endif; ?>>

        <form class="needs-validation" novalidate action="menu-principal.php?pag=acao_usuarios&session=<?=$hashprimary?>" method="post" id='edit_user' enctype='multipart/form-data'>

            <div class="row mb-1">
                <div class="col-md-1 mb-1">
                    <a href="<?php if (file_exists('sistema/imagens/'.$user->id.'/fotologin/'.$user->foto))
                    {echo 'sistema/imagens/'.$user->id.'/fotologin/'.$user->foto;}
                    else{ echo '"sistema/imagens/padrao.jpg"';}?>">
                        <img  height="90" width="90" src="<?php if (file_exists('sistema/imagens/'.$user->id.'/fotologin/'.$user->foto))
                        {echo 'sistema/imagens/'.$user->id.'/fotologin/'.$user->foto;}
                        else{ echo '"sistema/imagens/padrao.jpg"';}?>" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
                    </a>
                </div>
                <div class="col-md-4 mb-1">
                    <label for="formFileSm" class="form-label"> <strong> Extensões aceitas : .bmp ,.png, .svg, .jpeg e .jpg </strong></label>
                    <input class="form-control form-control-sm" name="foto" id="foto" value="foto" type="file">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-1">
                    <label for="inputNome"><strong><i class="fa fa-user fa-muted m-3 m-3"></i> Nome</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: RODOLFO" class="form-control"
                           name="nome" value="<?=$user->nome?>" placeholder="NOME" id="nome"
                           onchange="upperCaseF(this)" autofocus>

                </div>

                <div class="col-md-5 mb-1">
                    <label for="inputSobreNome"><strong><i class="fa fa-user fa-muted m-3"></i> SobreNome</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control"
                           name="sobrenome" value="<?=$user->sobrenome?>" placeholder="SOBRENOME" id="sobrenome"
                           onchange="upperCaseF(this)">

                </div>

                <div class="col-md-3 mb-1">
                    <label for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted m-3"></i> Nascimento</strong></label>
                    <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control"
                           name="datanascimento" value="<?=$data_formatada?>" placeholder="07/02/1981" id="datanascimento">

                </div>
            </div>

            <div class="row mb-3">

                <div class="col-md-3 mb-1">
                    <label for="inputCpf"><strong><i class="fa fa-file-alt fa-muted m-3"></i> CPF</strong></label>
                    <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control"
                           name="cpf" value="<?=$user->cpf?>" placeholder="222.689.135-87" id="cpf">
                </div>

                <div class="col-md-2 mb-1">
                    <label for="inputSexo"><strong><i class="fa fa-transgender fa-muted m-3"></i> Sexo</strong></label>
                    <select <?php if ($user->sexo == 0) : echo 'class="form-control bg-danger text-white"';
                    elseif ($user->sexo == 1) : echo 'class="form-control bg-primary text-white"';
                    else : echo 'class="form-control bg-warning text-white"'; endif;?> data-toggle="tooltip" title="Ex: FEMININO"
                                                                                       name="sexouser" id="sexouser">
                        <option class="bg-danger" value="0"<?php if ($user->sexo == 0) {echo 'selected';}?>>F</option>
                        <option class="bg-primary" value="1"<?php if ($user->sexo == 1) {echo 'selected';}?>>M</option>
                        <option class="bg-warning" value="2"<?php if ($user->sexo == 2) {echo 'selected';}?>>I</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label for="inputCelular"><strong><i class="fa fa-phone-square fa-muted m-3"></i> Celular</strong></label>
                    <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control"
                           id="celular" name="celular" value="<?=$user->celular?>" placeholder="(11)991065284">
                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted m-3"></i> E-mail</strong></label>
                    <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                           class="form-control" name="email" value="<?=$user->email?>" placeholder="exemplo@exemplo.com.br">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-1">
                    <label for="inputSetor"><strong><i class="fa fa-globe fa-muted fa-fw m-3"></i> Setor</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: AMBIENTAL"
                            name="setor" id="setor">
                        <option value="0"<?php if ($user->setor == 0) {echo 'selected';}?>>ADMINISTRATIVO</option>
                        <option value="1"<?php if ($user->setor == 1) {echo 'selected';}?>>MANUTENÇÃO</option>
                        <option value="2"<?php if ($user->setor == 2) {echo 'selected';}?>>INFORMÁTICA</option>
                        <option value="3"<?php if ($user->setor == 3) {echo 'selected';}?>>PORTARIA</option>
                        <option value="4"<?php if ($user->setor == 4) {echo 'selected';}?>>VISITANTE</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted m-3"></i> Status</strong></label>
                    <select <?php if ($user->status == 0) : echo 'class="form-control bg-danger text-white"';
                    else : echo 'class="form-control bg-success text-white"'; endif;?>
                        data-toggle="tooltip" title="Ex: ATIVO/INATIVO" name="status" id="status">
                        <option class="bg-danger" value="0"<?php if ($user->status == 0) {echo 'selected';}?>>INATIVO</option>
                        <option class="bg-success" value="1"<?php if ($user->status == 1) {echo 'selected';}?>>ATIVO</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted m-3"></i> Nível Acesso</strong></label>
                    <select class="form-control" data-toggle="tooltip" title="Ex: USUÁRIO"
                            name="nivel_acesso_id" id="nivel_acesso_id">
                        <option value="0"<?php if ($user->nivel_acesso_id == 0) {echo 'selected';}?>>INATIVO</option>
                        <option value="1"<?php if ($user->nivel_acesso_id == 1) {echo 'selected';}?>>ADMINISTRADOR</option>
                        <option value="2"<?php if ($user->nivel_acesso_id == 2) {echo 'selected';}?>>AVANÇADO</option>
                        <option value="3"<?php if ($user->nivel_acesso_id == 3) {echo 'selected';}?>>USUÁRIO</option>
                    </select>
                </div>
            </div>
    </fieldset>

            <div class="row text-center mt-3">
                <div class="col-md-12">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="edit" value="edit_user">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <input type="hidden" name="foto_atual" value="<?=$user->foto?>">
                    <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
                    <?=$button->BtnListar($pag_system,$get_pag, $get_year, $get_sv2, $hashprimary);?>
                    <?=$button->BtnSair($pag_system);?>
                </div>
            </div>
        </form>
