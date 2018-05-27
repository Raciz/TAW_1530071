<?php
//se verifica que el usuario haya iniciado sesion y sea super usuario
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<h1>Modificar Carrera</h1>

<form method="post">
	
	<?php
	$editar = new mvcController();
	$editar -> editCarreraController();
	$editar -> updateCarreraController();
	?>

</form>