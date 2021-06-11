$(function() {
    $(document).ready(function () {
        $.validator.setDefaults({
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },

            // errorElement: 'span',
            errorClass: 'help-block',

            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }
                else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
                    error.insertAfter(element.parent().parent());
                }
                else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.appendTo(element.parent().parent());
                }
                else if (element.prop('type') === 'password') {
                    error.appendTo(element.parent());
                }
                else if (element.prop('type') === 'file') {
                    error.appendTo(element.parent());
                }
                if (element.parent('select').length) {
                    error.insertAfter(element.parent());
                }
                else {
                    error.insertAfter(element);
                }
            }
        });

    $.validator.addMethod('ascento', function(value, element) {
        return this.optional(element) || /^[a-zA-Z0123456789Çç()/ºª.-\s]+$/i.test(value);
    });

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element)
            || value.length >= 6
            && /\d/.test(value)
            && /[a-z]/i.test(value);
    }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')


    /*            Uma Opção   */
    $.validator.addMethod("dateBR", function (value, element) {
        //contando chars
        if (value.length != 10) return (this.optional(element) || false);
        // verificando data
        var data = value;
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
        if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
        if (mes < 1) return (this.optional(element) || false);
        if (ano < 1900) return (this.optional(element) || false);
        return (this.optional(element) || true);
    }, "Informe uma data válida");

        // Datepicker datanot para contar data atual
        $('#datatid').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanot para contar data atual
        $('#datatram').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

// Validation method dataentrada para comparar com data atual
        $.validator.addMethod("maxDateT", function(e) {
            var curDateT = $('#datatid').datepicker("getDate");
            var maxDateT = new Date();
            maxDateT.setDate(maxDateT.getDate());
            maxDateT.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateT, maxDateT);
            if (curDateT > maxDateT) {
                $(this).datepicker("setDate", maxDateT);
                return false;
            }
            return true;
        });

        // Validation method dataentrada para comparar com data atual
        $.validator.addMethod("maxDateTram", function(e) {
            var curDateTram = $('#datatram').datepicker("getDate");
            var maxDateTram = new Date();
            maxDateTram.setDate(maxDateTram.getDate());
            maxDateTram.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
            console.log(this.value, curDateTram, maxDateTram);
            if (curDateTram > maxDateTram) {
                $(this).datepicker("setDate", maxDateTram);
                return false;
            }
            return true;
        });


    $("#cad-tid").validate({
            rules: {
                datatid: {
                    required: true,
                    dateBR: true,
                    maxDateT: true
                },
                ntid: {
                    required: true,
                    remote: "remote/tid/val-ntid.php"
                },
                tipotid: {
                    required: true,
                    remote: "remote/tid/val-tipotid.php"
                },
                unientrada:{
                    required: true,
                    remote: "remote/tid/val-unientrada.php"
                },
                identificaotid: {
                    required: true,
                    minlength: 2
                },
                orgorigem:{
                    required: true
                },
                uniorigem:{
                    required: true
                },
                assuntotid: {
                    required: true
                },
                descricaotid: {
                    required: true,
                    minlength: 2
                },
                unidestino:{
                    required: true
                },
                datatram: {
                    required: true,
                    dateBR: true,
                    maxDateTram: true
                },
                resptid: {
                    required: true,
                    ascento: true
                }

            },
            messages: {
                datatid: {
                    required: "Digite uma data",
                    dateBR: "Data Inválida",
                    maxDateT: "Digite uma data até hoje"
                },
                ntid: {
                    required: "Digite um Nº TID",
                    remote: "Em Duplicidade"
                },
                tipotid: {
                    required: "Digite um tipo de documento",
                    remote: "Tipo não encontrado"
                },
                unientrada:{
                    required: "Digite um Setor de Entrada",
                    remote: "Setor não encontrado"
                },
                identificacaotid: {
                    required: "Digite uma Identificação",
                    minlength: "Identificação Incompleta"
                },
                orgorigem:{
                    required: "Digite um Órgão de Origem"
                },
                uniorigem:{
                    required: "Digite uma Unidade de Origem"
                },
                assuntotid: {
                    required: "Digite um assunto"
                },
                descricaotid: {
                    required: "Digite uma Descrição",
                    minlength: "Descrição Incompleta"
                },
                unidestino:{
                    required: "Unidade não encontrada"
                },
                datatram: {
                    required: "Digite uma data",
                    dateBR: "Data Inválida",
                    maxDateTram: "Digite uma data até hoje"
                },
                resptid: {
                    required: "Digite um Nome",
                    ascento: "Retire ç e ascentos"
                }
            }
        });

        $("#edit-tid").validate({
            rules: {
                datatid: {
                    required: true,
                    dateBR: true,
                    maxDateT: true
                },
                ntid: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
                },
                tipotid: {
                    required: true,
                    remote: "remote/tid/val-tipotid.php"
                },
                unientrada:{
                    required: true,
                    remote: "remote/tid/val-unientrada.php"
                },
                identificaotid: {
                    required: true,
                    minlength: 2
                },
                orgorigem:{
                    required: true
                },
                uniorigem:{
                    required: true
                },
                assuntotid: {
                    required: true
                },
                descricaotid: {
                    required: true,
                    minlength: 2
                },
                unidestino:{
                    required: true
                },
                datatram: {
                    required: true,
                    dateBR: true,
                    maxDateTram: true
                },
                resptid: {
                    required: true,
                    ascento: true
                }

            },
            messages: {
                datatid: {
                    required: "Digite uma data",
                    dateBR: "Data Inválida",
                    maxDateT: "Digite uma data até hoje"
                },
                ntid: {
                    required: "Digite um Nº TID",
                    minlength: "Nº de TID Incompleto",
                    maxlength: "Nº de TID Incompleto"
                },
                tipotid: {
                    required: "Digite um tipo de documento",
                    remote: "Tipo não encontrado"
                },
                unientrada:{
                    required: "Digite um Setor de Entrada",
                    remote: "Setor não encontrado"
                },
                identificacaotid: {
                    required: "Digite uma Identificação",
                    minlength: "Identificação Incompleta"
                },
                orgorigem:{
                    required: "Digite um Órgão de Origem"
                },
                uniorigem:{
                    required: "Digite uma Unidade de Origem"
                },
                assuntotid: {
                    required: "Digite um assunto"
                },
                descricaotid: {
                    required: "Digite uma Descrição",
                    minlength: "Descrição Incompleta"
                },
                unidestino:{
                    required: "Digite uma Unidade de Destino"
                },
                datatram: {
                    required: "Digite uma data",
                    dateBR: "Data Inválida",
                    maxDateTram: "Digite uma data até hoje"
                },
                resptid: {
                    required: "Digite um Nome"
                    ascento: "Retire ç e ascentos"
                }
            }
        });
    });
});







