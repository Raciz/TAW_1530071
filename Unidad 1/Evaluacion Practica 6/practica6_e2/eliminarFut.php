<?php
	include_once('funciones.php'); //incluir el archivo de funciones 
	$id = isset( $_GET['id'] ) ? $_GET['id'] : ''; //obtener el id que se encuentra en la URL
	
	$r = eliminar($id,"futbolistas"); //mandar llamar la función eliminar del archivo de funciones.php

	if($r){
		header('Location: main_fut.php'); //si se eliminó correctamente se redirecciona al archivo main_fut.php
	}
?>