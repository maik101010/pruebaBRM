<?php 
include("../modelo/ProveedorModel.php");
$modelo = new ProveedorModel();


if (isset($_POST['insertar'])) {

	$lote = $_POST["lote"];
	$precio =$_POST["precio"];
	$cantidad = $_POST["cantidad"];
	$fVencimiento = $_POST["fVencimiento"];
	$idProducto = $_POST["id_producto"];

	$res = $modelo->agregar($lote, $precio, $cantidad, $fVencimiento, $idProducto);
	if ($res!=1) {
		echo "<script>alert('Ha ocurrido un  error')
        	window.location.replace('../vista/proveedor_producto_view.php');
		</script>";
		
		
	}else{
		echo "<script>alert('Registro insertado correctamente')
        	window.location.replace('../vista/proveedor_producto_view.php');
		</script>";
		
	}

}