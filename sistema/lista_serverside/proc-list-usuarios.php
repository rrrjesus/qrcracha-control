<?php

/*
* Exemplo de dados do exemplo do script de processamento do lado do servidor.
 *
 * Veja http://datatables.net/usage/server -side para detalhes completos no servidor-
 * Requisitos de processamento de lado da DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 *
/ * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Variáveis ​​de conjunto fáceis
*/

$getlixeira = isset($_GET['getlixeira']) ? $_GET['getlixeira'] : 0; // Recebe o termo de pesquisar se existir

// tabela DB para usar
$table = <<<EOT
 (SELECT * FROM usuarios WHERE lixeira=$getlixeira)temp
EOT;

// chave primária da tabela
$primaryKey = 'id';


// Array de colunas de banco de dados que devem ser lidas e enviadas de volta para DataTables.
// O parâmetro `db` representa o nome da coluna no banco de dados, enquanto o` dt`
// parâmetro representa o identificador de coluna DataTables. Neste caso, simples
// índices

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'foto', 'dt' => 1),
    array('db' => 'id', 'dt' => 2),
    array('db' => 'nome', 'dt' => 3),
    array('db' => 'sobrenome', 'dt' => 4),
    array(
        'db' => 'datanascimento',
        'dt' => 5,
        'formatter' => function ($d) {
            return date('d/m/Y', strtotime($d));
        }
    ),
    array('db' => 'cpf', 'dt' => 6,
        'formatter' => function($d) {
        if(strlen($d) < 12):
            $cpf_1 = substr($d, 0, 3);  // retorna "123"
            $cpf_2 = substr($d, 3, 3);  // retorna "123"
            $cpf_3 = substr($d, 6, 3);  // retorna "123"
            $cpf_4 = substr($d, 9, 2);  // retorna "123"
        return $cpf_1.'.'.$cpf_2.'.'.$cpf_3.'-'.$cpf_4;
        else:
            return '';
        endif;
}
    ),
    array('db' => 'email', 'dt' => 7),
    array(
        'db' => 'nivel_acesso_id',
        'dt' => 8,
        'formatter' => function($d) {
            if ($d == 0)
                return 'VISITANTE';
            elseif ($d == 1)
                return 'ADMINISTRADOR';
            elseif ($d == 2)
                return 'AVANÇADO';
            elseif ($d == 3)
                return 'USUÁRIO';
            elseif ($d == 4)
                return 'VISITANTE';
            else
                return '';
        }
    ),
    array('db' => 'celular', 'dt' => 9,
        'formatter' => function($d) {
            if (strlen($d) < 12):
                $cll_1 = substr($d, 0, 2);  // retorna "123"
                $cll_2 = substr($d, 2,5 );  // retorna "123"
                $cll_3 = substr($d, 7,9 );  // retorna "123"
                return '('.$cll_1.')'.$cll_2.'-'.$cll_3;
            else:
                return '';
            endif;
        }
        ),
    array('db' => 'status', 'dt' => 10,
            'formatter' => function($d) {
                if ($d == 0)
                    return '<button type="button" class="btn disabled btn-outline-danger btn-sm fw-bold"><i class="fa fa-lock me-1"></i>INATIVO</button>';
                else
                    return '<button type="button" class="btn disabled btn-outline-success btn-sm fw-bold"><i class="fa fa-lock-open me-1"></i>ATIVO</button>';
        }
    ),
    array('db' => 'sexo', 'dt' => 11,
        'formatter' => function($d) {
            if ($d == 0)
                return '<button type="button" class="btn disabled btn-outline-danger btn-sm fw-bold" style="color: deeppink; border-color: deeppink"><i class="fa fa-venus me-1"></i>FEMI</button>';
            else
                return '<button type="button" class="btn disabled btn-outline-primary btn-sm fw-bold"><i class="fa fa-mars me-1"></i>MASC</button>';
        }
    ),
    array('db' => 'setor', 'dt' => 12,
        'formatter' => function($d) {
            $conexao = conexao::getInstance(); // Instanciando uma conexão segura através da classe conexão
            $sql = "SELECT id, nome_setor FROM setor";
            $stm = $conexao->prepare($sql);
            $stm->execute();
            $setor = $stm->fetchAll(PDO::FETCH_OBJ);
            $stm = null; //Encerra a conexão

            foreach ($setor as $setor_for):
                if($setor_for->id == $d):
                    return strtoupper($setor_for->nome_setor);
                else:
                    return 'OUTROS';
                endif;
                endforeach;
        }
        ),
    array('db' => 'lixeira', 'dt' => 13)
);

// SQL server connection information
include_once '../../Conexao.php';

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* Se você quiser usar a configuração básica para DataTables com PHP
 * Lado do servidor, não há necessidade de editar abaixo dessa linha.
 */

require('../../classes/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey , $columns)
);