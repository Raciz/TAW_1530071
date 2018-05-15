<?php
//importamos el archivo con la funcion agregar_usuario
require_once("funciones.php");
require_once ("isLogin.php");

//ejecutamo la consulta para obtener la informacion de las ventas
$stmt = $conn -> prepare("SELECT p.nombre,v.cantidad, p.precio*v.cantidad as total FROM productos as p JOIN ventas as v on v.producto = p.id");
//ejecutamos la consulta anterior
$stmt -> execute();

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
                <h3>Reporte de Ventas</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <div class="row">
                            </div>
                            <!--Tabla para imprimir el eporte de ventas-->
                            <table>
                                <thead>
                                    <tr>
                                        <th width="200">Producto</th>
                                        <th width="250">Promedio de Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //variable para guardar el toal de ventas
                                    $total = 0;
                                    
                                    //impresion del promedio de ventas por producto
                                    while($row = $stmt -> fetch())
                                    {
                                    ?>
                                    <!--Impresion de los promedio de ventas por productos-->
                                    <tr>
                                        <td><?php echo $row["nombre"]; ?></td>
                                        <td>$ <?php echo $row["total"]/$row["cantidad"]; ?></td>
                                        
                                    </tr>
                                    <?php
                                    //vamos sumando el total para el total de ventas
                                    $total += $row["total"];
                                    }
                                    ?>
                                    <tr>
                                        <td><b>Total de Ventas</b></td>
                                        <td>$ <?php echo $total; ?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>