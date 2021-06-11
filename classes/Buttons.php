<?php

$usuarioniveldeacesso = isset($_SESSION['usuarioNivelAcesso']) ? $_SESSION['usuarioNivelAcesso'] : 4;
$usuarioid = isset($_SESSION['usuarioId']) ? $_SESSION['usuarioId'] : 1;

class Buttons extends Tables {

    public $title;
    public $namelist;

    /** variaveis utilizadas na classe
     * @param $get_lixeira // retorna o $_GET da seleção de lista da lixeira (&lixeira=1 listar lixeira
     * @param $get_year
     * @param $ano_atual
     * @param $get_pag
     * @param $pag_system
     * @param $get_lixeira // Se retornado no $_GET como 1 exibe a lista da lixeira
     * @param $nu_lixeira // Retorna a contagem da lixeira
     * @param $nu_registro // Retorna a contagem de registros da tabela
     */

    public function language() {
            echo '"language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros","sInfoEmpty": "Mostrando 0 até 0 de 0 registros","sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoThousands": ".","sLengthMenu": "_MENU_ Resultados por Página","sLoadingRecords": "Carregando...","sProcessing": "Processando...","sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar","oPaginate": {"sNext": "Próximo","sPrevious": "Anterior","sFirst": "Primeiro","sLast": "Último"},
                "oAria": {"sSortAscending": "Ordenar colunas de forma ascendente","sPrevious": "Ordenar colunas de forma descendente"} }';
    }

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

    public function BtnColor($get_lixeira, $get_year, $ano_atual) {
        if ($get_lixeira === 1):
            return 'secondary';
        elseif($get_year < $ano_atual):
            return 'danger';
        elseif($get_year === $ano_atual):
            return 'primary';
        else:
            return 'success';
        endif;
    }

    public function BtnColorListSv2($get_lixeira, $get_year, $ano_atual, $get_livro) {
        if ($get_lixeira == 1):
            return 'secondary';
        elseif($get_year < $ano_atual):
            return 'danger';
        elseif($get_year === $ano_atual && $get_livro === 'covid'):
            return 'dark';
        else:
            return 'primary';
        endif;
    }

    public function BtnColorSv2($get_sv2) {
        if ($get_sv2 === 'suvis'):
            return 'success';
        elseif ($get_sv2 === 'outros'):
            return 'danger';
        elseif ($get_sv2 === 'covid'):
            return 'dark';
        elseif ($get_sv2 === 'covid-outros'):
            return 'dark';
        elseif ($get_sv2 === 'siva'):
            return 'secondary';
        elseif ($get_sv2 === 'siva-outros'):
            return 'secondary';
        elseif ($get_sv2 === 'surto'):
            return 'primary';
        else:
            return 'success';
        endif;
    }

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

    public function FaList($get_lixeira, $get_year, $ano_atual) {
        if ($get_lixeira == 1):
            return 'trash-o';
        elseif ($get_year < $ano_atual):
            return 'list';
        else:
            return 'list';
        endif;
    }

    public function BtnTitleList($get_pag, $get_year, $nameform, $ano_atual, $get_lixeira) {
        if(!empty($get_pag)):
            if($get_year == $ano_atual && $get_lixeira == 1) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-outline-secondary btn-lg btn-block fw-bold mb-1 pt-1 pb-1"><i class="fa fa-trash-o px-2"></i>
                        LIXEIRA DE '.$nameform.' - '.$get_year.'</button>';
            elseif($get_year < $ano_atual && 1 == $get_lixeira) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-outline-secondary btn-lg btn-block fw-bold mb-1 pt-1 pb-1"><i class="fa fa-trash-o px-2"></i>
                        LIXEIRA DE ARQUIVO DE '.$nameform.' - '.$get_year.'</button>';
            elseif ($ano_atual == $get_year && $get_lixeira == 0) :
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-outline-primary btn-lg btn-block fw-bold mb-1 pt-1 pb-1"><i class="fal fa-list px-2"></i>
                       LISTA DE '.$nameform.' - '.$get_year.'</button>';
            else:
                echo '<div class="d-grid gap-2 mb-3"><button disabled type="button" class="btn btn-outline-danger btn-lg btn-block fw-bold mb-1 pt-1 pb-1"><i class="fal fa-list px-2"></i>
                       ARQUIVO DE LISTA DE '.$nameform.' - '.$get_year.'</button>';
            endif;
        endif;
    }

    public function BtnCadlist($get_year, $ano_atual, $usuarioid, $pag_system, $get_pag, $hashprimary) {

        $cadastro = substr($get_pag, 6);

        if(!empty($get_pag)):
            if ($get_year === $ano_atual && $usuarioid > 1) :
                return '<a href = "'.$pag_system.'?pag=cadastro_'.$cadastro.'&year='.$ano_atual.'&session='.$hashprimary.'" type = "button" class="btn btn-outline-success btn-sm fw-bold mb-3 me-3"
                accesskey="N" data-toggle="tooltip" data-placement="bottom" title="CADASTRAR"><i class="far fa-plus-circle px-2"></i><u>N</u>OVO</a>';
            endif;
        endif;
    }

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

    public function BtnSv2Suvis($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'suvis'):
            return '<a class="btn btn-outline-warning btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=suvis&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="S"
                      data-toggle="tooltip" title="SV2 SUVIS"><i class="far fa-plus-circle me-3"></i><u>S</u>UVIS<i class="ms-3"></i></a>';
        elseif($get_sv2 !== 'suvis'):
            return '<a class="btn btn-outline-warning btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=suvis&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="S"
                      data-toggle="tooltip" title="SV2 SUVIS"><i class="far fa-plus-circle me-3"></i><u>S</u>UVIS<i class="ms-3"></i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2Covid($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'covid'):
            return '<a class="btn btn-outline-dark btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=covid&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="S"
                      data-toggle="tooltip" title="SV2 SUVIS"><i class="far fa-plus-circle me-3"></i><u>C</u>OVID<i class="ms-3"></i></a>';
        elseif($get_sv2 !== 'covid'):
            return '<a class="btn btn-outline-dark btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=covid&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="S"
                       data-toggle="tooltip" title="SV2 SUVIS"><i class="far fa-plus-circle me-3"></i><u>C</u>OVID<i class="ms-3"></i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2Outros($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'outros'):
            return '<a class="btn btn-outline-danger btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="O"
                        data-toggle="tooltip" title="SV2 OUTROS"><i class="far fa-plus-circle me-2"></i><u>O</u>UTROS<i class="ms-1"></i></a>';
        elseif($get_sv2 !== 'outros'):
            return '<a class="btn btn-outline-danger btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="O"
                        data-toggle="tooltip" title="SV2 OUTROS"><i class="far fa-plus-circle me-2"></i><u>O</u>UTROS<i class="ms-1"></i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2Siva($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'siva'):
            return '<a class="btn btn-outline-secondary btn-sm fw-bold mb-2 me-2"  href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=siva&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                        data-toggle="tooltip" title="SV2 SIVA"><i class="far fa-plus-circle me-3"></i>S<u>I</u>VA<i class="ms-3"></i></a>';
        elseif($get_sv2 !== 'siva'):
            return '<a class="btn btn-outline-secondary btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=siva&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                        data-toggle="tooltip" title="SV2 SIVA"><i class="far fa-plus-circle me-3"></i>S<u>I</u>VA<i class="ms-3"></i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2SivaOutros($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'siva-outros'):
            return '<a class="btn btn-outline-secondary btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=siva-outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                        data-toggle="tooltip" title="SV2 SIVA OUTROS"><i class="far fa-plus-circle text-danger me-1"></i>  SI<u>V</u>A<i class="ms-1 text-danger">OUT</i></a>';
        elseif($get_sv2 !== 'siva-outros'):
            return '<a class="btn btn-outline-secondary btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=siva-outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                        data-toggle="tooltip" title="SV2 SIVA OUTROS"><i class="far fa-plus-circle text-danger me-1"></i>  SI<u>V</u>A<i class="ms-1 text-danger">OUT</i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2Surto($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) &&$get_sv2 !== 'surto'):
            return '<a class="btn btn-outline-primary btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=surto&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="U" value="surto" id="surto"
                        data-toggle="tooltip" title="SV2 SURTO"><i class="far fa-plus-circle me-2"></i>S<u>U</u>RTO<i class="ms-2"></i></a>';
        elseif($get_sv2 !== 'surto'):
            return '<a class="btn btn-outline-primary btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=surto&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="U" value="surto" id="surto"
                        data-toggle="tooltip" title="SV2 SURTO"><i class="far fa-plus-circle me-2"></i>S<u>U</u>RTO<i class="ms-2"></i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSv2CovidOutros($usuarioid, $usuariostatus, $usuarioniveldeacesso, $get_sv2, $get_year, $get_pag, $get_id, $hashprimary){
        if ($usuarioid === 1):
            return '';
        elseif ($usuariostatus === 0):
            return '';
        elseif ($usuarioniveldeacesso === 4):
            return '';
        elseif (!empty($get_id) && $get_sv2 !== 'covid-outros'):
            return '<a class="btn btn-outline-dark btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&id='.$get_id.'&sv2=covid-outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                   data-toggle="tooltip" title="SV2 COVID OUTROS"><i class="far fa-plus-circle text-danger me-1"></i> COV<u>I</u>D<i class="ms-1 text-danger">OUT</i></a>';
        elseif($get_sv2 !== 'covid-outros'):
            return '<a class="btn btn-outline-dark btn-sm fw-bold mb-2 me-2" href="'.PAGSYSTEM.'?pag='.$get_pag.'&sv2=covid-outros&year='.$get_year.'&session='.$hashprimary.'" role="button" accesskey="I"
                   data-toggle="tooltip" title="SV2 COVID OUTROS"><i class="far fa-plus-circle text-danger me-1"></i> COV<u>I</u>D<i class="ms-1 text-danger">OUT</i></a>';
        else:
            return '';
        endif;
    }

    public function BtnSair($pag_system) {
        return '<a href="'.$pag_system.'" role="button" data-toggle="tooltip" title="SAIR DO FORMULÁRIO" accesskey="S" class="btn btn-outline-danger btn-sm fw-bold mb-2 mr-sm-4"><i class="far fa-reply-all me-2"></i ><u>S</u>AIR</a>';
    }

    public function BtnListar($pag_system,$get_pag, $get_year, $get_sv2, $hashprimary) {

        if(substr($get_pag, 0,8) === 'cadastro'):
            $lista = substr($get_pag, 9);
        else:
            $lista = substr($get_pag, 7);
        endif;

        if(substr($get_sv2, 0,5) === 'covid'):
            return '<a href="'.$pag_system.'?pag=lista_'.$lista.'&livro=covid&year='.$get_year.'&session='.$hashprimary.'" role="button" data-toggle="tooltip" title="LISTAR REGISTROS"
                    accesskey="L" class="btn btn-outline-info btn-sm fw-bold mb-2 me-2 mr-sm-4"><i class="fa fa-list-ol me-2"></i><u>L</u>ISTAR</a>';
        else:
        return '<a href="'.$pag_system.'?pag=lista_'.$lista.'&year='.$get_year.'&session='.$hashprimary.'" role="button" data-toggle="tooltip" title="LISTAR REGISTROS"
                    accesskey="L" class="btn btn-outline-info btn-sm fw-bold mb-2 me-2 mr-sm-4"><i class="fa fa-list-ol me-2"></i><u>L</u>ISTAR</a>';
        endif;
    }

    /*Função para verificar se o usuário esta cadastrado no sistema e após Ok, */
    public function HashPag($get_hash, $hashprimary) {
        if (isset($hashprimary)) {
            if($hashprimary !== $get_hash):
                $_SESSION['msgerro'] = '<div class="alert alert-danger text-center text-uppercase" role="alert">
                        <strong>É NECESSÁRIO ESTAR LOGADO !!!</strong></div>';
                    header("Location: $pag_system");
            endif;
        }
    }

    /*Função para verificar se o usuário esta cadastrado no sistema e após Ok, */
    public function Hash($usuariologin) {
        if (!empty($usuariologin)) {
            return sha1(md5($usuariologin));
        }
    }

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

    public function BtnlistlixeiraAedes($usuarioniveldeacesso,$get_lixeira, $get_year, $get_pag, $nu_lixeiraedes, $pag_system, $hashprimary) {
        if ($usuarioniveldeacesso == 1):
            if ($get_lixeira == 0):
                return '<a href="'.$pag_system .'?pag='.$get_pag.'&year='.$get_year.'&lixeira=1" role="button" class="btn btn-outline-secondary btn-sm fw-bold mb-3"
                        data-toggle="tooltip" data-placement="bottom" title="LIXEIRA"><i class="fa fa-trash-o px-2"></i><u>L</u>IXO <span class="badge rounded-pill bg-danger">' . $nu_lixeiraedes . '</a>';
            else:
                return '<a href="' . $pag_system . '?pag='.$get_pag.'&year='.$get_year.'" accesskey="S" role="button" class="btn btn-outline-danger btn-sm fw-bold mb-3"><i class="fa fa-arrow-circle-o-left px-2"></i><u>S</u>AIR</a>';
            endif;
        endif;
    }

    /** Função para alertar quando não existem registros na lixeira */
    public function AlertLixeira ($get_lixeira, $nu_lixeira) {
        if ('VAZIA' === $nu_lixeira && $get_lixeira == 1) :
            return '<div class="alert alert-danger text-center text-uppercase" role="alert"><i class="fa fa-recycle"></i>
                <strong>A LIXEIRA ESTÁ VAZIA !!!</strong></div>';
        endif;
    }

    /** Função para alertar quando não existem registros na lixeira */
    public function AlertLixeiraAedes ($get_lixeira, $nu_lixeiraedes) {
        if ($nu_lixeiraedes === 'VAZIA' && 1 == $get_lixeira) :
            return '<div class="alert alert-danger text-center text-uppercase" role="alert"><i class="fa fa-recycle"></i>
                <strong>A LIXEIRA ESTÁ VAZIA !!!</strong></div><br>';
        endif;
    }

    /** Função para alertar quando não existem registros na tabela ou a lixeira está está vazia
     * @param $nu_registro // Se retornado no $_GET como 1 exibe a lista da lixeira
     */
    public function AlertSemRegistros($nu_registro) {
        if($nu_registro == 0) :
            return '<div class="alert alert-danger text-center text-uppercase mt-3" role="alert">
                <strong>NÃO EXISTEM DOCUMENTOS CADASTRADOS !!!</strong></div>';
        endif;

    }
}

$button = new Buttons();