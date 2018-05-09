<?php
include_once('utilities.php');

//creamos un objeto de la clase persona
$infoMaestro = new persona();

//ejecutamos la función extractDataMaestro 
$infoMaestro->extractDataMaestro();
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
                <h3>Información de maestros</h3>
                <!--Boton para ir al formulrio de registro de maestros-->
                <ul class="button-group">
                    <li><a href="formMaestro.php" class="button">Añadir Maestro</a></li>
                </ul>
                <p>Listado</p>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>

                            <?php
                            //se verifica que halla informacion de los  maestros registrados
                            if(count($infoMaestro->infoPersona))
                            { 
                            ?>
                            <!-- tabla para mostrar la informacion de los maestros-->
                            <table>
                                <thead>
                                    <tr>
                                        <th width="200">Id</th>
                                        <th width="250">Numero de Empleado</th>
                                        <th width="250">Nombre</th>
                                        <th width="250">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //recorremos el array con la informacion de los alumnos
                                    foreach( $infoMaestro->infoPersona as $id => $maestro)
                                    {    
                                    ?>
                                    <tr>
                                        <!--Imprimimos su id, su numero de empleado y nombre-->
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $maestro['numEmpleado'] ?></td>
                                        <td><?php echo $maestro['nombre'] ?></td>
                                        <td><a href="./keyMaestros.php?id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                    <tr>
                                        <!--Imprimimos el numero total de maestros registrados-->
                                        <td colspan="4"><b>Total de registros: </b> <?php echo count($infoMaestro->infoPersona); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                            }
                            else
                            { 
                            ?>
                            No hay registros
                            <?php 
                            } 
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>