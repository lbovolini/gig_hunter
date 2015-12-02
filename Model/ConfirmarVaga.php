<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root.'/Controller/AuthEmpresario.php';
require_once $root.'/connection.php'; 

	DB::connect();
	if ((isset($_GET['idVaga'])) & (isset($_GET['idUsuario']))){
		$idVaga = $_GET['idVaga'];
		$_SESSION['idVaga'] = $idVaga;
		$idUsuario = $_GET['idUsuario'];
		$_SESSION['idUsuario'] = $idUsuario;
	}

	$query = "UPDATE vagas SET status = 'Fechada', usuario_id = '" . $_SESSION['idUsuario'] . "' WHERE id = '" . $_SESSION['idVaga'] . "'";
	mysql_query($query);
	$queryO = "DELETE FROM oferecidas WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
	mysql_query($queryC);
	$queryC = "DELETE FROM candidatos WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
	mysql_query($queryC);

	header("Location: /View/Empresario/ConfirmarVaga.php");	
?>