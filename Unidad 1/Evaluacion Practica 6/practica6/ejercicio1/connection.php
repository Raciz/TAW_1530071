<?php
//Archivo encargado de la conexion a la base de datos utilizando PDO
$dsn = 'mysql:dbname=practica6;host=localhost';//contiene el servicio, nombre de la base de datos y de el host
$user = 'root';//usuario con el que se accesa a la base de datos
$password = '';//contraseña para el servicio de la base de datos

try{
	//declaracion de un nuevo objeto pdo para lograr la conexion a la bd
	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	//en caso de no tener exito en la conexion se muestra un mensaje de error
	echo 'Error al conectarnos: ' . $e->getMessage();
}