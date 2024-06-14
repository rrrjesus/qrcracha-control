<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Celke</title>
    </head>
    <body>
		<h1>Cadastrar Imagens com marca-d'água</h1>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="processa.php" enctype="multipart/form-data">
			<label>Titulo do Artigo: </label>
			<input type="text" name="titulo_artigo"><br><br>
			
			<label>Imagem: </label>
			<input type="file" name="imagem"><br><br>
			
			<input type="submit" value="Cadastrar"><br><br>
		</form>
	</body>
</html>