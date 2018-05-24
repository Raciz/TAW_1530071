<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<center><h1>Agregar Carrera</h1></center>

<form method="post">
    <input type="text" placeholder="Nombre de la Carrera" name="carrera" required>
    <input type="submit" value="Enviar" name="enviar">
</form>

<?php
$registro = new mvcController();
$registro -> registroCarreraController();
?>