<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de usuarios
class CRUDUsuario
{
    //modelo para registrar carrera en la base de datos
    public static function agregarUsuarioModel($data,$tabla)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre,apellido,usuario,password,email,fecha_de_registro) VALUES (:nombre,:apellido,:usuario,:password,:email,NOW())");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":apellido",$data["apellido"],PDO::PARAM_STR);
        $stmt -> bindParam(":usuario",$data["usuario"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$data["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":email",$data["email"],PDO::PARAM_STR);

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
    
    //modelo para obtener la informacion de las carreras registradas
    public static function listadoUsuarioModel($tabla)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    //modelo para borrar un usuario de la base de datos
    public static function eliminarUsuarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el delete
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_usuario = :id");

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
    
    //modelo para modificar la informacion de un usuario
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
    }
}
