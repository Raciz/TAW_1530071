<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<center><h1>Listado de Maestros</h1></center>

<a href="index.php?action=agregarM"><button>Agregar Maestro</button></a>

<table id="example" class="display dataTable" style="width:100%">
    <thead>
        <tr>
            <th>Numero de Empleado</th>
            <th>Carrera</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Super Usuario</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vista = new mvcController();
        $vista -> listaMaestroController();
        $vista -> deleteMaestroController();
        ?>
    </tbody>
</table>


