

<h1>Conversor</h1>

<form method="post">
	<input type="text" name="numero"><br>
    <input type="radio" name="original" value="binario"><label>Binario</label>
    <input type="radio" name="original" value="octal"><label>Octal</label>
    <input type="radio" name="original" value="decimal"><label>Decimal</label>
    <input type="radio" name="original" value="hexadecimal"><label>Hexadecimal</label>
    <input type="submit" name="enviar" value="Enviar">
</form>

<?php
$convertir = new MvcController();
$convertir -> conversorController();
?>


