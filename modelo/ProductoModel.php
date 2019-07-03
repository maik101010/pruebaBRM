<?php 
include "Conexion.php";
/**
 * Clase donde se gestiona lo relacionado a la tabla producto
 */
class ProductoModel
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
     * Obtiene los registros de los productos que aún no estan en inventario
     * @return [array] [registros de la tabla producto donde el estado sea igual a 0]
     */
    public function getProductosInhabilitados(){

        $query = "SELECT * FROM producto where estado = 0";
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
     * Obtiene los registros de los productos que ya estan en inventario
     * @return [array] [registros de la tabla producto donde el estado sea igual a 1]
     */
    public function getProductosHabilitados(){

        $query = "SELECT * FROM producto where estado = 1";
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

}


