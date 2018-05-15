<?php
require_once "conexion.php";

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);
    $stmt = $conn -> prepare("SELECT COUNT(*) as cuenta FROM cuenta WHERE usuario = '$user' AND password = '$pass'");
    $stmt -> execute();
    $data = $stmt -> fetch();

    if($data["cuenta"])
    {
        session_start();
        $_SESSION["cuenta"] = $user;
        header("location:menu_principal.php");
    }
    else
    {
        echo "<script>alert('Usuario o Contraseña Son Incorrectos');</script>";
    }
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
                <h3>Menu Principal</h3>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario iniciar sesion-->
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