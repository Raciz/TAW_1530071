<?php
//iniciamos y destruimos la sesion para cerrar la sesion del usuario
unset($_SESSION);
session_destroy();
header("location:index.php");
?>