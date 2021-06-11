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
        }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.');

        $.validator.addMethod('ascento', function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        });


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


        // Datepicker dataentrada para contar data atual
        $('#dataentcad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanot para contar data atual
        $('#datanotcad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanot para contar data atual
        $('#dataobitocad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker datanasc para contar data atual
        $('#datanasccad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        });

        // Datepicker data1sicad para contar data atual
        $('#data1sincad').datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0",
            onClose: function() {$(this).valid();},
        })//.datepicker("setDate", new Date()); (opcional para imprimir data no formulario ao iniciar

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

// Validation method datanot para comparar com data atual
        $.validator.addMethod("maxDateN", function(e) {
            var curDateN = $('#datanotcad').datepicker("getDate");
            var maxDateN = new Date();
            maxDateN.setDate(maxDateN.getDate());
            maxDateN.setHours(0, 0, 0, 0); // clear time portion for correct results
            console.log(this.value, curDateN, maxDateN);
            if (curDateN > maxDateN) {
                $(this).datepicker("setDate", maxDateN);
                return false;
            }
            return true;
        });

        $.validator.addMethod("maxDateO", function(e) {
            var curDateN = $('#dataobitocad').datepicker("getDate");
            var maxDateN = new Date();
            maxDateN.setDate(maxDateN.getDate());
            maxDateN.setHours(0, 0, 0, 0); // clear time portion for correct results
            console.log(this.value, curDateN, maxDateN);
            if (curDateN > maxDateN) {
                $(this).datepicker("setDate", maxDateN);
                return false;
            }
            return true;
        });

        // Validation method datanot para comparar com data atual
        $.validator.addMethod("maxDate1S", function(e) {
            var curDateS = $('#data1sincad').datepicker("getDate");
            var maxDateS = new Date();
            maxDateS.setDate(maxDateS.getDate());
            maxDateS.setHours(0, 0, 0, 0); // clear time portion for correct results
            console.log(this.value, curDateS, maxDateS);
            if (curDateS > maxDateS) {
                $(this).datepicker("setDate", maxDateS);
                return false;
            }
            return true;
        });

        // Validation method data1Sintomas não pode ser maior que data entrada
        $.validator.addMethod("validaSintE", function(e) {
            var curDateSE = $('#data1sincad').datepicker("getDate");
            var maxDateSE = $('#datanotcad').datepicker("getDate");
            console.log(this.value, curDateSE, maxDateSE);
            if (curDateSE > maxDateSE) {
                return false;
            }
            return true;
        });

        // Validation method dataNasc não pode ser maior que data entrada
        $.validator.addMethod("validaNascN", function(e) {
            var curDateSE = $('#datanasccad').datepicker("getDate");
            var maxDateSE = $('#datanotcad').datepicker("getDate");
            console.log(this.value, curDateSE, maxDateSE);
            if (curDateSE > maxDateSE) {
                return false;
            }
            return true;
        });

        // Validation method dataEntrada não pode ser maior que data notificação
        $.validator.addMethod("validaEntN", function(e) {
            var curDateEN = $('#dataentcad').datepicker("getDate");
            var maxDateEN = $('#datanotcad').datepicker("getDate");
            console.log(this.value, curDateEN, maxDateEN);
            if (maxDateEN > curDateEN) {
                return false;
            }
            return true;
        });

        function idade(nascimento, hoje) {
            var diferencaAnos = hoje.getFullYear() - nascimento.getFullYear();
            if ( new Date(hoje.getFullYear(), hoje.getMonth(), hoje.getDate()) <
                new Date(hoje.getFullYear(), nascimento.getMonth(), nascimento.getDate()) )
                diferencaAnos--;
            return diferencaAnos;
        }

        $("#cadastro_sv2").validate({
            rules: {
                sinan: {
                    required: true,
                    rangelength: [5, 7]
                },
                datanot: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                nome: {
                    required: true,
                    minlength: 1,
                    ascento: true
                },
                sexo: {
                    required: true,
                    remote: "remote/sv2/val-sexo.php"
                },
                idade: {
                    remote: "remote/sv2/val-idade.php"
                },
                agravo: {
                    required: true,
                    remote: "remote/sv2/val-agravocomum.php"
                },
                dataentrada: {
                    required: true,
                    dateBR: true,
                    maxDateE: true,
                    validaEntN : true
                },
                localate: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-localate.php"
                },
                tel: {
                    maxlength:15
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true,
                    maxlength:9
                },
                log: {
                    required: true,
                    minlength: 3
                },
                rua: {
                    required: false,
                    minlength: 1,
                    remote: "remote/sv2/val-rua.php"
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                suvis: {
                    required: true,
                    minlength: 1
                },
                localvd: {
                    required: true,
                    minlength: 3
                },
                cidade: {
                    required: true,
                    minlength: 3
                },
                dataobito: {
                    dateBR: true,
                    maxDateO: true
                }
            },
            messages: {
                sinan: {
                    required:"Digite um Sinan válido",
                    rangelength:"Min 5 e Máx de 7 numeros"
                },
                datanot: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nome: {
                    required: "Digite o nome",
                    minlength: "",
                    ascento: "Retire ascentos, ç e caracteres"
                },
                idade: {
                    remote: "Idade inválida"
                },
                agravo: {
                    required: "Informe o agravo notificado",
                    remote: "Agravo não encontrado"
                },
                sexo: {
                    required: "Digite o sexo",
                    remote: "F , M ou I"
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje",
                    validaEntN : "Não pode ser menor que Data de Notificação"
                },
                localate: {
                    required: "Digite a unidade de atendimento",
                    minlength: "Digite uma unidade válida",
                    remote :"Local  não encontrado !!!"
                },
                tel: {
                    maxlength: "Formato (00)00000-0000"
                },
                num: {
                    required: "Digite o número",
                    minlength: "Digite um número ou S/N"
                },
                cep: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um cep válido"
                },
                log: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um logradouro válido"
                },
                rua: {
                    required: "Digite o endereço",
                    minlength: "",
                    remote :"Endereço  não encontrado !!!"
                },
                bairro: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um bairro válido"
                },
                suvis: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite uma suvis válida"
                },
                localvd: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um local de vd válido"
                },
                cidade: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite uma cidade válida"
                },
                dataobito: {
                    dateBR: "Informe uma data válida",
                    maxDateO: "Digite a data até hoje"
                }
            }
        });

        $("#edicao_sv2").validate({
            rules: {
                sinan: {
                    required: true,
                    rangelength: [5, 7]
                },
                datanot: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                nome: {
                    required: true,
                    minlength: 1
                },
                idade: {
                    remote: "remote/sv2/val-idade.php"
                },
                agravo: {
                    required: true,
                    remote: "remote/sv2/val-agravocomum.php"
                },
                sexo: {
                    required: true,
                    remote: "remote/sv2/val-sexo.php"
                },
                dataentrada: {
                    required: true,
                    dateBR: true,
                    maxDateE: true,
                    validaEntN : true
                },
                localate: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-localate.php"
                },
                tel: {
                    maxlength:15
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true,
                    maxlength:9
                },
                log: {
                    required: true,
                    minlength: 3
                },
                rua: {
                    required: true,
                    minlength: 1,
                    remote:"remote/sv2/val-rua.php"
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                suvis: {
                    required: true,
                    minlength: 1
                },
                localvd: {
                    required: true,
                    minlength: 3
                },
                cidade: {
                    required: true,
                    minlength: 3
                },
                dataobito: {
                    dateBR: true,
                    maxDateO: true
                }
            },
            messages: {
                sinan: {
                    required:"Digite um Sinan válido",
                    rangelength:"Min 5 e Máx de 7 numeros"
                },
                datanot: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nome: {
                    required: "Digite o nome",
                    minlength: ""
                },
                idade: {
                    remote: "Idade invalida"
                },
                agravo: {
                    required: "Informe o agravo notificado",
                    remote: "Agravo não encontrado"
                },
                sexo: {
                    required: "Digite o sexo",
                    remote: "F , M ou I"
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje",
                    validaEntN : "Não pode ser menor que Data de Notificação"
                },
                localate: {
                    required: "Digite a unidade de atendimento",
                    minlength: "Digite uma unidade válida",
                    remote :"Local  não encontrado !!!"
                },
                tel: {
                    maxlength: "Formato (00)00000-0000"
                },
                num: {
                    required: "Digite o número",
                    minlength: "Digite um número ou S/N"
                },
                cep: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um cep válido"
                },
                log: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um logradouro válido"
                },
                rua: {
                    required: "Digite o endereço",
                    minlength: "",
                    remote :"Endereço  não encontrado !!!"
                },
                bairro: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um bairro válido"
                },
                suvis: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite uma suvis válida"
                },
                localvd: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite um local de vd válido"
                },
                cidade: {
                    required: "Digite um endereço válido !!!",
                    minlength: "Digite uma cidade válida"
                },
                dataobito: {
                    dateBR: "Informe uma data válida",
                    maxDateO: "Digite a data até hoje"
                }
            }
        });

        $("#cadastro_sv2_outros").validate({
            rules: {
                sinan: {
                    required: true,
                    rangelength: [5, 7]
                },
                datanot: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                nome: {
                    required: true,
                    minlength: 1
                },
                idade: {
                    remote: "remote/sv2/val-idade.php"
                },
                agravo: {
                    required: true,
                    remote: "remote/sv2/val-agravocomum.php"
                },
                sexo: {
                    required: true,
                    remote: "remote/sv2/val-sexo.php"
                },
                dataentrada: {
                    required: true,
                    dateBR: true,
                    maxDateE: true,
                    validaEntN : true
                },
                localate: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-localate.php"
                },
                tel: {
                    maxlength:15
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true,
                    maxlength:9
                },
                log: {
                    required: true,
                    minlength: 3,
                    remote: "remote/sv2/val-log.php"
                },
                ruaoutros: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-rua-outros.php"
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                suvis: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-suvis.php"
                },
                localvd: {
                    required: true,
                    minlength: 3
                },
                cidade: {
                    required: true,
                    minlength: 3,
                    remote: "remote/sv2/val-cidade.php"
                },
                dataobito: {
                    dateBR: true,
                    maxDateO: true
                }
            },
            messages: {
                sinan: {
                    required:"Digite um Sinan válido",
                    rangelength:"Min 5 e Máx de 7 numeros"
                },
                datanot: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nome: {
                    required: "Digite o nome",
                    minlength: ""
                },
                idade: {
                    remote: "Idade inválida"
                },
                agravo: {
                    required: "Informe o agravo notificado",
                    remote: "Agravo não encontrado"
                },
                sexo: {
                    required: "Digite o sexo",
                    remote: "F , M ou I"
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje",
                    validaEntN : "Não pode ser menor que Data de Notificação"
                },
                localate: {
                    required: "Digite a unidade de atendimento",
                    minlength: "Digite uma unidade válida",
                    remote :"Local  não encontrado !!!"
                },
                tel: {
                    maxlength: "Formato (00)00000-0000"
                },
                num: {
                    required: "Digite o número",
                    minlength: "Digite um número ou S/N"
                },
                cep: {
                    required: "Digite o cep",
                    minlength: "Digite um cep válido"
                },
                log: {
                    required: "Digite o Logradouro",
                    minlength: "Digite um logradouro válido",
                    remote :"Logradouro não encontrado !!!"
                },
                ruaoutros: {
                    required: "Digite o endereço",
                    minlength: "",
                    remote: "Edite com uma rua fora da área de abrangência da Suvis Jaçanã-Tremembé"
                },
                bairro: {
                    required: "Digite o bairro",
                    minlength: "Digite um bairro válido"
                },
                suvis: {
                    required: "Digite a suvis",
                    minlength: "Digite uma suvis válida",
                    remote:"Digite uma Suvis válida ou OUTROS"
                },
                localvd: {
                    required: "Digite o local da vd",
                    minlength: "Digite um local de vd válido"
                },
                cidade: {
                    required: "Digite a cidade",
                    minlength: "Digite uma cidade válida",
                    remote: "Cidade não encontrada"
                },
                dataobito: {
                    dateBR: "Informe uma data válida",
                    maxDateO: "Digite a data até hoje"
                }
            }
        });

        $("#edicao_sv2_outros").validate({
            rules: {
                sinan: {
                    required: true,
                    rangelength: [5, 7]
                },
                datanot: {
                    required: true,
                    dateBR: true,
                    maxDateN: true
                },
                nome: {
                    required: true,
                    minlength: 1
                },
                idade: {
                    remote: "remote/sv2/val-idade.php"
                },
                agravo: {
                    required: true,
                    remote: "remote/sv2/val-agravocomum.php"
                },
                sexo: {
                    required: true,
                    remote: "remote/sv2/val-sexo.php"
                },
                dataentrada: {
                    required: true,
                    dateBR: true,
                    maxDateE: true,
                    validaEntN : true
                },
                localate: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-localate.php"
                },
                tel: {
                    maxlength:15
                },
                num: {
                    required: true,
                    minlength: 1
                },
                cep: {
                    required: true,
                    maxlength:9
                },
                log: {
                    required: true,
                    minlength: 3,
                    remote: "remote/sv2/val-log.php"
                },
                ruaoutros: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-rua-outros.php"
                },
                bairro: {
                    required: true,
                    minlength: 3
                },
                suvis: {
                    required: true,
                    minlength: 1,
                    remote: "remote/sv2/val-suvis.php"
                },
                localvd: {
                    required: true,
                    minlength: 3
                },
                cidade: {
                    required: true,
                    minlength: 3,
                    remote: "remote/sv2/val-cidade.php"
                },
                dataobito: {
                    dateBR: true,
                    maxDateO: true
                }
            },
            messages: {
                sinan: {
                    required:"Digite um Sinan válido",
                    rangelength:"Min 5 e Máx de 7 numeros"
                },
                datanot: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateN: "Digite a data até hoje"
                },
                nome: {
                    required: "Digite o nome",
                    minlength: ""
                },
                idade: {
                    remote: "Idade inválida"
                },
                agravo: {
                    required: "Informe o agravo notificado",
                    remote: "Agravo não encontrado"
                },
                sexo: {
                    required: "Digite o sexo",
                    remote: "F , M ou I"
                },
                dataentrada: {
                    required:"Digite uma data válida",
                    dateBR: "Informe uma data válida",
                    maxDateE: "Digite a data até hoje",
                    validaEntN : "Não pode ser menor que Data de Notificação"
                },
                localate: {
                    required: "Digite a unidade de atendimento",
                    minlength: "Digite uma unidade válida",
                    remote :"Local  não encontrado !!!"
                },
                tel: {
                    maxlength: "Formato (00)00000-0000"
                },
                num: {
                    required: "Digite o número",
                    minlength: "Digite um número ou S/N"
                },
                cep: {
                    required: "Digite o cep",
                    minlength: "Digite um cep válido"
                },
                log: {
                    required: "Digite o Logradouro",
                    minlength: "Digite um logradouro válido",
                    remote :"Logradouro não encontrado !!!"
                },
                ruaoutros: {
                    required: "Digite o endereço",
                    minlength: "",
                    remote: "Edite com uma rua fora da área de abrangência da Suvis Jaçanã-Tremembé"
                },
                bairro: {
                    required: "Digite o bairro",
                    minlength: "Digite um bairro válido"
                },
                suvis: {
                    required: "Digite a suvis",
                    minlength: "Digite uma suvis válida",
                    remote:"Digite uma Suvis válida ou OUTROS"
                },
                localvd: {
                    required: "Digite o local da vd",
                    minlength: "Digite um local de vd válido"
                },
                cidade: {
                    required: "Digite a cidade",
                    minlength: "Digite uma cidade válida",
                    remote: "Cidade não encontrada"
                },
                dataobito: {
                    dateBR: "Informe uma data válida",
                    maxDateO: "Digite a data até hoje"
                }
            }
        });

    });
});