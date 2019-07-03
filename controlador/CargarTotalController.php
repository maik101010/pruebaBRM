<?php 

//include "Conexion.php";
include "../modelo/ClienteModel.php";
$modelo = new ClienteModel();


	$cantidad = $_POST["cantidad"];
	$idProducto = $_POST["id_producto"];

	echo "Precio total es: ".$modelo->obtenerTotalVenta($cantidad, $idProducto);


 ?>