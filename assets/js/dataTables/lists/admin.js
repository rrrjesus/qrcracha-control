/**
 * Created by Rodolfo on 09/06/2017.
 */
$(document).ready(function () {


    $('#list-user').DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por Página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": "Ordenar colunas de forma ascendente",
                "sPrevious": "Ordenar colunas de forma descendente"
            }
        },
        "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ]
    });
});


