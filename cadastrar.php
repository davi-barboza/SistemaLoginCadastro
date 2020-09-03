<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<title>Cadastrar</title>		
	</head>
	<body>
		<header>
			<div style="padding: 30px;"><a href="admin.php">Voltar</a><br>		
		</header>
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_usuario.php">
			
			<input type="text" name="nome" placeholder="Digite o nome completo"><br><br><br>
			
			
			<input type="email" name="email" placeholder="Digite o seu e-mail"><br><br><br>
			
			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>