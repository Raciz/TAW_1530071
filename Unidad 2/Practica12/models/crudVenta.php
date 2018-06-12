<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de ventas
class CRUDVenta
{
    public static function agregarProductoController($data,$tabla1,$tabla2)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla1 as p JOIN $tabla2 as pt on p.id_producto = pt.id_producto  WHERE pt.id_tienda = :tienda AND p.codigo_producto = :codigo");

        //se realiza la asignacion de los datos
        $stmt -> bindParam(":tienda",$data["tienda"],PDO::PARAM_INT);
        $stmt -> bindParam(":codigo",$data["codigo"],PDO::PARAM_INT);

        //ejecutar la sentencia
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetch(PDO::FETCH_OBJ);

        //cerramos la conexion
        $stmt -> close();
    }

    public static function agregarVentaModel($data,$total,$tabla1,$tabla2,$tabla3,$tienda)
    {
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla1 (total,id_tienda) VALUES (:total,:tienda)");
        $stmt -> bindParam(":tienda",$tienda,PDO::PARAM_INT);
        $stmt -> bindParam(":total",$total,PDO::PARAM_INT);
        $stmt -> execute();

        //---------------------------------------------

        $stmt = Conexion::conectar() -> prepare("SELECT MAX(id_venta) as id FROM $tabla1");
        $stmt -> execute();
        $id = $stmt -> fetch();
        $id = $id["id"];

        //--------------------------------------------

        $insert = Conexion::conectar() -> prepare("INSERT INTO $tabla2 (id_venta,id_tienda,id_producto,cantidad,total) VALUES (:venta,:tienda,:producto,:cantidad,:total)");

        $update = Conexion::conectar() -> prepare("UPDATE $tabla3 SET stock = stock - :cantidad WHERE id_producto = :producto AND id_tienda = :tienda"); 
        
        foreach($_SESSION["compra"] as $producto)
        {
            $insert -> bindParam(":venta",$id,PDO::PARAM_INT);
            $insert -> bindParam(":tienda",$tienda,PDO::PARAM_INT);
            $insert -> bindParam(":producto",$producto -> id_producto,PDO::PARAM_INT);
            $insert -> bindParam(":cantidad",$producto -> cantidad,PDO::PARAM_INT);
            $insert -> bindParam(":total",$producto -> total,PDO::PARAM_INT);

            $update -> bindParam(":tienda",$tienda,PDO::PARAM_INT);
            $update -> bindParam(":producto",$producto -> id_producto,PDO::PARAM_INT);
            $update -> bindParam(":cantidad",$producto -> cantidad,PDO::PARAM_INT);
            
            $insert -> execute();
            $update -> execute();
        }

        return "success";
    }

    //modelo para obtener la informacion de las ventas registradas
    public static function listadoVentaModel($tabla,$tienda)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE id_tienda = :tienda");
        $stmt -> bindParam(":tienda",$tienda,PDO::PARAM_INT);
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener la informacion de los productos en las ventas registradas
    public static function listadoProductoVentaModel($tabla1,$tabla2,$venta)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT p.nombre_producto, vp.cantidad, vp.total FROM $tabla1 as vp JOIN $tabla2 as p on vp.id_producto = p.id_producto WHERE vp.id_venta = :venta");
        $stmt -> bindParam(":venta",$venta,PDO::PARAM_INT);
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar la venta de una tiens
    public static function eliminarVentaModel($data,$tabla1,$tabla2)
    {
        //preparamos la sentencia para realizar el delete de la tabla1
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE id_venta = :venta");

        //se realiza la asignacion de los datos a eliminar
        $stmt1 -> bindParam(":venta",$data,PDO::PARAM_INT);

        //preparamos la sentencia para realizar el delete de la tabla2
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla2 WHERE id_venta = :venta");

        //se realiza la asignacion de los datos a eliminar
        $stmt2 -> bindParam(":venta",$data,PDO::PARAM_INT);

        //se ejecuta la sentencia
        if($stmt1 -> execute() && $stmt2 -> execute())
        {
            //si se ejecuto correctamente nos retorna success
            return "success";
        }
        else
        {
            //en caso de no ser asi nos retorna fail
            return "fail";
        }

        //cerramos la conexion
        $stmt -> close();
    }
}
?>