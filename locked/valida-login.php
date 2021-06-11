<?php
error_reporting(-1);

//Criar a conexao ;
include_once '../conexao.php';

$usuariot = (isset($_POST['login'])) ? $_POST['login'] : '';
$senhat   = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$senhat   = sha1(md5($senhat));
$loghash  = sha1(md5(strtoupper($usuariot)));

// Check connection
if (mysqli_connect_errno()) {
    echo '<div class="alert alert-danger" role="alert">Falha ao conectar ao MySQL:'. mysqli_connect_error().'</div>';
}

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT id,foto, nome, sobrenome, nomesocial, datanascimento, cpf, email, telefone, celular, setor, login, senha, status, sexo, nivel_acesso_id, acessotid,usuariocad FROM usuarios WHERE login=:login && senha=:senha';
$stm = $conexao->prepare($sql);
$stm->bindValue(':login', $usuariot);
$stm->bindValue(':senha', $senhat);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

$smt = null;

if (empty($user)) {
    //Mensagem de Erro
    $_SESSION['loginErro'] = "Usuário ou senha Inválido";

    //Manda o usuario para a tela de login
    header("Location: https://sisdamweb.online/esqueci-senha.php");
} else {
    session_start();
    //Define os valores atribuidos na sessao do usuario
    $_SESSION['usuarioId'] = $user->id;
    $_SESSION['usuarioNome'] = $user->nome;
    $_SESSION['usuarioSobreNome'] = $user->sobrenome;
    $_SESSION['usuarioNomeSocial'] = $user->nomesocial;
    $_SESSION['usuarioNivelAcesso'] = $user->nivel_acesso_id;
    $_SESSION['usuarioStatus'] = $user->status;
    $_SESSION['usuarioLogin'] = $user->login;
    $_SESSION['usuarioSenha'] = $user->senha;
    $_SESSION['usuarioTid'] = $user->acessotid;
    $_SESSION['usuarioFoto'] = $user->foto;
    $_SESSION['hashenter'] = sha1(md5($user->login.date('dmYHis')));

    if(isset($_SESSION['url']) && $_SESSION['url'] != "")
    {
        header("Location: ".$_SESSION['url']);
    } else {
        header("Location: ../menu-principal.php?hash=$loghash");
    }
}


?>