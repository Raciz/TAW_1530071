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
                <h3>Detalle de Ventas</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <form action="" method="post">
                                Ingrese Id de la Venta:<input type="number" name="venta">
                                <input type="submit" name="enviar" value="Enviar" class="button">
                            </form>
                            
                            <?php
                                if(isset($_POST["enviar"]) && !empty($_POST["venta"]))
                                {
                                    $id_venta = $_POST["venta"];
                                    echo "<h3>Lista de Productos</h3>";
                                    $stmt = $conn -> prepare("SELECT * FROM detalle_venta as dv JOIN producto as p on p.id = dv.id_producto WHERE dv.id_venta = $id_venta");
                                }
                            ?>
                        </div>
                    </section>
                </div>
            </div>

        </div>

        <?php require_once('footer.php'); ?>