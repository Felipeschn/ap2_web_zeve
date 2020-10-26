<?php

$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

$login = $_POST['user'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$stmt = $conn->query("SELECT count(*) as num FROM tb_usuarios where login='$login'");
$stmt->execute();
$results=$stmt->fetch(PDO::FETCH_ASSOC);

if ($results['num'] ==1){
	echo"Login já existente";
} else {
    $result_user = $conn ->prepare("INSERT INTO tb_usuarios (user,senha,dtcadastro,nome,estado,cidade,email,telefone) VALUES ('$login','$senha',NOW(),'$nome','$estado','$email','$telefone')");
    $result_user->execute();
}
?>