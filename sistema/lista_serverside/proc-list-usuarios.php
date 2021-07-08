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

$tabela = isset($_GET['tabela']) ? ($_GET['tabela']) : 'usuarios';
$getlixeira = isset($_GET['getlixeira']) ? $_GET['getlixeira'] : 0; // Recebe o termo de pesquisar se existir

// tabela DB para usar
$table = <<<EOT
 (SELECT * FROM $tabela WHERE lixeira=$getlixeira)temp
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
    array('db' => 'nome', 'dt' => 2),
    array('db' => 'sobrenome', 'dt' => 3),
    array('db' => 'datanascimento', 'dt' => 4),
    array('db' => 'cpf', 'dt' => 5),
    array('db' => 'email', 'dt' => 6),
    array('db' => 'nivel_acesso_id', 'dt' => 7),
    array('db' => 'celular', 'dt' => 8),
    array('db' => 'status', 'dt' => 9),
    array('db' => 'sexo', 'dt' => 10),
    array('db' => 'setor', 'dt' => 11),
    array('db' => 'lixeira', 'dt' => 12)
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