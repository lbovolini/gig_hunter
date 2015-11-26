<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthAcademico.php';
require_once $root.'/connection.php'; 

	DB::connect();
	if (isset($_GET['idVaga'])) {
		$idVaga = $_GET['idVaga'];
		$_SESSION['idVaga'] = $idVaga;
	}

	$query = "INSERT INTO candidatos(vaga_id, usuario_id) VALUES ('" . $_SESSION['idVaga'] . "', '" . $_SESSION['id'] . "')";
	mysql_query($query);

	header("Location: /View/Academico/Vaga.php");
?>