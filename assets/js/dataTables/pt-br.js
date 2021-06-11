/**
 * Created by Rodolfo on 09/06/2017.
 */

    $('#list-cidade').DataTable({
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
        processing: true,
        serverside: true,
        ajax: 'form-system/list/proc-list-system/list-cidade.php',
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "Todos"]],
        "aoColumnDefs": [
            {
                /*"bSearchable": false,
                 "bVisible": false,*/
                "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
            },
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="suvisjt.php?pag=edit-cidade&id=' + full[0] + '"><button type="button" class="btn btn-warning btn-circle"><span class="glyphicon glyphicon-pencil"></button></a>';
                }
            }
        ]
    });


    $('#list-doenca').DataTable({
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
        processing: true,
        serverside: true,
        ajax: 'form-system/list/proc-list-system/list-agravo.php',
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "Todos"]],
        "aoColumnDefs": [
            {
                /*"bSearchable": false,
                 "bVisible": false,*/
                "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
            },
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="suvisjt.php?pag=edit-doenca&id=' + full[0] + '"><button type="button" class="btn btn-warning btn-circle"><span class="glyphicon glyphicon-pencil"></button></a>';
                }
            }
        ]
    });

    $('#list-end').DataTable({
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
        processing: true,
        serverside: true,
        ajax: 'form-system/list/proc-list-system/list-end.php',
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "Todos"]],
        "aoColumnDefs": [
            {
                /*"bSearchable": false,
                 "bVisible": false,*/
                "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
            },
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="suvisjt.php?pag=edit-end&id=' + full[0] + '"><button type="button" class="btn btn-warning btn-circle"><span class="glyphicon glyphicon-pencil"></button></a>';
                }
            },
            {
                "aTargets": [4], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a target="_blank" href="http://192.168.1.15/sisdamweb/setores/' + full[4] + '.pdf"><button type="button" class="btn btn-primary btn-circle"><span class="glyphicon glyphicon-map-marker"></button></a>';
                }
            }
        ]
    });

    $('#Listar_Sisdam').DataTable({
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
            "lengthMenu": [ [6,10,25, 50, -1], [6,10,25, 50, "Todos"] ]
    });


});


