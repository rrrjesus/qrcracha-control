<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */
error_reporting(-1);
include_once '../locked/seguranca-admin.php';
include_once '../conexao.php';

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());

// Atribui uma conexão PDO
$conexao = conexao::getInstance();

$sql = 'SELECT id, name_form, name_pag, caminho,usuariocad, criado, usuarioalt, alterado FROM pag_admin';
$stm = $conexao->prepare($sql);
$stm->execute();
$pag_admin = $stm->fetchAll(PDO::FETCH_OBJ);


?>
<script type="text/javascript" class="init">
    $(document).ready(function() {
        var table = $('<?php echo '#pag_admin'?>').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                            return 'DETALHES DO TID Nº : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {
                        var data = $.map( columns, function ( col, i ) {return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                        return $('<table/>').append( data );}}},
            "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
                "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
            "lengthMenu": [ [3,10,25, 50, -1], [3,10,25, 50, "Todos"] ],"aaSorting": [ 2, 'desc' ]/* 'desc' Carregar table decrescente e asc crescente*/,
            "aoColumnDefs": [

            ],
            dom: 'Bfrtip',
            buttons: [ {extend:'excel',exportOptions: {columns: ':visible'},title:'Lista de Pag Admin',header: 'Lista de Pag Admin',filename:'Lista de Pag Admin',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Lista de Pag Admin',header: 'Lista de Pag Admin',filename:'Lista de Pag Admin',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                {extend:'print', exportOptions: {columns: ':visible'},title:'Lista de Pag Admin',header: 'Lista de Pag Admin',filename:'Lista de Pag Admin',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
                {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
        });

        table.buttons().container()
            .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
    });
</script>

<?php
if (isset($_SESSION['msgfoto'])) {echo $_SESSION['msgfoto'];unset($_SESSION['msgfoto']);}
if (isset($_SESSION['msgedit'])) {echo $_SESSION['msgedit'];unset($_SESSION['msgedit']);}
if (isset($_SESSION['msgerro'])) {echo $_SESSION['msgerro'];
    unset($_SESSION['msgerro']);}
?>

<div class="table-responsive">

    <div class="text-center"><a class="btn btn-outline-success btn-icon-panel" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
            echo 'display: none;';
        } ?>" href="index.php?pag=cad-pag-admin"><span class="icon text-white-50">
                    <i class="fas fa-check"></i></span><span class="text"><u> N</u>OVO</span></a></div>

    <table id="pag_admin" class="table table-sm table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">EDITAR</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">PAGINA</th>
                            <th class="text-center">CAMINHO</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">CRIADO</th>
                            <th class="text-center">LOGIN</th>
                            <th class="text-center">ALTERADO</th>
                            <th class="text-center">???</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($pag_admin as $pag_admins):?>
                        <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                            echo 'display: none;';
                        } ?>">
                            <?php $id = $pag_admins->id; ?>
                            <td class="text-center"><?=$pag_admins->id?></td>
                            <td class="text-center">
                                <a type='button' class='btn btn-warning btn-circle' href='././<?php echo $admin?>?pag=edit-pag-admin&id=<?=$pag_admins->id?>'><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td class="text-center"><?=$pag_admins->name_form?></td>
                            <td class="text-center"><?=$pag_admins->name_pag?></td>
                            <td class="text-center"><?=$pag_admins->caminho?></td>
                            <td class="text-center"><?=$pag_admins->usuariocad?></td>
                            <td class="text-center"><?=$pag_admins->criado;?></td>
                            <td class="text-center"><?=$pag_admins->usuarioalt?></td>
                            <td class="text-center"><?=$pag_admins->alterado?></td>
                            <td class="text-center">
                                <button type="button" class='btn btn-danger btn-circle' data-toggle="modal"
                                        data-target="#myModal<?=$pag_admins->id?>"><span
                                            class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                        <!-- Inicio Modal Detalhes-->

                        <div class="modal fade" id="myModal<?=$pag_admins->id?>" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header-del">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title text-center" id="myModalLabel">SisdamJT Web</h4>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="text-center">
                                                <h4>Deseja apagar a página</h4>
                                                <h4><?=$pag_admins->name_pag?> ? </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="text-center">
                                            <a href='<?php echo $admin?>?pag=del-pag-admin&id=<?=$pag_admins->id?>&name_pag=<?=$pag_admins->name_pag?>&caminho=<?=$pag_admins->caminho?>'>
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

            <?php endforeach;?>
            <br>
        </tbody>
    </table>

</div>

