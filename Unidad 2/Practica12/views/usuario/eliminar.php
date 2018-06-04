<?php
if(isset($_GET["action"]) && $_GET["action"]=="eliminar")
{
    $eliminar = new mvcUsuario();
    $eliminar -> eliminarUsuarioController();
}
?>
<div class="modal modal-info fade" id="modal-info-eliminar" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmacion de Borrado</h4>
            </div>
            <form id="form" role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=eliminar">
                <div class="modal-body">

                    <div class="alert alert-danger alert-dismissible ocultar" id="error">
                        <button type="button" class="close" onclick="ocultar()">×</button>
                        <h4><i class="icon fa fa-ban"></i>Error</h4>
                        La Contraseña es Incorrecta
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="del" name="del">
                        <label>Ingrese Su Contraseña Para Confirmar</label>
                        <input type="password" class="form-control" id="pass" name="contraseña" placeholder="Ingrese Contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    var error = document.getElementById("error");
    var form = document.getElementById("form");
    function idDel(del)
    {
        var input = document.getElementById("del");
        input.setAttribute("value",del);
    }

    function ocultar()
    {
        error.setAttribute("class","alert alert-danger alert-dismissible ocultar");
    }


    (function()
     {
        function validar(e)
        {
            var pass = document.getElementById("pass").value;
            if('<?php echo $_SESSION["password"]?>' != pass)
            {
                e.preventDefault();
                error.setAttribute("class","alert alert-danger alert-dismissible");
            }   
        }
        form.addEventListener("submit",validar);
    })();

</script>


