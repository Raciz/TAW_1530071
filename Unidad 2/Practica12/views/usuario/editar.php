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

<!--Modal para la confirmacion del editado de un usuario-->
<div class="modal modal-info fade" id="modal-info-confirm-edit" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmacion de Editado</h4>
            </div>
            <!--formulario para pedir al usuario su contraseña para confirmar el editado de un usuario-->
            <form id="formEdit" role="form" method="post" autocomplete="off" action="index.php?section=dashboard&shop=<?php echo $_GET["shop"]; ?>">
                <div class="modal-body">

                    <!--Alert para notificar al usuario que no ha introducido bien su contraseña-->
                    <div class="alert alert-danger alert-dismissible ocultar" id="errorEdit">
                        <button type="button" class="close" onclick="ocultar()">×</button>
                        <h4><i class="icon fa fa-ban"></i>Error</h4>
                        La Contraseña es Incorrecta
                    </div>

                    <!--input para ingresar la contraseña del usuario logeado-->
                    <div class="form-group">
                        <input type="hidden" id="edit" name="edit">
                        <label>Ingrese Su Contraseña Para Confirmar</label>
                        <input type="password" class="form-control" id="passEdit" name="contraseña" placeholder="Ingrese Contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--Botones para continuar o cancelar con la edicion del usuario-->
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
    //variable para modificar el formulario
    var errorEdit = document.getElementById("errorEdit");

    //variable para modificar el alert de error
    var form = document.getElementById("formEdit");

    //funcion para obtener el id del usuario a eliminar
    function idEdit(edit)
    {
        //obtenemos el objeto del input hidden
        var input = document.getElementById("edit");

        //le asignamos a value del que es el id del usuario a editar 
        input.setAttribute("value",edit);
    }

    //funcion para ocultar el alert de error
    function ocultar()
    {
        //al alert le asignamos una nueva clase en class
        errorEdit.setAttribute("class","alert alert-danger alert-dismissible ocultar");
    }


    (function()
     {
        //funcion para validar que la contraseña ingresada coincida con la contraseña del usuario logeado
        function validar(e)
        {
            //obtenemos la contraseña ingresada en el input
            var pass = document.getElementById("passEdit").value;

            //verificamos si coinciden las contraseñas
            if('<?php echo $_SESSION["password"]?>' != pass)
            {
                //si son diferentes se detiene el evento submit
                e.preventDefault();
                //se muestra el alert de error asignadole la siguente clase en class
                errorEdit.setAttribute("class","alert alert-danger alert-dismissible");
            }   
        }

        //asignamos un addeventlistener al form para ejecutar la funcion validar cuando se inicie el evento submit
        form.addEventListener("submit",validar);
    })();

</script>




















<?php
//verificamos si se requiere desplegar el modal para modificar la informacion del usuario
if (isset($_POST["edit"]))
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
            <form role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=editar&shop=<?php echo $_GET["shop"]; ?>">
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
                    <a href="index.php?section=dashboard&shop=<?php echo $_GET["shop"]; ?>"><button type="button" class="btn btn-primary">Cancelar</button></a>
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