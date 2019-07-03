<?php 
include "Conexion.php";
/**
 * Clase que modela la tabla producto
 */
class ClienteModel
{
    /**
     * [$conexion Variable donde se almacena la conexión a la base de datos]
     * @var [PDO]
     */
    private $conexion;
    
    public function __construct(){
        $this->conexion=Conexion::conectar();       
    }
    /**
     * Valida que la cantidad del producto no sea superior a la que tenemos en el inventario
     * @return [int] [1 si cumple la condición, 0 sino]
     */
    public function validarCantidadProducto($cantidad, $idProducto){

        $query = "SELECT cantidad FROM inventario where producto_id = ?";
        $stament = $this->conexion->prepare($query);
        $stament->bindParam(1, $idProducto);
        $stament->execute();
        $resultados = $stament->fetchAll(PDO::FETCH_ASSOC);
  
        foreach ($resultados as $row) {
            $cantidadProducto= $row["cantidad"];
            
        }
        if ($cantidad>$cantidadProducto) {
            
            return 0;
        }else{
            return 1;
        }  
    }
    /**
     * Actualiza la cantidad del producto en el inventario
     * @param  [int] $cantidad   la cantidad a actualizar
     * @param  [int] $idProducto el id del producto
     * @return [int] 1 si se actualizo correctamente, 0 sino 
     */
    public function descontarProducto($cantidad, $idProducto){
        $query = "UPDATE inventario SET cantidad = ? WHERE producto_id = ?";
        $stament = $this->conexion->prepare($query);
        $stament->bindParam(1, $cantidad);
        $stament->bindParam(2, $idProducto);
        if($stament->execute()){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Obtenemos la cantidad a modificar en la tabla inventario
     * @param  [int] $cantidad   cantidad del producto 
     * @param  [int] $idProducto id del producto
     * @return [int] $cantidadActual la cantidad actual que se debe actualizar en la tabla inventario
     */
    public function obtenerCantidad($cantidad, $idProducto){

        $query = "SELECT cantidad FROM inventario WHERE producto_id = ?";
        $stament = $this->conexion->prepare($query);
        $stament->bindParam(1, $idProducto);
        $stament->execute();
        $resultados = $stament->fetchAll(PDO::FETCH_ASSOC);
  
        foreach ($resultados as $row) {
            $cantidadProducto= $row["cantidad"];
            
        }
        $cantidadActual=0;

        for ($i=$cantidadProducto; $i > $cantidad ; $i--) { 
            $cantidadActual++;
        }

       return $cantidadActual;       


    }


    

}


