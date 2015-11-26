<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/Auth.php';
require_once $root.'/connection.php'; 
	DB::connect();
	if (isset($_GET['idEmpresa'])) {
		$idEmpresa = $_GET['idEmpresa'];
		$_SESSION['idEmpresa'] = $idEmpresa;
	}
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once $root.'/Controller/EmpresaController.php';
	$empresa = new EmpresaController();
	$empresa->excluir();
	
	header("Location: /View/Admin/Empresa.php");
?>