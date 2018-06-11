<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcTienda
{
    //Control para manejar el registro de una nueva tienda en el sistema
    function agregarTiendaController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de usuario
            $data = array("nombre" => $_POST["nombre"],
                          "direccion" => $_POST["direccion"],
                          "estado" => $_POST["estado"]);

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDTienda::agregarTiendaModel($data,"Tienda");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregar";

                //nos redireccionara al listado de tiendas
                echo "<script>
                        window.location.replace('index.php?section=tienda&action=listado');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de las usuarios registrados en el sistema
    function listadoTiendaController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los usuarios 
        $data = CRUDTienda::listadoTiendaModel("Tienda");

        //se imprime la informacion de cada una de las tiendas registradas
        foreach($data as $rows => $row)
        {
            if($row["estado"])
            {
                $row["estado"] = "Activada";
            }
            else
            {
                $row["estado"] = "Desactivada";
            }
            //e imprimimos la informacion de cada uno de las tiendas 
            echo "<tr>
                <td>".$row["nombre"]."</td>
                <td>".$row["direccion"]."</td>
                <td>".$row["estado"]."</td>
                <td>
                    <center>
                        <button class='btn btn-app' data-toggle='modal' data-target='#eliminar-tienda' onclick='idDel(".$row["id_tienda"].")'>
                            <i class='fa fa-trash'></i> Eliminar
                        </button>

                        <button class='btn btn-app' data-toggle='modal' data-target='#edit-tienda' onclick='idEdit(".$row["id_tienda"].")'>
                            <i class='fa fa-edit'></i> Editar
                        </button>

                        <a class='btn btn-app' href='index.php?section=dashboard&shop=".$row["id_tienda"]."'>
                            <i class='fa fa-home'></i> Entrar A Tienda
                        </a>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar un usuario del sistema
    public function eliminarTiendaController()
    {
        //se verifica si se envio el id del usuario a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del usuario
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDTienda::eliminarTiendaModel($data,"Historial","Tienda_Producto","Tienda");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "eliminar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=tienda&action=listado');
                      </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de una tienda a editar
    public function editarTiendaController()
    {
        //se obtiene el id de la tienda a mostrar su informacion
        $data = $_POST["edit"];

        //se manda el id de la tienda y el nombre de la tabla donde esta almacenada
        $resp = CRUDTienda::editarTiendaModel($data,"Tienda");

        //se imprime la informacion en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["id_tienda"]." name='id'>

                    <div class='form-group'>
                        <label>Nombres</label>
                        <input type='text' value='".$resp["nombre"]."' class='form-control' name='nombre' placeholder='Ingrese Nombre' required>
                    </div>

                    <div class='form-group'>
                        <label>Apellidos</label>
                        <input type='text' value='".$resp["direccion"]."' class='form-control' name='direccion' placeholder='Direccion' required>
                    </div>

                    <div class='form-group'>
                        <label>Estado</label>
                        <br>
                        <label>";
        
                        if($resp["estado"])
                        {
                            echo "<input value='1' type='radio' name='estado' class='minimal' required checked> Activa";
                        }
                        else
                        {
                            echo "<input value='1' type='radio' name='estado' class='minimal' required> Activa";
                        }
                  echo "</label>
                        <br>
                        <label>";
                        if($resp["estado"])
                        {
                            echo "<input value='0' type='radio' name='estado' class='minimal' required> Desactivada";
                        }
                        else
                        {
                            echo "<input value='0' type='radio' name='estado' class='minimal' required checked> Desactivada";
                        }
            
            echo "</label>
            </div>";
    }

    //Control para modificar la informacion de un usuario
    public function modificarTiendaController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de usuario
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "direccion" => $_POST["direccion"],
                          "estado" => $_POST["estado"]);

            //se manda la informacion del usuario y la tabla en la que esta almacenada
            $resp = CRUDTienda::modificarTiendaModel($data,"Tienda");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "editar";

                //nos redireccionara al listado de usuarios
                echo "<script>
            window.location.replace('index.php?section=tienda&action=listado');
        </script>";
            }
        }
    }
}
?>


