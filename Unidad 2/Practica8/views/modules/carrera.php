<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<center><h1>Listado de Carreras</h1></center>

<a href="index.php?action=agregarC"><button>Agregar Carrera</button></a>

<table id="listaCarrera" class="display dataTable" style="width:100%">
    <thead>
        <tr>
            <th>Nombre de la Carrera</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vista = new mvcController();
        $vista -> listaCarreraController();
        $vista -> deleteCarreraController();
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Nombre de la Carrera</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        $('#listaCarrera').DataTable();
    } );
</script>
