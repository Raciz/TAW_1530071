<?php

class conexion
{
    public function conectar()
    {
        $conn = new PDO("mysql:host=localhost;dbname=Tutorias","root","");
        
        return $conn;
    }
}
?>