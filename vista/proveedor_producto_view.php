<!DOCTYPE html>
<html>
<head>
	<title>proveedor producto</title>
<?php 
		include '../general/estilos.php';
	 ?>
</head>

<?php 
	include '../general/header.php';
	 ?>
<body>
	<h3>Registro de productos</h3>
 	<form action="../controlador/ProveedorController.php" method="post">
 		<div class="form-group">
	 		<input type="text" name="lote" placeholder="lote">
	 		<input type="text" name="precio" placeholder="precio">
		</div>
		<div class="form-group">	 	
	 		<input type="text" name="cantidad" placeholder="cantidad">
	 		<input type="date" name="fVencimiento">
	 	</div>
	 	<div class="form-group">	
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
		</div>
 		<input type="submit" value="Insertar" name="insertar">
 	</form>
    <?php 
 		include '../general/scripts.php';
	?>
</body>
</html>