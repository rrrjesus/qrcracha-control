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
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    });

    $.validator.addMethod('valsenha', function(value, element) {
        return this.optional(element)
            || value.length >= 6
            && /\d/.test(value)
            && /[a-z]/i.test(value);
    }, 'Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere.');

    $.validator.addMethod('strongPassword', function(value, element) {
        return this.optional(element)
            || value.length >= 6
            && /\d/.test(value)
            && /[a-z]/i.test(value);
    }, 'Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere.');


    $("#novasenha").validate({
        rules: {
            email: {
                required: true,
                remote: "remote/admin/val-email-index.php"
            },
            inputSenha: {
                required: true,
                valsenha: true
            },
            inputNovaSenha: {
                required: true,
                valsenha: true,
                equalTo: "#inputSenha"
            }
        },
        messages: {
            email: {
                required: "Digite Seu Email Cadastrado",
                remote: "Email Não Encontrado"
            },
            inputSenha: {
                required: "Digite uma Nova Senha",
                valsenha: "Sua nova senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
            },
            inputNovaSenha: {
                required: "Repita a Nova Senha",
                valsenha: "Sua nova senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere",
                equalTo: "nova senha e repita nova senha não conferem"
            }
        }
    });

    $("#esqueci-senha").validate({
        rules: {
            email: {
                required: true,
                remote: "remote/admin/val-email-index.php"
            },
            senha: {
                required: true,
                strongPassword: true
            }
        },
        messages: {
            email: {
                required: "Digite seu email !!!",
                remote: "Email não encontrado !!!"
            },
            senha: {
                required: "Digite sua Senha !!!"
            }
        }
    });

    });
});

function c(id) {
    var letra = document.getElementById(id).value;
    letra = letra.split("");
    var tmp = "";
    for (i = 0; i < letra.length; i++) {
        if (letra[i - 1]) {
            if (letra[i - 1] == " " || letra[i - 1] == ".") {
                letra[i] = letra[i].replace(letra[i], letra[i].toUpperCase());
            }
        } else {
            letra[i] = letra[i].replace(letra[i], letra[i].toUpperCase());
        }
        tmp += letra[i];
    }
    document.getElementById(id).value = tmp;
}



