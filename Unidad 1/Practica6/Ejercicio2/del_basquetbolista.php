<?php
//importamos el archivo con la funcion del_basquetbolista
require_once("database_details.php");

//obtenemos el id del basquetbolista a eliminar
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//en caso de que no se pueda obtener el id se regresa al listado de basquetbolistas
if(empty($id))
{
    ///nos redireccionamos al listado de basquetbolistas
    header("location:basquetbolistas.php");
}

//en caso de que si se manda a llamar la funcion para eliminar el registro del basquetbolista
del_basquetbolista($id);
//despues nos redireccionamos al listado de futbolistas
header("location:basquetbolistas.php");
?>