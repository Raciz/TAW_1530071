<?php
//importamos el archivo con la funcion agregar
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
                <h3>Menu Principal</h3>
                <div class="large-9 columns">
                    <ul class="button-group">
                        <!--Boton para ir al contro de los futbolistas-->
                        <li><a href="./futbolistas.php" class="button">Control de Futbolistas</a></li><br>
                        <!--Boton para ir al contro de los basquetbolistas-->
                        <li><a href="./basquetbolistas.php" class="button">Control de Basquetbolistas</a></li>
                    </ul>
                </div>
            </div>

        </div>

        <?php require_once('footer.php'); ?>