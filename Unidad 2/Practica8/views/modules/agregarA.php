<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}

$registro = new mvcController();
?>
<center><h1>Agregar Alumno</h1></center>

<form method="post">
    <input type="text" placeholder="Matricula" name="matricula" required>
    <input type="text" placeholder="Nombre" name="nombre" required>

    <select required name="carrera">
        <option value="">Seleccione Carrera</option>
        <?php
        $registro -> optionCarreraController();
        ?>
    </select>

    <select required name="tutor">
        <option value="">Seleccione Tutor</option>
        <?php
$registro = new mvcController();
        
        $registro -> optionMaestroController();
        ?>
    </select>

    <input type="submit" value="Enviar" name="enviar">
</form>

<?php
$registro -> registroAlumnoController();
?>
