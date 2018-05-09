<?php
include_once('utilities.php');

//creamos un objeto de la clase persona
$infoAlumnos = new persona();

//ejecutamos la función extractDataAlumno 
$infoAlumnos->extractDataAlumno();
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
                <h3>Información de alumnos</h3>
                <!--Boton para ir al formulrio de registro de alumno-->
                <ul class="button-group">
                    <li><a href="formAlumno.php" class="button">Añadir Alumno</a></li>
                </ul>
                <p>Listado</p>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>

                            <?php
                            //se verifica que halla informacion de alumnos registrados
                            if(count($infoAlumnos->infoPersona))
                            { 
                            ?>
                            <!-- tabla para mostrar la informacion de los alumnos-->
                            <table>
                                <thead>
                                    <tr>
                                        <th width="200">Id</th>
                                        <th width="250">Matricula</th>
                                        <th width="250">Nombre</th>
                                        <th width="250">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //recorremos el array con la informacion de los alumnos
                                    foreach( $infoAlumnos->infoPersona as $id => $alumno )
                                    {    
                                    ?>
                                    <tr>
                                        <!--Imprimimos su id, su matricula y nombre-->
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $alumno['matricula'] ?></td>
                                        <td><?php echo $alumno['nombre'] ?></td>
                                        <td><a href="./keyAlumnos.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                    <tr>
                                        <!--Imprimimos el numero total de alumnos registrados-->
                                        <td colspan="4"><b>Total de registros: </b> <?php echo count($infoAlumnos->infoPersona); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php }else{ ?>
                            No hay registros
                            <?php } ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>