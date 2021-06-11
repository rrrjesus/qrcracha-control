/**
 * Created by Rodolfo on 09/06/2017.
 */
$.datepicker._attachments = function(input, inst) {
    var appendText = $.datepicker._get(inst, "appendText");
    var isRTL = $.datepicker._get(inst, "isRTL");

    if (inst.append) {
        inst.append.remove();
    }
    if (appendText) {
        inst.append = $('<span class="' + $.datepicker._appendClass + '">' + appendText + "</span>");
        input[isRTL ? "before" : "after"](inst.append);
    }
    input.unbind("focus", $.datepicker._showDatepicker);
    if (inst.trigger) {
        inst.trigger.remove();
    }
    var showOn = $.datepicker._get(inst, "showOn");
    if (showOn == "focus" || showOn == "both") {
        input.focus($.datepicker._showDatepicker);
    }
    if (showOn == "button" || showOn == "both") {
        var buttonText = $.datepicker._get(inst, "buttonText");
        var buttonImage = $.datepicker._get(inst, "buttonImage");
        inst.trigger = $($.datepicker._get(inst,"buttonImageOnly") ? $("<img/>")
            .addClass($.datepicker._triggerClass).attr({
                src : buttonImage,
                alt : buttonText,
                title : buttonText
            })
            : $('<button type="button"></button>')
                .addClass($.datepicker._triggerClass)
                .html('<span class="ui-button-icon-left ui-icon ui-icon-calendar"></span><span class="ui-button-text">ui-button</span>'));
        input[isRTL ? "before" : "after"](inst.trigger);
        inst.trigger.click(function() {
            if ($.datepicker._datepickerShowing
                && $.datepicker._lastInput == input[0]) {
                $.datepicker._hideDatepicker();
            } else {
                $.datepicker._showDatepicker(input[0]);
            }
            return false;
        });

        input.bind('focus', function(e) {
            if (!$.datepicker._datepickerShowing) {
                inst.trigger.trigger('click');
            }
        });

        input.bind('click', function(e) {
            input.trigger('focus');
        });
    }
};


$.datepicker._selectDate = function(id, dateStr) {
    var target = $(id);
    var inst = $.datepicker._getInst(target[0]);
    dateStr = (dateStr != null ? dateStr : $.datepicker._formatDate(inst));
    if (inst.input) {
        inst.input.val(dateStr);
    }
    $.datepicker._updateAlternate(inst);
    var onSelect = $.datepicker._get(inst, "onSelect");
    if (onSelect) {
        onSelect.apply((inst.input ? inst.input[0]
            : null), [ dateStr, inst ]);
    } else {
        if (inst.input) {
            inst.input.trigger("change");
        }
    }
    if (inst.inline) {
        $.datepicker._updateDatepicker(inst);
    } else {
        if ($.datepicker._datepickerShowing) {
            inst.input.select();
        }
        setTimeout("$.datepicker._hideDatepicker()", 10);

        $.datepicker._lastInput = inst.input[0];
        $.datepicker._lastInput = null;
    }
};

( function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "../widgets/datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}( function( datepicker ) {

    datepicker.regional[ "pt-BR" ] = {
        closeText: "Fechar",
        prevText: "&#x3C;Anterior",
        nextText: "Próximo&#x3E;",
        currentText: "Hoje",
        monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
            "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
        monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
            "Jul","Ago","Set","Out","Nov","Dez" ],
        dayNames: [
            "Domingo",
            "Segunda-feira",
            "Terça-feira",
            "Quarta-feira",
            "Quinta-feira",
            "Sexta-feira",
            "Sábado"
        ],
        dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        weekHeader: "Sm",
        dateFormat: "dd/mm/yy",
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" };
    datepicker.setDefaults( datepicker.regional[ "pt-BR" ] );

    return datepicker.regional[ "pt-BR" ];

} ) );
