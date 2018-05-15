<?php

//importamos el archivo con la funcion agregar
require_once("database_details.php");

//obtenemos el id del alumno a eliminar
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//en caso de que no se pueda obtener el id se regresa index
if(empty($id))
{
    ///nos redireccionamos al index
    header("location:index.php");
}

//en caso de que si se manda a llamar la funcion para eliminar al registro del alumno
eliminar($id);
//despues nos redireccionamos al index
header("location:index.php");

?>

