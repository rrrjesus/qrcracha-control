<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca-admin.php");
include_once 'proc-edit-admin/proc-edit-pag-system.php';

//Captura de ID
$id = $_GET['id'];

//Executa consulta
$consulta_pag = "SELECT * FROM pag_system WHERE id='$id'";
$resultado_pag = $conectar->query($consulta_pag);
$editar_pag = mysqli_fetch_assoc($resultado_pag);
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-5">
                    <div class="page-title">
                        <h2>
                            Edição de Link Formulário
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="<?php echo $admin?>">Painel de Controle</a>
                            </li>
                            <li class="active">Edição de Link Formulário</li>
                        </ol>
                        <?php
                        if (isset($_SESSION['msgerro'])) {
                            echo $_SESSION['msgerro'];
                            unset($_SESSION['msgerro']);
                        }
                        if (isset($_SESSION['msgedit'])) {
                            echo $_SESSION['msgedit'];
                            unset($_SESSION['msgedit']);
                        }
                        ?>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" id="edicao_pag_admin" method="POST" action="">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputIdForm">Nome do Formulário</label>
                                <input type="text" value="<?php echo $editar_pag['name_pag']; ?>" data-toggle="tooltip"
                                       title="Digite um formulário válido" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="name_pag" placeholder="cad-nome.php" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputCaminho">Caminho</label>
                                <input type="text" value="<?php echo $editar_pag['caminho']; ?>"
                                       title="Digite um caminho válido"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" class="form-control" name="caminho"
                                       placeholder="form-admin/cad/cad-nome.php">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="hidden" name="id" value="<?php echo $editar_pag['id']; ?>">
                                <button type="submit" name="btnEditPagSystem" value="Editar" accesskey="G"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././<?php echo $admin?>?pag=list-pag-system'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="LISTAR REGISTROS" accesskey="L"
                                        class="btn btn-labeled btn-info"><span class="btn-label"><i
                                                class="glyphicon glyphicon-list"></i></span> <u>L</u>ISTAR
                                </button>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././<?php echo $admin?>'
                                <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S"
                                        class="btn btn-labeled btn-danger"><span class="btn-label"><i
                                                class="glyphicon glyphicon-remove"></i></span> <u>S</u>AIR
                                </button>
                                </a>
                            </div>
                        </div>
                        <br><br><br><br><br>

                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

