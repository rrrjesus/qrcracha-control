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


    $("#cadastro_usuario").validate({
        rules: {
            nome: {
                required: true,
                ascento: true,
                remote: "remote/admin/val-nome-cad.php"
            },
            email: {
                required: true,
                remote: "remote/admin/val-email-cad.php"
            },
            login: {
                required: true
            },
            senha: {
                required: true,
                valsenha: true
            },
            nivel_de_acesso: {
                required: true
            },
            status: {
                require: true
            }
        },
        messages: {
            nome: {
                required:"Digite um nome !!!",
                ascento: "Retire ascentos, ç e caracteres",
                remote:"Nome já cadastrado, digite outro nome."
            },
            email: {
                required: "Digite um email !!!",
                remote: "Email já cadastrado,digite outro contato."
            },
            login: {
                required: "Digite um usuario !!!"
            },
            senha: {
                required: "Digite uma senha !!!",
                valsenha: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
            },
            nivel_de_acesso: {
                required: "Selecione Administrativo ou Usuário."
            },
            status: {
                require: "Selecione Ativo ou Inativo"
            }
        }
    });

    $("#edicao_usuario").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            email: {
                required: true
            },
            login: {
                required: true
            },
            senha: {
                required: true,
                valsenha: true
            },
            nivel_de_acesso: {
                required: true
            }
        },
        messages: {
            nome: {
                required:"Digite um nome !!!",
                ascento: "Retire ascentos, ç e caracteres"
            },
            email: {
                required: "Digite um contato !!!"
            },
            login: {
                required: "Digite um usuario !!!"
            },
            senha: {
                required: "Digite uma senha !!!",
                valsenha: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
            },
            nivel_de_acesso: {
                required: "Selecione Administrativo ou Usuário."
            }
        }
    });

    $("#edicao_perfil").validate({
        rules: {
            nome: {
                required: true,
                ascento: true
            },
            email: {
                required: true
            }
        },
        messages: {
            nome: {
                required: "Digite um nome !!!",
                ascento: "Retire ascentos, ç e caracteres"
            },
            email: {
                required: "Digite um contato válido !!!"
            }
        }
    });

    $("#edicao_senha").validate({
        rules: {
            senhaatual: {
                required: true,
                valsenha: true,
                remote: "remote/admin/val-senha.php"
            },
            senhanova1: {
                required: true,
                valsenha: true
            },
            senhanova2: {
                required: true,
                valsenha: true,
                equalTo: "#senhanova1"
            }
        },
        messages: {
            senhaatual: {
                required: "Digite Sua Senha Atual",
                valsenha: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere",
                remote: "Senha Atual Não Confere"
            },
            senhanova1: {
                required: "Digite uma Nova Senha",
                valsenha: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
            },
            senhanova2: {
                required: "Repita a Nova Senha",
                valsenha: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere",
                equalTo: "Nova Senha e Conf. de Senha não Conferem"
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

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}


