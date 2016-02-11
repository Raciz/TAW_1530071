<?php
require_once "isLogin.php";
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
                <h3>Menu Principal</h3>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="large-9 columns">
                            <ul class="button-group">
                                <li><a href="registro_de_productos.php" class="button">Registro de Productos</a></li><br>
                                <li><a href="registro_de_venta.php" class="button">Registro de Ventas</a></li><br>
                                <li><a href="registro_de_usuario.php" class="button">Detalle de Ventas</a></li>//hacer<br>
                                <li><a href="registro_de_usuario.php" class="button">Registro de Usuarios</a></li><br>
                                <li><a href="lista_usuario.php" class="button">Modificar Usuarios</a></li><br>
                                <li><a href="reporte.php" class="button">Reporte de Ventas</a></li>//modificar<br>
                                <li><a href="?action=logout" class="button">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>

        </div>


        <?php require_once('footer.php'); ?>