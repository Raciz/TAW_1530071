<?php
include_once('utilities.php');

//creamos un objeto de la clase persona
$infoAlumnos = new persona();

//ejecutamos la función extractDataAlumno 
$infoAlumnos->extractDataAlumno();

//extraemos el id del alumno a mostrar la informacion
$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

//verificamos que si exista un alumnos con este id
if( !array_key_exists($id, $infoAlumnos->infoPersona))
{
    die('No existe dicho usuario');
}

?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Curso PHP |  Bienvenidos</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php require_once('header.php'); ?>

        <div class="row">

            <div class="large-9 columns">
                <h3>Informacion de Alumnos</h3>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <ul class="pricing-table">
                                <li class="title">Informacion del Alumno</li>
                                <!--Imprimimos la informacion del alumno-->
                                <li class="description"><?php echo $infoAlumnos->infoPersona[$id]['matricula'] ?></li>
                                <li class="description"><?php echo $infoAlumnos->infoPersona[$id]['nombre'] ?></li>
                                <li class="description"><?php echo $infoAlumnos->infoPersona[$id]['carrera'] ?></li>
                                <li class="description"><?php echo $infoAlumnos->infoPersona[$id]['email'] ?></li>
                                <li class="description"><?php echo $infoAlumnos->infoPersona[$id]['telefono'] ?></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>