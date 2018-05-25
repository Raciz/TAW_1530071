<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<h1>Modificar Alumno</h1>

<form method="post">
	
	<?php
	$editar = new mvcController();
	$editar -> editAlumnoController();
	$editar -> updateAlumnoController();
	?>

</form>

<script>
    $(document).ready(function() {
        $('.carrera').select2();
    });

    $(document).ready(function() {
        $('.tutor').select2();
    });
</script>