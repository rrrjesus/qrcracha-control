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

        $.validator.addMethod('strongPassword', function(value, element) {
            return this.optional(element)
                || value.length >= 6
                && /\d/.test(value)
                && /[a-z]/i.test(value);
        }, 'Sua senha deve ter pelo menos 6 caracteres e conter pelo menos um número e um caractere.');

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
            var curDateE = $('#datanascimento').datepicker("getDate");
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

        // Datepicker datanot para contar data atual
        $('#datanascimento').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });


        $("#user").validate({
            rules: {
                nome: {
                    required: true,
                    ascento: true
                },
                sobrenome: {
                    required: true,
                    ascento: true
                },
                datanascimento: {
                    required: true,
                    dateBR: true,
                    maxDateE: true
                },
                cpf: {
                    required: true
                },
                email: {
                    required: true,
                    remote: "remote/admin/val-email-cad.php"
                },
                login: {
                    required: true,
                    remote: "remote/admin/val-login-cad.php"
                },
                senha: {
                    required: true,
                    strongPassword: true
                },
                telefone: {
                    required:true
                },
                celular: {
                    required:true
                },
                sexouser: {
                    required: true
                }

            },
            messages: {
                nome: {
                    required:"Digite um Nome !!!",
                    ascento: "Retire ascentos, ç e caracteres"
                },
                sobrenome: {
                    required:"Digite um SobreNome !!!",
                    ascento: "Retire ascentos, ç e caracteres"
                },
                datanascimento: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje"
                },
                cpf: {
                    required: "Digite o CPF válido"
                },
                email: {
                    required: "Digite um email !!!",
                    remote: "Esse email já esta cadastrado em outro usuário !!!"
                },
                login: {
                    required: "Digite um usuario !!!",
                    remote: "Esse login já esta cadastrado em outro usuário !!!"
                },
                senha: {
                    required: "Digite uma senha !!!",
                    strongPassword: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
                },
                telefone: {
                    required: "Digite um telefone"
                },
                celular: {
                    required: "Digite um telefone"
                },
                sexouser: {
                    required: "Digite o sexo"
                }

            }
        });

        $("#edit_user").validate({
            rules: {
                nome: {
                    required: true,
                    ascento: true
                },
                sobrenome: {
                    required: true,
                    ascento: true
                },
                datanascimento: {
                    required: true,
                    dateBR: true,
                    maxDateE: true
                },
                cpf: {
                    required: true
                },
                email: {
                    required: true
                },
                login: {
                    required: true
                },
                senha: {
                    required: true,
                    strongPassword: true
                },
                telefone: {
                    required:true
                },
                celular: {
                    required:true
                },
                sexouser: {
                    required: true
                }

            },
            messages: {
                nome: {
                    required:"Digite um Nome !!!",
                    ascento: "Retire ascentos, ç e caracteres"
                },
                sobrenome: {
                    required:"Digite um SobreNome !!!",
                    ascento: "Retire ascentos, ç e caracteres"
                },
                datanascimento: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje"
                },
                cpf: {
                    required: "Digite o CPF válido"
                },
                email: {
                    required: "Digite um email !!!"
                },
                login: {
                    required: "Digite um usuario !!!"
                },
                senha: {
                    required: "Digite uma senha !!!",
                    strongPassword: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
                },
                telefone: {
                    required: "Digite um telefone"
                },
                celular: {
                    required: "Digite um telefone"
                },
                sexouser: {
                    required: "Digite o sexo"
                }

            }
        });

        $("#edicao_senhas").validate({
            rules: {
                senhas: {
                    required: true,
                    strongPassword: true
                },
                novasenhas: {
                    required: true,
                    strongPassword: true,
                    equalTo: "#senhas"
                }
            },
            messages: {
                senhas: {
                    required: "Digite uma Nova Senha",
                    strongPassword: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere"
                },
                novasenhas: {
                    required: "Repita a Nova Senha",
                    strongPassword: "Sua senha deve ter no mínimo 6 caracteres e conter pelo menos um número e um caractere",
                    equalTo: "As senhas não Conferem !!!"
                }

            }
        });

        $("#head-login").validate({
            rules: {
                login: {
                    required: true
                },
                senha: {
                    required: true,
                    strongPassword: true
                }
            },
            messages: {
                login: {
                    required: "Digite seu usuário"
                },
                senha: {
                    required: "Digite sua Senha",
                    strongPassword: "Sua senha cadastrada contém no mínimo 6 caracteres, entre eles números e caracteres"
                }

            }
        });


    });
});

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}