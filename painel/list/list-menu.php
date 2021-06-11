<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(-1);

include_once '../locked/seguranca-admin.php';


$menu = (isset($_GET['menu'])) ? $_GET['menu'] : '';

    if(!empty($menu) && $menu == 'principal'):
        $table = 'menu_principal';
        $name = 'MENUS PRINCIPAIS';
    elseif($menu == 'submenu') :
        $table = "menu_sub";
        $name = 'SUB MENUS';
    elseif($menu == 'subsubmenu') :
        $table = "menu_sub_sub";
        $name = 'MENUS SUBMENUS';
    else :
        $table = 'menu_principal';
    endif;

// Inicia a conexao
$conexao = conexao::getInstance();
$sql = "SELECT id, id_menu, nome, pag, usuariocad, criado, usuarioalt, alterado FROM $table";
$stm = $conexao->prepare($sql);
$stm->execute();
$menus = $stm->fetchAll(PDO::FETCH_OBJ);
$stm = null;

// chave primária da tabela
$primaryKey = 'id';

?>

<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#list-menu').DataTable({"language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".",
                "sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro",
                    "sLast": "Último"},"oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ]});} );
</script>

<div class="d-grid mb-3"><button type="button" class="btn btn-outline-dark btn-lg btn-block "><i
                class="fa fa-navicon px-2"></i> LISTAR <?=$name.' - '.$year?></button></div>

<div class="col-md-12 text-center">
<a data-toggle="tooltip" title="NOVO" class="btn btn-success btn-icon-panel" href="././<?php echo $admin?>?pag=cad-menu"><span class="icon text-white-50">
                    <i class="fas fa-plus-circle"></i></span><span class="text"><u> N</u>OVO</span></a>
</div>



                    <table id="list-menu" class="table table-striped table-bordered flex-nowrap border-dark" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center"><span class="fa fa-pencil"></span></th>
                            <th class="text-center" style="<?php if ($menu == 'principal') {
                                echo 'display: none;';} ?>">ID_MENU</th>
                            <th class="text-center">NOME MENU</th>
                            <th class="text-center" style="<?php if ($menu == 'principal') {
                                echo 'display: none;';} ?>">LINK MENU</th>
                            <th class="text-center">CRIADO</th>
                            <th class="text-center">ALTERADO</th>
                            <th class="text-center"><span class="fa fa-trash"></span></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($menus as $menuss):?>
                        <tr class="bg-light text-dark border-dark">
                            <td class="text-center"><?=$menuss->id?></td>
                            <td class="text-center">
                                <a data-toggle="tooltip" title="EDITAR" class='btn btn-outline-warning btn-circle' href='<?=$pag_painel.'?pag=edit-'?><?php if($menu == 'principal'){echo 'menu';}elseif ($menu == 'sub') {echo 'submenu';}else{echo 'menu-submenu';}?>&editar=<?=$menu;?>&id=<?=$menuss->id?>'><i class="fa fa-pencil"></i></a>
                            </td>
                            <td class="text-center" style="<?php if ($menu == 'principal') {
                                echo 'display: none;';} ?>"><?=$menuss->id_menu?></td>
                            <td class="text-center"><?=$menuss->nome?></td>
                            <td class="text-center" style="<?php if ($menu == 'principal') {
                                echo 'display: none;';} ?>"><?=$menuss->pag?></td>
                            <td class="text-center"><?=$menuss->usuariocad.' '.$datacreate = date('d/m/Y',strtotime($menuss->criado))?></td>
                            <td class="text-center"><?=$menuss->usuarioalt.' '.$dataalter = date('d/m/Y',strtotime($menuss->alterado))?></td>
                            <td class="text-center">
                                <button type="button" title="APAGAR" class='btn btn-outline-danger btn-circle' data-toggle="modal"
                                        data-target="#myModal<?=$menuss->id?>"><span
                                            class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                        <!-- Inicio Modal Detalhes-->

                        <div class="modal fade" id="myModal<?=$menuss->id?>" tabindex="-1"
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
                                                <h4>Deseja apagar o menu</h4>
                                                <h4><?=$menuss->nome?> ? </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <a href='<?=$pag_painel?>?pag=del-menu&id=<?=$menuss->id?>&nome=<?=$menuss->nome?>'>
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

                <!-- Fim Modal Detalhes -->
                        <?php endforeach;?>
                <br><br><br>
                </tbody>
                </table>
        </div>
    </div>
</div>

