<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthAdmin.php';
require_once $root.'/connection.php'; 
	DB::connect();
	if (isset($_GET['idAvaliacao'])) {
		$idAvaliacao = $_GET['idAvaliacao'];
		$_SESSION['idAvaliacao'] = $idAvaliacao;
	}
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once $root.'/Controller/AvaliacaoController.php';
	$avaliacao = new AvaliacaoController();
	$avaliacao->publicar();
	
	header("Location: /View/Admin/Avaliar.php");
?>