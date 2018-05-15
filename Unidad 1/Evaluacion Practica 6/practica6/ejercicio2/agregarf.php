<!--Se incluye el archivo de la conexion a la bd-->
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agregar futbolista</title>
</head>
<body>
	<!--Se incluye el archivo del header-->
	<?php require_once('header.php'); ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Agregar nuevo futbolista</h3>
	    <form action="agregar_fut.php" method="POST" style="width:25%; margin:0 auto;">
	    	<label >Nombre:</label>
	    	<input name="nombre" type="text" style="text-align: center;" required>
	    	<br><br>
	    	<label >Posicion:</label>
	    	<input name="posicion" type="text" style="text-align: center;" required>
	    	<br><br>
	    	<label >Equipo:</label>
	    	<select name="equipo">
				<?php 
					//Se prepara la sentencia sql para obtener los equipos
					$sql = "SELECT * FROM equipo";
					//se extrae cada equipo mediante un foreach ejecutando la sentencia
					foreach ($pdo->query($sql) as $row) {
				 ?>
				 <!--Se muestra cada equipo en forma de opcion-->
				 <option value="<?php echo $row['nombre'];?>"><?php echo $row['nombre'];?></option>
				 <?php }?><!--Cierre del script php-->
			</select> 
	    	<br><br>
	    	<label >Carrera:</label>
	    	<input name="carrera" type="text" style="text-align: center;" required>
	    	<br><br>
	    	<label >Email</label>
	    	<input name="email" type="text" style="text-align: center;" required>
	    	<input type="submit" value="Registrar" class="button">
	    	<a href="index.php" class="button warning" onclick="cancel()">Cancelar</a>
	    </form>
	</div>
	<!--Se incluye el archivo del footer-->
	<?php require_once('footer.php'); ?>
	<script>
		//funcion para el boton de cancelar
		function cancel(){
			//Se muestra un mensaje de estado
			alert('No se han guardado cambios.');
			//redirecciona a la pagina principal
			window.location.href = 'index.php';
		}
	</script>
</body>
</html>