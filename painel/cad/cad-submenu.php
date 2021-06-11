<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade
* Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com
* Sisdam Web - 2.0 - 2017 - Todos os direitos reservados
*/

include_once '../../locked/seguranca-admin.php';
include_once '../../conexao.php';
include_once 'proc-cad-admin/proc-cad-submenu.php';
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
                            Cadastro de SubMenus
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="<?php echo $admin?>">Painel de Controle</a>
                            </li>
                            <li class="active">Cadastro de SubMenus</li>
                        </ol>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        if (isset($_SESSION['msgcad'])) {
                            echo $_SESSION['msgcad'];
                            unset($_SESSION['msgcad']);
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
                    <form class="form-horizontal" id="cadastro_submenu" method="POST" action="">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputIdMenu">Id Menu</label>
                                <input type="text" id="id_menu" data-toggle="tooltip" title="Ex: 1" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="id_menu" placeholder="1" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputNomeSubMenu">Nome SubMenu</label>
                                <input type="text" data-toggle="tooltip" title="Digite um submenu"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" class="form-control" name="nome" placeholder="Sv2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputCaminho">Página</label>
                                <input type="text" data-toggle="tooltip" title="Digite um caminho válido"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" class="form-control" value="menu-principal.php" name="pag"
                                       placeholder=menu-principal.php">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>" type="submit" name="btnCadSubMenu" value="Cadastrar" accesskey="G"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                        class="btn btn-labeled btn-success"><span class="btn-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span> <u>G</u>RAVAR
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href='././<?php echo $admin?>?pag=list-submenu'
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
                        <br><br><br><br><br><br><br><br><br><br>

                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

