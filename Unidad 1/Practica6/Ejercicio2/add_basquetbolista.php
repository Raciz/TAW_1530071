<?php
//importamos el archivo con la funcion add_basquetbolista
require_once("database_details.php");

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion add_basquetbolista
    add_basquetbolista($_POST["id"],$_POST["nombre"],$_POST["posicion"],$_POST["carrera"],$_POST["email"]);
    //redireccionamos al listado de basquetbolistas
    header("location:basquetbolistas.php");
}
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
                <h3>Registro de Basquetbolista</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para registrar un nuevo basquetbolista-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            Numero de Dorso: <input type="text" name="id" value="" required>
                            <br>
                            Nombre: <input type="text" name="nombre" value="">
                            <br>
                            Posicion: <input type="text" name="posicion" value="">
                            <br>
                            Carrera: <input type="text" name="carrera" value="">
                            <br>
                            Correo: <input type="email" name="email" value="">
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">

                        </form>
                    </section>
                </div>
                <a href="basquetbolistas.php" class="button">Regresar</a>         

            </div>
        </div>

        <?php require_once('footer.php'); ?>