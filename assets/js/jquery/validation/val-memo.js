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
        return this.optional(element) || /^[a-zA-ZÇç()/ºª.-\s]+$/i.test(value);
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

// Validation method dataentrada para comparar com data atual
    $.validator.addMethod("maxDateE", function(e) {
        var curDateE = $('#dataentcad').datepicker("getDate");
        var maxDateE = new Date();
        maxDateE.setDate(maxDateE.getDate());
        maxDateE.setHours(0, 0, 0, 0); // parte do tempo claro para resultados corretos
        console.log(this.value, curDateE, maxDateE);
        if (curDateE > maxDateE) {
            $(this).datepicker("setDate", maxDateE);
            return false;
        }
        return true;
    });


    $("#cad-memo").validate({
        rules: {
            localdestino: {
                required: true,
                minlength: 2,
                ascento: true
            },
            tipo: {
                required: true,
                remote: "remote/memo-oficio/val-tipo.php"
            },
            nomememo: {
                required: true,
                remote: "remote/memo-oficio/val-nome.php",
                ascento: true
            },
            descricaomemo: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            localdestino: {
                required: "Digite um destino",
                minlength: "Insira um destino (Mínimo 2 caracteres)",
                ascento: "Retire ç e ascentos"
            },
            tipo: {
                required: "Digite um tipo de documento",
                remote: "Tipo não encontrado"
            },
            nomememo: {
                required: "Digite um Solicitante",
                remote: "Solicitante não encontrado",
                ascento: "Retire ç e ascentos"
            },
            descricaomemo: {
                required: "Digite uma descrição",
                minlength: "Insira uma descrição (Mínimo 2 caracteres)"
            }

        }
    });

    $("#edit-memo").validate({
        rules: {
            datamemo: {
                required: true
            },
            localdestino: {
                required: true,
                minlength: 2,
                ascento: true
            },
            tipo: {
                required: true,
                remote: "remote/memo-oficio/val-tipo.php"
            },
            nomememo: {
                required: true,
                remote: "remote/memo-oficio/val-nome.php",
                ascento: true
            },
            descricaomemo: {
                required: true,
                minlength: 2
            }
        },
        messages: {
            datamemo: {
                required:"Digite uma data válida"
            },
            localdestino: {
                required: "Digite um destino",
                minlength: "Insira um destino (Mínimo 2 caracteres)",
                ascento: "Retire ç e ascentos"
            },
            tipo: {
                required: "Digite um tipo de documento",
                remote: "Tipo não encontrado"
            },
            nomememo: {
                required: "Digite um Solicitante",
                remote: "Solicitante não encontrado",
                ascento: "Retire ç e ascentos"
            },
            descricaomemo: {
                required: "Digite uma descricão",
                minlength: "Insira uma descricão (Mínimo 2 caracteres)"
            }

        }


    });

    });
});







