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
                <h3>Menu Principal</h3>
                <div class="section-container tabs" data-section>
                    <section class="section">
                        <div class="content" data-slug="panel1">
                            <!--Botones para ir a las secciones de alumno y maestros-->
                            <div class="large-9 columns">
                                <ul class="button-group">
                                    <!--Boton para ir a la seccion de alumnos-->
                                    <li><a href="mostrarAlumnos.php" class="button">Alumnos</a></li><br>
                                    <!--Boton para ir a la seccion de maestros-->
                                    <li><a href="mostrarMaestros.php" class="button">Maestros</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>