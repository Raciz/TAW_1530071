<?php
	include_once('conexion.php'); //este archivo requiere del archivo conexión

	/*CONTAR LOS REGISTRADOS DE LA TABLA CORRESPONDIENTE*/
	function contarRegistros($tabla){
		global $pdo;
		$sql = "SELECT count(*) FROM $tabla"; //crear consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetch(PDO::FETCH_BOTH); //retornar el valor de la variable
	}

	/*CONTAR LOS USUARIOS ACTIVOS O INACTIVOS REGISTRADOS DE LA TABLA USER*/
	function contarAct_Inact($num){
		global $pdo;
		$sql = "SELECT count(*) FROM user WHERE status_id='$num'"; //crear la consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetch(PDO::FETCH_BOTH); //retornar el valor de la variable
	}


	/*MOSTRAR LOS USUARIOS REGISTRADOS EN LA TABLA USER*/
	function mostrarUser(){
		global $pdo;
		$sql = 'SELECT * FROM user'; //crear consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	/*MOSTRAR EL NOMBRE DEL ESTADO DEL ID QUE SE ENCUENTRA EN LA TABLA USUARIOS*/
	function nombreStatus($id){
		global $pdo;
	 	$sql = "SELECT name FROM status WHERE id='$id'"; //crear la consulta
     	$statement = $pdo->prepare($sql); //preparar la consulta
      	$statement->execute(); //ejecutar la consulta
      	return $statement->fetch(PDO::FETCH_BOTH); //retornar el valor de la variable
	}

	/*MOSTRAR EL NOMBRE DEL TIPO DEL ID QUE SE ENCUENTRA EN LA TABLA USUARIOS*/
	function nombreType($id){
		global $pdo;
		$sql = "SELECT name FROM user_type WHERE id='$id'"; //crear la consulta
      	$statement = $pdo->prepare($sql); //preparar la consulta
      	$statement->execute(); //ejecutar la consulta
      	return $statement->fetch(PDO::FETCH_BOTH); //retornar el valor de la variable 
	}

	/*MOSTRAR LOS TIPOS REGISTRADOS EN LA TABLA USER_TYPE*/
	function mostrarType(){
		global $pdo;
		$sql = 'SELECT * FROM user_type'; //crear consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	/*MOSTRAR LOS ESTADOS REGISTRADOS EN LA TABLA STATUS*/
	function mostrarStatus(){
		global $pdo;
		$sql = 'SELECT * FROM status'; //crear consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	/*MOSTRAR LOS ACCESOS REGISTRADOS DE LA TABLA USER_LOG*/
	function mostrarAccesos(){
		global $pdo;
		$sql = 'SELECT * FROM user_log'; //crear consulta
  		$statement = $pdo->prepare($sql); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	/*MOSTRAR EL EMAIL DEL USUARIO DEL ID QUE SE ENCUENTRA EN LA TABLA USER_LOG*/
	function nombreUsuario($id){
		global $pdo;
		$sql = "SELECT email FROM user WHERE id='$id'"; //crear la consulta
      	$statement = $pdo->prepare($sql); //preparar la consulta
      	$statement->execute(); //ejecutar la consulta
      	return $statement->fetch(PDO::FETCH_BOTH); //retornar el valor de la variable 
	}

?>