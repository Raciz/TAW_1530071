<?php
//importamos el archivo con la funcion agregar_usuario
require_once("funciones.php");

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion agregar_usuario
    agregar_usuario($_POST["user"],$_POST["pass"]);
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
                <h3>Registro de Usuarios</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para agregar un nuevo usuario-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            Usuario *: <input type="text" name="user" value="" required>
                            <br>
                            Contraseña *: <input type="password" name="pass" value="" required>
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>