<?php
require_once "conexion.php";

//clase para realizar operaciones a la base de datos para la seccion de inventario
class CRUDInventario
{
    //modelo para registrar un producto en la base de datos
    public static function agregarInventarioModel($data,$tabla,&$idProduct)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (codigo_producto,nombre_producto,fecha_de_registro,precio,stock,img,id_categoria) VALUES (:codigo,:nombre,NOW(),:precio,:stock,:img,:categoria)");

        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":codigo",$data["codigo"],PDO::PARAM_STR);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":precio",$data["precio"],PDO::PARAM_STR);
        $stmt -> bindParam(":stock",$data["stock"],PDO::PARAM_STR);
        $stmt -> bindParam(":img",$data["img"],PDO::PARAM_STR);
        $stmt -> bindParam(":categoria",$data["categoria"],PDO::PARAM_STR);
        

        //se ejecuta la sentencia
        if($stmt -> execute())
        {
            //obtenemos el id del producto insertado
            $idProduct = Conexion::conectar() -> prepare("SELECT MAX(id_producto) as id FROM $tabla");
            $idProduct = $idProduct -> execute();
            $idProduct = $idProduct -> fetch();
            $idProduct = $idProduct["id"];
            
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
    
    //modelo para crear un registro en el historial de un producto
    public static function historialInventarioModel($tabla,$data,$userid,$username,$product)
    {
        //se prepara la sentencia para realizar el insert
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (id_producto,id_usuario,fecha,hora,referencia,cantidad,nota) VALUES (:producto,:usuario,NOW(),NOW(),:referencia,:cantidad,:nota)");

        $nota = $username." agregó ".$data["stock"]." producto(s) al inventario";
        
        //se realiza la asignacion de los datos a insertar
        $stmt -> bindParam(":usuario",$userid,PDO::PARAM_INT);
        $stmt -> bindParam(":producto",$product,PDO::PARAM_INT);
        $stmt -> bindParam(":referencia",$data["codigo"],PDO::PARAM_STR);
        $stmt -> bindParam(":cantidad",$data["stock"],PDO::PARAM_STR);
        $stmt -> bindParam(":nota",$nota,PDO::PARAM_STR);

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
    
    //modelo para obtener la informacion de los producto registrados en el sistema
    public static function listadoInventarioModel($tabla)
    {
        //preparamos la consulta y la ejecutamos
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
        $stmt -> execute();

        //retornamos la informacion de la tabla
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }
    
    /*/modelo para borrar un usuario de la base de datos
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
    
    //modelo para obtener la informacion de un usuario
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