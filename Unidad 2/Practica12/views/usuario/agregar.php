<?php
if(isset($_GET["action"]) && $_GET["action"]=="agregar")
{
    $agregar = new mvcUsuario();
    $agregar -> agregarUsuarioController();
}
?>
<!--modal para agregar un nuevo usuario-->
<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <form role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=agregar">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" required>
                    </div>

                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Ingrese Email" required>
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="contraseña" placeholder="Ingrese Contraseña" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>