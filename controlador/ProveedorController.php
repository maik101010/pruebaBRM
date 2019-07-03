<?php 
include("../modelo/ProveedorModel.php");
$modelo = new ProveedorModel();


if (isset($_POST['insertar'])) {

	$lote = $_POST["lote"];
	$precio =$_POST["precio"];
	$cantidad = $_POST["cantidad"];
	$fVencimiento = $_POST["fVencimiento"];
	$idProducto = $_POST["id_producto"];

	$modelo->agregar($lote, $precio, $cantidad, $fVencimiento, $idProducto);

}