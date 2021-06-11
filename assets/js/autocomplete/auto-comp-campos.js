/**
 * Created by sms on 09/06/2017.
 */
$(document).ready(function() {
    $('input.typeahead-devs').typeahead({
        name: 'accounts',
        local: ['SUNDAY', 'Monday', 'Tuesday','Wednesday','Thursday','Friday','Saturday']
    });

    $('input.testerapido').typeahead({
        name: 'testerapido',
        local: ['Reagente', 'Nao Reagente', 'Exame Nao Realizado']
    });

    $('input.unientrada').typeahead({
        name: 'unientrada',
        remote : 'autocomp/unientrada-auto.php?query=%QUERY'
    });

    $('input.suvis').typeahead({
        name: 'suvis',
        remote : 'autocomp/suvis-auto.php?query=%QUERY'
    });

    $('input.da').typeahead({
        name: 'da',
        remote : 'autocomp/da-auto.php?query=%QUERY'
    });

    $('input.tipo').typeahead({
        name: 'tipo',
        remote : 'autocomp/tipo-auto.php?query=%QUERY'
    });

    $('input.tipotid').typeahead({
        name: 'tipotid',
        remote : 'autocomp/tipotid-auto.php?query=%QUERY'
    });

    $('input.assuntotid').typeahead({
        name: 'assuntotid',
        remote : 'autocomp/assuntotid-auto.php?query=%QUERY'
    });

    $('input.setor').typeahead({
        name: 'setor',
        remote : 'autocomp/setor-auto.php?query=%QUERY'
    });

    $('input.ubs').typeahead({
        name: 'ubs',
        remote : 'autocomp/ubs-auto.php?query=%QUERY'
    });

    $('input.localvd').typeahead({
        name: 'localvd',
        remote : 'autocomp/localate-auto.php?query=%QUERY'
    });

    $('input.cidade').typeahead({
        name: 'cidade',
        remote : 'autocomp/cidade-auto.php?query=%QUERY'
    });

    $('input.log').typeahead({
        name: 'log',
        remote : 'autocomp/log-auto.php?query=%QUERY'
    });

    $('input.rua').typeahead({
        name: 'rua',
        remote : 'autocomp/rua-auto.php?query=%QUERY'
    });

    $('input.nomecad').typeahead({
        name: 'nomecad',
        remote : 'autocomp/nomecad-auto.php?query=%QUERY'

    });

    $('input.resptid').typeahead({
        name: 'resptid',
        remote : 'autocomp/resptid-auto.php?query=%QUERY'
    });

    $('input.unidestino').typeahead({
        name: 'unidestino',
        remote : 'autocomp/unidestino-auto.php?query=%QUERY'
    });

    $('input.orgorigem').typeahead({
        name: 'orgorigem',
        remote : 'autocomp/orgorigem-auto.php?query=%QUERY'
    });

    $('input.uniorigem').typeahead({
        name: 'uniorigem',
        remote : 'autocomp/uniorigem-auto.php?query=%QUERY'
    });

    $('input.agravo').typeahead({
        name: 'agravo',
        remote : 'autocomp/agravo-comum-auto.php?query=%QUERY'
    });

    $('input.agravosurto').typeahead({
        name: 'agravosurto',
        remote : 'autocomp/agravo-surto-auto.php?query=%QUERY'

    });
    $('input.agravosiva').typeahead({
        name: 'agravosiva',
        remote : 'autocomp/agravo-siva-auto.php?query=%QUERY'

    });
    $('input.agravocovid').typeahead({
        name: 'agravocovid',
        local: ['COVID-19', 'COVID-19 (SURTO)']
    });
    $('input.localate').typeahead({
        name: 'localate',
        remote : 'autocomp/localate-auto.php?query=%QUERY'

    });
    $('input.ocorrencia').typeahead({
        name: 'ocorrencia',
        remote : 'autocomp/ocorrencia-auto.php?query=%QUERY'

    });
    $('input.material').typeahead({
        name: 'material',
        remote : 'autocomp/material-auto.php?query=%QUERY'

    });
    $('input.especificacao').typeahead({
        name: 'especificacao',
        remote : 'autocomp/pe-ie-auto.php?query=%QUERY'

    });
    $('input.verifica_memo').typeahead({
        name: 'verifica_memo',
        remote : 'autocomp/verifica_memo-auto.php?query=%QUERY'

    });
    $('input.tipoagravo').typeahead({
        name: 'tipoagravo',
        remote : 'autocomp/tipo-agravo-auto.php?query=%QUERY'

    });
    $('input.status').typeahead({
        name: 'status',
        local: ['ATIVO', 'INATIVO']
    });
    $('input.tid').typeahead({
        name: 'tid',
        local: ['SIM', 'NAO']
    });
    $('input.nivel_de_acesso').typeahead({
        name: 'nivel_de_acesso',
        local: ['ADMINISTRADOR', 'AVANÇADO', 'USUÁRIO', 'VISITANTE']
    });
});

