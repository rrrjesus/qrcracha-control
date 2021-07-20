<?php
/**********************************************************************
 * @author Rodolfo Romaioli Ribeiro de Jesus                          *
 * Data: 11/06/2021                                                   *
 *                                                                    *
 * Iniciando o projeto com as configurações da classe de conexão ...  *
 *                                                                    *
 * ********************************************************************

/** Constantes de parâmetros para configuração da conexão */

const HOST = '192.168.10.19';
const DBNAME = 'jacana_system';
const USER = 'jacana_system';
const PASSWORD = 'ZisYeMsoTJkbEhth';
const PAGSYSTEM = 'menu-principal.php';
const SYSTEM = 'jacana-control';

/** Algumas variáveis padrões utilizadas constantemente */

$admin = 'index.php';
$pag_system = 'menu-principal.php';
$pag_painel = 'index.php';
$index = 'index.php';
$today_year = date('Y');
$system = 'JAÇANÃ CONTROLE';

$sql_details = array(
    'user' => USER,
    'pass' => PASSWORD,
    'db' => DBNAME,
    'host' => HOST
);

class Conexao {

    /** Atributo estático de conexão */
    private static $pdo;

    /** Escondendo o construtor da classe */
    private function __construct() {
        //
    }

    /** Método estático para retornar uma conexão válida
     *  Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão */
    public static function getInstance(): PDO
    {
        if (!isset(self::$pdo)) {
            try {
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
                self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";", USER, PASSWORD, $opcoes);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }

}