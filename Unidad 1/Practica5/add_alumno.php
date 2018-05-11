<?php
//importamos el archivo con la funcion agregar
require_once("database_details.php");

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion agregar
    agregar($_POST["nombre"],$_POST["email"],$_POST["tel"]);
    //redireccionamos al index
    header("location:index.php");
}
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
                <h3>Registro de Alumno</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para registrar un nuevo alumno-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            Nombre: <input type="text" name="nombre" value="" required>
                            <br>
                            Email: <input type="email" name="email" value="">
                            <br>
                            Telefono: <input type="text" name="tel" value="">
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">

                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>