/**
 * Created by rodol on 22/07/2017.
 */

/* Chamando o javascript no navegador */
$(document).ready(function() {

    /*Configurações da Lista de Cidades*/
    $('#list-cidade').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();return 'Detalhes da Cidade : ' + data[1];}
                }),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                            '<td>'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');

                    return $('<table/>').append( data );
                }
            }
        },
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
        dom: "lBfrtip",
        processing: true,
        serverside: true,
        ajax: 'form-system/epidemio/list/proc-list-epidemio/list-cidade.php',
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
                    return '<a href="menu-principal.php?pag=edit-cidade&id=' + full[0] + '" role="button" class="btn btn-outline-warning rounded-circle"><i class="fa fa-pencil"></i></a>';
                }
            },
            {
                "aTargets": [6], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[4] + ','+ full[5] +'&travelmode=driving" role="button" class="btn btn-outline-light"><img src="imagens/maps_64dp.png" width="20"></a>';
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Lista de Cidades',header: 'Lista de Cidades',filename:'Lista de Cidades',className: 'btn btn-outline-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Lista de Cidades',header: 'Lista de Cidades',filename:'Lista de Cidades',orientation: 'portrait',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Lista de Cidades',header: 'Lista de Cidades',filename:'Lista de Cidades',orientation: 'portrait',className: 'btn btn-outline-secondary',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-primary',text:'<span class="fa fa-list"></span>'} ]
    });

    /*Configurações da Lista de Cnes*/
    $('#list-cnes').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalhes do CNES : ' +data[2]+ ' - ' +data[3];
                    }
                }),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                            '<td>'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');

                    return $('<table/>').append( data );
                }
            }
        },
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
        dom: "lBfrtip",
        processing: true,
        serverside: true,
        ajax: 'form-system/epidemio/list/proc-list-epidemio/list-cnes.php',
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
                    return '<a href="menu-principal.php?pag=edit-cnes&id=' + full[0] + '" role="button" class="btn btn-dark rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Lista de Estabelecimentos - CNES',header: 'Lista de Estabelecimentos - CNES',filename:'Lista de Estabelecimentos - CNES',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Lista de Estabelecimentos - CNES',header: 'Lista de Estabelecimentos - CNES',filename:'Lista de Estabelecimentos - CNES',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Lista de Estabelecimentos - CNES',header: 'Lista de Estabelecimentos - CNES',filename:'Lista de Estabelecimentos - CNES',orientation: 'landscape',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    /*Configurações da Lista de Agravos*/
    $('#list-agravo').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];
                    }
                }),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                            '<td>'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');

                    return $('<table/>').append( data );
                }
            }
        },
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
        dom: "lBfrtip",
        processing: true,
        serverside: true,
        ajax: 'form-system/epidemio/list/proc-list-epidemio/list-agravo.php',
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
                    return '<a href="menu-principal.php?pag=edit-agravo&id=' + full[0] + '" role="button" class="btn btn-dark rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Coqueluche - IAL - SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    $('#list-end').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'DETALHES DO ENDEREÇO' ;
                    }
                }),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                            '<td>'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');

                    return $('<table/>').append( data );
                }
            }
        },
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
        dom: "lBfrtip",
        processing: true,
        serverside: true,
        ajax: 'form-system/list/proc-list-system/list-end.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]],
        "aaSorting": [ 15, 'asc' ],/*Carregar table decrescente*/
        "aoColumnDefs": [
            {
                /*"bSearchable": false,
                 "bVisible": false,*/
                "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
            },
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="menu-principal.php?pag=edit-end&id=' + full[0] + '" role="button" class="btn btn-dark rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            },
            {
                "aTargets": [3], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a target="_blank" href="http://10.47.171.110/sisdamweb/setores/' + full[3] + '.pdf" role="button" class="btn btn-danger rounded-circle">' + full[3] + '</a>';
                }
            },
            {
                "aTargets": [10], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var atual = full[10];
                    switch (atual) {
                        case 'SIM':
                            atual = '<button disabled class="btn btn-success rounded-circle">SIM</button>';
                            break;
                        case 'NAO':
                            atual = '<button disabled class="btn btn-danger rounded-circle">NAO</button>';
                            break;
                        default: atual = '<a target="_blank" href="https://gal.saude.sp.gov.br/gal/bmh/consulta-paciente-laboratorio/imprimir-resultado/?requisicoes=[%22'+ full [0] +'%22]" title="Desativado" role="button" class="btn btn-warning rounded-circle">???</a>';
                    }
                    return atual;
                }
            },
            {
                "aTargets": [11], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a target="_blank" href="https://www.google.com.br/maps/dir/?api=1&origin=R. Maria Amália Lopes Azevedo, 3676 - Vila Albertina&destination=' + full[11] + '&travelmode=driving" role="button" class="btn btn-default rounded-circle"><img src="imagens/maps_64dp.png" width="20"></a>';
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Coqueluche - IAL - SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });



    var table = $('#list-tid-aberto').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'DETALHES DO TID Nº : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data );}}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ],"aaSorting": [ 2, 'desc' ]/* 'desc' Carregar table decrescente e asc crescente*/,
        "aoColumnDefs": [
            {"bVisible": false,"aTargets": [11]},
            {"bVisible": false,"aTargets": [12]},
            {"bVisible": false,"aTargets": [13]},
            {"bVisible": false,"aTargets": [14]},
            {"bVisible": false,"aTargets": [15]},
            {"bVisible": false,"aTargets": [16]},
            {"bVisible": false,"aTargets": [17]},
            {"bVisible": false,"aTargets": [18]},
            {"bVisible": false,"aTargets": [19]}
        ],
        buttons: [ {extend:'excel',exportOptions: {columns: ':visible'},title:'Tids em aberto',header: 'Tids em aberto',filename:'Tids em aberto',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Tids em aberto',header: 'Tids em aberto',filename:'Tids em aberto',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Tids em aberto',header: 'Tids em aberto',filename:'Tids em aberto',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    table.buttons().container()
        .appendTo( '#list-tid-aberto_wrapper .col-sm-6:eq(0)' );

});


