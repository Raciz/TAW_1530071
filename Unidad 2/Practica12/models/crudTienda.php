<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de usuarios
class CRUDTienda
{
    //modelo para registrar un usuario en la base de datos
    public static function agregarTiendaModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre,direccion,estado) VALUES (:nombre,:direccion,:estado)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":direccion",$data["direccion"],PDO::PARAM_STR);
        $stmt -> bindParam(":estado",$data["estado"],PDO::PARAM_STR);

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
        $stmt -> close();
    }
    
    //modelo para obtener la informacion de los usuarios registradas
    public static function listadoTiendaModel($tabla)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para borrar una tienda de la base de datos
    public static function eliminarTiendaModel($data,$tabla1,$tabla2,$tabla3)
    {
        //preparamos la sentencia para realizar el delete
        $stmt1 = Conexion::conectar() -> prepare("DELETE FROM $tabla1 WHERE id_tienda = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt1 -> bindParam(":id",$data,PDO::PARAM_INT);

        //preparamos la sentencia para realizar el delete
        $stmt2 = Conexion::conectar() -> prepare("DELETE FROM $tabla2 WHERE id_tienda = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt2 -> bindParam(":id",$data,PDO::PARAM_INT);
        
        //preparamos la sentencia para realizar el delete
        $stmt3 = Conexion::conectar() -> prepare("DELETE FROM $tabla3 WHERE id_tienda = :id");

        //se realiza la asignacion de los datos a eliminar
        $stmt3 -> bindParam(":id",$data,PDO::PARAM_INT);
        
        
        
        //se ejecuta la sentencia
        if($stmt1 -> execute() && $stmt2 -> execute() && $stmt3 -> execute())
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
    
    /*/modelo para obtener la informacion de un usuario
    public static function editarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id");
        
        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_INT);	
        
        //se ejecuta la sentencia
        $stmt->execute();
        
        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }
    
    //modelo para modificar la informacion de un usuario registrada en la base de datos
    public static function modificarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, usuario = :usuario, password = :password, email = :email WHERE id_usuario = :id");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellido", $data["apellido"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $data["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);

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
        $stmt->close();
    }*/
}
?>