<?php
if(!(isset($_SESSION) && $_SESSION["superUser"]))
{
    header("location:index.php");
}
?>
<h1>Modificar Maestro</h1>

<form method="post">
	
	<?php
	$editar = new mvcController();
	$editar -> editMaestroController();
	$editar -> updateMaestroController();
	?>

</form>

<script>
    $(document).ready(function() {
        $('.carrera').select2();
    });
    
    $(document).ready(function() {
        $('.super').select2();
    });
</script>