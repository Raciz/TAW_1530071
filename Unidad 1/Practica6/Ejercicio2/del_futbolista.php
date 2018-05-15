<?php
//importamos el archivo con la funcion del_futbolista
require_once("database_details.php");

//obtenemos el id del futbolista a eliminar
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//en caso de que no se pueda obtener el id se regresa al listado de futbolistas
if(empty($id))
{
    ///nos redireccionamos al listado de futbolistas
    header("location:futbolistas.php");
}

//en caso de que si se manda a llamar la funcion para eliminar el registro del futbolista
del_futbolista($id);
//despues nos redireccionamos al listado de futbolistas
header("location:futbolistas.php");
?>