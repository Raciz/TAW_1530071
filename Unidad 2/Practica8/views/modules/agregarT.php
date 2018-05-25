<?php
if(!isset($_SESSION["maestro"]))
{
    header("location:index.php");
}
?>
<center><h1>Agregar Tutoria</h1></center>

<form method="post">

    <select name="alumno" class="alumno" required>
        <option value="">Seleccione Alumno</option>
        <?php
        $registro = new mvcController();
        $registro -> tutoradosController();
        ?>
    </select>
    <br>
    <br>
    <select name="tipo" class="tipo" required>
        <option value="">Seleccione Tipo de Tutoria</option>
        <option value="Individual">Individual</option>
        <option value="Grupal">Grupal</option>
    </select><br>

    <textarea name="tutoria" placeholder="Descripcion de Tutoria"></textarea>

    <input type="submit" value="Enviar" name="enviar">
</form>

<?php
$registro -> registroTutoriaController();
?>

<script>
    $(document).ready(function() {
        $('.alumno').select2();
    });

    $(document).ready(function() {
        $('.tipo').select2();
    });
</script>