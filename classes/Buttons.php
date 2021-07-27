<?php
error_reporting(-1); // Tratando erros da classe

// Verificações de usuários
$usuarioniveldeacesso = isset($_SESSION['usuarioNivelAcesso']) ? $_SESSION['usuarioNivelAcesso'] : 4;
$usuarioid = isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 1;

class Buttons extends Tables {

    public $title;
    public $namelist;

    /** Variaveis Utilizadas na Classe
     * @param $get_lixeira // retorna o $_GET da seleção de lista da lixeira (&lixeira=1 listar lixeira
     * @param $get_year // Retorna o ano recebido via $_GET
     * @param $ano_atual // Retorna o ano atual
     * @param $get_pag // Retorna a página
     * @param $pag_system // Retorna a página principal do sistema
     * @param $get_lixeira // Se retornado no $_GET como 1 exibe a lista da lixeira
     * @param $nu_lixeira // Retorna a contagem da lixeira
     * @param $nu_registro // Retorna a contagem de registros da tabela
     */

    /** Apenas traduções do datatable */
    public function language() {
            echo '"language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"} }';
    }

    /** Botões e icones do datatable
     * @param $nameform // Busca o nome do formulário
     * @param $system // Variável que exibe o nome do sistema
     */
    public function ButtonDataTable($nameform, $get_year, $system) {

        $i_excel = '<i class="fal fa-file-excel"></i>';
        $i_pdf = '<i class="fal fa-file-pdf"></i>';
        $i_print = '<i class="fal fa-print"></i>';
        $i_list = '<i class="fal fa-list"></i>';

        return "buttons: [ {extend:'excel',title:'$system - $nameform - $get_year',header: '$system - $nameform - $get_year',filename:'$system - $nameform - $get_year',className: 'btn btn-outline-success',text:'$i_excel' },
                {extend: 'pdfHtml5',exportOptions: {columns: ':visible'},title:'$system - $nameform - $get_year',header: '$system - $nameform - $get_year',filename:'$system - $nameform - $get_year',orientation: 'landscape',pageSize: 'LEGAL',className: 'btn btn-outline-danger',text:'$i_pdf'},
                {extend:'print', exportOptions: {columns: ':visible'},title:'$system - $nameform - $get_year',header: '$system - $nameform - $get_year',filename:'$system - $nameform - $get_year',orientation:'landscape',className: 'btn btn-outline-secondary',text:'$i_print'},
                {extend:'colvis',titleAttr: 'Select Colunas',className: 'btn btn-outline-primary',text:'$i_list'} ]";
    }

    /** Função para alertas do sistema */
    public function AlertSession() {

        /** @var msgsuccess $_SESSION */
        if (isset($_SESSION['msgsuccess'])) :
            echo $_SESSION['msgsuccess'];
            unset($_SESSION['msgsuccess']);
        endif;

        /** @var msgdanger $_SESSION */
        if (isset($_SESSION['msgdanger'])) :
            echo $_SESSION['msgdanger'];
            unset($_SESSION['msgdanger']);
        endif;

        /** @var msgwarning $_SESSION */
        if (isset($_SESSION['msgwarning'])) :
            echo $_SESSION['msgwarning'];
            unset($_SESSION['msgwarning']);
        endif;

        /** @var msgerro $_SESSION */
        if (isset($_SESSION['msgerro'])) :
            echo $_SESSION['msgerro'];
            unset($_SESSION['msgerro']);
        endif;

        /** @var msgedit $_SESSION */
        if (isset($_SESSION['msgedit'])) :
            echo $_SESSION['msgedit'];
            unset($_SESSION['msgedit']);
        endif;

        /** @var msgdel $_SESSION */
        if (isset($_SESSION['msgdel'])) :
            echo $_SESSION['msgdel'];
            unset($_SESSION['msgdel']);
        endif;
    }

    // Função para cores bootstrap 5 dos botões
    public function BtnColor($get_lixeira, $get_year, $ano_atual) {
        if ($get_lixeira == 1):
            return 'secondary';
        elseif($get_year < $ano_atual):
            return 'danger';
        elseif($get_year === $ano_atual):
            return 'primary';
        else:
            return 'success';
        endif;
    }

    /** Função css para algumas cores de botões */
    public function BtnColorStyle($get_lixeira, $get_year, $ano_atual) {
        if ($get_lixeira == 1):
            return '#6c757d';
        elseif($get_year < $ano_atual):
            return '#dc3545';
        elseif($get_year == $ano_atual):
            return '#0d6efd';
        else:
            return '#6c757d';
        endif;
    }

    // Função para icones do sistema
    public function FaList($get_lixeira, $get_year, $ano_atual) {
        if ($get_lixeira == 1):
            return 'trash-o';
        elseif ($get_year < $ano_atual):
            return 'list';
        else:
            return 'list';
        endif;
    }

    // Função para botão de lista de títulos
    public function BtnTitleList($get_pag, $get_year, $nameform, $ano_atual, $get_lixeira) {
        if(!empty($get_pag)):
            if($get_year == $ano_atual && $get_lixeira == 1) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-secondary btn-block fw-bold mb-1 pt-1 pb-1 border-dark"><i class="fa fa-trash-o px-2"></i>
                        LIXEIRA DE '.$nameform.' - '.$get_year.'</button>';
            elseif($get_year < $ano_atual && 1 == $get_lixeira) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-secondary btn-block fw-bold mb-1 pt-1 pb-1 border-dark"><i class="fa fa-trash-o px-2"></i>
                        LIXEIRA DE ARQUIVO DE '.$nameform.' - '.$get_year.'</button>';
            elseif ($ano_atual == $get_year && $get_lixeira == 0) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-primary btn-block fw-bold mb-1 pt-1 pb-1 border-dark"><i class="fal fa-list px-2"></i>
                       LISTA DE '.$nameform.' - '.$get_year.'</button>';
            else:
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-danger btn-block fw-bold mb-1 pt-1 pb-1 border-dark"><i class="fal fa-list px-2"></i>
                       ARQUIVO DE LISTA DE '.$nameform.' - '.$get_year.'</button>';
            endif;
        endif;
    }

    // Função do botão de cadastro na lista de usuários
    public function BtnCadlist($get_year, $ano_atual, $usuarioid, $pag_system, $get_pag, $hashprimary) {

        $cadastro = substr($get_pag, 6);

        if(!empty($get_pag)):
            if ($get_year === $ano_atual && $usuarioid > 1) :
                return '<a href = "'.$pag_system.'?pag=cadastro_'.$cadastro.'&year='.$ano_atual.'&session='.$hashprimary.'" role="button" class="btn btn-outline-success btn-sm fw-bold mb-3 me-3"
                accesskey="N" data-toggle="tooltip" data-placement="bottom" title="CADASTRAR"><i class="far fa-plus-circle px-2"></i><u>N</u>OVO</a>';
            endif;
        endif;
    }

    // Função para o botão gravar
    public function BtnGravar($usuarioid, $usuariostatus, $usuarioniveldeacesso){
            if ($usuarioid === 1):
            return '';
            elseif ($usuariostatus === 0):
                return '';
            elseif ($usuarioniveldeacesso === 4):
                return '';
            else:
                return '<button type="submit" accesskey="G" data-toggle="tooltip" title="GRAVAR OS DADOS" class="btn btn-outline-success btn-sm fw-bold mb-2 me-2 mr-sm-4">
                            <i class="far fa-compact-disc me-2"></i><u>G</u>RAVAR </button>';
            endif;
    }

    // Função para o botão sair
    public function BtnSair($pag_system) {
        return '<a href="'.$pag_system.'" role="button" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-outline-danger btn-sm fw-bold mb-2 mr-sm-4"><i class="far fa-reply-all me-2"></i ><u>S</u>AIR</a>';
    }

    // Função para o botão listar
    public function BtnListar($pag_system,$get_pag, $get_year, $hashprimary) {

        if(substr($get_pag, 0,8) === 'cadastro'):
            $lista = substr($get_pag, 9);
        else:
            $lista = substr($get_pag, 7);
        endif;

        return '<a href="'.$pag_system.'?pag=lista_'.$lista.'&year='.$get_year.'&session='.$hashprimary.'" role="button" data-toggle="tooltip" title="LISTAR REGISTROS"
                    accesskey="L" class="btn btn-outline-info btn-sm fw-bold mb-2 me-2 mr-sm-4"><i class="fa fa-list-ol me-2"></i><u>L</u>ISTAR</a>';
    }

    // Função para verificar se o usuário esta cadastrado no sistema
    public function HashPag($get_hash, $hashprimary) {
        if (isset($hashprimary)) {
            if($hashprimary !== $get_hash):
                $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                        <strong>É NECESSÁRIO ESTAR LOGADO !!!</strong></div>';
                    header("Location: $pag_system");
            endif;
        }
    }

    // Função para hash
    public function Hash($usuarioid) {
        if (!empty($usuarioid)) {
            return sha1(md5($usuarioid));
        }
    }

    // Função para modal de lixeira
    public function BtnModalLixo($usuarioid, $usuariostatus, $usuarioniveldeacesso) {
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        else:
            return '<button type="button" title="APAGAR" class="btn btn-outline-danger btn-sm btn-circle mb-2 me-2 mr-sm-4" data-toggle="modal" data-target="#modalLixeira">
                        <i class="fa fa-trash-o" data-toggle="tooltip" title="LIXEIRA"></i></button>';
        endif;
    }

    /** Função para botão de lixeira em lista
     * @param $usuarioniveldeacesso //
     */
    public function Btnlistlixeira($usuarioniveldeacesso,$get_lixeira, $get_year, $get_pag, $nu_lixeira, $pag_system, $hashprimary) {
        if ($usuarioniveldeacesso === '1'):
            if ($get_lixeira === 0):
                return '<a href="'.$pag_system .'?pag='.$get_pag.'&year='.$get_year.'&lixeira=1&session='.$hashprimary.'" role="button" accesskey="L" class="btn btn-outline-secondary btn-sm fw-bold mb-3"
                        data-toggle="tooltip" data-placement="bottom" title="LIXEIRA"><i class="fa fa-trash-o px-2"></i><u>L</u>IXO <span class="badge rounded-pill bg-danger">' . $nu_lixeira . '</a>';
            else:
                return '<a href="' . $pag_system . '?pag='.$get_pag.'&year='.$get_year.'&session='.$hashprimary.'" accesskey="S" role="button" class="btn btn-outline-danger btn-sm fw-bold mb-3"><i class="fa fa-arrow-circle-o-left px-2"></i><u>S</u>AIR</a>';
            endif;
        endif;
    }

    /** Função para alertar quando não existem registros na lixeira
     * @param $get_lixeira // Recebe o $_GET de lixeira
     * @param $nu_lixeira // Faz o SQL COUNT da Lixeira
     */
    public function AlertLixeira ($get_lixeira, $nu_lixeira) {
        if ('VAZIA' === $nu_lixeira && $get_lixeira == 1) :
            return '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert"><i class="fa fa-recycle"></i>
                <strong>A LIXEIRA ESTÁ VAZIA !!!</strong></div>';
        endif;
    }

    /** Função para alertar quando não existem registros na tabela ou a lixeira está está vazia
     * @param $nu_registro // Se retornado no $_GET como 1 exibe a lista da lixeira
     */
    public function AlertSemRegistros($nu_registro) {
        if($nu_registro == 0) :
            return '<div class="alert alert-danger text-center pt-1 pb-1 text-uppercase mt-3" role="alert">
                <strong>NÃO EXISTEM DOCUMENTOS CADASTRADOS !!!</strong></div>';
        endif;

    }
}

$button = new Buttons();