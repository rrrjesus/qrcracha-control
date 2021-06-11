<?php
/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca-admin.php");

//Captura de ID
$id = $_GET['id'];
$menu_edit = $_GET['editar'];

include_once 'proc-edit-admin/proc-edit-menu.php';



//Executa consulta
    $consulta_menu = "SELECT * FROM menu_$menu_edit WHERE id='$id'";
    $resultado_menu = $conectar->query($consulta_menu);
    $editar_menu = mysqli_fetch_assoc($resultado_menu);

?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="page-title">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> <a href="<?php echo $admin?>">Painel de Controle</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edição de <?php if($menu_edit == 'principal'){echo 'Menu Principal';}elseif ($menu_edit == 'sub') {echo 'Menu Sub Menu';}else{echo 'Menu Sub SubMenu';} ?></li>
                        </ol>
                        </nav>
                        <h4>Edição de <?php if($menu_edit == 'principal'){echo 'Menu Principal';}elseif ($menu_edit == 'sub') {echo 'Menu Sub Menu';}else{echo 'Menu Sub SubMenu';}?></h4>
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
                    <form class="form-horizontal" id="edicao_menu" method="POST" action="">

                        <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="inputNome">Nome do Menu</label>
                                <input type="text" value="<?php echo $editar_menu['nome']; ?>"
                                       data-toggle="tooltip" title="Digite um Nome de Menu" class="form-control"
                                       style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                           echo 'display: none;';
                                       } ?>" name="nome" placeholder="Sv2" autofocus>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="id" value="<?php echo $editar_menu['id']; ?>">
                                <button type="submit" name="btnEditMenu" value="Editar" accesskey="G"
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
        </div> <!-- page-content-->
    </div> <!-- page-wrapper-->
</div> <!-- container-fluid-->

