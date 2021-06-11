<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(0);
include_once '../../locked/seguranca-admin.php';
include_once '../../conexao.php';

$listar_menus_submenus = "SELECT * FROM menu_sub";
$resultado = $conectar->query($listar_menus_submenus);
?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h2>
                            Listar SubMenus
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="<?php echo $admin?>">Painel de Controle</a>
                            </li>
                            <li class="active">Listar SubMenus</li>
                        </ol>
                    </div>
                    <?php
                    if (isset($_SESSION['msgdelerro'])) {
                        echo $_SESSION['msgdelerro'];
                        unset($_SESSION['msgdelerro']);
                    }
                    if (isset($_SESSION['msgdel'])) {
                        echo $_SESSION['msgdel'];
                        unset($_SESSION['msgdel']);
                    }
                    if (isset($_SESSION['msgedit'])) {
                        echo $_SESSION['msgedit'];
                        unset($_SESSION['msgedit']);
                    }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->

            <script type="text/javascript" class="init">
                $(document).ready(function() {
                    $('#list-submenu').DataTable({"language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro",
                                "sLast": "Último"},"oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
                        "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ]});} );
            </script>

            <div class="row">
                <div class="col-lg-12">

                    <div class="text-center">
                        <a href="././<?php echo $admin?>?pag=cad-submenu">
                            <button type='button' style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                echo 'display: none;';
                            } ?>" accesskey="N" data-toggle="tooltip" title="NOVO" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus-sign"></i></span><u> N</u>OVO
                            </button>
                        </a>
                    </div>

                    <table id="list-submenu" class="table table-hover table-striped table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">ID_MENU</th>
                            <th class="text-center">SUB MENU</th>
                            <th class="text-center">PAG =</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">CRIADO</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">ALTERADO</th>
                            <th class="text-center">EDITAR</th>
                            <th class="text-center">???</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php while ($row_menus_submenus = mysqli_fetch_assoc($resultado)){ ?>
                        <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>">
                            <?php $id = $row_menus_submenus["id"]; ?>
                            <td class="text-center"><?php echo $row_menus_submenus["id"]; ?></td>
                            <td class="text-center"><?php echo $row_menus_submenus["id_menu"]; ?></td>
                            <td class="text-center"><?php echo $row_menus_submenus["nome"]; ?></td>
                            <td class="text-center"><?php echo $row_menus_submenus["pag"]; ?></td>
                            <td class="text-center"><?php echo $row_menus_submenus["usuariocad"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_menus_submenus["criado"]); ?></td>
                            <td class="text-center"><?php echo $row_menus_submenus["usuarioalt"]; ?></td>
                            <td class="text-center"><?php echo dateConvert($row_menus_submenus["alterado"]); ?></td>
                            <td class="text-center">
                                <a href='././<?php echo $admin?>?pag=edit-submenu&id=<?php echo $row_menus_submenus['id']; ?>'>
                                    <button style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                                        echo 'display: none;';
                                    } ?>" type='button' class='btn btn-warning btn-circle'><span
                                                class="glyphicon glyphicon-pencil"></button>
                                </a>
                            </td>
                            <td class="text-center">
                                <button type="button" class='btn btn-danger btn-circle' data-toggle="modal"
                                        data-target="#myModal<?php echo $row_menus_submenus['id']; ?>"><span
                                            class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                        <!-- Inicio Modal Detalhes-->

                        <div class="modal fade" id="myModal<?php echo $row_menus_submenus['id']; ?>" tabindex="-1"
                             role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header-del">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="text-center">
                                                <h4>Deseja apagar o submenu</h4>
                                                <h4><?php echo $row_menus_submenus["nome"] ?> ? </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <a href='<?php echo $admin?>?pag=del-submenu&id=<?php echo $row_menus_submenus['id']; ?>'>
                                                <button name="btnDeletePagAdmin" type="button"
                                                        class="btn btn-success btn-circle">SIM
                                                </button>
                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger btn-circle"
                                                    data-dismiss="modal">NÃO
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Fim Modal Detalhes -->
                <?php } ?>
                <br><br><br>
                </tbody>
                </table>
            </div> <!-- col-lg-12-->
        </div> <!-- row -->
    </div> <!-- page-content-->
</div> <!-- page-wrapper-->
</div> <!-- container-fluid-->
