<?php
session_start();
if(!isset($_SESSION["nome"])){
	header("location: sair.php");
}
?>
<html>
	<head>
		<title>Titulo</title>
	</head>
	<body>
		Olá, <?php echo $_SESSION["nome"]; ?>.<br><br>
		Algum conteúdo de acesso restrito.<br><br>
		<a href="sair.php">Sair</a>
	</body>
</html>