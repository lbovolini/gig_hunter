<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthEmpresario.php';
require_once $root.'/connection.php'; 

	DB::connect();
	if (isset($_GET['idVaga'])) {
		$idVaga = $_GET['idVaga'];
		$_SESSION['idVaga'] = $idVaga;
	}

	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once $root.'/Controller/VagaController.php';

	$vaga = new VagaController();
	$vaga->excluir();
	
	header("Location: /View/Empresario/Vaga.php");
?>