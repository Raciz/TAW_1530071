<?php 
//archivo principal del ejercicio, en este se concentran en forma de includes todas las demas tablas
include 'utilities.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PHP & SQL</title>
<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>
 
<div class="top-bar">
  <div class="top-bar-left">
    <ul class="menu">
      <li class="menu-text">Curso PHP & SQL</li>
    </ul>
  </div>
</div>
 
<div class="row column text-center">
  <h2>Contando datos</h2>
  <hr>
</div><hr>
<!--En esta parte se insertan todos los archivos encargados de mostrar las tablas-->
<?php include 'totales.php'; ?><hr>
<?php include 'usuarios.php'; ?><hr>
<?php include 'tipos.php'; ?><hr>
<?php include 'status.php'; ?><hr>
<?php include 'accesos.php'; ?><br><br>

<!--scripts de js-->
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>
