<?php
	session_start();
	$titulo_artigo = $_POST['titulo_artigo'];
	$imagem = $_FILES['imagem']['name'];
	
	//Validar extensão da imagem
	switch($_FILES['imagem']['type']):
		case 'image/jpeg';
		case 'image/pjpeg';
			//Criar a imagem temporaria a ser manipulada
			$imagem_teporaria = imagecreatefromjpeg($_FILES['imagem']['tmp_name']);
		break;
		case 'image/png';
		case 'image/x-png';
			//Criar a imagem temporaria a ser manipulada
			$imagem_teporaria = imagecreatefrompng($_FILES['imagem']['tmp_name']);
		break;
		default:
			$_SESSION['msg'] = "<h3 style='color: red;'>Extensão da imagem inválida, a extensão deve ser JPG ou PNG</h3>";
			header("Location: form.php");
	endswitch;
	
	
	
	//Importar a logo
	$logo = imagecreatefromgif("logo_texto.gif");
	
	//Obter a largura da logo
	$largura_logo = imagesx($logo);
	
	//Obter a altura da logo
	$altura_logo = imagesy($logo);
	//echo "$altura_logo - $largura_logo";
	
	//Calcular posição x sendo 6px da lateral direita
	$x_logo = imagesx($imagem_teporaria) - $largura_logo - 12;
	
	//Calcular posição y sendo 6px do rodape
	$y_logo = imagesy($imagem_teporaria) - $altura_logo - 12;
	
	imagecopymerge($imagem_teporaria, $logo, $x_logo, $y_logo, 0, 0, $largura_logo, $altura_logo, 100);
	
	//http://celke.com.br/posts/141/como-retirar-caracteres-especiais-em-upload-de-imagem-com-php
	imagejpeg($imagem_teporaria, 'arquivo/'. $_FILES['imagem']['name']);
	
	echo "<img src='arquivo/". $_FILES['imagem']['name']."'>";
	
	//http://celke.com.br/posts/96/como-fazer-upload-multiplo-com-php
	//http://celke.com.br/posts/139/como-criar-diretorio-de-imagens-para-cada-produto-cadastrado-no-banco-de-dados
	//http://celke.com.br/posts/29/como-fazer-upload-de-imagem-com-php
	
?>