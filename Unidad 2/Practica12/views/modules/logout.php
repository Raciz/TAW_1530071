<?php
//destruimos la sesion para cerrar la sesion del usuario
session_destroy();

echo"<script>
        window.location.replace('index.php');
     </script>";
?>