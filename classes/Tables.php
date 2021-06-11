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

$sql = 'SELECT id, name_pag, name_form, caminho, tabela, unidade FROM pag_system WHERE name_pag = :name_pag';
$stm = $conexao->prepare($sql);
$stm->bindValue(':name_pag', $get_pag);
$stm->execute();
$retorno = $stm->execute();
$pags = $stm->fetch(PDO::FETCH_OBJ);

$nametabela = isset($pags->tabela) ? $pags->tabela : '';
$nameform = isset($pags->name_form) ? $pags->name_form : 'SISDAMWEB';

$stm = null;

class Tables {

    public function Table($get_year,$ano_atual,$get_pag, $nametabela) {
        if(!empty($get_pag)):
            if (!empty(is_numeric($get_year)) && $get_year == $ano_atual):
                return $nametabela;
            else:
                return $nametabela.'_' .$get_year;
            endif;
        endif;

    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function listphp($tabela, $get_lixeira, $get_pag, $conexaotable) {

            if(!empty($get_pag)):
                $sql = "SELECT * FROM $tabela WHERE lixeira=:lixeira";
                $stm = $conexaotable->prepare($sql);
                $stm->bindValue(':lixeira', $get_lixeira);
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            endif;
    }

    public function ListServer($get_year, $nametabela, $get_pag, $tabela, $get_lixeira) {
        if(!empty($get_pag)):
            return 'sistema/lista_serverside/proc-list-'.$nametabela.'.php?tabela='.$tabela.'&year='.$get_year.'&getlixeira='.$get_lixeira;
        endif;
    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function BancoAtual($createccz, $createsinan, $get_year, $ano_atual, $get_lixeira) {
        if ($get_lixeira === 1):
                return '<div class="bd-callout text-center text-secondary"><strong><a href="http://sinan.saude.gov.br/sinan/login/login.jsf" class="link-secondary" target="_blank">DengueOnLine</a> de</strong> : ' .date("d/m/Y", strtotime($createsinan)). ' <strong> às </strong>'
                    .date("H:i:s", strtotime($createsinan)) . ' - <strong><a href="https://matrixbi.matrixsaude.com/labzoo_xview_mx/che-login.aspx?ReturnUrl=%2flabzoo_xview_mx%2fcon-pagina-inicial.aspx" class="link-secondary" target="_blank">Resultados de Exame CCZ</a> de </strong> : '
                    .date("d/m/Y", strtotime($createccz)) . '<strong> às </strong>' .date("H:i:s", strtotime($createccz)) . '</div>';
            elseif ($get_year === $ano_atual):
                return '<div class="bd-callout text-center text-primary"><strong><a href="http://sinan.saude.gov.br/sinan/login/login.jsf" class="link-primary" target="_blank">DengueOnLine</a> de</strong> : ' .date("d/m/Y", strtotime($createsinan)). ' <strong> às </strong>'
                    .date("H:i:s", strtotime($createsinan)) . ' - <strong><a href="https://matrixbi.matrixsaude.com/labzoo_xview_mx/che-login.aspx?ReturnUrl=%2flabzoo_xview_mx%2fcon-pagina-inicial.aspx" class="link-primary" target="_blank">Resultados de Exame CCZ</a> de </strong> : '
                    .date("d/m/Y", strtotime($createccz)) . '<strong> às </strong>' .date("H:i:s", strtotime($createccz)) . '</div>';
        else:
            return '<div class="bd-callout text-center text-danger"><strong><a href="http://sinan.saude.gov.br/sinan/login/login.jsf" class="link-danger" target="_blank">DengueOnLine</a> de</strong> : ' .date("d/m/Y", strtotime($createsinan)). ' <strong> às </strong>'
                .date("H:i:s", strtotime($createsinan)) . ' - <strong><a href="https://matrixbi.matrixsaude.com/labzoo_xview_mx/che-login.aspx?ReturnUrl=%2flabzoo_xview_mx%2fcon-pagina-inicial.aspx" class="link-danger" target="_blank">Resultados de Exame CCZ</a> de </strong> : '
                .date("d/m/Y", strtotime($createccz)) . '<strong> às </strong>' .date("H:i:s", strtotime($createccz)) . '</div>';
        endif;
    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function CountLixeira($tabela, $get_pag, $conexaotable) {

        if(!empty($get_pag)):
            //Selecionar todos os casos da tabela
            $sql = "SELECT lixeira FROM $tabela WHERE lixeira=1";
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
    function NumRowsLixeira($tabela, $get_pag, $conexaotable) {

        if (!empty($get_pag)):
            //Selecionar todos os casos da tabela
            $sql = "SELECT lixeira FROM $tabela WHERE lixeira=1";
            $stm = $conexaotable->prepare($sql);
            $stm->execute(); //Contar o total de registros
            //Contar o total de registros
            return $stm->rowCount();
        endif;
        }


    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function countLixeiraAedes($tabela, $tabelasinan, $conexaotable, $get_pag) {

        if(!empty($get_pag)):
            $sql = "SELECT lixeira FROM $tabela INNER JOIN $tabelasinan ON $tabela.nu_sinan = $tabelasinan.NU_NOTIFIC  WHERE lixeira=1";
            $stm = $conexaotable->prepare($sql);
            $stm->execute(); //Contar o total de registros
            //Contar o total de registros
            $sqlcountlixo = $stm->rowCount();

            if ($sqlcountlixo >= 1) :
                return $sqlcountlixo;
            else :
                return 'VAZIA';
            endif;
        endif;

    }

    /*Função para consultar a tabela do bd e após gera a senha de hash*/
    function SemRegistro($tabela, $get_pag, $get_year, $ano_atual) {

        // Inicia a conexao
        if(!empty(is_numeric($get_year)) && $get_year > 2015 && $get_year < $ano_atual):
            $conexao = conexao::getInstanceArquive();
        else:
            $conexao = conexao::getInstance();
        endif;

        if(!empty($get_pag)):
                return $conexao->query("SELECT COUNT(1) FROM $tabela")->fetchColumn();
        endif;

        $sqlcountlixo = null;
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

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }



}

/* Chamada de classe de formulário e classe de botões */
$tables = new Tables();