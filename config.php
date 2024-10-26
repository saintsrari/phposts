<?php
	// Arquivo responsavel pela conexão com o banco de dados
	try {
		$conn = new PDO("mysql:host=localhost;dbname=database-name", "user", "password");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo($e->getMessage());
		exit;
	}
?>
