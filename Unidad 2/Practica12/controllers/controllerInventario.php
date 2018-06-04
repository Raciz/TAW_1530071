<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcInventario
{
    //Control para manejar el registro de un nuevo usuario en el sistema
    function agregarInventarioController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["nombre"]))
        {

            //se guardan la informacion de usuario
            $data = array("nombre" => $_POST["nombre"],
                          "codigo" => $_POST["codigo"],
                          "categoria" => $_POST["categoria"],
                          "precio" => $_POST["precio"],
                          "stock" => $_POST["stock"],
                          "img" => "views/media/img/noimg.png");

            //se verifica si se envio una imagen para el producto
            if(!empty($_FILES["img"]["name"]))
            {
                //se extrae el tipo de la imagen
                $type = $_FILES["img"]["type"];
                //se extrae el tamaño de la imagen
                $size = $_FILES["img"]["size"];
                //se extrae el nombre de la imagen
                $name = $_FILES["img"]["name"];
                //se extrae la ubicacion temporal de la imagen
                $tmp = $_FILES["img"]["tmp_name"];

                //se verifica si se envio una imagen jpg o png
                if($type == "image/jpeg" || $type == "image/png")
                {
                    //en caso de que si sea png o jpg
                    //se verifica que el tamaño de la imagen no supere los 300KB
                    if($size < 300000)
                    {
                        //en caso de que no supere el tamaño de 300KB
                        //se mueve la imagen a la carpeta de imagenes de los productos
                        if(!move_uploaded_file($tmp, "./views/media/img/".$name))
                        {
                            //en caso de que no se pudiera mover se asigna el error copy en session error
                            $_SESSION["error"] = "copy";
                            //nos redireccionamos al listado de inventario
                            echo "<script>
                                    window.location.replace('index.php?section=inventario&action=listado');
                                 </script>";
                            //y se detiene la ejecucion del script
                            exit;
                        }
                        else
                        {
                            //asignamos en data el url real de la imagen
                            $data["img"] = "views/media/img/".$name;
                        }
                    }
                    else
                    {
                        //en caso de que la imagen supere el el tamaño de 300KB se asigna el error size en session error
                        $_SESSION["error"] = "size";
                        //nos redireccionamos al listado de inventario
                        echo "<script>
                                    window.location.replace('index.php?section=inventario&action=listado');
                                 </script>";
                        //y se detiene la ejecucion del script
                        exit;
                    }
                }
                else
                {
                    //en caso de que la imagen no sea png o jpg se asigna el error type en session error
                    $_SESSION["error"] = "type";
                    //nos redireccionamos al listado de inventario
                    echo "<script>
                            window.location.replace('index.php?section=inventario&action=listado');
                          </script>";
                    //y se detiene la ejecucion del script
                    exit;
                }
            }
            
            $idProduct = "";
            $resp1 = CRUDInventario::agregarInventarioModel($data,"Producto",$idProduct);
            $resp2 = CRUDInventario::historialInventarioModel("Historial",$data,$_SESSION["id"],$_SESSION["nombre"],$idProduct);

            //en caso de que se haya registrado correctamente
            if($resp1 == "success" && $resp2 == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=inventario&action=listado');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }
    
    //Control para mostrar un listado de los producto registrados en el sistema
    function listadoInventarioController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los productos
        $data = CRUDInventario::listadoInventarioModel("Producto");

        //se imprime la informacion de cada uno de los producto registrados en el sistema
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los productos
            echo "<tr>
                <td>".$row["codigo_producto"]."</td>
                <td>".$row["nombre_producto"]."</td>
                <td>".$row["stock"]."</td>
                <td>
                    <center>
                        <img height=100 width=100 src='".$row["img"]."'>
                    </center>
                </td>
                <td>
                    <center>
                        <div class='btn-group'>
                            <a href='index.php?section=producto&product=".$row["id_producto"]."'>
                                <button type='button' title='Editar Stock' class='btn btn-default'>
                                    <i class='fa fa-edit'></i>
                                </button>
                            </a>
                        </div>
                    </center>
                </td>
            </tr>";
        }
    }

    /*/Control para borrar un usuario del sistema
    public function eliminarUsuarioController()
    {
        //se verifica si se envio el id del usuario a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del usuario
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDUsuario::eliminarUsuarioModel($data,"Usuario");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "eliminar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=usuario&action=listado');
                      </script>";
            }
        }
    }

    //Control para poder mostrar la informacion de un usuario a editar
    public function editarUsuarioController()
    {
        //se obtiene el id del usuario a mostrar su informacion
        $data = $_GET["edit"];

        //se manda el id del usuario y el nombre de la tabla donde esta almacenada
        $resp = CRUDUsuario::editarUsuarioModel($data,"Usuario");

        //se imprime la informacion del usuario en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["id_usuario"]." name='id'>

                    <div class='form-group'>
                        <label>Nombres</label>
                        <input type='text' value='".$resp["nombre"]."' class='form-control' name='nombre' placeholder='Ingrese Nombre' required>
                    </div>

                    <div class='form-group'>
                        <label>Apellidos</label>
                        <input type='text' value='".$resp["apellido"]."' class='form-control' name='apellido' placeholder='Ingrese Apellido' required>
                    </div>

                    <div class='form-group'>
                        <label>Usuario</label>
                        <input type='text' value='".$resp["usuario"]."' class='form-control' name='usuario' placeholder='Ingrese Usuario' required>
                    </div>

                    <div class='form-group'>
                        <label>Email</label>
                        <input type='email' value='".$resp["email"]."' class='form-control' name='email' placeholder='Ingrese Email' required>
                    </div>

                    <div class='form-group'>
                        <label>Contraseña</label>
                        <input type='password' value='".$resp["password"]."' class='form-control' name='contraseña' placeholder='Ingrese Contraseña' required>
                    </div>

             ";
    }

    //Control para modificar la informacion de un usuario
    public function modificarUsuarioController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de usuario
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "apellido" => $_POST["apellido"],
                          "usuario" => $_POST["usuario"],
                          "password" => $_POST["contraseña"],
                          "email" => $_POST["email"]);

            //se manda la informacion del usuario y la tabla en la que esta almacenada
            $resp = CRUDUsuario::modificarUsuarioModel($data,"Usuario");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "editar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=usuario&action=listado');
                      </script>";
            }
        }
    }*/
}
?>


