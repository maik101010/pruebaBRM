<!DOCTYPE html>
<html>
<head>
	<title>Editar Persona</title>
</head>
<body>
	<form action="../controlador/ClienteController.php" method="post">
 		<input type="text" name="cantidad" placeholder="cantidad">
 		<select name="id_producto">
 		<option value="0">Seleccionar producto</option>
					<?php
					include '../modelo/ProductoModel.php';
					$objeto = new ProductoModel;
					$resultado = $objeto->getProductosHabilitados();
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