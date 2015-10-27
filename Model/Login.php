<?php

class Login
{

	private $login;
	private $senha;

	public function __construct($login, $senha)
	{
		$this->login = $login;
		$this->senha = $senha;
	}
	
	//Realiza Login
	public static function login() 
	{
		header("Location: Testando.php");// O usuário e a senha digitados foram validados, manda pra página interna
	}

	public static function validate($data)
	{
		foreach ($data as $field) {
			  $field = trim($field);
			  $field = stripslashes($field);
			  $field = htmlspecialchars($field);

			  //echo $field . '<br>';
			  if (empty($field)) 
			  	return true;
		}
		return false;
	}
}
?>
