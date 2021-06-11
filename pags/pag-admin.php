<?php
error_reporting(-1);

// Recebe o id da pag do painel via GET
$pag = (isset($_GET['pag'])) ? $_GET['pag'] : '';

$conexao = conexao::getInstance();

$sql = 'SELECT id, name_pag, name_form, caminho, unidade FROM pag_admin WHERE name_pag = :name_pag';
$stm = $conexao->prepare($sql);
$stm->bindValue(':name_pag', $pag);
$stm->execute();
$retorno = $stm->execute();
$pags = $stm->fetch(PDO::FETCH_OBJ);

if (isset($_SESSION['usuarioId'])){$home = $pag_painel;}else{$home = $index;}


if($pags):
    echo '<div class="row"> <!-- Início da Página de Título -->
            <div class="col-md-12 ml-auto"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
                <nav style="--bs-breadcrumb-divider: \'>\';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="'.$home.'"><strong>INÍCIO</strong></a></li>
                        <li class="breadcrumb-item text-uppercase active"><strong>'.$pags->name_form.'</strong></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 text-center">';

            if (isset($_SESSION['msgsuccess'])) : echo $_SESSION['msgsuccess'];unset($_SESSION['msgsuccess']); endif; /*Mensagem Teste Rapido Reagente*/
            if (isset($_SESSION['msgdanger'])) : echo $_SESSION['msgdanger'];unset($_SESSION['msgdanger']); endif; /**/
            if (isset($_SESSION['msgwarning'])) : echo $_SESSION['msgwarning'];unset($_SESSION['msgwarning']); endif; /* Mensagem Teste Rapido Não Reagente*/
            if (isset($_SESSION['msgerro'])) : echo $_SESSION['msgerro'];unset($_SESSION['msgerro']); endif; /**/
            if (isset($_SESSION['msgedit'])) : echo $_SESSION['msgedit'];unset($_SESSION['msgedit']); endif;
            if (isset($_SESSION['msgerroredit'])) : echo $_SESSION['msgerroredit'];unset($_SESSION['msgerroredit']); endif;

        echo '</div>
        </div>';

        if(file_exists('../'.$pags->caminho)):
         echo  '<div class="card shadow-lg"> <!-- Início do Card -->
                <h5 class="card-header text-center"><img class="img-fluid rounded-circle" height="20" width="20" src="../imagens/icone-inicial-4.png">   SISTEMA JAÇANÃ CONTROLE - '.$pags->unidade.' - '.$today_year.'</h5>
                    <div class="card-body">';
                        include '../'.$pags->caminho;  //inclui o arquivo

                        else:
                            include "../painel/dashboard.php";
                        endif;
else :

                            include "../painel/dashboard.php";
endif;
?>
            </div>

    </div>

    <?php
    // FOOTER
    require(dirname(__FILE__) . '/../footer.php');
    ?>


