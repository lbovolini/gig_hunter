<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthFreelancer.php';
require_once $root.'/connection.php'; 

	DB::connect();
	if (isset($_GET['idVaga'])) {
		$idVaga = $_GET['idVaga'];
		$_SESSION['idVaga'] = $idVaga;
	}

	$query = "INSERT INTO candidatos(vaga_id, usuario_id) VALUES ('" . $_SESSION['idVaga'] . "', '" . $_SESSION['id'] . "')";
	mysql_query($query);
	$query2 = "DELETE FROM oferecidas WHERE vaga_id = '" . $_SESSION['idVaga'] . "' AND usuario_id = '" . $_SESSION['id'] . "'";
	mysql_query($query2);

	header("Location: /View/Freelancer/Home.php");		
?>