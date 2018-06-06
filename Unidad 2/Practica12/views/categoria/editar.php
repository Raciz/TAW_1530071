<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para modificar una categoria
if(isset($_GET["action"]) && $_GET["action"]=="editar")
{
    //creamos un objeto de mvcCategoria
    $modificar = new mvcCategoria();

    //se manda a llamar el controller para modificar la informacion de una categoria
    $modificar -> modificarCategoriaController();
}
?>

<?php
//verificamos si se requiere desplegar el modal para modificar la informacion de la categoria
if (isset($_GET["edit"]))
{
?>
<!--modal para modificar la informacion de una categoria-->
<div class="modal modal-info fade in" id="modal-info" style="display: block; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Categoria</h4>
            </div>
            <!--formualrio para confirmar la eliminacion de una categoria-->
            <form role="form" method="post" autocomplete="off" action="index.php?section=categoria&action=editar">
                <div class="modal-body">
                    <?php
                    //creamos un objeto de mvcCategoria
                    $editar = new mvcCategoria();
                    
                    //mandamos a llamar a el controller para obtener la informacion de la categoria
                    $editar -> editarCategoriaController();
                    ?>               
                </div>
                <div class="modal-footer">
                    <!--Botones para guardar o cancelar la modificacion de la informacion de la categoria-->
                    <a href="index.php?section=categoria&action=listado"><button type="button" class="btn btn-primary">Cancelar</button></a>
                    <button type="submit" class="btn btn-outline">Guardar</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
}
?>     