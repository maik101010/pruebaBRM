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
	<h3>Venta de producto</h3>
	<form action="../controlador/ClienteController.php" method="post">
 		<input type="text" name="cantidad" placeholder="cantidad" id="cantidad">
 		<select name="id_producto" id="id_producto">
 		<option value="0">Seleccionar producto</option>
					<?php
					include_once '../modelo/ProductoModel.php';
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

 	<h5 id="resultado"></h5>

 	<?php 
 		include '../general/scripts.php';
 	 ?>

 <script type="text/javascript">
      $(document).ready(function(e){
      
      	$("#id_producto").change(function(){
	        var id_producto = $(this).children("option:selected").val();
	        console.log("Id product: " + id_producto);

		      $("#cantidad").keyup(function(e){
		      	var cantidad = $("#cantidad").val();
		        console.log("Cantidad: " + cantidad);			       
			            $.ajax({
				        	type: "post",
				        	url: "../controlador/CargarTotalController.php",
				        	dataType:"html",     
					        data:{cantidad : cantidad, id_producto : id_producto}, 

					        success: function(data){

					        	console.log(data);
					       		$("#resultado").empty();
				         	   	$("#resultado").append(data);

				          }
				        });		      	 
		        });
	    
	        });
      });

    </script>
</body>
</html>