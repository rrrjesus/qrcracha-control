<?php
error_reporting(-1);

date_default_timezone_set('America/Sao_Paulo'); // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
$ano_atual = date('Y'); // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$ano_anterior = $ano_atual - 1;

$get_year = isset($_GET['year']) ? $_GET['year'] : $ano_atual;
$get_pag = isset($_GET['pag']) ? $_GET['pag'] : ''; // Recebe o ano de listagem se existir
$get_lixeira = isset($_GET['lixeira']) ? $_GET['lixeira'] : 0; // Recebe o termo de pesquisar se existir
$get_agravo = isset($_GET['agravo']) ? $_GET['agravo'] : ''; // Recebe o ano de listagem se existir
$get_id = isset($_GET['id']) ? $_GET['id'] : ''; // Recebe o termo de pesquisar se existir
$get_hash = isset($_GET['session']) ? $_GET['session'] : ''; // Recebe o termo de pesquisar se existir
$get_sv2 = isset($_GET['sv2']) ? $_GET['sv2'] : 'suvis'; // Recebe o termo de pesquisar se existir
$get_livro = isset($_GET['livro']) ? $_GET['livro'] : ''; // Recebe o termo de pesquisar se existir

if(!empty(is_numeric($get_year)) && $get_year > 2015 && $get_year < $ano_atual):
    $conexaotable = conexao::getInstanceArquive();
else:
    $conexaotable = conexao::getInstance();
endif;

$conexao = conexao::getInstance();

$sql = 'SELECT id, name_pag, name_form, tabela, tabelasinan, tabelaexameccz, tabelaexameial, caminho, unidade FROM pag_system WHERE name_pag = :name_pag';
$stm = $conexao->prepare($sql);
$stm->bindValue(':name_pag', $get_pag);
$stm->execute();
$retorno = $stm->execute();
$pags = $stm->fetch(PDO::FETCH_OBJ);

$nametabela = isset($pags->tabela) ? $pags->tabela : '';
$nametabelaarq = $nametabela.'_'.$get_year;
$nametabelasinan = isset($pags->tabelasinan) ? $pags->tabelasinan : '';
$nametabelasinanarq = $nametabelasinan.'_'.$get_year;
$nametabelaexameccz = isset($pags->tabelaexameccz) ? $pags->tabelaexameccz : '';
$nametabelaexameial = isset($pags->tabelaexameial) ? $pags->tabelaexameial : '';
$nametabelaexamecczarq = $nametabelaexameccz.'_'.$get_year;
$nametabelaexameialarq = $nametabelaexameial.'_'.$get_year;
$nameform = isset($pags->name_form) ? $pags->name_form : 'SISDAMWEB';

if($get_year > 2015 && $get_year < $ano_atual):
$sqlsinan = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$nametabelasinanarq' ORDER BY `CREATE_TIME` DESC LIMIT 1";
$sqlccz = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$nametabelaexamecczarq' ORDER BY `CREATE_TIME` DESC LIMIT 1";
else:
$sqlsinan = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$nametabelasinan' ORDER BY `CREATE_TIME` DESC LIMIT 1";
$sqlccz = "SELECT CREATE_TIME FROM information_schema.tables WHERE TABLE_NAME = '$nametabelaexameccz' ORDER BY `CREATE_TIME` DESC LIMIT 1";
endif;

$stm = $conexaotable->prepare($sqlsinan);
$stm->execute();
$row_sinan = $stm->fetch(PDO::FETCH_OBJ);
$createsinan = $row_sinan->CREATE_TIME ?? '';

$stms = $conexaotable->prepare($sqlccz);
$stms->execute();
$row_ccz = $stms->fetch(PDO::FETCH_OBJ);
$createccz = $row_ccz->CREATE_TIME ?? '';

$stm = null;

class Sv2 {

    public function ListServerSv2($get_year, $nametabela, $get_pag, $tabela, $get_livro, $get_lixeira) {
        if(!empty($get_pag)):
            return 'sistema/lista_serverside/proc-list-'.$nametabela.'.php?tabela='.$tabela.'&year='.$get_year.'&livro='.$get_livro.'&getlixeira='.$get_lixeira;
        endif;
    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function CountLixeiraSv2($tabela, $get_pag, $conexaotable, $get_livro) {

        if(!empty($get_pag)):
            //Selecionar todos os casos da tabela
            if($get_livro === 'covid'):
                $sql = "SELECT lixeira FROM $tabela WHERE agravo LIKE 'COVID-19%' AND lixeira=1";
            else:
                $sql = "SELECT lixeira FROM $tabela WHERE agravo NOT LIKE 'COVID-19%' AND lixeira=1";
            endif;
            $stm = $conexaotable->prepare($sql);
            $stm->execute(); //Contar o total de registros
            //Contar o total de registros
            $sqlcountlixo = $stm->rowCount();

                if ($sqlcountlixo >= 1) :
                    return $sqlcountlixo;
                else :
                    return $sqlcountlixo = 'VAZIA';
                endif;
        endif;

        $sqlcountlixo = null;

    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function SemRegistroSv2($tabela, $get_pag, $get_year, $ano_atual, $get_livro) {

        // Inicia a conexao
        if(!empty(is_numeric($get_year)) && $get_year > 2015 && $get_year < $ano_atual):
            $conexao = conexao::getInstanceArquive();
        else:
            $conexao = conexao::getInstance();
        endif;

        if(!empty($get_pag)):
            if($get_livro === 'covid'):
                return $conexao->query("SELECT COUNT(1) FROM $tabela WHERE agravo LIKE 'COVID-19%'")->fetchColumn();
            else:
                return $conexao->query("SELECT COUNT(1) FROM $tabela WHERE agravo NOT LIKE 'COVID-19%'")->fetchColumn();
            endif;
        endif;
    }

    public function NameFormSv2($get_sv2, $get_pag) {
        if ($get_sv2 === 'suvis'):
            return $get_pag;
        elseif ($get_sv2 === 'covid'):
            return $get_pag.'_covid';
        elseif ($get_sv2 === 'covid-outros'):
            return $get_pag.'_covid_outros';
        elseif ($get_sv2 === 'outros'):
            return $get_pag.'_outros';
        elseif ($get_sv2 === 'siva'):
            return $get_pag.'_siva';
        elseif ($get_sv2 === 'siva-outros'):
            return $get_pag.'_siva_outros';
        elseif ($get_sv2 === 'surto'):
            return $get_pag.'_surto';
        else:
            return $get_pag;
        endif;
    }

    public function ReadonlySv2($get_sv2) {
        // Captura $_GET php sobre agravo para bloquear preenchimento dos
        // campos "cep, log, bairro, ubs ref, atual?, uvis, cidade e da"
        // através do recurso html5 "readonly"

        if ($get_sv2 === 'suvis'):
            return 'readonly';
        elseif ($get_sv2 === 'covid'):
            return 'readonly';
        elseif ($get_sv2 === 'siva'):
            return 'readonly';
        elseif ($get_sv2 === 'surto'):
            return 'readonly';
        else:
            return '';
        endif;
    }

    public function ReadonlySinanSv2($get_sv2) {
        // Captura $_GET php sobre agravo para bloquear preenchimento do
        // campo "sinan" através do recurso html5 "readonly"

        if ($get_sv2 === 'siva'):
            return 'readonly';
        elseif ($get_sv2 === 'siva-outros'):
            return 'readonly';
        else:
            return '';
        endif;
    }

    public function HeaderListSv2($get_sv2, $pag_system, $get_year, $get_lixeira, $hashprimary) {
        if (!empty($get_sv2 === 'covid') && $get_lixeira == 1):
            return header("Location: $pag_system?pag=lista_sv2&livro=covid&lixeira=1&year=$get_year&session=$hashprimary");
        elseif (!empty($get_sv2 === 'covid-outros')  && $get_lixeira == 1):
            return header("Location: $pag_system?pag=lista_sv2&livro=covid&lixeira=1&year=$get_year&session=$hashprimary");
        elseif (!empty($get_sv2 === 'covid')):
            return header("Location: $pag_system?pag=lista_sv2&livro=covid&year=$get_year&session=$hashprimary");
        elseif (!empty($get_sv2 === 'covid-outros')):
            return header("Location: $pag_system?pag=lista_sv2&livro=covid&year=$get_year&session=$hashprimary");
        elseif (!empty($get_lixeira == 1)):
            return header("Location: $pag_system?pag=lista_sv2&lixeira=1&year=$get_year&session=$hashprimary");
        else:
            return header("Location: $pag_system?pag=lista_sv2&year=$get_year&session=$hashprimary");
        endif;
    }

    public function AgravoSinanSv2($get_sv2) {
        // Habilita busca autocomplete com a função Javascript "Typehead"
        // -> https://twitter.github.io/typeahead.js/examples/

        if ($get_sv2 === 'siva'):
            return 'agravosiva';
        elseif ($get_sv2 === 'siva-outros'):
            return 'agravosiva';
        elseif ($get_sv2 === 'surto'):
            return 'agravosurto';
        elseif ($get_sv2 === 'covid'):
            return 'agravocovid';
        elseif ($get_sv2 === 'covid-outros'):
            return 'agravocovid';
        else:
            return 'agravo';
        endif;
    }

    public function RuaSv2Edit($get_sv2, $rua) {
        if ($get_sv2 === 'suvis'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="'.$rua.'">';
        elseif ($get_sv2 === 'covid'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="'.$rua.'">';
        elseif ($get_sv2 === 'siva'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="'.$rua.'">';
        elseif ($get_sv2 === 'surto'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)" value="'.$rua.'">';
        else:
            return '<input type="text" class="form-control form-control-sm" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." name="rua" placeholder="NOME DO ENDEREÇO"
                        onchange="upperCaseF(this)" value="'.$rua.'">';
        endif;
    }

    public function RuaSv2($get_sv2) {
        if ($get_sv2 === 'suvis'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)">';
        elseif ($get_sv2 === 'covid'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)">';
        elseif ($get_sv2 === 'siva'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)">';
        elseif ($get_sv2 === 'surto'):
            return '<input type="text" tabindex="11" class="form-control form-control-sm rua" name="rua" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." id="ruaselect"
                       placeholder="NOME DO ENDEREÇO" onchange="upperCaseF(this)">';
        else:
            return '<input type="text" class="form-control form-control-sm" data-toggle="tooltip" title="Ex: Francisco Rodrigues ..." name="ruaoutros" placeholder="NOME DO ENDEREÇO"
                        onchange="upperCaseF(this)">';
        endif;
    }


    public function BtnListLixeiraSv2($usuarioniveldeacesso,$get_lixeira, $get_year, $get_pag, $nu_lixeira, $pag_system, $get_livro, $hashprimary) {
        if ($usuarioniveldeacesso === '1'):
            if ($get_lixeira === 0 && $get_livro === 'covid'):
                return '<a href="'.$pag_system .'?pag='.$get_pag.'&livro=covid&year='.$get_year.'&lixeira=1&session='.$hashprimary.'" role="button" accesskey="L" class="btn btn-outline-dark btn-sm fw-bold mb-3"
                        data-toggle="tooltip" data-placement="bottom" title="LIXEIRA"><i class="fa fa-trash-o px-2"></i><u>L</u>IXO <span class="badge rounded-pill bg-danger">' . $nu_lixeira . '</a>';
            elseif ($get_lixeira === 0 && $get_livro === ''):
                return '<a href="'.$pag_system .'?pag='.$get_pag.'&year='.$get_year.'&lixeira=1&session='.$hashprimary.'" role="button" accesskey="L" class="btn btn-outline-secondary btn-sm fw-bold mb-3"
                    data-toggle="tooltip" data-placement="bottom" title="LIXEIRA"><i class="fa fa-trash-o px-2"></i><u>L</u>IXO <span class="badge rounded-pill bg-danger">' . $nu_lixeira . '</a>';
            elseif($get_lixeira == 1 && $get_livro === 'covid'):
                return '<a href="' . $pag_system . '?pag='.$get_pag.'&livro=covid&year='.$get_year.'&session='.$hashprimary.'" accesskey="S" role="button" class="btn btn-outline-danger btn-sm fw-bold mb-3"><i class="fa fa-arrow-circle-o-left px-2"></i><u>S</u>AIR</a>';
            elseif($get_lixeira == 1 && $get_livro === ''):
                return '<a href="' . $pag_system . '?pag='.$get_pag.'&year='.$get_year.'&session='.$hashprimary.'" accesskey="S" role="button" class="btn btn-outline-danger btn-sm fw-bold mb-3"><i class="fa fa-arrow-circle-o-left px-2"></i><u>S</u>AIR</a>';
            endif;
        endif;
    }

    public function BtnCadListSv2($get_year, $ano_atual, $usuarioid, $pag_system, $get_pag, $get_livro, $hashprimary) {

        $cadastro = substr($get_pag, 6);

        if(!empty($get_pag)):
            if ($get_year === $ano_atual && $usuarioid > 1 && $get_livro === 'covid') :
                return '<a href = "'.$pag_system.'?pag=cadastro_'.$cadastro.'&sv2=covid&year='.$ano_atual.'&session='.$hashprimary.'" type = "button" class="btn btn-outline-success btn-sm fw-bold mb-3 me-3"
                accesskey="N" data-toggle="tooltip" data-placement="bottom" title="CADASTRAR"><i class="far fa-plus-circle px-2"></i><u>N</u>OVO</a>';
            elseif ($get_year === $ano_atual - 1 && $usuarioid > 1 && $get_pag === 'lista_sv2') :
                return '<a href = "'.$pag_system.'?pag=cadastro_'.$cadastro.'&sv2=suvis&year='.$get_year.'&session='.$hashprimary.'" type = "button" class="btn btn-outline-success btn-sm fw-bold mb-3 me-3"
            accesskey="N" data-toggle="tooltip" data-placement="bottom" title="CADASTRAR"><i class="far fa-plus-circle px-2"></i><u>N</u>OVO</a>';
            else:
                return '<a href = "'.$pag_system.'?pag=cadastro_'.$cadastro.'&sv2=suvis&year='.$ano_atual.'&session='.$hashprimary.'" type = "button" class="btn btn-outline-success btn-sm fw-bold mb-3 me-3"
            accesskey="N" data-toggle="tooltip" data-placement="bottom" title="CADASTRAR"><i class="far fa-plus-circle px-2"></i><u>N</u>OVO</a>';
            endif;
        endif;
    }



}

/* Chamada de classe de formulário e classe de botões */
$sv2s = new Sv2();