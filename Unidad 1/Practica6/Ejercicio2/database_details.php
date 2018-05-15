<?php
require_once("conexion.php");

//funcion para contar los futbolistas registrados
function total_futbolistas()
{
    global $conn;

    //preparamos la consulta para contar los registro de los futbolistas
    $stmt = $conn -> prepare("SELECT COUNT(*) as total FROM Futbolista");
    //ejecutamos la consulta
    $stmt -> execute();
    //obtenemos el valor obtenido por la consulta anterior
    $data = $stmt -> fetch();
    //retornamos el total de futbolistas
    return $data["total"];
}

//funcion para agregar un futbolista nuevo
function add_futbolista($id,$nombre,$posicion,$carrera,$email)
{
    global $conn;

    //preparamos la consulta para agregar un futbolista nuevo
    $stmt = $conn -> prepare("INSERT INTO Futbolista(id,nombre,posicion,carrera,email) VALUES ($id,'$nombre','$posicion','$carrera','$email')");

    //ejecutamos la consulta para agregarlo a la base de datos
    $stmt -> execute();
}

//funcion para obtener la informacion de los futbolistas registrados en la base de datos
function listado_futbolistas()
{
    global $conn;

    //preparamos la consulta para obtener la informacion de los futbolistas registrados
    $stmt = $conn -> prepare("SELECT * FROM Futbolista");

    //ejecutamos la consulta para obtener la informacion de los futbolistas
    $stmt -> execute();

    //retornamos stmt que contiene toda la informacion de los futbolistas
    return $stmt;
}

//funcion para obtener la informacion de un futbolista en especifico
function info_futbolista($id)
{
    global $conn;

    //preparamos la consulta para obtener la informacion del futbolista
    $stmt = $conn -> prepare("SELECT * FROM Futbolista WHERE id = $id");

    //ejecutamos la consulta para obtener la informacion del futbolista
    $stmt -> execute();

    //obtenemos la informacion del futbolista
    $data = $stmt -> fetch();

    //retornamos data que contiene toda la informacion del futbolista
    return $data;

}

//funcion para eliminar la informacion de un futbolista de la base de datos
function del_futbolista($id)
{
    global $conn;

    //preparamos la consulta para eliminar la informacion del futbolista a eliminar
    $stmt = $conn -> prepare("DELETE FROM Futbolista WHERE id = $id");

    //ejecutamos la consulta para eliminar al futbolista
    $stmt -> execute();
}

//funcion para modificar la informacion de un futbolista 
function update_futbolista($oldId,$newId,$nombre,$posicion,$carrera,$email)
{
    global $conn;

    //preparamos la consulta para modificar la informacion del futbolista
    $stmt = $conn -> prepare("UPDATE Futbolista SET id = $newId, nombre = '$nombre', posicion = '$posicion', carrera = '$carrera', email = '$email' WHERE id = $oldId");

    //ejecutamos la consulta para actualizar la informacion del futbolista
    $stmt -> execute();
    
}

//-----------------------------------------------------------------------------------------------------------------------------

//funcion para contar los basquetbolistas registrados
function total_basquetbolistas()
{
    global $conn;

    //preparamos la consulta para contar los registro de los basquetbolistas
    $stmt = $conn -> prepare("SELECT COUNT(*) as total FROM Basquetbolistas");
    //ejecutamos la consulta
    $stmt -> execute();
    //obtenemos el valor obtenido por la consulta anterior
    $data = $stmt -> fetch();
    //retornamos el total de basquetbolistas
    return $data["total"];
}

//funcion para agregar un basquetbolistas nuevo
function add_basquetbolista($id,$nombre,$posicion,$carrera,$email)
{
    global $conn;

    //preparamos la consulta para agregar un basquetbolista nuevo
    $stmt = $conn -> prepare("INSERT INTO Basquetbolistas(id,nombre,posicion,carrera,email) VALUES ($id,'$nombre','$posicion','$carrera','$email')");

    //ejecutamos la consulta para agregarlo a la base de datos
    $stmt -> execute();
}

//funcion para obtener la informacion de los basquetbolistas registrados en la base de datos
function listado_basquetbolistas()
{
    global $conn;

    //preparamos la consulta para obtener la informacion de los basquetbolistas registrados
    $stmt = $conn -> prepare("SELECT * FROM Basquetbolistas");

    //ejecutamos la consulta para obtener la informacion de los basquetbolistas
    $stmt -> execute();

    //retornamos stmt que contiene toda la informacion de los basquetbolistas
    return $stmt;
}

//funcion para obtener la informacion de un basquetbolista en especifico
function info_basquetbolista($id)
{
    global $conn;

    //preparamos la consulta para obtener la informacion del basquetbolista registrado
    $stmt = $conn -> prepare("SELECT * FROM Basquetbolistas WHERE id = $id");

    //ejecutamos la consulta para obtener la informacion del basquetbolista
    $stmt -> execute();

    //obtenemos la informacion del basquetbolista
    $data = $stmt -> fetch();

    //retornamos data que contiene toda la informacion del basquetbolista
    return $data;

}

//funcion para eliminar la informacion de un basquetbolista de la base de datos
function del_basquetbolista($id)
{
    global $conn;

    //preparamos la consulta para eliminar la informacion del basquetbolista a eliminar
    $stmt = $conn -> prepare("DELETE FROM Basquetbolistas WHERE id = $id");

    //ejecutamos la consulta para eliminar al futbolista
    $stmt -> execute();
}

//funcion para modificar la informacion de un basquetbolista
function update_basquetbolista($oldId,$newId,$nombre,$posicion,$carrera,$email)
{
    global $conn;

    //preparamos la consulta para modificar la informacion del futbolista
    $stmt = $conn -> prepare("UPDATE Basquetbolistas SET id = $newId, nombre = '$nombre', posicion = '$posicion', carrera = '$carrera', email = '$email' WHERE id = $oldId");

    //ejecutamos la consulta para actualizar la informacion del futbolista
    $stmt -> execute();
    
}
?>