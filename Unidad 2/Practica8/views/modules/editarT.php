<?php
if(!isset($_SESSION["maestro"]))
{
    header("location:index.php");
}
?>
<h1>Modificar Tutoria</h1>

<form method="post">
	
	<?php
	$editar = new mvcController();
	$editar -> editTutoriaController();
	$editar -> updateTutoriaController();
	?>

</form>

<script>
    $(document).ready(function() {
        $('.alumno').select2();
    });

    $(document).ready(function() {
        $('.tipo').select2();
    });
</script>