<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);

//Captura de ID
$id = $_GET['id'];
$menu_edit = $_GET['editar'];

include_once("../../locked/seguranca-admin.php");
include_once 'proc-edit-admin/proc-edit-menu-submenu.php';

//Executa consulta
$consulta_menu_submenu = "SELECT * FROM menu_sub_sub WHERE id='$id'";
$resultado_menu_submenu = $conectar->query($consulta_menu_submenu);
$editar_menu_submenu = mysqli_fetch_assoc($resultado_menu_submenu);

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
                            Edição de Menu SubMenu
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="<?php echo $admin?>">Painel de Controle</a>
                            </li>
                            <li class="active">Edição de Menu SubMenu</li>
                        </ol>
                        <?php
                        if (isset($_SESSION['msgerro'])) {
                            echo $_SESSION['msgerro'];
                            unset($_SESSION['msgerro']);
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
                    <form class="form-horizontal" id="edicao_menu_submenu" method="POST" action="">

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputIdMenu">Id SubMenu</label>
                                <input type="text" id="id_menu"
                                       value="<?php echo $editar_menu_submenu['id_menu']; ?>" data-toggle="tooltip"
                                       title="Digite um Id de Menu" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="id_menu" placeholder="1" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputNome">Nome do Menu</label>
                                <input type="text" value="<?php echo $editar_menu_submenu['nome']; ?>"
                                       data-toggle="tooltip" title="Digite um Nome de Menu" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="nome" placeholder="Sv2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <label for="inputPag">Nome da Página</label>
                                <input type="text" value="<?php echo $editar_menu_submenu['pag']; ?>"
                                       data-toggle="tooltip" title="Digite um Nome de Página" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="pag" placeholder="menu-principal.php?pag=teste">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="id" value="<?php echo $editar_menu_submenu['id']; ?>">
                                <button type="submit" name="btnEditMenuSubMenu" value="Editar" accesskey="G"
                                        style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                            echo 'display: none;';
                                        } ?>" data-toggle="tooltip" title="GRAVAR OS DADOS"
                                        class="btn btn-success btn-icon-panel"><span class="icon text-white-50"><i
                                                class="fa fa-floppy-o"></i></span><span class="text"><u> G</u>RAVAR</span>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;

                                <a data-toggle="tooltip" accesskey="L" title="LISTAR" class="btn btn-info btn-icon-panel" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>"
                                   href="././<?php echo $admin?>?pag=list-menu&menu=<?php echo $menu_edit;?>"><span class="icon text-white-50">
                                    <i class="fas fa-list"></i></span><span class="text"><u> L</u>ISTAR</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a data-toggle="tooltip" accesskey="S" title="SAIR" class="btn btn-danger btn-icon-panel" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                    echo 'display: none;';
                                } ?>"
                                   href="././<?php echo $admin?>"><span class="icon text-white-50">
                                    <i class="fas fa-remove"></i></span><span class="text"><u> S</u>AIR</span></a>
                            </div>
                        </div>
                    </form>
                </div> <!-- col-lg-12-->
            </div> <!-- row -->
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

