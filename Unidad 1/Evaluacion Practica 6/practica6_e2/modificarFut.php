I<?php
include_once('funciones.php'); //incluir el archivo donde se encuentra la funcion de detallesModificar y modificar

$id = isset( $_GET['id'] ) ? $_GET['id'] : ''; //obtener el id que se encuentra en la URL

$user = detallesModificar($id,"futbolistas"); //ejecutar la función que trae como resultado los datos del usuario de la tabla correspondiente

foreach ($user as $users) {
    $nombre = $users[1]; //asignar a la variable nombre el valor correspondiente
    $posicion = $users[2]; //asignar a la variable posicion el valor correspondiente
    $carrera = $users[3]; //asignar a la variable carrera el valor correspondiente
    $email = $users[4]; //asignar a la variable email el valor correspondiente
}

if(isset($_POST['submit'])){
    $uNombre = $_POST["nombre"]; //obtener el valor del campo nombre
    $uPosicion = $_POST["posicion"]; //obtener el valor del campo posicion
    $uCarrera = $_POST["carrera"]; //obtener el valor del campo carrera
    $uEmail = $_POST['email']; //obtener el valor del campo email

    $res = modificar($id, $uNombre, $uPosicion, $uCarrera, $uEmail, "futbolistas"); //mandar los valores a la funcion de modificar que se encuentra en el archivo funciones.php

    if($res){ 
        header('Location: main_fut.php'); //si se modificó con éxito redireccionar a main_fut.php
    } else{
        echo "<script>alert('Ha ocurrido un error');</script>"; //informar si hubo un error con el registro
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Practica 6 |  Ejercicio 2</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>
        <br>
        <?php require_once('header.php'); ?>


        <div class="row">
            <h3>Modificar usuario</h3>
            <form action="" method="POST">
                <p><label>Nombre: </label><input type="text" name="nombre" value="<?php echo $nombre ?>">
                <p><label>Posición: </label><input type="text" name="posicion" value="<?php echo $posicion ?>"></p>
                <p><label>Carrera: </label><input type="text" name="carrera" value="<?php echo $carrera ?>"></p>
                <p><label>Email: </label><input type="email" name="email" value="<?php echo $email ?>"></p>
                <input type="submit" name="submit" class="button" value="Guardar">
            </form>
        </div>

        <?php require_once('footer.php'); ?>
    </body>
</html>