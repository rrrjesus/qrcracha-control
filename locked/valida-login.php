<?php
error_reporting(-1);

//Criar a conexao ;
include_once '../Conexao.php';

// Recupera o login
$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST['senha']) ? sha1(md5(trim($_POST['senha']))) : FALSE;

$loghash  = sha1(md5(strtoupper($email)));

// Check connection
if (mysqli_connect_errno()) :
    echo '<div class="alert alert-danger" role="alert">Falha ao conectar ao MySQL:'. mysqli_connect_error().'</div>';
endif;

// Usuário não forneceu a senha ou o login
if(!$email || !$senha) :
    echo "Você deve digitar seu email e senha !!!";
    exit;
endif;

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, telefone, celular, setor, senha, status, sexo, nivel_acesso_id, usuariocad FROM usuarios WHERE email=:email && senha=:senha';
$stm = $conexao->prepare($sql);
$stm->bindValue(':email', $email);
$stm->bindValue(':senha', $senha);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

$smt = null;


if (empty($user)):
    header("Location: ../index.php?erro=true&email=$email");
    exit;
else:
    if(!strcmp($senha, $user->senha)): // Agora verifica a senha

        session_start(); // Inicia a session
        //Define os valores atribuidos na sessao do usuario
        $_SESSION['usuarioId'] = $user->id;
        $_SESSION['usuarioNome'] = $user->nome;
        $_SESSION['usuarioSobreNome'] = $user->sobrenome;
        $_SESSION['usuarioNivelAcesso'] = $user->nivel_acesso_id;
        $_SESSION['usuarioStatus'] = $user->status;
        $_SESSION['usuarioCpf'] = $user->cpf;
        $_SESSION['usuarioSenha'] = $user->senha;
        $_SESSION['usuarioFoto'] = $user->foto;
        $_SESSION['hashenter'] = sha1(md5($user->login.date('dmYHis')));

            // Script para encamninhar para a página anterior ou para principal
            if(isset($_SESSION['url']) && $_SESSION['url'] != ""):
                header("Location: ".$_SESSION['url']);
            else :
                header("Location: ../menu-principal.php");
            endif;
            exit;
    else:
        header("Location: ../index.php?erro=true&email=$email");
        exit;

    endif;
endif;

?>