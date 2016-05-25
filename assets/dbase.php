<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Jakarta");

/**
* 
*/
class Dbase
{

	public static function koneksi(){
		$host = "127.0.0.1";
		$user = "uapweb";
		$password = "uapweb";
		$database_name = "uapweb";
		return new PDO("mysql:host=$host;dbname=$database_name", $user, $password,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
	}
}


?>