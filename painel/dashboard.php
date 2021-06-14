
<?php
/**
 * Created by Rodolfo Romaioli Ribeiro de Jesus.
 * User: D788796
 * Date: 09/06/2017
 * Time: 08:39
 */

error_reporting(-1);

// Atribui uma conexão PDO
$conexao = conexao::getInstance();

$sql = 'SELECT id, foto, nome, sobrenome, nomesocial, datanascimento, cpf, email, telefone, celular, setor, login, senha, status, sexo, nivel_acesso_id, acessotid FROM usuarios';
$stm = $conexao->prepare($sql);
$stm->execute();
$user = $stm->fetchAll(PDO::FETCH_OBJ);
?>

<!-- https://demo.themesberg.com/volt-pro/pages/dashboard/dashboard.html -->

<div class="row justify-content-md-center pb-5">

    <!-- JavaScript da tabela de usuários sisdamweb -->
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            var table = $('#usuarios').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return 'DETALHES DO TID Nº : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {
                            var data = $.map( columns, function ( col, i ) {return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                            return $('<table/>').append( data );}}},
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
                    "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                    "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}
                },
                "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
                "aaSorting": [0, 'desc'], /* 'desc' Carregar table decrescente e asc crescente*/
                "aoColumnDefs": [
                    {"bVisible": false,"aTargets": [6]}
                ],
                dom: "lBftipr",
                buttons: [ {extend:'excel',exportOptions: {columns: ':visible'},title:'Lista de Usuários',header: 'Lista de Usuários',filename:'Lista de Usuários',className: 'btn btn-outline-success',text:'<span class="fa fa-file-excel-o"></span>' },
                    {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Lista de Usuários',header: 'Lista de Usuários',filename:'Lista de Usuários',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
                    {extend:'print', exportOptions: {columns: ':visible'},title:'Lista de Usuários',header: 'Lista de Usuários',filename:'Lista de Usuários',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
                    {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-info',text:'<span class="fa fa-list"></span>'} ]
            });

            table.buttons().container()
                .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
        });
    </script>

    <div class="text-center">
        <a class="btn btn-outline-success btn-icon-panel" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
            echo 'display: none;';
        } ?>" href="index.php?pag=cad-user"><i class="fas fa-check"></i><u> N</u>OVO</a>
    </div>

    <table id="usuarios" class="table table-sm table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">FOTO</th>
            <th class="text-center">EDITAR</th>
            <th class="text-center">RESET</th>
            <th class="text-center">NOME</th>
            <th class="text-center">ATIVADO</th>
            <th class="text-center">E-MAIL</th>
            <th class="text-center">NÍVEL DE ACESSO</th>
            <th class="text-center">LOGIN</th>
            <th class="text-center">APAGAR</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($user as $users):?>
            <tr style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                echo 'display: none;';
            } ?>">
                <?php $id = $users->id; ?>
                <td class="text-center"><?=$users->id; ?></td>

                <td class="text-center"><a style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                        echo 'display: none;';
                    } ?>" href="<?php if (file_exists('imagens/'.$users->login.'/fotologin/'.$users->foto))
                    {echo 'imagens/'.$users->login.'/fotologin/'.$users->foto;}
                    else{ echo 'imagens/foto_exists.png';}?>">
                        <img class="img-profile rounded-circle" height="40" width="40"
                             src="<?php if (file_exists('imagens/'.$users->login.'/fotologin/'.$users->foto))
                             {echo 'imagens/'.$users->login.'/fotologin/'.$users->foto;}
                             else{ echo 'imagens/foto_exists.png';}?>"></a></td>
                <td class="text-center">
                    <a class="btn btn-outline-warning btn-circle" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {
                        echo 'display: none;';
                    } ?>" href="index.php?pag=edit-user&id=<?=$users->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td class="text-center">
                    <button type="button" style="<?php if ($_SESSION['usuarioNivelAcesso'] <> 1) {echo 'display: none;';} ?>" class='btn btn-outline-info btn-circle' data-toggle="modal" data-target="#myModalReset<?=$users->id?>"><span class="fa fa-repeat"></button>
                </td>
                <td><?=$users->nome?></td>
                <td class="text-center" data-toggle="modal" data-target="#myModalAtiva<?=$users->id?>"><?php $buttonact = buttonColor($users->status);
                    echo "{$buttonact}"; ?></td>
                <td><?php echo $users->email; ?></td>
                <td class="text-center"><?php $user = niveluser($users->nivel_acesso_id);
                    echo "{$user}"; ?></td>
                <td class="text-center"><?=$users->login?></td>
                <td class="text-center">
                    <button type="button" class='btn btn-outline-danger btn-circle' data-toggle="modal" data-target="#myModal<?=$users->id?>"><span class="fa fa-trash"></span></button>
                </td>
            </tr>

            <!-- Modals -->
            <?php require(dirname(__FILE__) . './modal/modaluser.php'); ?>
        <?php endforeach;?>
        <br>
        </tbody>
    </table>

</div>

<div class="row justify-content-md-center">

    <?php require(__DIR__ . './cards_dash.php'); ?>

</div>


