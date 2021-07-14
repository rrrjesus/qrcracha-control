<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */

error_reporting(-1);

// Recebe o id do cliente do cliente via GET
$id_user = (isset($usuarioid) ? $usuarioid : '');

$get_session = $_GET['session'] ?? '';

if($get_session !== $hashprimary):
    header("Location: $pag_system");
endif;

if (!empty($id_user) && is_numeric($id_user)): // Valida se existe um id e se ele é numérico

    $conexao = conexao::getInstance(); // Instanciando uma conexão segura através da classe conexão

    $sql = "SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, nivel_acesso_id, celular, status, sexo,
            setor FROM usuarios WHERE id = :id";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_user);
    $stm->execute();
    $user = $stm->fetch(PDO::FETCH_OBJ);

    if ($get_lixeira == 1) : // If caso o id tenha sido enviado a lixeira
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>USUÁRIO DESATIVADO !!! PARA EDITAR O '.$id_user.' - É NECESSÁRIO REATIVÁ-LO ANTES !!!</strong></div>';
        header("Location: $pag_system?pag=edicao_perfil&id=$usuarioid&session=$hashprimary");
    endif;

    if ($get_session <> $hashprimary) : // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR O USUÁRIO !!!</strong></div>';
        header("Location: $pag_system?pag=edicao_perfil&id=$usuarioid&session=$hashprimary");
    endif;

    if ($stm->rowCount() < 1) : // If caso o usuário não seja encontrado !!!
        $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system?pag=edicao_perfil&id=$usuarioid&session=$hashprimary");
    endif;

    if(!empty($user)): // If caso encontre o id do usuário solicitado
        $array_data     = explode('-', $user->datanascimento); // Formata a data no formato nacional
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
    endif;

else : // Caso não encontre o usuário !!!
    $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
    <strong>ERRO AO EDITAR: '.$id_user.' - NÃO ENCONTRADO !!!</strong></div>';
    header("Location: $pag_system?pag=edicao_perfil&id=$usuarioid&session=$hashprimary");
endif;
?>
<fieldset
    <?php if ($usuarioid < 1) :  echo 'disabled';
            elseif ($usuariostatus == 0) : echo 'disabled';
                else: echo '';
                    endif; ?>>

    <form class="needs-validation" novalidate action="<?=$pag_system.'?pag=acao_usuarios&session='.$hashprimary?>" method="post" id='edit_user' enctype='multipart/form-data'>
        <div class="row mb-1">
            <div class="col-md-1 mb-1">
                <a href="<?php if (file_exists($user->foto))
                {echo $user->foto;}
                else{ echo '"sistema/imagens/padrao.jpg"';}?>">
                    <img  height="90" width="90" src="<?php if (file_exists($user->foto))
                    {echo $user->foto;}
                    else{ echo '"sistema/imagens/padrao.jpg"';}?>" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
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
                       name="nome" value="<?=$user->nome?>" placeholder="NOME" id="nome"
                       onchange="upperCaseF(this)" autofocus>

            </div>

            <div class="col-md-5 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputSobreNome"><strong><i class="fa fa-user fa-muted me-3 ms-3"></i> SobreNome</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: DA SILVA" class="form-control form-control-sm"
                       name="sobrenome" value="<?=$user->sobrenome?>" placeholder="SOBRENOME" id="sobrenome"
                       onchange="upperCaseF(this)">

            </div>

            <div class="col-md-3 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputDataNascimento"><strong><i class="fa fa-calendar-day fa-muted ms-3 me-3"></i> Nascimento</strong></label>
                <input type="text" data-toggle="tooltip" data-placement="right" title="Ex: 07/02/1981" class="form-control form-control-sm"
                       name="datanascimento" value="<?=$data_formatada?>" placeholder="07/02/1981" id="datanascimento">

            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputCpf"><strong><i class="fa fa-file-alt fa-muted ms-3 me-3"></i> CPF</strong></label>
                <input type="text" data-toggle="tooltip" title="Ex: 220.688.952-47" class="form-control form-control-sm"
                       name="cpf" value="<?=$user->cpf?>" placeholder="222.689.135-87" id="cpf">
            </div>

            <div class="col-md-2 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputSexo"><strong><i class="fa fa-transgender fa-muted ms-3 me-3"></i> Sexo</strong></label>
                <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: FEMININO"
                        name="sexouser" id="sexouser">
                    <option class="bg-danger" value="0"<?php if ($user->sexo == 0) {echo 'selected';}?>>F</option>
                    <option class="bg-primary" value="1"<?php if ($user->sexo == 1) {echo 'selected';}?>>M</option>
                    <option class="bg-warning" value="2"<?php if ($user->sexo == 2) {echo 'selected';}?>>I</option>
                </select>
            </div>

            <div class="col-md-3 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputCelular"><strong><i class="fa fa-phone-square fa-muted ms-3 me-3"></i> Celular</strong></label>
                <input type="text" title="Ex: (11)991065284" data-toggle="tooltip" class="form-control form-control-sm"
                       id="celular" name="celular" value="<?=$user->celular?>" placeholder="(11)991065284">
            </div>

            <div class="col-md-4 mb-1">
                <label class="col-form-label col-form-label-sm" for="inputEmail"><strong><i class="fa fa-envelope-o fa-muted ms-3 me-3"></i> E-mail</strong></label>
                <input type="text" data-toggle="tooltip" title="rods@gmail.com"
                       class="form-control form-control-sm"
                       name="email" value="<?=$user->email?>" placeholder="exemplo@exemplo.com.br">
            </div>

            <input type="hidden" name="setor" value="<?=$user->setor?>">
            <input type="hidden" name="status" value="<?=$user->status?>">
            <input type="hidden" name="nivel_acesso_id" value="<?=$user->nivel_acesso_id?>">
        </div>

<div class="row text-center mt-3">
    <div class="col-md-12">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="edit" value="edit_user">
        <input type="hidden" name="id" value="<?=$user->id?>">
        <input type="hidden" name="foto_atual" value="<?=$user->foto?>">
        <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
        <?=$button->BtnSair($pag_system);?>
    </div>
</div>
</form>
</fieldset>

