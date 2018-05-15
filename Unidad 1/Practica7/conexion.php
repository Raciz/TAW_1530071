<?php

//datos nesesarios para la conexion a la base de datos
$dsn = "mysql:dbname=Tienda_TAW;host=localhost";
$user = "root";
$password = "";

try
{
    //creacion de la conexion con PDO
    $conn = new PDO($dsn,$user,$password);
}
catch(PDOException $e)
{
    //mensaje de error en caso de qe no se pueda realizar la conexion
    echo 'Error al conectarnos: ' . $e->getMessage();
}
?>