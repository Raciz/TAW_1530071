<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <?php
        //verificamos si esta logeado para mostrar el menu lateral del sistema
        if(isset($_SESSION["nombre"]))
        {
        ?>
            <li><a href="index.php?action=dashboard">Dashboard<span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?action=alumno">Alumnos</a></li>
            <li><a href="index.php?action=grupo">Grupos</a></li>
            <li><a href="index.php?action=pago">Pagos</a></li>
        <?php
        }
        else
        {
        ?>
        <li><a href="index.php?action=registro">Registro<span class="sr-only">(current)</span></a></li>
        <li><a href="index.php?action=listado">Listados</a></li>
        <?php
        }
        ?>
    </ul>
</div>