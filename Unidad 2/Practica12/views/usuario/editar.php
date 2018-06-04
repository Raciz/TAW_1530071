<?php
if(isset($_GET["action"]) && $_GET["action"]=="editar")
{
    $modificar = new mvcUsuario();
    $modificar -> modificarUsuarioController();
}
?>

<?php
if (isset($_GET["edit"]))
{
?>
<!--modal para agregar un nuevo usuario-->
<div class="modal modal-info fade in" id="modal-info" style="display: block; padding-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
            </div>
            <form role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=editar">
                <div class="modal-body">
                    <?php
                    $editar = new mvcUsuario();
                    $editar -> editarUsuarioController();
                    ?>               
                </div>
                <div class="modal-footer">
                    <a href="index.php?section=usuario&action=listado"><button type="button" class="btn btn-primary">Cancelar</button></a>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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