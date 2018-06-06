<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para modificar un usuario
if(isset($_GET["action"]) && $_GET["action"]=="editar")
{
    //creamos un objeto de mvcUsuario
    $modificar = new mvcUsuario();

    //se manda a llamar el controller para modificar la informacion de un usuario
    $modificar -> modificarUsuarioController();
}
?>

<?php
//verificamos si se requiere desplegar el modal para modificar la informacion del usuario
if (isset($_GET["edit"]))
{
?>
<!--modal para editar la informacion del usuario-->
<div class="modal modal-info fade in" id="modal-info" style="display: block; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <!--formulario para editar la informacion de un usuario-->
            <form role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=editar">
                <div class="modal-body">
                    <?php
                    //creamos un objeto de mvcUsuario
                    $editar = new mvcUsuario();
                    
                    //mandamos a llamar a el controller para obtener la informacion del usuario
                    $editar -> editarUsuarioController();
                    ?>               
                </div>
                <div class="modal-footer">
                    <!--Botones para guardar o cancelar con la modificacion de la informacion del usuario-->
                    <a href="index.php?section=usuario&action=listado"><button type="button" class="btn btn-primary">Cancelar</button></a>
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