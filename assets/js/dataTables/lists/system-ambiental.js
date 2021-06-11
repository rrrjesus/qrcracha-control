/**
 /**
 * Created by rodol on 22/07/2017.
 */

function retira_acentos(str)
{
    com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝŔÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŕ";
    sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
    novastr="";
    for(i=0; i<str.length; i++) {
        troca=false;
        for (a=0; a<com_acento.length; a++) {
            if (str.substr(i,1)==com_acento.substr(a,1)) {
                novastr+=sem_acento.substr(a,1);
                troca=true;
                break;
            }
        }
        if (troca==false) {
            novastr+=str.substr(i,1);
        }
    }
    return novastr;
}

function myFunctionReload() {
    location.reload();
}

$(document).ready(function() {


    $('#list-rel-dengue').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-rel-dengue.php',
        "lengthMenu": [[3, 10, 25, 50, -1], [3, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
        "aoColumnDefs": [
            {"bVisible": false,"aTargets": [2]},{"bVisible": false,"aTargets": [4]},{"bVisible": false,"aTargets": [6]},{"bVisible": false,"aTargets": [7]},
            {"bVisible": false,"aTargets": [8]},{"bVisible": false,"aTargets": [9]},{"bVisible": false,"aTargets": [10]},{"bVisible": false,"aTargets": [11]},
            {"bVisible": false,"aTargets": [12]},{"bVisible": false,"aTargets": [13]},{"bVisible": false,"aTargets": [14]},{"bVisible": false,"aTargets": [15]},
            {"bVisible": false,"aTargets": [16]},{"bVisible": false,"aTargets": [23]},{"bVisible": false,"aTargets": [24]},{"bVisible": false,"aTargets": [25]},
            {"bVisible": false,"aTargets": [26]},
            {"aTargets": [1], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return full[1] + '-N'  ;
                }
            },
            {"aTargets": [6], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return 'DA-' + '\n' + full[6] ;
                }
            },
            {"aTargets": [10], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return full[10] + '\n' + 'Nº: ' + full[11] + '\n' + full[12] ;
                }
            },
            {"aTargets": [13], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return 'RES_' + full[13];
                }
            },
            {"aTargets": [15], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '(' + full[14] + ')' + '\n' + full[15];
                }
            },
            {"aTargets": [27], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var clasfin = full[27];
                    switch (clasfin) {
                        case '':
                            clasfin = "";
                            break;
                        case '5':
                            clasfin = "5-DESC";
                            break;
                        case '8':
                            clasfin = "8-INCO";
                            break;
                        case '10':
                            clasfin = "10-DENGUE";
                            break;
                        case '11':
                            clasfin = "11-D.SINAIS-A.";
                            break;
                        case '12':
                            clasfin = "12-D.GRAVE";
                            break;
                    }
                    return clasfin;
                }
            },
            {"aTargets": [28], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var crit = full[28];
                    switch (crit) {
                        case '':
                            crit = "";
                            break;
                        case '1':
                            crit = "1-LABOR";
                            break;
                        case '2':
                            crit = "2-CLIN.EP.";
                            break;
                        case '3':
                            crit = "3-INVEST.";
                            break;
                    }
                    return crit;
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Relatório - Casos Dengue',exportOptions: {columns: ':visible'},header: 'Relatório - Casos de Dengue',filename:'Relatório - Casos Dengue',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Relatório - Casos Dengue',header: 'Relatório - Casos Dengue',filename:'Relatório - Casos Dengue',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Relatório - Casos Dengue',header: 'Relatório - Casos Dengue',filename:'Relatório - Casos Dengue',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',orientation: 'landscape',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    $('#list-rel-chiku').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-rel-chiku.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'asc' ],
        "aoColumnDefs": [
            { type: 'de_datetime', targets: 1 },
            { type: 'de_datetime', targets: 3 },
            {"bVisible": false,"aTargets": [8]},
            {"bVisible": false,"aTargets": [9]},
            {"bVisible": false,"aTargets": [12]},
            {"bVisible": false,"aTargets": [13]},
            {"bVisible": false,"aTargets": [16]},
            {"bVisible": false,"aTargets": [17]},
            {"bVisible": false,"aTargets": [18]},
            {"aTargets": [7], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return full[7] + '\n' + 'Nº: ' + full[8] + '\n' + full[9] ;
                }
            },
            {"aTargets": [10], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return 'RES_' + full[10];
                }
            },
            {"aTargets": [16], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var clasfin = full[16];
                    switch (clasfin) {
                        case '':
                            clasfin = "";
                            break;
                        case '5':
                            clasfin = "DESCARTADO";
                            break;
                        case '8':
                            clasfin = "INCONCLUSIVO";
                            break;
                        case '10':
                            clasfin = "DENGUE";
                            break;
                        case '11':
                            clasfin = "DENGUE SINAIS DE ALARME";
                            break;
                        case '12':
                            clasfin = "DENGUE GRAVE";
                            break;
                    }
                    return clasfin;
                }
            },
            {"aTargets": [17], // o numero 2 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    var crit = full[17];
                    switch (crit) {
                        case '':
                            crit = "";
                            break;
                        case '1':
                            crit = "LABORATORIO";
                            break;
                        case '2':
                            crit = "CLINICO EPIDEMIO";
                            break;
                        case '3':
                            crit = "INVESTIGACAO";
                            break;
                    }
                    return crit;
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Casos Dengue',exportOptions: {columns: ':visible'},header: 'Casos de Dengue',filename:'Casos Dengue',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Dengue',header: 'Casos Dengue',filename:'Casos Dengue',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Dengue',header: 'Casos Dengue',filename:'Casos Dengue',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',orientation: 'landscape',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    var table = $('#list-ccz-dengue1').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'DETALHES DO SINAN Nº : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data );}}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ],"aaSorting": [ 8, 'desc' ]/* 'desc' Carregar table decrescente e asc crescente*/,
        "aoColumnDefs": [
            { type: 'de_date', targets: 3 },
            { type: 'de_date', targets: 6 },
            { type: 'de_date', targets: 8 }
        ],
        buttons: [ {extend:'excel',title:'Casos Dengue-CCZ-SINAN',header: 'Casos Dengue-CCZ-SINAN',filename:'Casos Dengue-CCZ-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Dengue-CCZ-SINAN',header: 'Casos Dengue-CCZ-SINAN',filename:'Casos Dengue-CCZ-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Dengue-CCZ-SINAN',header: 'Casos Dengue-CCZ-SINAN',filename:'Casos Dengue-CCZ-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });
    table.buttons().container()
        .appendTo( '#list-ccz-dengue1_wrapper .col-sm-6:eq(0)' );

    var table = $('#list-ccz-lepto').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'DETALHES DO SINAN Nº : ' + data[0];}}),renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data );}}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar",
            "oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [ [5,10,25, 50, -1], [5,10,25, 50, "Todos"] ],"aaSorting": [ 8, 'desc' ]/* 'desc' Carregar table decrescente e asc crescente*/,
        "aoColumnDefs": [
            { type: 'de_date', targets: 3 },
            { type: 'de_date', targets: 6 },
            { type: 'de_date', targets: 8 }
        ],
        buttons: [ {extend:'excel',title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Lepto-CCZ-SINAN',header: 'Casos Lepto-CCZ-SINAN',filename:'Casos Lepto-CCZ-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });
    table.buttons().container()
        .appendTo( '#list-ccz-lepto_wrapper .col-sm-6:eq(0)' );


    var table = $('#rel-dengue').DataTable( {responsive: {details: {renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table' } )}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [[14], [14]], "aaSorting": [ 0, 'asc' ],
        buttons: [ {extend:'excel',title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print',customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    table.buttons().container()
        .appendTo( '#rel-dengue_wrapper .col-sm-6:eq(0)' );

    var table = $('#rel-dengue-iara').DataTable( {responsive: {details: {renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table' } )}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [[14], [14]], "aaSorting": [ 0, 'asc' ],
        buttons: [ {extend:'excel',title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print',customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },title:'RELATÓRIO DENGUE',header: 'RELATÓRIO DENGUE',filename:'RELATÓRIO DENGUE',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    table.buttons().container()
        .appendTo( '#rel-dengue-iara_wrapper .col-sm-6:eq(0)' );

    var table = $('#rel-chiku').DataTable( {responsive: {details: {renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table' } )}},
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [[14], [14]], "aaSorting": [ 0, 'asc' ],
        buttons: [ {extend:'excel',title:'RELATÓRIO CHIKUNGUNYA',header: 'RELATÓRIO CHIKUNGUNYA',filename:'RELATÓRIO CHIKUNGUNYA',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'RELATÓRIO CHIKUNGUNYA',header: 'RELATÓRIO CHIKUNGUNYA',filename:'RELATÓRIO CHIKUNGUNYA',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print',customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                },title:'RELATÓRIO CHIKUNGUNYA',header: 'RELATÓRIO CHIKUNGUNYA',filename:'RELATÓRIO CHIKUNGUNYA',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    table.buttons().container()
        .appendTo( '#rel-chiku_wrapper .col-sm-6:eq(0)' );

    /* lista de entradas material ambiental */

    $('#list-entrada-material').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'DETALHES DO ' +data[3]+ '&nbspNº&nbsp:&nbsp'  + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"} },
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/ambiental/list/proc-list-ambiental/list-entrada-material.php',
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
        "aoColumnDefs": [{"aTargets": [0] },
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="suvisjt.php?pag=edit-entrada-material&id=' + full[0] + '" role="button" class="btn btn-dark rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            }
        ],
        buttons: [ {extend:'excel',title:'Sisdamweb - Entrada de Materiais',header: 'Sisdamweb - Entrada de Materiais',filename:'Sisdamweb - Entrada de Materiais',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Entrada de Materiais Uvis Jaçanã',header: 'Sisdamweb - Entrada de Materiais',filename:'Entrada de Materiais',orientation: 'Portrait',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Sisdamweb - Entrada de Materiais',header: 'Sisdamweb - Entrada de Materiais',filename:'Sisdamweb - Entrada de Materiais',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

});


