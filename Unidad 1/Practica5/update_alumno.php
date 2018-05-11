<?php
//importamos el archivo con la funcion agregar
require_once("database_details.php");

//obtenemos el id del alumno a modificar
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//en caso de que no se pueda obtener el id se regresa index
if(empty($id))
{
    ///nos redireccionamos al index
    header("location:index.php");
}

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion agregar
    modificar($_POST["id"],$_POST["nombre"],$_POST["email"],$_POST["tel"]);
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
                <h3>Datos del Alumno</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para modificar la informacion del alumno-->
                        <?php
                        $data = info_alumno($id);
                        ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" required>
                            Nombre: <input type="text" name="nombre" value="<?php echo $data["nombre"]; ?>" required>
                            <br>
                            Email: <input type="email" name="email" value="<?php echo $data["email"]; ?>">
                            <br>
                            Telefono: <input type="text" name="tel" value="<?php echo $data["telefono"]; ?>">
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">

                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>