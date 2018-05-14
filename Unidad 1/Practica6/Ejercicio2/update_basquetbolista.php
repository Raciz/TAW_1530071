<?php
//importamos el archivo con la funcion update_basquetbolista
require_once("database_details.php");

//obtenemos el id del basquetbolista a modificar
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion de update_basquetbolista
    update_basquetbolista($_POST["oldId"],$_POST["newId"],$_POST["nombre"],$_POST["posicion"],$_POST["carrera"],$_POST["email"]);
    //redireccionamos al index
    header("location:basquetbolistas.php");
}

//en caso de que no se pueda obtener el id se regresa al listado de futbolista
if(empty($id))
{
    //nos redireccionamos al index
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
                <h3>Datos del Futbolista</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para modificar la informacion del basquetbolista-->
                        <?php
                        //obtenemos la informacion del basquetbolista
                        $data = info_basquetbolista($id);
                        ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">
                            <input type="hidden" name="oldId" value="<?php echo $data["id"];?>" >
                                   
                            Numero de Dorso: <input type="text" name="newId" value="<?php echo $data["id"]; ?>" required>
                            <br>
                            Nombre: <input type="text" name="nombre" value="<?php echo $data["nombre"]; ?>">
                            <br>
                            Posicion: <input type="text" name="posicion" value="<?php echo $data["posicion"]; ?>">
                            <br>
                            Carrera: <input type="text" name="carrera" value="<?php echo $data["carrera"]; ?>">
                            <br>
                            Correo: <input type="email" name="email" value="<?php echo $data["email"]; ?>">
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">

                        </form>
                    </section>
                </div>
                <a href="basquetbolistas.php" class="button">Regresar</a>         
                
            </div>
        </div>
        
        <script>
            //funcion para preguntar si en verdad desea modificar la informacion del basquetbolista 
            function verificar(e)
            {
                //le preguntamos si en verdad quiere modificarlo
                var opc = confirm("Esta Seguro De Modificar La Informacion Del Basquetbolista");

                //en caso de que no detenemos el envio de la informacion para el update
                if(opc == false)
                {
                    //detenemos la ejecucion del envio de informacion
                    e.preventDefault();
                }
            }
            
            //asignamos que la funcion verificar se ejecute a iniciar el evento submit en el formulario
            var form = document.getElementById("form");
            form.addEventListener("submit",verificar);
        </script>

        <?php require_once('footer.php'); ?>