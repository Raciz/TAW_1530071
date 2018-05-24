<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<center><h1>Listado de Alumno</h1></center>

<a href="index.php?action=agregarA"><button>Agregar Alumno</button></a>

<table border="1">
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Tutor</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vista = new mvcController();
        $vista -> listaAlumnoController();
        $vista -> deleteAlumnoController();
        ?>
    </tbody>
</table>


