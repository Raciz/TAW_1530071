<?php
require_once "conexion.php";

//funcion para agregar un nuevo producto
function agregar_producto($nombre,$precio)
{
    global $conn;
    
    //preparamos la consulta para insertar un nuevo producto 
    $stmt = $conn -> prepare("INSERT INTO producto (nombre,precio) VALUES ('$nombre',$precio)");
    //ejecutamos la consulta
    $stmt -> execute();
}

//funcion para agregar un nuevo usuario
function agregar_usuario($user,$pass,$name,$tel)
{
    global $conn;
    
    //encriptamos la contraseña
    $pass = md5($pass);
    
    //preparamos la consulta para insertar un nuevo usuario 
    $stmt = $conn -> prepare("INSERT INTO cuenta (usuario,password,nombre,telefono) VALUES ('$user','$pass','$$nombre','$tel')");
    //ejecutamos la consulta
    $stmt -> execute();
}

//funcion para obtener la informacion de los productos
function info_productos()
{
    global $conn;
    
    //preparamos la consulta obtener la informacion de los productos 
    $stmt = $conn -> prepare("SELECT * FROM producto");
    //ejecutamos la consulta
    $stmt -> execute();
    //retornamos stmt que contiene la informacion de los productos
    return $stmt;
}

//funcion para agregar una nueva venta
function agregar_venta($producto,$cantidad)
{
    global $conn;
    
    //preparamos la consulta para insertar una nueva venta 
    $stmt = $conn -> prepare("INSERT INTO ventas (producto,cantidad) VALUES ($producto,$cantidad)");
    //ejecutamos la consulta
    $stmt -> execute();
}

//funcion para obtener la informacion de los usuarios registrados
function listado_users()
{
    global $conn;
    
    //preparamos la consulta para obtener la informacion de los usuarios 
    $stmt = $conn -> prepare("SELECT * FROM cuenta");
    //ejecutamos la consulta
    $stmt -> execute();
    //retornamos stmt que contiene la informacion de los usuarios
    return $stmt;
}

//funcion para obtener la informacion de un usuario
function info_user($id)
{
    global $conn;
    
    //preparamos la consulta para obtener la informacion del usuario 
    $stmt = $conn -> prepare("SELECT * FROM cuenta WHERE usuario = '$id'");
    //ejecutamos la consulta
    $stmt -> execute();
    //obtenemos la informacion del usuario
    $data = $stmt -> fetch();
    //retornamos data que contiene la informacion del usuario
    return $data;
}

//funcion para modificar la informacion de un usuario
function update_user($oldUser,$newUser,$name,$tel)
{
    global $conn;
    
    //preparamos la consulta para modificar la informacion del usuario 
    $stmt = $conn -> prepare("UPDATE cuenta SET usuario = '$newUser', nombre = '$name', telefono = '$tel' WHERE usuario = '$oldUser'");
    //ejecutamos la consulta
    $stmt -> execute();
}
?>
