<?php 
	//Registro de nuevo basquetbolista

	//se incluye el archivo de conexion a bd
	include 'connection.php';

	//se obtienen los campos a guardar mediante POST
	$nombre = $_POST['nombre'];
	$equipo = $_POST['equipo'];
	$carrera = $_POST['carrera'];
	$email = $_POST['email'];

	//Se prepara la sentencia sql para guardar la informacion
	$sql = "INSERT INTO futbolista (nombre,equipo,carrera,email) VALUES ('$nombre', '$equipo', '$carrera', '$email');";
	$pdo->query($sql);//se ejecuta la query

	//Se muestra un mensaje de estado
	echo "<script type='text/javascript'>";
	echo "alert('Futbolista registrado exitosamente.');";
	echo "window.location.href = 'index.php';";
	echo "</script>";
 ?>