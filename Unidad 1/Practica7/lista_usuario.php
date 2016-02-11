<?php
//importamos el archivo con las funciones 
require_once("funciones.php");
require_once("isLogin.php");

?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tienda TAW</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php require_once('header.php'); ?>
        <div class="row">

            <div class="large-9 columns">
                <h3>Listado de Usuarios</h3>

                <p>Listado</p>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <!--Tabla para mostrar la informacion de los usuarios-->
                            <table>
                                <thead>
                                    <tr>
                                        <!--columnas para mostrar los datos de los usuarios-->
                                        <th width="200">Usuario</th>
                                        <th width="250">Nombre</th>
                                        <th width="250">Telefono</th>      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //obtenemos la informacion de los usuarios registrados
                                    $data = listado_users(); 
                                    while($row = $data->fetch())
                                    { 
                                    ?>
                                    <tr>
                                        <!--Impriminos la informacion de los usuarios-->
                                        <td><?php echo $row["usuario"] ?></td>
                                        <td><?php echo $row["nombre"] ?></td>
                                        <td><?php echo $row["telefono"] ?></td>
                                        <td>         
                                            <a href="./modificar_usuario.php?id=<?php echo $row["usuario"]; ?>" class="button radius tiny secondary">Modificar</a>    
                                        </td>
                                    </tr>
                                    <?php 
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

        </div>

        <?php require_once('footer.php'); ?>