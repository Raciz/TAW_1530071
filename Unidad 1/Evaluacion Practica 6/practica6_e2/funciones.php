<?php
	include_once('conexion.php'); //incluir el archivo conexion que trae la variable pdo con la conexión a la base de datos 

	//función que devuelve los registros de la tabla futbolistas y se manda llamar en el archivo main_fut.php
	function mostrarFut(){
		global $pdo;
		$query = "SELECT * FROM futbolistas"; //se crea la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	//función que devuelve los registros de la tabla basquetbolistas y se manda llamar en el archivo main_bas.php
	function mostrarBas(){
		global $pdo;
		$query = "SELECT * FROM basquetbolistas"; //se crea la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	//función que agrega registros a la tabla futbolistas y basquetbolistas según corresponda, ya que ambas tablas tienen los mismos campos y solo cambia a qué tabla se va a añadir el nuevo registro
	function agregar($id,$nom,$pos,$carrera,$email,$tabla){
		global $pdo;
		$query = "INSERT INTO $tabla(id,nombre,posicion,carrera,email) VALUES('$id','$nom','$pos','$carrera','$email')"; //se crea la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$res = $statement->execute(); //ejecutar la consulta
  		return $res; //retornar el valor de la variable
	}

	//función eliminar que se manda llamar en el archivo eliminar.php, recibe el id como parámetro
	function eliminar($id,$tabla){
		global $pdo;
		$query = "DELETE FROM $tabla WHERE id='$id'"; //creación de la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$res = $statement->execute(); //ejecutar la consulta
  		return $res; //retornar el valor de la variable
	}

	//función detallesModificar que muestra en los imputs del archivo modificarFut.php o modificarBas.php según corresponda los valores registrados en la base de datos
	function detallesModificar($id,$tabla){
		global $pdo;
		$query = "SELECT * FROM $tabla WHERE id='$id'"; //creación de la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$statement->execute(); //ejecutar la consulta
  		return $statement->fetchAll(); //retornar el valor de la variable
	}

	//función que se llama en el archivo modificarFut.php o modificarBas.php según corresponda que actualiza los datos del jugador
	function modificar($id, $nombre, $posicion, $carrera, $email, $tabla){
		global $pdo;
		$query = "UPDATE $tabla SET nombre='$nombre', posicion='$posicion', carrera='$carrera', email='$email' WHERE id='$id'"; //creación de la consulta
		$statement = $pdo->prepare($query); //preparar la consulta
  		$res = $statement->execute(); //ejecutar la consulta
  		return $res; //retornar el valor de la variable
	}
?>