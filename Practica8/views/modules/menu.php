<nav>
    <ul>
        <li><a href="index.php">Registro</a></li>
        <!-- Pra navegar al URL podemos hacerlo mediante la variable GET, la cual la toma del URL, se representa por el simbolo "?"-->
        <li><a href="index.php?action=maestro">Maestros</a></li>
        <li><a href="index.php?action=alumno">Alumnos</a></li>
        <li><a href="index.php?action=carrera">Carreras</a></li>
        <li><a href="index.php?action=tutoria">Tutorias</a></li>
        <li><a href="index.php?action=reporte">Reportes</a></li>
        <?php
        session_start();

        if(isset($_SESSION["maestro"]))
        {
            echo "<li><a href=index.php?action=logout>Cerrar Sesion</a></li>";
        }
        else
        {
            echo "<li><a href=index.php?action=login>Iniciar Sesion</a></li>";
        }
        ?>
    </ul>
</nav>