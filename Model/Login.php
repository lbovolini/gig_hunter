<?php

class Login
{

	private $username;
	private $senha;

	public function __construct($username, $senha)
	{
		$this->username = $username;
		$this->senha = $senha;
	}
	
	//Realiza Login
	public static function loginEmp() 
	{
		header("Location: TestandoEmp.php");// O usuário e a senha digitados foram validados, manda pra página interna
	}
	
	public static function loginAcad() 
	{
		header("Location: TestandoAcad.php");// O usuário e a senha digitados foram validados, manda pra página interna
	}
	
	public static function loginFree() 
	{
		header("Location: TestandoFree.php");// O usuário e a senha digitados foram validados, manda pra página interna
	}
}
?>
