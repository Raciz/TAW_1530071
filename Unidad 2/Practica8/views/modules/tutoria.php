<?php
if(!isset($_SESSION["maestro"]))
{
    header("location:index.php");
}
?>

<center><h1>Listado de Tutorias</h1></center>

<a href="index.php?action=agregarT"><button>Agregar Tutoria</button></a>

<table id="example" class="display dataTable" style="width:100%">
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Tutor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vista = new mvcController();
        $vista -> listaTutoriaMaestroController();
        $vista -> deleteTutoriaController();
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Alumno</th>
            <th>Tutor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
</table>


