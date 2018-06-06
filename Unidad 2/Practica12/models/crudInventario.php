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
            $id = Conexion::conectar() -> prepare("SELECT MAX(id_producto) as id FROM $tabla");
            $id -> execute();
            $idProduct = $id -> fetch();
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

        //verificamos si es una entrada o salida del stock para el mensaje de modificacion
        if($data["stock"] < 0)
        {
            //si es de salida sacamos el valor absoluto de stock y creamos el mensaje de salida
            $data["stock"] = abs($data["stock"]);
            $nota = $username." eliminó ".$data["stock"]." producto(s) al inventario";
        }
        else
        {
            //si es entrada simplemente creamos el mensaje de entrada
            $nota = $username." agregó ".$data["stock"]." producto(s) al inventario";
        }

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

    //modelo para actualizar el stock de un producto
    public static function updateStockInventarioModel ($tabla,$data,$product)
    {
        //obtenemos el stock actual del producto
        $stmt = Conexion::conectar() -> prepare("SELECT stock FROM $tabla");
        $stmt -> execute();
        $stock = $stmt -> fetch();
        $stock = $stock["stock"];

        //preparamos el update para actualizar el inventario
        $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET stock = :stock WHERE id_producto = :id");

        //se realiza la asignacion de los datos a insertar
        $stock = $stock + $data["stock"];
        $stmt -> bindParam(":id",$product,PDO::PARAM_INT);
        $stmt -> bindParam(":stock",$stock,PDO::PARAM_INT);

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

    //modelo para obtener el historial de un producto 
    public static function listadoHistorialInventarioModel($tabla,$id)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE id_producto = :id");

        //se asigna el id del producto a mostrar su hstorial
        $stmt -> bindParam(":id",$id,PDO::PARAM_INT);

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion del historial
        return $stmt -> fetchAll();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para obtener la informacion de un producto 
    public static function infoInventarioModel($tabla,$id)
    {
        //preparamos la consulta
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE id_producto = :id");

        //se asigna el id del producto a mostrar su hstorial
        $stmt -> bindParam(":id",$id,PDO::PARAM_INT);

        //se ejecuta la consulta
        $stmt -> execute();

        //retornamos la informacion del historial
        return $stmt -> fetch();

        //cerramos la conexion
        $stmt -> close();
    }

    //modelo para borrar el historial de un producto de la base de datos
    public static function eliminarHistorialInventarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el delete
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_producto = :id");

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

    //modelo para borrar un producto de la base de datos
    public static function eliminarInventarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el delete
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id_producto = :id");

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

    //modelo para obtener la informacion de un producto
    public static function editarInventarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el select
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id");

        //se realiza la asignacion de los datos para la consulta
        $stmt->bindParam(":id",$data, PDO::PARAM_INT);	

        //se ejecuta la sentencia
        $stmt->execute();

        //retornamos la fila obtenida con el select
        return $stmt->fetch();

        //cerramos la conexion
        $stmt->close();
    }

    //modelo para modificar la informacion de un producto registrada en la base de datos
    public static function modificarInventarioModel($data,$tabla)
    {
        //preparamos la sentencia para realizar el update
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_producto = :nombre, id_categoria = :categoria, precio = :precio WHERE id_producto = :id");

        //se realiza la asignacion de los datos para el update
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":categoria", $data["categoria"], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $data["precio"], PDO::PARAM_STR);

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
?>