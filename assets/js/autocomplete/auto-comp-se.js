/**
 * Created by Rodolfo on 09/06/2017.
 */
$(document).ready(function(){
    $("input[name='dataentrada']").blur(function(){
        var $se = $("input[name='se']");

        $se.val('Carregando...');

        $.getJSON(
            'sistema/autocomplete-se.php',
            { dataentrada: $( this ).val() },
            function( json )
            {
                $se.val( json.se );
            }
        );
    });
});