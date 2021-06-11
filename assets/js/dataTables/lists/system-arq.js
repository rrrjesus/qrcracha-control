/**
 * Created by rodol on 22/07/2017.
 */
$(document).ready(function() {
    $('#list-sv2-arq-2016').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/list/proc-list-system/list-sv2/list-sv2-2016.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
        "aoColumnDefs": [{"bVisible": false,"aTargets": [14]},{"bVisible": false,"aTargets": [15]},{"bVisible": false,"aTargets": [16]},{"bVisible": false,"aTargets": [19]},
            {"bVisible": false,"aTargets": [20]},{"bVisible": false,"aTargets": [22]},{"bVisible": false,"aTargets": [23]},{"bVisible": false,"aTargets": [24]},{"bSearchable": false,"bVisible": false,"aTargets": [25]}],
        buttons: [ {extend:'excel',title:'SV2 2016',header: 'SV2 2016',filename:'SV2 2016',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'SV2 2016',header: 'SV2 2016',filename:'SV2 2016',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'SV2 2016',header: 'SV2 2016',filename:'SV2 2016',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    $('#list-sv2-arq-2017').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/list/proc-list-system/list-sv2/list-sv2-2017.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
        "aoColumnDefs": [{"bVisible": false,"aTargets": [14]},{"bVisible": false,"aTargets": [15]},{"bVisible": false,"aTargets": [16]},{"bVisible": false,"aTargets": [19]},
            {"bVisible": false,"aTargets": [20]},{"bVisible": false,"aTargets": [22]},{"bVisible": false,"aTargets": [23]},{"bVisible": false,"aTargets": [24]},{"bSearchable": false,"bVisible": false,"aTargets": [25]}],
        buttons: [ {extend:'excel',title:'SV2 2017',header: 'SV2 2017',filename:'SV2 2017',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'SV2 2017',header: 'SV2 2017',filename:'SV2 2017',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'SV2 2017',header: 'SV2 2017',filename:'SV2 2017',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });

    $('#list-sv2-arq-2018').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Sinan : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/list/proc-list-system/list-sv2/list-sv2-2018.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 0, 'desc' ],
        "aoColumnDefs": [{"bVisible": false,"aTargets": [14]},{"bVisible": false,"aTargets": [15]},{"bVisible": false,"aTargets": [16]},{"bVisible": false,"aTargets": [19]},
            {"bVisible": false,"aTargets": [20]},{"bVisible": false,"aTargets": [22]},{"bVisible": false,"aTargets": [23]},{"bVisible": false,"aTargets": [24]},{"bSearchable": false,"bVisible": false,"aTargets": [25]}],
        buttons: [ {extend:'excel',title:'SV2 2018',header: 'SV2 2018',filename:'SV2 2018',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'SV2 2018',header: 'SV2 2018',filename:'SV2 2018',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'SV2 2018',header: 'SV2 2018',filename:'SV2 2018',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    });


    $('#list-ial-coque').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes do Paciente : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/epidemio/list/proc-list-epidemio/list-ial-coque.php',
        "lengthMenu": [[4, 10, 25, 50, -1], [4, 10, 25, 50, "Todos"]], "aaSorting": [ 23, 'asc' ],
        "aoColumnDefs": [
            {"bVisible": false,"aTargets": [2]},
            {"bVisible": false,"aTargets": [5]},
            {"bVisible": false,"aTargets": [10]},
            {"bVisible": false,"aTargets": [17]},
            {"bVisible": false,"aTargets": [18]},
            {"bVisible": false,"aTargets": [19]},
            {"bVisible": false,"aTargets": [22]},
            {"bVisible": false,"aTargets": [23]}
            //{"aTargets": [2], // o numero 2 é o nº da coluna
            //"mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
            //      return full[2] + '\n' +full[3] + '\n' +full[4] ;
            //}
            //}
        ],
        buttons: [ {extend:'excel',title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Casos Coqueluche-IAL-SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Casos Coqueluche - IAL - SINAN',header: 'Coqueluche IAL-SINAN',filename:'Coqueluche-IAL-SINAN',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ]
    } );

    var table = $('#list-adm-sanitaria').DataTable({responsive: {details: {display: $.fn.dataTable.Responsive.display.modal({header: function (row) {var data = row.data();
                        return 'Detalhes : ' + data[1];}}),renderer: function ( api, rowIdx, columns ) {var data = $.map( columns, function ( col, i ) {
                    return '<tr>'+'<td>'+col.title+':'+'</td> '+'<td>'+col.data+'</td>'+'</tr>';} ).join('');
                    return $('<table/>').append( data ); } } },
        "language": {"sEmptyTable": "Nenhum registro encontrado","sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)","sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado","sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
            "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"}},
        "lengthMenu": [[3, 10, 25, 50, -1], [3, 10, 25, 50, "Todos"]],
        "aoColumnDefs": [
            {"bVisible": false,"aTargets": [15]},
            {"bVisible": false,"aTargets": [16]},
            {"bVisible": false,"aTargets": [17]},
            {"bVisible": false,"aTargets": [18]},
            {
                "aTargets": [1], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="menu-principal.php?pag=edit-prot-sanitaria&id=' + full[0] + '" role="button" class="btn btn-warning rounded-circle"><span class="glyphicon glyphicon-pencil"></a>';
                }
            }
        ],
        dom: "lBfrtip",processing: true, serverside: true, ajax: 'form-system/sanitaria/list/proc-list-sanitaria/list-adm-sanitaria.php',
        buttons: [ {extend:'excel',title:'Controle de Documentos Sanitária',header: 'Controle de Documentos Sanitária',filename:'Controle de Documentos Sanitária',className: 'btn btn-success',text:'<span class="fa fa-file-excel-o"></span>' },
            {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'Controle de Documentos Sanitária',header: 'Controle de Documentos Sanitária',filename:'Controle de Documentos Sanitária',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-danger',text:'<span class="fa fa-file-pdf-o"></span>'},
            {extend:'print', exportOptions: {columns: ':visible'},title:'Controle de Documentos Sanitária',header: 'Controle de Documentos Sanitária',filename:'Controle de Documentos Sanitária',className: 'btn btn-default',text:'<span class="fa fa-print"></span>'},
            {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-info',text:'<span class="fa fa-list"></span>'} ],
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="17" bgcolor="#99e699">'+group+'</td></tr>'
                    );
                    last = group;
                }
            } );
        }
    } );

    // Order by the grouping
    $('#list-adm-sanitaria tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[2];
        if ( currentOrder[2] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
});


