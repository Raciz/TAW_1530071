<?php
//importamos el archivo con las funciones 
require_once("database_details.php");

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Control de Deportistas UPV</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php require_once('header.php'); ?>


        <div class="row">

            <div class="large-9 columns">
                <h3>Listado de Basquetbolistas</h3>

                <!-- link para ir a la seccion de agregar basquetbolistas-->
                <a href="add_basquetbolista.php" class="button">Añadir Basquetbolistas</a>

                <p>Listado</p>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <?php 
                            //verificamos que halla basquetbolistas registrados en la base de datos
                            if(total_basquetbolistas())
                            { 
                            ?>
                            <!--Tabla para mostrar la informacion de los basquetbolistas-->
                            <table>
                                <thead>
                                    <tr>
                                        <!--columnas para mostrar los datos de los basquetbolistas-->
                                        <th width="200">Id(Numero de Dorso)</th>
                                        <th width="250">Nombre</th>
                                        <th width="250">Posicion</th>
                                        <th width="250">Carrera</th>
                                        <th width="250">Email</th>       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                //obtenemos la informacion de los basquetbolistas registrados
                                $data = listado_basquetbolistas(); 
                                while($row = $data->fetch())
                                { 
                                    ?>
                                    <tr>
                                        <!--Impriminos la informacion de los basquetbolistas-->
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["nombre"] ?></td>
                                        <td><?php echo $row["posicion"] ?></td>
                                        <td><?php echo $row["carrera"] ?></td>
                                        <td><?php echo $row["email"] ?></td>
                                        <td>
                                            <!--boton para eliminar un basquetbolistas de la base de datos-->
                                            <button class="button radius tiny secondary" onclick="verificar(<?php echo $row["id"];?>)">Eliminar</button>         
                                            <a href="./update_basquetbolista.php?id=<?php echo $row["id"]; ?>" class="button radius tiny secondary">Modificar</a>    
                                        </td>
                                    </tr>
                                    <?php 
                                } 
                                    ?>
                                    <tr>
                                        <!--Mostramos el total de basquetbolistas en la base de datos-->
                                        <td colspan="4"><b>Total de registros: </b> <?php echo total_basquetbolistas(); ?></td>
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
            //funcion para preguntar si en verdad desea eliminar un basquetbolista 
            //recibe como parametro el id del basquetbolista a eliminar
            function verificar(codigo)
            {
                //le preguntamos si en verdad quiere eliminarlo
                var opc = confirm("Esta Seguro De Eliminar Este Basquetbolista");

                //en caso de que si lo redirecionamos a del_futbolista
                if(opc == true)
                {
                    window.location.replace("./del_basquetbolista.php?id=" + codigo);
                }
            }
        </script>

        <?php require_once('footer.php'); ?>