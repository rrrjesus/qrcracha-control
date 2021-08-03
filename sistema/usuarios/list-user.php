<?php
error_reporting(0);

// Garantindo a autenticidade da session atual ou destruindo caso false
include_once '../../locked/seguranca.php';

$get_session = $_GET['session'] ?? '';

if($get_session !== $hashprimary):
    header("Location: $pag_system");
endif;

// Chamada de classe de formulário e classe de botões
$tabela = $tables->Table($get_year, $ano_atual, $get_pag, $nametabela);
// Variável para instância de classe Tables de lista de usuários
$listserver = $tables->ListServer($get_year, $nametabela, $get_pag, $tabela, $get_lixeira);
// Criando variável da classe Tables para verificar se tabela está vazia
$nu_registro = $tables->SemRegistro($tabela, $get_pag, $get_year, $ano_atual);
// Criando variável da class Tables para contar lixeira
$nu_lixeira = $tables->CountLixeira($tabela, $get_pag, $conexaotable);


$alertlixeira = $button->AlertLixeira($get_lixeira, $nu_lixeira);
$alertsemregistros = $button->AlertSemRegistros($nu_registro);
$btncolor = $button->BtnColor($get_lixeira, $get_year, $ano_atual);
$btncadlist = $button->BtnCadlist($get_year, $ano_atual, $usuarioid, $pag_system, $get_pag, $hashprimary); // Botão bootstrap-success para novo cadastro (apenas se: ano = atual e usuário = logado)
$btnlixo = $button->Btnlistlixeira($usuarioniveldeacesso,$get_lixeira, $get_year, $get_pag, $nu_lixeira, $pag_system, $hashprimary);

?>

    <!-- https://datatables.net/examples/ajax/null_data_source.html -->
    <!-- https://codepen.io/builtbydezine/pen/JJPgeV?editors=1010 -->

    <script type="text/javascript">
        /* Chamando o javascript no navegador */
        $(document).ready(function() {

            var table = $('#lista-usuario-cracha').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                                return  data[4] + ' : ' + data[5];}}),
                        renderer: function (api, rowIdx, columns) {var data = $.map(columns, function (col, i) {
                            return '<tr>' +
                                '<td>' + col.title + ':' + '</td> ' +
                                '<td>' + col.data + '</td>' +
                                '</tr>';
                        }).join('');
                            return $('<table/>').append(data);}}},
                <?=$button->language()?>, // Classe Button com carregamento de botões
                dom: "lBftipr",processing: true,serverside: true,
                ajax: '<?=$listserver?>',
                "lengthMenu": [[3, 6, 10, 25, 50, -1], [3, 6, 10, 25, 50, "Todos"]],
                "aaSorting": [0, 'asc'], /* 'desc' Carregar table decrescente e 'asc' crescente*/
                "aoColumnDefs": [
                    {"bVisible": false,"aTargets": [4]},
                    {"bVisible": false,"aTargets": [5]},
                    {"bVisible": false,"aTargets": [7]},
                    {"bVisible": false,"aTargets": [8]},
                    {"bVisible": false,"aTargets": [11]},
                    {
                        "aTargets": [0], // o numero 6 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a href="<?=PAGSYSTEM?>?pag=edicao_usuarios&id=' + full[0] + '&session=<?=$hashprimary?>&lixeira=' + full[13] + '" data-toggle="tooltip" title="EDITAR" role="button" class="btn btn-outline-warning btn-sm text-center pb-0"><p class="h6 fw-bold me-2 ms-2"> ' + full[0] + '<i class="fa fa-pencil ms-2"></i></p></a>';
                        }
                    },
                    {
                        "aTargets": [1], // o numero 6 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a href="' + full[1] + '" target="_blank"><img src="' + full[1] + '" class="rounded-circle float-left" height="50" width="50"></a>';
                        }
                    },
                    {
                        "aTargets": [2], // o numero 6 é o nº da coluna
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            return '<a href="<?=PAGSYSTEM?>?pag=visual_cracha&id=' + full[0] + '&session=<?=$hashprimary?>" target="_blank"><img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://<?=PAGSYSTEM?>pag=id='+full[0]+'&choe=UTF-8" class="rounded-circle float-left" height="50" width="50"></a>';
                        }
                    },
                    {
                        "aTargets": [13], // o numero 6 é o nº da coluna
                        "data": null,
                        "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                            var lixo = full[13];
                            switch (lixo) {
                                case '0' :
                                    lixo = '<button type="button" class="btn btn-outline-danger btn-sm btn-circle" data-toggle="modal" data-target="#myModalLixo"><i class="fa fa-trash" data-toggle="tooltip" title="DESCARTAR"></i></button>';
                                    break;
                                case '1' :
                                    lixo = '<button type="button" class="btn btn-outline-warning btn-sm btn-circle" data-toggle="modal" data-target="#myModalLixo"><i class="fa fa-arrow-circle-o-up" data-toggle="tooltip" title="REATIVAR"></i></button>';
                                    break;
                                case null:
                                    lixo = '<button class="btn btn-outline-secondary btn-sm btn-circle"><i class="fa fa-trash" data-toggle="tooltip" title="DESCARTAR"></i></button>';
                                    break;
                                default:
                                    lixo = '<button class="btn btn-outline-primary btn-sm btn-circle"><i class="fa fa-arrow-circle-o-up" data-toggle="tooltip" title="REATIVAR"></i></button>';
                            }
                            return lixo;
                        }
                    }
                ],
                <?=$button->ButtonDataTable($nameform, $get_year, $system)?>
            });
            $('#lista-usuario-cracha tbody').on('click', 'button', function() {
                var data = table.row($(this).parents('tr')).data(); // getting target row data
                var lixos = data[13];

                if(lixos === '0') {
                    $('.textdel').html(
                        // Adding and structuring the full data
                        '<div class="modal-title text-center">Deseja apagar o usuário id: <span class="badge rounded-pill bg-danger pt-2 pb-2">' + data[0] + '</span> - ' + data[3] + ' ?</div>'
                    );
                    $('.buttondel').html(
                        // Adding and structuring the full data
                        '<a type="button" href="<?=PAGSYSTEM?>?pag=acao_usuarios&idaction=' + data[0] + '&useraction=' + data[3] + '&year=<?=$get_year?>&session=<?=$hashprimary?>&action=lixeira" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="fa fa-arrow-circle-o-up me-2"></i> <u>S</u>IM</a><button type="button" class="btn btn-outline-danger btn-sm fw-bold" data-dismiss="modal"><i class="fa fa-remove me-2"></i>NÃO</button>'
                    );
                }else{
                    $('.textdel').html(
                        // Adding and structuring the full data
                        '<div class="modal-title text-center">Deseja reativar o usuário id: <span class="badge rounded-pill bg-warning pt-2 pb-2">' + data[0] + '</span> ?</div>'
                    );
                    $('.buttondel').html(
                        // Adding and structuring the full data
                        '<a type="button" href="<?=PAGSYSTEM?>?pag=acao_usuarios&idaction=' + data[0] + '&useraction=' + data[3] + '&year=<?=$get_year?>&session=<?=$hashprimary?>&action=reativacao" class="btn btn-outline-success btn-sm fw-bold me-3"><i class="fa fa-arrow-circle-o-up me-2"></i> <u>S</u>IM</a><button type="button" class="btn btn-outline-danger btn-sm fw-bold" data-dismiss="modal"><i class="fa fa-remove me-2"></i>NÃO</button>'
                    );
                    $('#myModalLixo').modal('show'); // calling the bootstrap modal
                }
            });
        });

    </script>

<?=$button->BtnTitleList($get_pag, $get_year, $nameform, $ano_atual, $get_lixeira);?>

<?=$button->AlertSession()?>

    <div class="col-md-12 text-center py-0">

        <?=$btncadlist //Botão de Cadastro (usuario logado?>
        <!---->
        <?=$btnlixo //Botão de lixeira (usuario logado e login avançado ou administrativo?>
    </div>

<?=$alertlixeira?>     <!--Botão de alert-danger bootstrap informando apenas quando a lixeira está vazia-->
<?=$alertsemregistros?> <!--Botão de alert-danger bootstrap informando apenas quando a tabela não possui registros-->


<?php if(!empty($listserver)): ?>

<div class="table-responsive pt-1 ps-1">
    <table id="lista-usuario-cracha" class="table table-sm table-striped table-bordered flex-nowrap border-<?=$btncolor?> text-center" style="width:100%">
        <thead class="table-<?=$btncolor?>">
        <tr class="bg-light text-<?=$btncolor?> border-<?=$btncolor?>">
            <th class="text-center">ID <i class="fa fa-pencil"></i></th>
            <th class="text-center">FOTO</th>
            <th class="text-center">CRACHA</th>
            <th class="text-center">NOME</th>
            <th class="text-center">SOBRENOME</th>
            <th class="text-center">NASCIMENTO</th>
            <th class="text-center">CPF</th>
            <th class="text-center">E-MAIL</th>
            <th class="text-center">ACESSO</th>
            <th class="text-center">TELEFONE</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">SEXO</th>
            <th class="text-center">SETOR</th>
            <?php if($get_lixeira === 0) :
                echo '<th class="text-center">EXCLUIR</th>';
            else :
                echo '<th class="text-center">REATIVAR</th>';
            endif;
            ?>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

    <!-- Modal Delete-->
    <div class="modal fade" id="myModalLixo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content fs-5 fw-bold">
                <?php if($usuarioniveldeacesso > 0 && $usuarioniveldeacesso < 3) :
                    echo '<div class="modal-header text-white bg-secondary pt-2 pb-0">
                            <div class="text-center">
                                <p><i class="fa fa-trash me-3"></i> Lixeira da Lista</p>
                            </div>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="text-center">
                                 <div class="textdel"></div>
                               </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <div class="buttondel"></div>
                            </div>';
                           else:
                        echo '<div class="modal-header text-white bg-secondary">
                                <p><i class="fa fa-trash me-3"></i> Lixeira da Lista</p>
                                <button type="button" class="btn-close text-white" data-dismiss="modal" aria-label="Close"></button>
                               </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <p"> Antes de descartar o registro <br> Favor se logar !!!</p>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-outline-success fw-bold fs-5" data-dismiss="modal">Entendido</button>
                                </div>';
                endif;
                ?>

            </div>
        </div>
    </div>
    </div>


    </div>
<?php endif; ?>