<?php
//importamos el archivo con la funcion agregar_usuario
require_once("funciones.php");
require_once ("isLogin.php");

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion agregar_usuario
    agregar_venta($_POST["producto"],$_POST["cantidad"]);
    //redireccionamos al menu_principal
    header("location:menu_principal.php");
}
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
                <h3>Registro de Venta</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para agregar una nueva venta-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            Producto *: 
                            <select name="producto">
                                <?php
                                //traemos la informacion de los productos
                                $data = info_productos();
                                while($row = $data->fetch())
                                {
                                ?>
                                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            
                            <br>
                            Cantidad *: <input type="number" name="cantidad" value="" required>
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>