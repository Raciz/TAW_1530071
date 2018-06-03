<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcUsuario
{
    //Control para manejar el registro de un nuevo usuario en el sistema
    function agregarUsuarioController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de usuario
            $data = array("nombre" => $_POST["nombre"],
                          "apellido" => $_POST["apellido"],
                          "usuario" => $_POST["usuario"],
                          "password" => $_POST["contraseña"],
                          "email" => $_POST["email"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDUsuario::agregarUsuarioModel($data,"Usuario");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=usuario&action=listado');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de los usuarios registrados en el sistema
    function listadoUsuarioController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los maestros 
        $data = CRUDUsuario::listadoUsuarioModel("Usuario");

        //se imprime la informacion de cada uno de los maestros registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los usuarios con su respectivo boton de editar y eliminar
            echo "<tr>
                <td>".$row["id_usuario"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["apellido"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["fecha_de_registro"]."</td>
                <td>
                    <center>
                        <div class='btn-group'>
                            <button type='button' title='Editar Usuario' class='btn btn-default'><i class='fa fa-edit'></i></button>
                            <button type='button' title='Eliminar Usuario' class='btn btn-default'><i class='fa fa-trash-o'></i></button>
                        </div>
                    </center>
                </td>
            </tr>";
        }
    }
}
?>