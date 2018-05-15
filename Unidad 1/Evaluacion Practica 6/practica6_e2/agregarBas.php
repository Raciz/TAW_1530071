<?php
include_once('funciones.php'); //incluir el archivo donde se encuentra la funcion de agregar
if(isset($_POST['submit'])){
    $id = $_POST['id']; //obtener el valor del campo id
    $nombre = $_POST['nombre']; //obtener el valor del campo nombre
    $posicion = $_POST['posicion']; //obtener el valor del campo posicion
    $carrera = $_POST['carrera']; //obtener el valor del campo carrera
    $email = $_POST['email']; //obtener el valor del campo email

    $res = agregar($id,$nombre,$posicion,$carrera,$email,"basquetbolistas"); //mandar los valores a la funcion de agregar que se encuentra en el archivo funciones.php

    if($res){ 
        header('Location: main_bas.php'); //si se agregó con éxito redireccionar al main_bas
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
            <h3>Agregar usuario</h3>
            <form action="" method="POST">
                <p><label>ID: </label><input type="number" name="id" placeholder="ID"></p>
                <p><label>Nombre: </label><input type="text" name="nombre" placeholder="Nombre">
                <p><label>Posición: </label><input type="text" name="posicion" placeholder="Posición"></p>
                <p><label>Carrera: </label><input type="text" name="carrera" placeholder="Carrera"></p>
                <p><label>Email: </label><input type="email" name="email" placeholder="Email"></p>
                <input type="submit" name="submit" class="button" value="Guardar">
            </form>
        </div>

        <?php require_once('footer.php'); ?>
    </body>
</html>