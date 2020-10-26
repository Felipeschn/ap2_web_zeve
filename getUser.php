<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Login</title>		
	</head>
	<body>
        <a href="./index.php">Deslogar</a><br>
		<a href="./cadastroUsuarios.php">Cadastrar</a><br>
		<h1>Usuários</h1>
		<?php 
			$login = $_POST['user'];
			$senha = $_POST['senha'];

			$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

			$stmt = $conn->query("SELECT count(*) as num FROM tb_usuarios where login='$login' and senha='$senha'");
			$stmt->execute();
			$results=$stmt->fetch(PDO::FETCH_ASSOC);

			if ($results['num'] ==1){
				echo "<h1>Seja bem-vindo,".$login."!</h1>";
			}
			else{
					echo"<script language='javascript' type='text/javascript'>
					alert('Credenciais inválidas, ou usuário não cadastrado. Cadastre-se');window.location
					.href='index.html';</script>";
			}
		?>
    </body>
</html>