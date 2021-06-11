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
        return this.optional(element) || /^[a-zA-Z0123456789-\s]+$/i.test(value);
    });

    $("#cadastro_contato").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            sobrenome: {
                ascento: true
            },
            prefixo: {
                ascento: true
            },
            sufixo: {
                required: true,
                ascento: true
            },

            tel1: {
                required: true,
                remote: "remote/valida_tel_contato.php"
            }
         },
        messages: {
            nome: {
                required: "Digite o Nome",
                ascento: "Retire ascentos, ç e caracteres"
            },
            sobrenome: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            prefixo: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            sufixo: {
                required: "Digite o Sufixo",
                ascento: "Retire ascentos, ç e caracteres"
            },
            tel1: {
                required: "Digite o Telefone",
                remote: "Tel já Cadastrado"
            }
        }


    });

    $("#edicao_contato").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            sobrenome: {
                ascento: true
            },
            prefixo: {
                ascento: true
            },
            sufixo: {
                required: true,
                ascento: true
            },
            tel1: {
                required: true
            }
        },

        messages: {
            nome: {
                required: "Digite o Nome",
                ascento: "Retire ascentos, ç e caracteres"
            },
            sobrenome: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            prefixo: {
                ascento: "Retire ascentos, ç e caracteres"
            },
            sufixo: {
                required: "Digite o Sufixo",
                ascento: "Retire ascentos, ç e caracteres"
            },
            tel1: {
                required: "Digite o Telefone"
            }
        }
    });

    });
});

function marcardesmarcar(){
    $('.marcar').each(
        function(){
            if ($(this).prop( "checked"))
                $(this).prop("checked", false);
            else $(this).prop("checked", true);
        }
    );
}

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}


