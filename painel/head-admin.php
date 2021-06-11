<?php
include_once '../conexao.php';
$year = isset($_GET['year']) ? $_GET['year'] : $today = date("Y");

$id_system = 1;

$conexao = conexao::getInstance();
$sqlsystem = 'SELECT id, description, author, title, icon, sistema, versao, direitos, desenvolvedor, email_contato, ano, pag_principal, unidade_name FROM config_system WHERE id = :id';
$stmsystem = $conexao->prepare($sqlsystem);
$stmsystem->bindValue(':id', $id_system);
$stmsystem->execute();
$systemfetch = $stmsystem->fetch(PDO::FETCH_OBJ);

$pag_principal = $systemfetch->pag_principal;

?>

<!--<head>-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?=$systemfetch->description?>">
<meta name="author" content="<?=$systemfetch->author?>">
<link rel="icon" href="<?='../'.$systemfetch->icon?>">

<title><?=$systemfetch->title?></title>

<!-- Bootstrap core CSS -->
<link href="../assets/css/bootstrap5/bootstrap.min.css" rel="stylesheet">

<link href="../assets/css/docs.css" rel="stylesheet">

<!-- CSS para sidebar painel -->
<link rel="stylesheet" href="../assets/css/headers.css">

<!-- CSS para campos de autocomplete -->
<link rel="stylesheet" href="../assets/css/typeahead.css" type="text/css"/>
<!-- CSS Jquery que estiliza o calendário entre outros -->
<link rel="stylesheet" href="../assets/css/jquery-ui.css">

<link href="../assets/css/docs.min.css " rel="stylesheet">

<!-- CSS Bootstrap 4 Datatables disponível em : https://cdn.datatables.net/-->
<link rel="stylesheet" href="../assets/css/datables/dataTables.bootstrap5.min.css"> <!-- Bootstrap 5 -->

<!-- Datatables Bootstrap 4 Responsive-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

<!-- Bootstrap 5 Buttons Datatables-->
<link rel="stylesheet" href="../assets/css/datables/buttons.bootstrap5.min.css"> <!-- Bootstrap 5 -->

<!-- Datatables Bootstrap 4 Agrupando lista em lista - V Sanitária-->
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.bootstrap4.min.css"> <!-- Bootstrap 4 -->

<!-- CSS para o navbar multilevel dropdown Bootstrap 4-->
<!--<link href="dist/css/navbar-multi-level.css" rel="stylesheet">-->

<!-- CSS para Fontes Customizadas Bootstrap 4 -->
<link href="../assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/eade24dc97.js" crossorigin="anonymous"></script>

<!-- SmartMenus jQuery Bootstrap 4 Addon CSS -->
<link href="../assets/css/jquery.smartmenus.bootstrap-4.css" rel="stylesheet">

<!-- Aqui iniciamos o carregamento de arquivos JS-->

<!-- JS Biblioteca Jquery slim min js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!--Chamada Autocomplete e carregamento de listas-->
<script type="text/javascript" src="../assets/js/jquery/jquery.js"></script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhlslumr1saHPVEJHkzPssYLEsWZJQQKU&libraries=places"></script> <!-- Key Maps Google -->

<!-- Validações de Formularios -->
<script type="text/javascript" src="../assets/js/jquery/validation/val-admin.js"></script>
<script type="text/javascript" src="../assets/js/jquery/validation/val_usuario.js"></script>
<script type="text/javascript" src="../assets/js/typeahead.js"></script>
<script src="../assets/js/docs.min.js"></script>
<!--Javascript Datatable & validation-->
<script type="text/javascript" src="../assets/js/jquery/validation/1.15.0.jquery.validate.min.js"></script>

<!-- Datatables Bootstrap 4 JS disponível em https://cdn.datatables.net/-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script> <!-- Bootstrap 4-->
<script type="text/javascript" language="javascript" src="../assets/js/dataTables/bootstrap/responsive.bootstrap4.min.js"></script> <!-- Bootstrap 4-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="../assets/js/dataTables/bootstrap/buttons.bootstrap5.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script> <!-- Bootstrap 5-->
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> <!-- Bootstrap 5 (Esse é novo 29/03/2021-->
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> <!-- Bootstrap 5 (Esse é novo 29/03/2021-->
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> <!-- Bootstrap 5 (Esse é novo 29/03/2021-->

<!-- Bootstrap 4 Agrupando registros V Sanitária -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>

<script>
    $(document).ready(function () {
        /* Atribui ao evento change do input FILE para upload da foto*/
        var inputFile = document.getElementById("foto");
        var foto_cliente = document.getElementById("foto-cliente");
        if (inputFile != null && inputFile.addEventListener) {
            inputFile.addEventListener("change", function(){loadFoto(this, foto_cliente)});
        } else if (inputFile != null && inputFile.attachEvent) {
            inputFile.attachEvent("onchange", function(){loadFoto(this, foto_cliente)});
        }


        /* Função para exibir a imagem selecionada no input file na tag <img>  */
        function loadFoto(file, img){
            if (file.files && file.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
    });
</script>

<!-- JS para controle de horas https://momentjs.com -->
<script type="text/javascript" language="javascript"
        src="../assets/js/dataTables/moment.min.js"></script>

<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<!-- Fim do JS Datatables-->


<!--Chamada autocomplete - Validation e Maps (jquery-ui.js, jquery-ui.custom.min.js e js/jquery/jquery.countdown.min.js)
    -->
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="../assets/js/autocomplete/auto-comp-endereco.js"></script>
<script type="text/javascript" src="../assets/js/autocomplete/auto-comp-se.js"></script>
<script type="text/javascript" src="../assets/js/autocomplete/auto-comp-campos.js"></script>
<script type="text/javascript" class="init" src="../assets/js/dataTables/lists/admin.js"></script>
<script type="text/javascript" class="init" src="../assets/js/dataTables/lists/system.js"></script>
<script type="text/javascript" class="init" src="../assets/js/dataTables/lists/system-arq.js"></script>
<script type="text/javascript" class="init" src="../assets/js/dataTables/lists/system-ambiental.js"></script>
<script type="text/javascript" class="init" src="../assets/js/dataTables/date-de.js"></script>
<script type="text/javascript" class="init" src="../assets/js/maps/maps-end.js"></script>
<script type="text/javascript" class="init" src="../assets/js/maps/maps-cad.js"></script>
<script type="text/javascript" class="init" src="../assets/js/maps/maps-dengue.js"></script>

<script type="text/javascript" class="init" src="../assets/js/mask.js"></script>

<!-- Calendário em : https://api.jqueryui.com/datepicker/ -->
<script type="text/javascript" src="../assets/js/calendario.js"></script>


<!--</head>-->