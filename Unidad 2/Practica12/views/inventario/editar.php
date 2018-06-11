<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para modificar un producto
if(isset($_GET["action"]) && $_GET["action"]=="editar")
{
    //creamos un objeto de mvcInventario
    $modificar = new mvcInventario();

    //se manda a llamar el controller para modificar la informacion de un producto
    $modificar -> modificarInventarioController();
}
?>

<!--modal para editar la informacion del producto-->
<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Producto</h4>
            </div>
            <form role="form" method="post" autocomplete="off" action="index.php?section=producto&product=<?php echo $_GET["product"]; ?>&action=editar">
                <div class="modal-body">
                    <?php
                    //creamos un objeto de mvcInventario
                    $editar = new mvcInventario();
                    
                    //mandamos a llamar a el controller para obtener la informacion del producto
                    $editar -> editarInventarioController();
                    ?>               
                </div>
                <div class="modal-footer">
                    <!--Botones para guardar o cancelar con la modificacion de la informacion del producto-->
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline pull-right">Guardar</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>