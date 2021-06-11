/**
 * Created by rodol on 22/07/2017.
 */
$(document).ready(function() {
    $('#list-sv2').DataTable({
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
        processing: true,
        serverside: true,
        ajax: 'form-system/list/proc-list-system/list-sv2.php',
        "lengthMenu": [[6, 10, 25, 50, -1], [6, 10, 25, 50, "Todos"]],
        "aoColumnDefs": [
            {
                /*"bSearchable": false,
                 "bVisible": false,*/
                "aTargets": [0] // aqui é a coluna do id como é a primeira é 0
            },
            {
                "aTargets": [14], // o numero 6 é o nº da coluna
                "mRender": function (data, type, full) { //aqui é uma funçãozinha para pegar os ids
                    return '<a href="suvisjt.php?pag=edit-sv2-suvis&id=' + full[0] + '"><button type="button" class="btn btn-warning btn-circle"><span class="glyphicon glyphicon-pencil"></button></a>';
                }
            }
        ]
    });
});

var editor; // Use um global para enviar e retornar a renderização de dados nos exemplos

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
            label: "First name:", /*First name:*/
            name: "first_name"    /*first_name*/
        }, {
            label: "Last name:", /**/
            name: "last_name"   /**/
        }, {
            label: "Position:", /**/
            name: "position"    /**/
        }, {
            label: "Office:",   /**/
            name: "office"  /**/
        }, {
            label: "Extension:",    /**/
            name: "extn"    /**/
        }, {
            label: "Start date:",   /**/
            name: "start_date", /**/
            type: 'datetime'    /**/
        }, {
            label: "Salary:",   /**/
            name: "salary"  /**/
        }
        ]
    } );

    var table = $('#example').DataTable( {
        lengthChange: false,
        ajax: "../php/staff.php",
        columns: [
            { data: null, render: function ( data, type, row ) {
                // Combine o primeiro e último nome em um único campo de tabela
                return data.first_name+' '+data.last_name;
            } },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        select: true
    } );

    // Display the buttons
    new $.fn.dataTable.Buttons( table, [
        { extend: "create", editor: editor },
        { extend: "edit",   editor: editor },
        { extend: "remove", editor: editor }
    ] );

    table.buttons().container()
        .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
} );