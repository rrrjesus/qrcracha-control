<?php

/**/

include_once 'locked/seguranca.php'; // Garantindo a session

$id = $_GET['id'] ?? ''; // Recebendo o id do usuario solicitado via GET
$reativacao = $_GET['reativacao'] ?? 'error'; // Recebendo o id do usuario solicitado via GET
$edit = $_GET['edit'] ?? 'error'; // Recebendo o id do usuario solicitado via GET

if (!empty($id) && is_numeric($id)): // Valida se existe um id e se ele é numérico

$conexao = conexao::getInstance(); // Instanciando uma conexão segura através da classe conexão

$sql = "SELECT usuarios.id, usuarios.foto, usuarios.nome, usuarios.sobrenome, usuarios.datanascimento, usuarios.cpf, 
       usuarios.email, usuarios.nivel_acesso_id, usuarios.celular, usuarios.grupo_id, usuarios.igreja_id, usuarios.status, usuarios.sexo, usuarios.lixeira,
            grupos.nome_grupo AS grupo, grupos.id as id_grupo, igrejas.nome_igreja AS igreja, igrejas.id as id_igreja
        FROM usuarios
LEFT JOIN grupos
ON usuarios.grupo_id = grupos.id
LEFT JOIN igrejas
ON usuarios.igreja_id = igrejas.id
WHERE usuarios.id = :id";
$stm = $conexao->prepare($sql);
$stm->bindValue(':id', $id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

$lixeira = $user->lixeira;

    if ($reativacao == 'true') : // If caso o id tenha sido enviado a lixeira
        echo '<div class="alert alert-success pt-1 pb-1 text-center text-uppercase" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-arrow-circle-o-up text-dark"></i></button>
                    <strong>CRACHÁ REATIVADO COM SUCESSO !!!</strong></div>';
    endif;

    if ($get_lixeira == 1) : // If caso o id tenha sido enviado a lixeira
        echo '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <strong>PARA EDITAR O CRACHA DO '.$user->nome.' É NECESSÁRIO REATIVÁ-LO ANTES !!!</strong></div>';
    endif;
    
    if ($edit == 'true') : // If caso a edição seja realizada com sucesso
        echo '<div class="alert alert-success pt-1 pb-1 text-center" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-pencil text-dark"></i></button>
            <strong>CRACHÁ DE '.$user->nome.' EDITADO COM SUCESSO !!!</strong></div>';
    endif;

    if(empty($hashsession)): // If caso o o hash da session não seja verdadeiro -> redirecionando a lista
        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <strong>ERRO AO EDITAR O USUÁRIO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
    endif;

    if ($stm->rowCount() < 1) : // If caso o usuário não seja encontrado !!!
        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
    endif;

    if(!empty($user)): // If caso encontre o id do usuário solicitado
        if($user->datanascimento !== ''):
        $array_data     = explode('-', $user->datanascimento); // Formata a data no formato nacional
        $data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];
        endif;
    endif;

else : // Caso não encontre o usuário !!!
    $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
    <strong>ERRO AO EDITAR: '.$id.' - NÃO ENCONTRADO !!!</strong></div>';
    header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
endif;

?>

<div class="d-grid mb-2"><button disabled type="button" class="btn btn-warning fw-bold btn-block pt-1 pb-1 border-dark"><i
            class="far fa-file-edit px-2"></i> EDITAR USUÁRIO </button></div>

<fieldset
    <?php if ($usuarioid < 1) :  echo 'disabled';
        elseif ($usuarionivelacesso < 1 && $usuariostatus == 0) : echo 'disabled';
            elseif ($usuarionivelacesso > 2 && $usuariostatus == 0) : echo 'disabled';
                else: echo '';
                    endif; ?>>

            <form class="needs-validation" novalidate action="<?=$pag_system.'?pag=acao_usuarios'?>" method="post" id='edit_user' enctype='multipart/form-data'>

            <div class="row mb-1">
                <div class="col-md-1 mb-1">
                    <a href="<?php if (file_exists($user->foto))
                    {echo $user->foto;}
                    else{echo 'sistema/imagens/padrao.jpg';}?>">
                        <img  height="90" width="90" src="<?php if (file_exists($user->foto))
                        {echo $user->foto;}
                        else{echo '"sistema/imagens/padrao.jpg"';}?>" class="img-thumbnail rounded-circle float-left" height="190" width="150" id="foto-cliente">
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
            </div>

            <div class="row">
                <div class="col-md-3 mb-1">
                    <label class="col-form-label col-form-label-sm" for="inputGrupo"><strong><i class="fa fa-globe fa-muted fa-fw ms-3 me-3"></i> Grupo</strong></label>
                    <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: INFORMÁTICA"
                            name="grupo" id="grupo">
                        <?php
                        $sql = "SELECT DISTINCT id, nome_grupo FROM grupos";
                        $stm = $conexao->prepare($sql);
                        $stm->execute();
                        $grupo = $stm->fetchAll(PDO::FETCH_OBJ);

                        //Encerra a conexão
                        $stm = null;
                            foreach ($grupo as $id_grupo):
                        ?>
                        <option value="<?=$id_grupo->id?>"><?=$id_grupo->nome_grupo?></option>
                        <?php
                            endforeach;
                        ?>
                        <option value="<?=$user->grupo_id?>" selected><?=$user->grupo?></option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="col-form-label col-form-label-sm" for="inputIgreja"><strong><i class="fa fa-globe fa-muted fa-fw ms-3 me-3"></i> Igreja</strong></label>
                    <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: JAÇANÃ"
                            name="igreja" id="igreja">
                        <?php
                        $sql = "SELECT DISTINCT id, nome_igreja FROM igrejas";
                        $stm = $conexao->prepare($sql);
                        $stm->execute();
                        $igreja = $stm->fetchAll(PDO::FETCH_OBJ);

                        //Encerra a conexão
                        $stm = null;
                            foreach ($igreja as $id_igreja):
                        ?>
                        <option value="<?=$id_igreja->id?>"><?=$id_igreja->nome_igreja?></option>
                        <?php
                            endforeach;
                        ?>
                        <option value="<?=$user->igreja_id?>" selected><?=$user->igreja?></option>
                    </select>
                </div>


                <div class="col-md-3 mb-1">
                    <label class="col-form-label col-form-label-sm" for="inputStatus"><strong><i class="fa fa-hand-o-right fa-muted ms-3 me-3"></i> Status</strong></label>
                    <select class="form-control form-control-sm" data-toggle="tooltip" title="Ex: ATIVO/INATIVO"
                        name="status" id="status">
                        <option value="0"<?php if ($user->status == 0) {echo 'selected';}?>>INATIVO</option>
                        <option value="1"<?php if ($user->status == 1) {echo 'selected';}?>>ATIVO</option>
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="col-form-label col-form-label-sm" for="inputNivelAcesso"><strong><i class="fa fa-hand-o-right fa-muted ms-3 me-3"></i> Nível Acesso</strong></label>
                    <select class="form-control form-control-sm" data-toggle="tooltip" data-placement="top" title="Ex: USUÁRIO"
                            name="nivel_acesso_id" id="nivel_acesso_id">
                        <option value="1"<?php if ($user->nivel_acesso_id == 1) {echo 'selected';}?>>ADMINISTRADOR</option>
                        <option value="2"<?php if ($user->nivel_acesso_id == 2) {echo 'selected';}?>>AVANÇADO</option>
                        <option value="3"<?php if ($user->nivel_acesso_id == 3) {echo 'selected';}?>>USUÁRIO</option>
                    </select>
                </div>
            </div>

            <div class="row text-center mt-3">
                <div class="col-md-12">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="edit" value="edit_user">
                    <input type="hidden" name="lixeira" value="<?=$user->lixeira?>">
                    <input type="hidden" name="id" value="<?=$user->id?>">
                    <input type="hidden" name="foto_atual" value="<?=$user->foto?>">
                    <?=$button->BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso);?>
                    <?=$button->BtnListar($pag_system,$get_pag, $get_year);?>
                    <?=$button->BtnImprimirCracha($usuarioid, $usuariostatus, $usuarioniveldeacesso, $id);?>
                    <?=$button->BtnModalLixo($usuarioid, $usuariostatus, $usuarioniveldeacesso, $lixeira)?>
                    <?=$button->BtnSair($pag_system);?>
                    <!-- Modal Delete-->
                    <?=$modal->ModalLixeiraEdit($usuarioniveldeacesso,$user,$get_year, $lixeira)?>
                </div>
            </div>
        </form>
</fieldset>
