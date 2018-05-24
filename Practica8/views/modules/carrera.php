<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<center><h1>Listado de Carreras</h1></center>

<a href="index.php?action=agregarC"><button>Agregar Carrera</button></a>

<table border="1">
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
</table>


