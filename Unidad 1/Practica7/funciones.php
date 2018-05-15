<?php
require_once "conexion.php";

//funcion para agregar un nuevo producto
function agregar_producto($nombre,$precio)
{
    global $conn;
    
    //preparamos la consulta para insertar un nuevo producto 
    $stmt = $conn -> prepare("INSERT INTO productos (nombre,precio) VALUES ('$nombre',$precio)");
    //ejecutamos la consulta
    $stmt -> execute();
}

//funcion para agregar un nuevo usuario
function agregar_usuario($user,$pass)
{
    global $conn;
    
    //encriptamos la contraseña
    $pass = md5($pass);
    
    //preparamos la consulta para insertar un nuevo usuario 
    $stmt = $conn -> prepare("INSERT INTO cuenta (usuario,password) VALUES ('$user','$pass')");
    //ejecutamos la consulta
    $stmt -> execute();
}

//funcion para obtener la informacion de los productos
function info_productos()
{
    global $conn;
    
    //preparamos la consulta obtener la informacion de los productos 
    $stmt = $conn -> prepare("SELECT * FROM productos");
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
?>