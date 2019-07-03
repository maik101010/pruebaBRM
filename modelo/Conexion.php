<?php
/**
 * Conexion a la base de datos 
 */
class Conexion
{	
	/**
	 * Metodo que me genera una conexión a una base de datos mysql
	 * @return [PDO] [objeto con la instancia de la conexion generada]
	 */
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
