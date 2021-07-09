<?php
error_reporting(-1); // Tratando erros da classe

// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');

$ano_atual = date('Y'); // CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$ano_anterior = $ano_atual - 1;

$get_year = isset($_GET['year']) ? $_GET['year'] : $ano_atual;
$get_pag = isset($_GET['pag']) ? $_GET['pag'] : ''; // Recebe o ano de listagem se existir
$get_lixeira = isset($_GET['lixeira']) ? $_GET['lixeira'] : 0; // Recebe o termo de pesquisar se existir
$get_agravo = isset($_GET['agravo']) ? $_GET['agravo'] : ''; // Recebe o ano de listagem se existir
$get_id = isset($_GET['id']) ? $_GET['id'] : ''; // Recebe o termo de pesquisar se existir
$get_hash = isset($_GET['session']) ? $_GET['session'] : ''; // Recebe o termo de pesquisar se existir

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
$nameform = isset($pags->name_form) ? $pags->name_form : 'JAÇANÃ-CONTROLE';

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

    // Function para capturar ip do usuário
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

// Variável para chamar classe Tables
$tables = new Tables();