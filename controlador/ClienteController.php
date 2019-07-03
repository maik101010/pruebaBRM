<?php 
include("../modelo/ClienteModel.php");
$modelo = new ClienteModel();


if (isset($_POST['insertar'])) {

	$cantidad = $_POST["cantidad"];
	$idProducto = $_POST["id_producto"];
	$respuesta = $modelo->validarCantidadProducto($cantidad, $idProducto);
	if ($respuesta!=1) {
		echo "<script>alert('Ha ocurrido un  error')
        	window.location.replace('../vista/cliente_compra_view.php');
		</script>";
		
	}else{
		$cantidadDescontar = $modelo->obtenerCantidad($cantidad, $idProducto);
		//echo "La cantidad a descontar es :" . $cantidadDescontar;
		$res = $modelo->descontarProducto($cantidadDescontar, $idProducto);
		if ($res!=1) {
			echo "<script>alert('Ha ocurrido un  error')
        	window.location.replace('../vista/cliente_compra_view.php');
		</script>";
		
		}else{
			echo "<script>alert('Se realizo el registro correctamente')
        	window.location.replace('../vista/cliente_compra_view.php');
		</script>";
		}

	}

}