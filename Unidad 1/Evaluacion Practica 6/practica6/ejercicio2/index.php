<!--Pagina principal-->
<!--Se incluye el archivo de conexion a la base de datos-->
<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=100%, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Control de deportistas UPV</title>
	<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
	<div class="top-bar">
	  <div class="top-bar-left">
	    <ul class="menu">
	      <li class="menu-text">Control de futbolistas y basquetbolistas de la UPV</li>
	    </ul>
	  </div>
	</div>
	<?php 
		//Se incluyen los archivos de futbolistas, basquebolistas y el footer
		include 'futbolista.php'; 
		include 'basquet.php';
		include 'footer.php';
	?>
</body>
</html>	