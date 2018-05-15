<?php 
	//Archivo para eliminar un futbolista

	//Se incluye el archivo de conexion a la base de datos
	include 'connection.php';

	//Se obtiene el id con GET de la URL
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

	//Se prepara la sentencia sql
	$sql = "DELETE FROM futbolista WHERE id = $id"; 

	//Se ejecuta la sentencia
	$pdo->query($sql);

	//Se muestra un mensaje de estado
	echo "<script type='text/javascript'>";
	echo "alert('Futbolista eliminado exitosamente.');";
	echo "window.location.href = 'index.php';";
	echo "</script>";
 ?>