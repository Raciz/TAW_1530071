<?php
//importamos el archivo con la funcion agregar
require_once("database_details.php");

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
                <h3>Listado de Alumnos</h3>

                <!-- link para ir a la seccion de agregar alumno-->
                <a href="add_alumno.php" class="button">Añadir Alumno</a>

                <p>Listado</p>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <?php 
                            //verificamos que hayga alumnos registrados en la base de datos
                            if(total_alumnos())
                            { 
                            ?>
                            <!--Tabla para mostrar la informacion de los alumnos-->
                            <table>
                                <thead>
                                    <tr>
                                        <!--columnas para mostrar los datos de los alumnos-->
                                        <th width="200">ID</th>
                                        <th width="250">Nombre</th>
                                        <th width="250">Correo</th>
                                        <th width="250">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //obtenemos la informacion de los alumnos registrados
                                $data = listado(); 
                                while($row = $data->fetch_assoc())
                                { 
                                    ?>
                                    <tr>
                                        <!--Impriminos la informacion de los alumnos-->
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["nombre"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td><?php echo $row["telefono"] ?></td>
                                        <td>
                                            <!--boton para eliminar un alumno de la base de datos-->
                                            <button class="button radius tiny secondary" onclick="verificar(<?php echo $row["id"]; ?>)">Eliminar</button>                                               
                                           <a href="./update_alumno.php?id=<?php echo $row["id"]; ?>" class="button radius tiny secondary">Modificar</a>    
                                        </td>
                                    </tr>
                                    <?php 
                                } 
                                    ?>
                                    <tr>
                                        <!--Mostramos el total de alumnos en la base de datos-->
                                        <td colspan="4"><b>Total de registros: </b> <?php echo total_alumnos(); ?></td>
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

        <script>
            //funcion para preguntar si en verdad desea eliminar un alumno 
            //recibe como parametro el id del alumno a eliminar
            function verificar(codigo)
            {
                //le preguntamos al usuario si en verdad quiere eliminarlo
                var opc = confirm('Esta Seguro De Eliminar Este Alumno');
                
                //en caso de que si lo redirecionamos a del_alumno
                if(opc == true)
                {
                    window.location.replace("./del_alumno.php?id=" + codigo);
                }
            }
        </script>";

        <?php require_once('footer.php'); ?>