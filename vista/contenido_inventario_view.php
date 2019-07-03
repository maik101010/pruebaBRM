<!DOCTYPE html>
<html>
<head>
	<title>Cliente</title>
	<?php 
		include '../general/estilos.php';
	 ?>
</head>

<?php 
	include '../general/header.php';
	 ?>
<body>

	<h3>Inventario de productos</h3>

	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Número lote</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Fecha de vencimiento</th>
	      <th scope="col">Cantidad en actual</th>
  	      <th scope="col">Precio</th>
  	      <th scope="col">Generar Factura</th>
	    </tr>
	  </thead>
	  <?php
	  	include '../modelo/InventarioModel.php';
	  	$objeto = new InventarioModel;
		$resultado = $objeto->obtenerInventario();
		foreach ($resultado as $row) {?>
			<tbody>
				<tr>
			      <td scope="row"><?php echo $row["lote"]; ?></th>
			      <td><?php echo $row["nombre"]; ?></td>
			      <td><?php echo $row["fecha_vencimiento"]; ?></td>
			      <td><?php echo $row["cantidad"]; ?></td>
			      <td><?php echo $row["precio"]; ?></td>
			      <td><a href="facturaProducto.php?id_lote=<?php echo $row['lote']; ?>">Generar Factura</a></td>
		   		</tr>			    
		  </tbody>
		  <?php } ?>
	</table>
		

 	<?php 
 		include '../general/scripts.php';
 	 ?>
</body>
</html>