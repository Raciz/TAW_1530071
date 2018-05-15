<?php
	include_once('funciones.php'); //incluir el archivo de funciones 
	$id = isset( $_GET['id'] ) ? $_GET['id'] : ''; //obtener el id que se encuentra en la URL
	
	$r = eliminar($id,"basquetbolistas"); //mandar llamar la función eliminar del archivo de funciones.php

	if($r){
		header('Location: main_bas.php'); //si se eliminó correctamente se redirecciona al archivo main_bas.php
	}
?>