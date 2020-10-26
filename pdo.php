<?php
try
{
	$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");
    echo "Conectado";
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar no banco de dados: ' . $e->getMessage();
}
?>