<?php
session_start();
include_once("conexao.php");

if(!isset($_SESSION['admin']) || !isset($_SESSION['logado']))
	header('Location: logout.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		<title>Admin</title>		
	</head>
	<body>
		<header>
			<a style="margin-top:30px"href="cadastrar.php">Cadastrar</a><br>
			<a href="index.php">Logout</a><br>
		</header>
		<h1>Clientes</h1><br>
			<table style="margin-left: 200px;">
					<div class="tr">
						<h3><?php echo "ID: " ;?></h3>
						<h3><?php echo "Nome: ";?></h3>
						<h3><?php echo "E-mail: ";?></h3>
					</div>
			</table>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 10;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$sql = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
		$resultado = mysqli_query($connect, $sql);
		while($dados = mysqli_fetch_assoc($resultado)){?>
		<div class="container">
			<table>
				<tr >
					<h6><?php echo  $dados['id'];?></h6>
					<h6><?php echo  $dados['nome'];?></h6>
					<h6><?php echo   $dados['email'];?></h6>
					<h6 ><?php echo "<a href='editar.php?id=" . $dados['id'] . "'>Editar</a>";?></h6>
				</tr>
			</table>
		</div>
		<?php
		}
	
		$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		$resultado_pg = mysqli_query($connect, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		
	
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		

		$max_links = 2;
		echo "<a href='admin.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='admin.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='admin.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='admin.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>
	</body>
</html>