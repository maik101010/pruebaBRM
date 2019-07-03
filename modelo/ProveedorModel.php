<?php 
include "Conexion.php";
/**
 * CLase que nos permite gestionar todo lo referente al proveedor
 */
class ProveedorModel
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
     * Metodo que agrega un inventario con el producto 
     * @param [int] $lote         numero lote del producto
     * @param [double] $precio       precio del producto
     * @param [int] $cantidad     cantidad del producto
     * @param [date] $fVencimiento fecha de vencimiento del producto
     * @param [int] $idProducto   id del producto
     */
    public function agregar($lote, $precio, $cantidad, $fVencimiento, $idProducto){
            
            $sth = $this->conexion->prepare("INSERT INTO inventario (lote, precio, fecha_vencimiento, cantidad, producto_id) VALUES(?,?,?,?,?)");
            $sth->bindParam(1, $lote);
            $sth->bindParam(2, $precio);
            $sth->bindParam(3, $fVencimiento);
            $sth->bindParam(4, $cantidad);
            $sth->bindParam(5, $idProducto);

            $res=0;
            
            if ($sth->execute()) {
                $sth2 = $this->conexion->prepare("update producto set estado = 1 where id_producto= ?");
                $sth2->bindParam(1, $idProducto);
                if ($sth2->execute()) {
                    echo "Patata";
                    $res =1;
                }else{
                    echo "Error patata";
                    $res = 0;
                }
                $res = 1;
                //header("Location: ../vista/proveedor_producto_view.php");

            }else{
                $res = 0;
                echo "No insertado";
            }     

            return $res;   
        
    }  


}


