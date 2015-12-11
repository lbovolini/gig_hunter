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
	$avaliacao->excluir();
	
	echo "<script> alert('Avaliação excluída com sucesso!'); location.href='Avaliar.php'; </script>";
?>