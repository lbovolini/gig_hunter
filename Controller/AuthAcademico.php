<?php 

session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Model/Autentica.php';
 
$aut = Autenticador::instanciar();
 
$usuario = null;
if ($aut->esta_logado()) {
	if(isset($_SESSION['tipo']) && (!empty($_SESSION['tipo']))) {
		if($_SESSION['tipo'] != 'Academico') {
			$aut->expulsar();
		}
		else {
	    	$usuario = $aut->pegar_usuario();
	    }
	}
	else {
		$aut->expulsar();
	}
}
else {
    $aut->expulsar();
}
?>