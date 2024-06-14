    <?php
    error_reporting(-1);

    if(empty($hashsession)):
        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                <strong>ERRO AO EDITAR: USUÁRIO NÃO ENCONTRADO !!!</strong></div>';
        header("Location: $pag_system");
    endif;

    // Atribui uma conexão PDO
    $conexao = conexao::getInstance();

    // Recebe os dados enviados pela submissão
    $acao             = (isset($_POST['acao'])) ? $_POST['acao'] : '';
    $id               = (isset($_POST['id'])) ? $_POST['id'] : '';
    $foto_atual		  = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
    $nome             = (isset($_POST['nome'])) ? $_POST['nome'] : '';
    $sobrenome        = (isset($_POST['sobrenome'])) ? $_POST['sobrenome'] : '';
    $datanascimento   = (isset($_POST['datanascimento'])) ? $_POST['datanascimento'] : '01/01/1970';
    $cpf              = (isset($_POST['cpf'])) ? str_replace(array('.','-'), '', $_POST['cpf']): '';
    $email            = (isset($_POST['email'])) ? $_POST['email'] : '';
    $celular   		  = (isset($_POST['celular'])) ? str_replace(array('(',')','-', ' '), '', $_POST['celular']) : '';
    $grupo_id   	  = (isset($_POST['grupo'])) ? $_POST['grupo'] : '';
    $igreja_id   	  = (isset($_POST['igreja'])) ? $_POST['igreja'] : '';
    $senha   		  = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    $status    		  = (isset($_POST['status'])) ? $_POST['status'] : '';
    $lixeira  		  = (isset($_POST['lixeira'])) ? $_POST['lixeira'] : 0;
    $sexouser  		  = (isset($_POST['sexouser'])) ? $_POST['sexouser'] : '';
    $nivel_acesso_id  = (isset($_POST['nivel_acesso_id'])) ? $_POST['nivel_acesso_id'] : '';
    $edit             = (isset($_POST['edit'])) ? $_POST['edit'] : '';

    // $GET_ para exclusão de formularios
    $action =        $_GET['action'] ?? '';
    $idaction =      $_GET['idaction'] ?? '';
    $useraction =  $_GET['useraction'] ?? '';
    $editaction =  $_GET['editaction'] ?? 'error';
    $get_year = isset($_GET['year']) ? $_GET['year'] : $ano_atual;

    //criptografa a senha com sha3-256 + sal
    $hashcad = hash('sha3-256', 'jesusobompastor');
    $cripto_senha = hash('sha3-256', $hashcad.$senha);

    //criptografa o cracha com sha3-256 + sal
    $hashcracha = hash('sha3-256', 'servobomeprudente'.$id);
    $cripto_cracha = hash('sha3-256', $hashcad.$id);

    // Valida os dados recebidos
    $mensagem = '';
    if ($acao == 'editar' && $id == ''):
        $mensagem .= '<li>ID do registros desconhecido.</li>';

    endif;

    // Se for ação diferente de excluir valida os dados obrigatórios
    if ($acao != 'excluir'):

        if(empty($datanascimento)):
            $data_ansi = '';
        else:
            // Constrói a data no formato ANSI yyyy/mm/dd
            $data_temp = explode('/', $datanascimento);
            $data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];
        endif;
    endif;



    // Verifica se foi solicitada a inclusão de dados
    if ($acao == 'incluir'):

        $nome_foto = 'sistema/imagens/padrao.jpg';

        if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):

            $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
            $array = explode('.', $_FILES['foto']['name']);
            $extensao = strtolower(end($array));

            // Validamos se a extensão do arquivo é aceita
            if (array_search($extensao, $extensoes_aceitas) === false):
                $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert"><strong>Extensão de foto inválida! <br>
                    Extenções de foto aceitas : .bmp , .png, .svg, .jpeg e .jpg</strong></div>';
                echo "<script>javascript:history.go(-1)</script>";
                exit;
            endif;

            // Verifica se o upload foi enviado via POST
            if(is_uploaded_file($_FILES['foto']['tmp_name'])):

                if(!file_exists( 'sistema/imagens')): // Verifica se o diretório "imagens/cpf" do novo usuário existe
                    mkdir( 'sistema/imagens'); // Caso não exista cria o diretório
                endif;

                // Verifica se o diretório "imagens/id/fotologin" de destino existe, senão existir cria o diretório
                if(!file_exists( 'sistema/imagens/fotologin')): //
                    mkdir( 'sistema/imagens/fotologin');
                endif;

                //Validar extensão da imagem
                switch($_FILES['foto']['type']):
                    case 'image/jpeg';
                    case 'image/jpg';
                        //Criar a imagem temporaria a ser manipulada
                        $nome_foto = imagecreatefromjpeg($_FILES['foto']['tmp_name']);
                    break;
                    case 'image/png';
                    case 'image/x-png';
                        //Criar a imagem temporaria a ser manipulada
                        $nome_foto = imagecreatefrompng($_FILES['foto']['tmp_name']);
                    break;
                    default:
                        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert"><strong>Extensão de foto inválida! <br>
                        Extenções de foto aceitas '.$_FILES['foto']['type'].': .bmp , .png, .svg, .jpeg e .jpg</strong></div>';
                        echo "<script>javascript:history.go(-1)</script>";
                endswitch;
	

                //Importar a logo
                $logo = imagecreatefromgif('sistema/usuarios/logo_cracha_st11.gif');
                
                //Obter a largura da logo
                $largura_logo = imagesx($logo);
                
                //Obter a altura da logo
                $altura_logo = imagesy($logo);
                //echo "$altura_logo - $largura_logo";
                
                //Calcular posição x sendo 6px da lateral direita
                $x_logo = imagesx($nome_foto) - $largura_logo - 12;
                
                //Calcular posição y sendo 6px do rodape
                $y_logo = imagesy($nome_foto) - $altura_logo - 12;
                
                imagecopymerge($nome_foto, $logo, $x_logo, $y_logo, 0, 0, $largura_logo, $altura_logo, 100);

                //http://celke.com.br/posts/141/como-retirar-caracteres-especiais-em-upload-de-imagem-com-php
                imagejpeg($nome_foto, 'sistema/imagens/fotologin/'.date('dmY') . '_' . $_FILES['foto']['name']);

                $id_foto = date('dmY') . '_' . $_FILES['foto']['name'];

                $nome_foto = 'sistema/imagens/fotologin/'.$id_foto;
            endif;
        endif;

        $sql = 'INSERT INTO usuarios (foto, nome, sobrenome, datanascimento, cpf, email, celular, grupo_id, igreja_id, hash_cracha, senha, status, sexo, nivel_acesso_id, usuariocad)
							   VALUES(:foto, :nome, :sobrenome, :datanascimento, :cpf, :email, :celular, :grupo_id, :igreja_id, :hash_cracha, :senha, :status, :sexo, :nivel_acesso_id, :usuariocad)';

        $stm = $conexao->prepare($sql);
        $stm->bindValue(':foto', $nome_foto);
        $stm->bindValue(':nome', $nome);
        $stm->bindValue(':sobrenome', $sobrenome);
        $stm->bindValue(':datanascimento', $data_ansi);
        $stm->bindValue(':cpf', $cpf);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':celular', $celular);
        $stm->bindValue(':grupo_id', $grupo_id);
        $stm->bindValue(':igreja_id', $igreja_id);
        $stm->bindValue(':hash_cracha', $cripto_cracha);
        $stm->bindValue(':senha', $cripto_senha);
        $stm->bindValue(':status', $status);
        $stm->bindValue(':sexo', $sexouser);
        $stm->bindValue(':nivel_acesso_id', $nivel_acesso_id);
        $stm->bindValue(':usuariocad', $usuariocpf);
        $retorno = $stm->execute();

        if ($retorno):
            $_SESSION['msgsuccess'] = '<div class="alert alert-success pb-1 pt-1 text-center" role="alert"><button class="btn btn-outline-success btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-compact-disc"></i></button>
                <strong>CRACHÁ DE '.$nome.' CADASTRADO COM SUCESSO !!!</strong></div>';
            header("Location: $pag_system?pag=cadastro_usuarios&year=$get_year");
        else:
            $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert"><button class="btn btn-outline-danger btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-compact-disc"></i></button>
                <strong>Erro ao cadastrar usuário '.$nome.' !!!</strong></div>';
            echo "<script>javascript:history.go(-1)</script>";
        endif;
    endif;


    // Verifica se foi solicitada a edição de dados
    if ($acao == 'editar'):

        if(isset($lixeira)):
            if($lixeira == 1):
                $_SESSION['msgedit'] = '<div class="alert alert-success pt-1 pb-1 text-center" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-pencil text-dark"></i></button>
                    <strong>CRACHÁ DE '.$nome.' NÃO EDITADO POR FALTA DE REATIVAÇÃO !!!</strong></div>';
                header("Location: $pag_system?pag=edicao_usuarios&id=$id&lixeira=$lixeira");
            else:

                if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):

                    // Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
                    if ($foto_atual <> 'sistema/imagens/padrao.jpg'):
                        //unlink("fotos/" . $foto_atual);
                        unlink('sistema/imagens/fotologin/'.$foto_atual);
                    endif;

                    $extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
                    $array1 = explode('.', $_FILES['foto']['name']);
                    $extensao = strtolower(end($array1));

                    // Validamos se a extensão do arquivo é aceita
                    if (array_search($extensao, $extensoes_aceitas) === false):
                        $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert"><strong>Extensão de foto inválida! <br>
                            Extenções de foto aceitas : .bmp , .png, .svg, .jpeg e .jpg</strong></div>';
                        echo "<script>javascript:history.go(-1)</script>";
                        exit;
                    endif;

                    // Verifica se o upload foi enviado via POST
                    if(is_uploaded_file($_FILES['foto']['tmp_name'])):

                        if(!file_exists( 'sistema/imagens')): // Verifica se o diretório "imagens/login" do novo usuário existe
                            mkdir( 'sistema/imagens'); // Caso não exista cria o diretório
                        endif;

                        // Verifica se o diretório "imagens/login/fotologin" de destino existe, senão existir cria o diretório
                        if(!file_exists( 'sistema/imagens/fotologin')): //
                            mkdir( 'sistema/imagens/fotologin');
                        endif;

                        // Monta o caminho de destino com o nome do arquivo
                        $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

                        // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
                        if (!move_uploaded_file($_FILES['foto']['tmp_name'],  'sistema/imagens/fotologin/'.$nome_foto)):
                            $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert"><strong>Houve um erro ao gravar arquivo na pasta de destino! <br>
                            Se o erro persistir contate o administrador.</strong></div>';

                        endif;

                        $nome_foto = 'sistema/imagens/fotologin/'.$nome_foto;

                    endif;
                else:

                    $nome_foto = $foto_atual;

                endif;


                $sql = 'UPDATE usuarios SET foto=:foto, nome=:nome, sobrenome=:sobrenome, datanascimento=:datanascimento, cpf=:cpf, email=:email,
                        celular=:celular, grupo_id=:grupo_id, igreja_id=:igreja_id, hash_cracha=:hash_cracha, status=:status, sexo=:sexo, nivel_acesso_id=:nivel_acesso_id, usuarioalt=:usuarioalt,alterado=NOW() ';
                $sql .= 'WHERE id = :id';

                $stm = $conexao->prepare($sql);
                $stm->bindValue(':foto', $nome_foto);
                $stm->bindValue(':nome', $nome);
                $stm->bindValue(':sobrenome', $sobrenome);
                $stm->bindValue(':datanascimento', $data_ansi);
                $stm->bindValue(':cpf', $cpf);
                $stm->bindValue(':email', $email);
                $stm->bindValue(':celular', $celular);
                $stm->bindValue(':grupo_id', $grupo_id);
                $stm->bindValue(':igreja_id', $igreja_id);
                $stm->bindValue(':hash_cracha', $cripto_cracha);
                $stm->bindValue(':status', $status);
                $stm->bindValue(':sexo', $sexouser);
                $stm->bindValue(':nivel_acesso_id', $nivel_acesso_id);
                $stm->bindValue(':usuarioalt', $usuariocpf);
                $stm->bindValue(':id', $id);
                $retorno = $stm->execute();

                if ($retorno && $edit == 'edit_user'):
                        header("Location: $pag_system?pag=edicao_usuarios&id=$id&edit=true&lixeira=$lixeira");
                elseif ($retorno && $edit == 'edit_perfil_user'):
                    $_SESSION['msgedit'] = '<div class="alert alert-success pt-1 pb-1 text-center" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-pencil text-dark"></i></button>
                    <strong><i class="fa fa-user me-2"></i>'.$usuarionome.' , SEU PERFIL FOI EDITADO COM SUCESSO !!!</strong></div>';
                    header("Location: $pag_system?pag=edicao_perfil");
                elseif ($retorno && $edit == ''):
                    header("Location: $pag_system?pag=edicao_usuarios&id=$id&edit=true&lixeira=$lixeira");
                else:
                    $_SESSION['msgerro'] = '<div class="alert alert-danger pt-1 pb-1 text-center" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-pencil text-dark"></i></button>
                        <strong>ERRO AO EDITAR USUÁRIO '.$nome.' !!!</strong></div>';

                endif;
            endif;
        endif;
    endif;

    // Verifica se foi solicitada a edição de dados
    if ($acao == 'editar_senha'):

        //criptografa a senha com sha3-256 + sal
        $hasheditsenha = hash('sha3-256', 'jesusobompastor');
        $cripto_senha_edit_senha = hash('sha3-256', $hasheditsenha.$senha);

        $sql = 'UPDATE usuarios SET senha=:senha, date_alter_senha=NOW() ';
        $sql .= 'WHERE id = :id';

        $stm = $conexao->prepare($sql);
        $stm->bindValue(':senha', $cripto_senha_edit_senha);
        $stm->bindValue(':id', $id);
        $retorno = $stm->execute();

        if ($retorno):
            $_SESSION['msgsuccess'] = '<div class="alert alert-success pb-1 pt-1 text-center" role="alert">
                <strong>SENHA ALTERADA COM SUCESSO !!!</strong></div>';
            header("Location: $pag_system?pag=edicao_perfil");
        else:
            $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center" role="alert">
                <strong>ERRO AO ALTERAR SENHA !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
        endif;
    endif;

    // Verifica se foi solicitada a exclusão dos dados
    if ($action === 'lixeira'):

        // Valida se existe um id e se ele é numérico
        if (!empty($idaction) && is_numeric($idaction)):
            if ($usuarioniveldeacesso <> 1):
                $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                        <strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE EXCLUIR CRACHÁ ID : '.$idaction.' - '.$useraction.' !!!</strong></div>';
                header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
            endif;
        else :
            $_SESSION['msgerro'] = '<div class="alert alert-danger pb-1 pt-1 text-center text-uppercase" role="alert">
                    <strong>ERRO AO EXCLUIR: ID : '.$idaction.' - NOME: '.$useraction.' - NÃO ENCONTRADO !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
        endif;

        // Exclui o registro do banco de dados
        $sql = "UPDATE usuarios SET lixeira=1, status=0, nivel_acesso_id=0, usuarioalt=:usuarioalt,alterado=NOW() WHERE id = :id";
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $idaction);
        $stm->bindValue(':usuarioalt', $usuariocpf);
        $retorno = $stm->execute();

        if($retorno) :
            $_SESSION['msgsuccess'] = '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert"><button class="btn btn-outline-secondary btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-trash text-secondary"></i></button>
                    <strong>CRACHÁ DE '.$useraction.' EXCLUIDO COM SUCESSO !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
        else :
            $_SESSION['msgerro'] = '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert"><button class="btn btn-outline-secondary btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-trash me-1 text-secondary"></i></button>
                <strong>ERRO AO EXCLUIR CRACHÁ DE '.$useraction.' !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
        endif;
    endif;

    // Verifica se foi solicitada a exclusão dos dados
    if ($action === 'reativacao'):

        // Valida se existe um id e se ele é numérico
        if (!empty($idaction) && is_numeric($idaction)):
            if ($usuarioniveldeacesso <> 1):
                $_SESSION['msgerro'] = '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert">
                        <strong>SEU NÍVEL DE USUÁRIO NÃO PERMITE REATIVAR CRACHÁ ID : '.$idaction.' - '.$useraction.' !!!</strong></div>';
                header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
            endif;
        else :
            $_SESSION['msgerro'] = '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert">
                        <strong>ERRO AO REATIVAR: ID : '.$idaction.' - NOME: '.$useraction.' - NÃO ENCONTRADO !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year");
        endif;

        // Altera o registro do banco de dados
        $sql = "UPDATE usuarios SET lixeira=0, status=1, nivel_acesso_id=3, usuarioalt=:usuarioalt,alterado=NOW() WHERE id = :id";
        $stm = $conexao->prepare($sql);
        $stm->bindValue(':id', $idaction);
        $stm->bindValue(':usuarioalt', $usuariocpf);
        $retorno = $stm->execute();

        if($retorno && $editaction == 'true'):
            header("Location: $pag_system?pag=edicao_usuarios&id=$idaction&lixeira=0&reativacao=true");
        elseif($retorno):
            $_SESSION['msgsuccess'] = '<div class="alert alert-success pt-1 pb-1 text-center text-uppercase" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1 pt-0 pb-0"><i class="fa fa-arrow-circle-o-up text-dark"></i></button>
            <strong>CRACHÁ DE '.$useraction.' REATIVADO COM SUCESSO !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year&lixeira=1");
        else :
            $_SESSION['msgerro'] = '<div class="alert alert-danger pt-1 pb-1 text-center text-uppercase" role="alert"><button class="btn btn-outline-warning btn-sm btn-circle me-1"><i class="fa fa-arrow-circle-o-up text-dark"></i></button>
                <strong>ERRO AO REATIVAR CRACHÁ DE '.$useraction.' !!!</strong></div>';
            header("Location: $pag_system?pag=lista_usuarios&year=$get_year&lixeira=1");
        endif;
    endif;


?>