<?php
class DB 
{
	public static $hostname = 'localhost';
	public static $database = 'gig_hunter';
	public static $username = 'gig_hunter';
	public static $password = 'gig_hunter';
	protected static $connection;

	public static function connect()
	{
		self::$connection = mysql_connect(self::$hostname, self::$username, self::$password) 
			or die("Unable to connect to MySQL");


		//seleciona a base de dados
		$selected = mysql_select_db(self::$database, self::$connection)
		  or die("Could not select gig_hunter");
	}

	public static function close()
	{
		mysql_close(self::$connection);
	}

	public static function connection()
	{
		return self::$connection;
	}
}
?>