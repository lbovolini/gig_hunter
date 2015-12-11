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

	$query = "INSERT INTO oferecidas(vaga_id, usuario_id) VALUES ('" . $_SESSION['idVaga'] . "', '" . $_SESSION['idUsuario'] . "')";
	mysql_query($query);

	echo "<script> alert('Vaga oferecida!'); location.href='/View/Empresario/OferecerVaga.php'; </script>";
?>