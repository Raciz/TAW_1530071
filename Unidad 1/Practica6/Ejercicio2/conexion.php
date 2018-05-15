<?php

//datos nesesarios para la conexion a la base de datos
$dsn = "mysql:dbname=Deportistas_UPV;host=localhost";
$user = "root";
$password = "";

$server = "localhost";
$user = "root";
$pass = "";
$db = "Tienda";

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