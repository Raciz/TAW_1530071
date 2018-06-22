<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de alumnos
class CRUDPago
{
    //modelo para registrar un alumno en la base de datos
    public static function agregarPagoModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (alumna,mama,fecha_pago,fecha_envio,img_comprobante,folio) VALUES (:alumna,:mama,:fecha_pago,NOW(),:img,:folio)");


        //cambiamos el formato de la fecha a yyyy/mm/dd
        $fecha = date("Y/m/d", strtotime($data["pago"]));

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":alumna",$data["alumno"],PDO::PARAM_INT);
        $stmt -> bindParam(":mama",$data["mama"],PDO::PARAM_STR);
        $stmt -> bindParam(":fecha_pago",$fecha,PDO::PARAM_STR);
        $stmt -> bindParam(":img",$data["img"],PDO::PARAM_STR);
        $stmt -> bindParam(":folio",$data["folio"],PDO::PARAM_INT);
        
        //se ejecuta la sentencia
        if($stmt -> execute())
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

    //modelo para obtener la informacion de los Pagos registrados
    public static function listadoPagoModel($tabla1,$tabla2)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT p.id_pago,a.nombre,a.apellido,p.fecha_envio,p.fecha_pago,p.img_comprobante,p.folio,p.mama FROM $tabla1 as p JOIN $tabla2 as a on p.alumna = a.id_alumna");

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar un pago de la base de datos
    public static function eliminarPagoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el delete
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_pago = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);

        //se ejecuta la sentencia
        if($stmt -> execute())
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

    /*/modelo para obtener la informacion de un alumno
    public static function editarAlumnoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumna = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_INT);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de un alumno registrada en la base de datos
    public static function modificarAlumnoModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, fechaNac = :fecha, grupo = :grupo WHERE id_alumna = :id");

        //cambiamos el formato de la fecha a yyyy/mm/dd
        $fecha = date("Y/m/d", strtotime($data["fecha"]));

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt -> bindParam(":grupo", $data["grupo"], PDO::PARAM_STR);

        //se ejecuta la sentencia
        if($stmt -> execute())
        {
            //si se ejecuto correctamente nos retorna success
            return "success";
        }
        else
        {
            print_r($stmt -> errorInfo());
            //en caso de no ser asi nos retorna fail
            return "fail";
        }

        //cerramos la conexion
        $stmt->close();
    }*/
}
?>