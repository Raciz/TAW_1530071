<?php
//Archivo de conexion a la base de datos

$dsn = 'mysql:dbname=practica6;host=localhost';//Se declara el servicio (mysql), nombre de la base de datos y el nombre del host
$user = 'root';//usuario utilizado para conectarse al servicio mysql
$password = '';//contraseña para el usuario

//Se evaluan los datos para crear un archivo de conexion de tipo PDO
try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	//en caso de existir un error se muestra el mensaje de error y su codigo
	echo 'Error al conectarnos: ' . $e->getMessage();
}
