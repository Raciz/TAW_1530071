<?php
require_once "conexion.php";

class CRUD extends Conexion
{
    public function insertProductModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,descuento,buyprice,saleprice,price) VALUES (:name,:desc,:buy,:sale,:price)");
        
        print_r($data);
        $stmt -> bindParam(":name",$data["name"],PDO::PARAM_STR);
        $stmt -> bindParam(":desc",$data["desc"],PDO::PARAM_INT);
        $stmt -> bindParam(":buy",$data["buy"],PDO::PARAM_INT);
        $stmt -> bindParam(":sale",$data["sale"],PDO::PARAM_INT);
        $stmt -> bindParam(":price",$data["price"],PDO::PARAM_INT);
        
        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }
        
        $stmt -> close();
    }    
}
?>