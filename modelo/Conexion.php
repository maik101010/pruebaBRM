<?php

class Conexion
{
	public static function conectar(){
		try{
		$usuario = "root";
		$password = "";
		$con = new PDO('mysql:host=localhost;dbname=pruebabrm', $usuario, $password);

	    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $con->exec("SET CHARACTER SET utf8");
			
		}catch(PDOException $e){

	    	echo "ERROR: " . $e->getMessage();

		}
		return $con;
}

	
}
