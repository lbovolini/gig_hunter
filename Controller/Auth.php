<?php 

session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Model/Autentica.php';
 
$aut = Autenticador::instanciar();
 
$usuario = null;
if ($aut->esta_logado()) {
    $usuario = $aut->pegar_usuario();
}
else {
    $aut->expulsar();
}
?>