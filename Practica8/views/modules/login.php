<?
if(isset($_SESSION["maestro"]))
{
    header("location:index.php?action=tutoria");
}
?>
<center><h1>Iniciar Sesion</h1></center>

<form method="post">
    <input type="text" placeholder="Numero de Empleado" name="num_empleado">
    <input type="password" placeholder="Numero de Empleado" name="password">
    <input type="submit" value="Enviar" name="enviar">
</form>
<?php
$login = new mvcController();
$login -> loginController();
?>