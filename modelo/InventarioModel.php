<?php 
include "Conexion.php";
/**
 * Clase donde se gestiona lo relacionado a la tabla producto
 */
class InventarioModel
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
     * Obtiene los productos y su informacion de las tablas producto e inventario
     * @return [array] [registros de la tabla producto e inventario donde estado es igual a 1]
     */
    public function obtenerInventario(){

        $query = "SELECT lote, precio, fecha_vencimiento, cantidad, nombre FROM inventario
        INNER JOIN producto on producto.id_producto = inventario.producto_id";
        $stament = $this->conexion->prepare($query);
        $stament->execute();
        $resultados = $stament->fetchAll(PDO::FETCH_ASSOC);
        $arr = [];
        $i=0;

        foreach ($resultados as $row) {
            $arr[$i] = $row;
            $i++;
        }

        return $arr;       
    }
    /**
     * Carga la informacion del producto a partir del número de lote dado 
     * @param  [int] $lote [numero lote del producto]
     * @return [array]       [registros de la tabla inventario y producto a partir del número de lote]
     */
    public function cargarProducto($lote){

        $query = "SELECT lote, precio, fecha_vencimiento, cantidad, nombre FROM inventario
        INNER JOIN producto on producto.id_producto = inventario.producto_id WHERE lote = ?";
        $stament = $this->conexion->prepare($query);
        $stament->bindParam(1, $lote);
        $stament->execute();
        $resultados = $stament->fetchAll(PDO::FETCH_ASSOC);
        $arr = [];
        $i=0;

        foreach ($resultados as $row) {
            $arr[$i] = $row;
            $i++;
        }

        return $arr;       
    }
    

}


