<?php
require_once "conexion.php";

function agregar_producto($nombre,$precio)
{
    global $conn;
    
    $stmt = $conn -> prepare("INSERT INTO productos (nombre,precio) VALUES ('$nombre',$precio)");
    $stmt -> execute();
}

function agregar_usuario($user,$pass)
{
    global $conn;
    $pass = md5($pass);
    
    $stmt = $conn -> prepare("INSERT INTO cuenta (usuario,password) VALUES ('$user','$pass')");
    $stmt -> execute();
}

function info_productos()
{
    global $conn;
    
    $stmt = $conn -> prepare("SELECT * FROM productos");
    $stmt -> execute();
    return $stmt;
}

function agregar_venta($producto,$cantidad)
{
    global $conn;
    
    $stmt = $conn -> prepare("INSERT INTO ventas (producto,cantidad) VALUES ($producto,$cantidad)");
    $stmt -> execute();
}
?>