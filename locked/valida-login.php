<?php
error_reporting(-1);

//Criar a conexao ;
include_once '../Conexao.php';

// Recupera o login
$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : FALSE;
// Recupera a senha, a criptografando em MD5
$senha = isset($_POST['senha']) ? $_POST['senha'] : FALSE;

//criptografa a senha com sha3-256 + sal
$hashcad = hash('sha3-256', 'jesusobompastor');
$cripto_senha_login = hash('sha3-256', $hashcad.$senha);

// Check connection
if (mysqli_connect_errno()) :
    echo '<div class="alert alert-danger" role="alert">Falha ao conectar ao MySQL:'. mysqli_connect_error().'</div>';
endif;

// Usuário não forneceu a senha ou o login
if(!$email || !$cripto_senha_login) :
    echo "Você deve digitar seu email e senha !!!";
    exit;
endif;

// Captura os dados do cliente solicitado
$conexao = conexao::getInstance();
$sql = 'SELECT id, foto, nome, sobrenome, datanascimento, cpf, email, celular, setor, senha, status, sexo, 
       nivel_acesso_id, lixeira, usuariocad FROM usuarios WHERE email=:email && senha=:senha';
$stm = $conexao->prepare($sql);
$stm->bindValue(':email', $email);
$stm->bindValue(':senha', $cripto_senha_login);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_OBJ);

$smt = null;


if (empty($user)):
    header("Location: ../index?erro=true&email=$email");
    exit;
else:
    if(!strcmp($cripto_senha_login, $user->senha)): // Agora verifica a senha

        session_start(); // Inicia a session
        //Define os valores atribuidos na sessao do usuario
        $_SESSION['usuarioId'] = $user->id;
        $_SESSION['usuarioNome'] = $user->nome;
        $_SESSION['usuarioSobreNome'] = $user->sobrenome;
        $_SESSION['usuarioNivelAcesso'] = $user->nivel_acesso_id;
        $_SESSION['usuarioStatus'] = $user->status;
        $_SESSION['usuarioCpf'] = $user->cpf;
        $_SESSION['usuarioEmail'] = $user->email;
        $_SESSION['usuarioSenha'] = $user->senha;
        $_SESSION['usuarioFoto'] = $user->foto;
        $_SESSION['usuarioLixeira'] = $user->lixeira;
        $_SESSION['hashenter'] = hash('sha3-256', $user->nome.$user->email);

            // Script para encamninhar para a página anterior ou para principal
            if(isset($_SESSION['url']) && $_SESSION['url'] != ""):
                header("Location: ".$_SESSION['url']);
            else :
                header("Location: ../menu-principal");
            endif;
            exit;
    else:
        header("Location: ../index?erro=true&email=$email");
        exit;

    endif;
endif;

?>