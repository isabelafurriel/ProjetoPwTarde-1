<?php 
$servidor = "";
$usuario = "root";
$senha = "";
$bancoDados = "pwtarde";

$conexao = mysqli_connect($servidor) or die("Erro na conexão");

mysqli_select_db($conexao,$bancoDados);
?>