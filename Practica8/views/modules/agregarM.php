<center><h1>Agregar Maestro</h1></center>

<form method="post">
    <input type="text" placeholder="Numero de Empleado" name="num_empleado" required>
    
    <select required name="carrera">
        <option value="">Seleccione Carrera</option>
        <?php
        $registro = new mvcController();
        $registro -> optionCarreraController();
        ?>
    </select>

    <input type="text" placeholder="Nombre" name="nombre" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Contraseña" name="password" required>

    <select name="super">
        <option value="0">Es Super Usuario</option>
        <option value="0">NO</option>
        <option value="1">Si</option>
    </select>

    <input type="submit" value="Enviar" name="enviar">
</form>

<?php
$registro -> registroMaestroController();
?>
