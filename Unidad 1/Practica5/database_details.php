<?php
require_once("conexion.php");

//realizacion de la conexion a la base de datos
$conn = new mysqli($host,$user,$pass,$db);

//verificamos que no haya ocurrido algun error
if ($conn->connect_error) 
{
    //imprimimos el error de conexion
    die('Error de conexión: ' . $conn->connect_error); 
}

//funcion para agregar una nuevo alumno a la base de datos
function agregar($nombre,$email,$tel)
{
    global $conn;
    
    //ejecucion del insert
    $conn->query("INSERT alumnos(nombre,email,telefono) VALUES ('$nombre','$email','$tel')");
}

//funcion para obtener la informacion de todos los alumnos en la base de datos
function listado()
{
    global $conn;
    
    //ejecucion del Select para obtener la informacion 
    $data = $conn->query("SELECT * FROM alumnos");
    
    //retornamos la variable con toda la informacion de los alumnos
    return $data;
}

//funcion para obtener el total de alumnos registados
function total_alumnos()
{
    global $conn;
    
    //ejecucion del Select para obtener el total de filas de la tabla 
    $data = $conn->query("SELECT COUNT(*) as total FROM alumnos");
    $data = $data->fetch_assoc();
    
    //retornamos la variable con el total de alumnos regstrados
    return $data["total"];
}

//funcion para eliminar un alumno de la base de datos

function eliminar($id)
{
    global $conn;
    
    //ejecucion el delete para eliminar la infromacion del alumno 
    $data = $conn->query("DELETE FROM alumnos WHERE id = $id");
}

//funcion para actualizar la informacion de un alumno de la base de datos
function modificar($id,$nombre,$email,$tel)
{
    global $conn;
    
    //ejecucion del update para actualizar la infromacion del alumno 
    $data = $conn->query("UPDATE alumnos SET nombre = '$nombre', email = '$email', telefono = '$tel' WHERE id = $id");
}

//funcion para obtener la informacion de un los alumnos en la base de datos
function info_alumno($id)
{
    global $conn;
    
    //ejecucion del Select para obtener la informacion 
    $data = $conn->query("SELECT * FROM alumnos WHERE id = $id");
    $data = $data->fetch_assoc();
    //retornamos la variable con toda la informacion de los alumnos
    return $data;
}

?>