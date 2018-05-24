<?php
class Conexion{

	public function conectar()
    {
		$conn = new PDO("mysql:host=localhost;dbname=empleados","root","");
		return $link;
	}
}
?>