<?php
error_reporting(-1);
include_once 'classes/User.php';

// Recebe o id da pag do painel via GET
$pag = isset($_GET['pag']) ? $_GET['pag'] : '';
$lixeira = isset($_GET['lixeira']) ? $_GET['lixeira'] : 0; // Recebe o termo de pesquisar se existir
$pagyear = isset($_GET['year']) ? $_GET['year'] : '';
$pagano = date('Y');

$conexao = conexao::getInstance();

$sql = 'SELECT id, name_pag, name_form, caminho, unidade FROM pag_system WHERE name_pag = :name_pag';
$stm = $conexao->prepare($sql);
$stm->bindValue(':name_pag', $pag);
$stm->execute();
$retorno = $stm->execute();
$pags = $stm->fetch(PDO::FETCH_OBJ);

if (isset($_SESSION['usuarioId'])){$home = $pag_system;}else{$home = $index;}


if($pags):
    echo '<div class="row mt-4 pe-3 ps-3 pt-3"> <!-- Início da Página de Título -->
                <div class="col-md-12 ml-auto"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
                    <nav style="--bs-breadcrumb-divider: \'\';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="far fa-home-heart me-2 text-primary"></i> <a class="text-uppercase" href="'.$home.'"><strong>INÍCIO</strong></a> <i class="far fa-arrow-right ms-1 me-1"></i> </li>
                            <li class="breadcrumb-item text-uppercase active"><strong>'.$pags->name_form.'</strong></li>
                        </ol>
                    </nav>
                </div>
           </div>

        <div class="row mb-0">
            <div class="col-md-12 text-center">';

                /*$user->ModalUser();*/

                if ($usuarioid == 1) : echo '<div class="alert alert-danger pt-1 pb-1 text-center" id="usuariook" role="alert"><strong><i class="far fa-user-lock me-2"></i> APENAS VISUALIZAÇÃO DISPONÍVEL - FAÇA <i class="fa fa-hand-o-up"></i> LOGIN !!! </strong></div>';
                elseif ($usuariostatus == 0) : echo '<div class="alert alert-danger pt-1 pb-1 text-center" id="usuariook" role="alert"><strong> PARA ACESSAR É NECESSARIO ATIVAR SEU USUÁRIO !!! </strong></div>';
                elseif ($usuarioniveldeacesso > 3) : echo '<div class="alert alert-danger pt-1 pb-1 text-center" id="usuariook" role="alert"><strong> SEU NÍVEL DE USUÁRIO NÃO PERMITE CADASTRAR !!! </strong></div>';
                else : '';
                endif;
        echo '</div>
        </div>';
            if(file_exists($pags->caminho)):
            echo '<div class="card"> <!-- Início do Card -->
                    <div class="card-header text-center fw-bold fs-6 pt-1 pb-1">
                        <img class="img-fluid rounded-circle me-2" height="20" width="20" src="imagens/icons/favicon_jaca_control.ico">   SISTEMA JAÇANA CONTROLE - '.$today_year.'
                    </div>
                        <div class="card-body" ';
                            if($pag == 'cadastro_usuarios'): echo 'style="background-color: #caeadb;"';
                                elseif($pag == 'edicao_usuarios'): echo 'style="background-color: #f5e7bc;"';
                                    elseif ($lixeira == 1): echo 'style="background-color: #d8dfe6;"';
                                        elseif ($pag == 'lista_usuarios'): echo 'style="background-color: #e7f0f3;"';
                                            else: echo '';
                            endif;
                        echo '>';

                            if(!empty(is_numeric($pagyear)) && $pagyear > 2015 && $pagyear <= $pagano):
                                    include $pags->caminho;  //inclui o arquivo
                            elseif(empty($pagyear)):
                                include $pags->caminho;  //inclui o arquivo
                            else:
                                header("Location: 404.php");
                            endif;
                            else :
                                header("Location: 404.php");
                            endif;
        else:
            include 'bem-vindo.php';
        endif;

?>
</div>
