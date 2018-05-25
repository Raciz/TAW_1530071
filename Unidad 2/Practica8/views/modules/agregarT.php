<?php
if(!isset($_SESSION["maestro"]))
{
    header("location:index.php");
}
?>
<center><h1>Agregar Tutoria</h1></center>

<form method="post">

    <select name="alumno" required>
        <option value="">Seleccione Alumno</option>
        <?php
        $registro = new mvcController();
        $registro -> tutoradosController();
        ?>
    </select><br>

    <select name="tipo" required>
        <option value="">Seleccione Tipo de Tutoria</option>
        <option value="Individual">Individual</option>
        <option value="Grupal">Grupal</option>
    </select><br>

    <textarea name="tutoria" placeholder="Descripcion de Tutoria">
    </textarea>

    <input type="submit" value="Enviar" name="enviar">
</form>

<?php
$registro -> registroTutoriaController();
?>
