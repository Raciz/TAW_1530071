<!--Archivo con el formulario para actualizar datos de un basquetbolista-->
<?php 
	//Se incluye el archivo de conexion a la bd
	include 'connection.php';

	//Se obtiene el id de la url mediante GET
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

	//Se prepara la sentencia sql
	$sql = "SELECT * FROM basquetbolista WHERE id = $id"; 
	$res = $pdo->query($sql);//Se ejecuta la sentencia
	$row = $res->fetch(PDO::FETCH_ASSOC);//Se extraen los datos del basquetbolista y se almacenan en una variable de tipo PDO
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
	<title>Actualizar basquetbolista</title>
</head>
<body>
	<?php include 'header.php'; ?>
 
  	<div class="large-3 columns" style="width:100%; text-align: center;">
  		<h3>Actualizar basquetbolista</h3>
	    <form action="update_bas.php"  method="POST" style="width:25%; margin:0 auto;">
	    	<input type="hidden" name="id" value="<?php echo $id;?>" >
	    	<label >Nombre:</label>
	    	<input name="nombre" type="text" style="text-align: center;" value="<?php echo $row['nombre'];?>" required>
	    	<br>
	    	<label>Equipo</label>
	    	<select name="equipo">
	    		<option value="<?php echo $row['equipo'];?>" selected="selected" disabled><?php echo $row['equipo'];?></option><hr>
				<?php 
					//Se consultan los equipos registrados en la base de datos
					$sql = "SELECT * FROM equipo";
					foreach ($pdo->query($sql) as $r) {
				 ?>
				 <option value="<?php echo $r['nombre'];?>"><?php echo $r['nombre'];?></option>
				 <?php }?>
			</select> 
			<br><br>
	    	<label >Carrera:</label>
	    	<input name="carrera" type="text" style="text-align: center;" value="<?php echo $row['carrera'];?>" required>
	    	<br>
	    	<label >Email</label>
	    	<input name="email" type="text" style="text-align: center;" value="<?php echo $row['email'];?>" required>
	    	<input type="submit"   value="Guardar" class="button">
	    	<a href="index.php" class="button warning" onclick="cancel()">Cancelar</a>
	    </form>
	</div>
	<script>
		//Funcion para el boton de cancelar actualizacion
		function cancel(){
			//Se muestra un mensaje de estado
			alert('No se han guardado cambios.');
			//Se redirige a la pagina principal
			window.location.href = 'index.php';
		}
	</script>
</body>
</html>