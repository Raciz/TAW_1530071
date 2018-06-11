<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se debe mandar a llamar el controller para eliminar un usuario
if(isset($_GET["action"]) && $_GET["action"]=="eliminar")
{
    //se crea un onjeto de mvcUsuario
    $eliminar = new mvcUsuario();

    //se manda a llamar el controller para eliminar un usuario
    $eliminar -> eliminarUsuarioController();
}
?>

<!--Modal para la confirmacion del borrado de un usuario-->
<div class="modal modal-info fade" id="modal-info-eliminar" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmacion de Borrado</h4>
            </div>
            <!--formulario para pedir al usuario su contraseña para confirmar el borrado de un usuario-->
            <form id="form" role="form" method="post" autocomplete="off" action="index.php?section=usuario&action=eliminar&shop=<?php echo $_GET["shop"]; ?>">
                <div class="modal-body">

                    <!--Alert para notificar al usuario que no ha introducido bien su contraseña-->
                    <div class="alert alert-danger alert-dismissible ocultar" id="error">
                        <button type="button" class="close" onclick="ocultar()">×</button>
                        <h4><i class="icon fa fa-ban"></i>Error</h4>
                        La Contraseña es Incorrecta
                    </div>

                    <!--input para ingresar la contraseña del usuario logeado-->
                    <div class="form-group">
                        <input type="hidden" id="del" name="del">
                        <label>Ingrese Su Contraseña Para Confirmar</label>
                        <input type="password" class="form-control" id="pass" name="contraseña" placeholder="Ingrese Contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--Botones para continuar o cancelar con la eliminacion del usuario-->
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
    var errorDel = document.getElementById("error");

    //variable para modificar el alert de error
    var form = document.getElementById("form");

    //funcion para obtener el id del usuario a eliminar
    function idDel(del)
    {
        //obtenemos el objeto del input hidden
        var input = document.getElementById("del");

        //le asignamos a value del que es el id del usuario a eliminar 
        input.setAttribute("value",del);
    }

    //funcion para ocultar el alert de error
    function ocultar()
    {
        //al alert le asignamos una nueva clase en class
        errorDel.setAttribute("class","alert alert-danger alert-dismissible ocultar");
    }


    (function()
     {
        //funcion para validar que la contraseña ingresada coincida con la contraseña del usuario logeado
        function validar(e)
        {
            //obtenemos la contraseña ingresada en el input
            var pass = document.getElementById("pass").value;

            //verificamos si coinciden las contraseñas
            if('<?php echo $_SESSION["password"]?>' != pass)
            {
                //si son diferentes se detiene el evento submit
                e.preventDefault();
                //se muestra el alert de error asignadole la siguente clase en class
                errorDel.setAttribute("class","alert alert-danger alert-dismissible");
            }   
        }

        //asignamos un addeventlistener al form para ejecutar la funcion validar cuando se inicie el evento submit
        form.addEventListener("submit",validar);
    })();

</script>


