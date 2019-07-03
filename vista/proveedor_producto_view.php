<!DOCTYPE html>
<html>
<head>
	<title>proveedor producto</title>
</head>
<body>
 	<form action="../controlador/ProveedorController.php" method="post">
 		<input type="text" name="lote" placeholder="lote">
 		<input type="text" name="precio" placeholder="precio">
 		<input type="text" name="cantidad" placeholder="cantidad">
 		<input type="date" name="fVencimiento">
 		<select name="id_producto">
 			<option value="0">Seleccionar producto</option>
					<?php
					include '../modelo/ProductoModel.php';
					$objeto = new ProductoModel;
					$resultado = $objeto->getProductosInhabilitados();
					foreach ($resultado as $row) {
						$opciones='<option value="'.$row["id_producto"].'">'.$row["nombre"].'</option>';
						echo $opciones;
						}              
					?>
		</select>
 		<input type="submit" value="Insertar" name="insertar">
 	</form>
	    
</body>
</html>