<?php 
include("../modelo/ClienteModel.php");
$modelo = new ClienteModel();


if (isset($_POST['insertar'])) {

	$cantidad = $_POST["cantidad"];
	$idProducto = $_POST["id_producto"];
	$respuesta = $modelo->validarCantidadProducto($cantidad, $idProducto);
	if ($respuesta!=1) {
		echo "Alto, no tenemos tantos productos";		
	}else{
		$cantidadDescontar = $modelo->obtenerCantidad($cantidad, $idProducto);
		//echo "La cantidad a descontar es :" . $cantidadDescontar;
		$modelo->descontarProducto($cantidadDescontar, $idProducto);

	}

}