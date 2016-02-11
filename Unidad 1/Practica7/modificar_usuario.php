<?php
require_once("funciones.php");
require_once("isLogin.php");

//obtenemos el id del usuario
$id = isset( $_GET['id'] ) ? $_GET['id'] : "";

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion de update_user
    update_user($_POST["oldUser"],$_POST["newUser"],$_POST["name"],$_POST["tel"]);
    print_r($_POST);
    //redireccionamos al listado de usuarios
    header("location:lista_usuario.php");
}

//en caso de que no se pueda obtener el id se regresa al listado de usuarios
if(empty($id))
{
    header("location:lista_usuario.php");
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
                <h3>Modificar Usuarios</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para modificar al usuario-->
                        <?php
                        $data = info_user($id);
                        ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <input type="hidden" value="<?php echo $id; ?>" name="oldUser">
                            
                            Usuario *: <input type="text" name="newUser" value="<?php echo $data["usuario"]; ?>" required>
                            <br>
                            Nombre *: <input type="text" name="name" value="<?php echo $data["nombre"]; ?>" required>
                            <br>
                            Telefono: <input type="number" name="tel" value="<?php echo $data["telefono"]; ?>">
                            <br>
                            <input type="submit" name="enviar" value="Guardar" class="button">
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>