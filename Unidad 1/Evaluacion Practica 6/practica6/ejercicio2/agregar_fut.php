<?php 
	//Agregar nuevo futbolista

	//Se incluye el archivo de conexion a la bd
	include 'connection.php';

	//Se obtienen los datos a guardar mediante POST
	$nombre = $_POST['nombre'];
	$posicion = $_POST['posicion'];
	$equipo = $_POST['equipo'];
	$carrera = $_POST['carrera'];
	$email = $_POST['email'];

	//Se prepara la sentencia sql
	$sql = "INSERT INTO futbolista (nombre,posicion,equipo,carrera,email) VALUES ('$nombre', '$posicion', '$equipo', '$carrera', '$email');";
	$pdo->query($sql);//se ejecuta la sentencia

	//Se muestra un mensaje de estado
	echo "<script type='text/javascript'>";
	echo "alert('Futbolista registrado exitosamente.');";
	echo "window.location.href = 'index.php';";
	echo "</script>";
 ?>