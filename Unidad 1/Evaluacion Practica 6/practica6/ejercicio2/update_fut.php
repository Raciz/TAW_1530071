<?php 
	//Archivo para actualizar datos de un futbolista
	//Se incluye el archivo de conexion a la bd
	include 'connection.php';

	//Se obtienen los datos a actualizar mediante POST
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$posicion = $_POST['posicion'];
	$equipo = $_POST['equipo'];
	$carrera = $_POST['carrera'];
	$email = $_POST['email'];

	//Se prepara la sentencia sql
	$sql = "UPDATE futbolista SET nombre = '$nombre', posicion = '$posicion', equipo = '$equipo', carrera = '$carrera', email = '$email' WHERE id = $id";
	
	//Se ejecuta la sentencia
	$pdo->query($sql);

	//Se muestra un mensaje de estado
	echo "<script type='text/javascript'>";
	echo "alert('Futbolista actualizado exitosamente.');";
	echo "window.location.href = 'index.php';";
	echo "</script>";
 ?>