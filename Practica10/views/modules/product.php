<?php

session_start();
if(!$_SESSION["validar"])
{
    header("location:index.php?action=ingresar");
    exit();
}

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<h1>Registrar Producto</h1>


<form role="form" method="post">
    <div class="form-group float-label-control">
        <label for="">Nombre</label>
        <input type="text" class="form-control" placeholder="Nombre" name="name" required>
    </div>
    <div class="form-group float-label-control">
        <label for="">Descripcion</label>
        <input type="number" class="form-control" placeholder="Descripcion" name="desc" required>
    </div>
    <div class="form-group float-label-control">
        <label for="">Precio Compra</label>
        <input type="number" class="form-control" placeholder="Precio Compra" name="buy" required>
    </div>
    <div class="form-group float-label-control">
        <label for="">Precio Venta</label>
        <input type="number" class="form-control" placeholder="Precio Venta" name="sale" required>
    </div>
    <div class="form-group float-label-control">
        <label for="">Precio</label>
        <input type="number" class="form-control" placeholder="Precio" name="price" required>
    </div>
    <input type="submit" value="enviar" name="enviar">
</form>
<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new product();
//se invoca la función registroProductosController de la clase MvcController:
$registro -> insertProductController();


?>
