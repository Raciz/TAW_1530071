<?php

//clase para realizar la conecion a la base de datos
class conexion
{
    //funcion para retornar una conexion a la base de datos
    public static function conectar()
    {
        //creamos la conexion
        $conn = new PDO("mysql:host=localhost;dbname=Inventario","root","");
        
        //y la retornamos
        return $conn;
    }
}
?>
