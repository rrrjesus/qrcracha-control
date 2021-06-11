/**
 * Created by Rodolfo on 09/06/2017.
 */
$(document).ready(function(){
    $("input[name='rua']").blur(function(){
        var $cep = $("input[name='cep']");
        var $log = $("input[name='log']");
        var $bairro = $("input[name='bairro']");
        var $da = $("input[name='da']");
        var $setor = $("input[name='setor']");
        var $pgguia = $("input[name='pgguia']");
        var $localvd = $("input[name='localvd']");
        var $atual = $("input[name='atual']");
        var $latitude = $("input[name='latitude']");
        var $longitude = $("input[name='longitude']");
        var $idrua = $("input[name='idrua']");
        var $ruagoogle = $("input[name='ruagoogle']");
        var $ruagoogle1 = $("input[name='ruagoogle1']");

        $cep.val('Carregando...');
        $log.val('Carregando...');
        $bairro.val('Carregando...');
        $da.val('Carregando...');
        $setor.val('Carregando...');
        $pgguia.val('Carregando...');
        $localvd.val('Carregando...');
        $atual.val('Carregando...');
        $ruagoogle.val('Carregando...');
        $ruagoogle1.val('Carregando...');

        $.getJSON(
            'sistema/autocomplete-end.php',
            { rua: $( this ).val() },
            function( json )
            {
                $cep.val( json.cep );
                $log.val( json.log );
                $bairro.val( json.bairro );
                $da.val( json.da );
                $setor.val( json.setor );
                $pgguia.val( json.pgguia );
                $localvd.val( json.localvd );
                $atual.val( json.atual );
                $latitude.val( json.latitude );
                $longitude.val( json.longitude );
                $idrua.val( json.idrua );
                $ruagoogle.val( json.ruagoogle );
                $ruagoogle1.val( json.ruagoogle );
            }
        );
    });
});

