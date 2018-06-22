<?php

class mvcPago
{
    //Control para manejar el registro de un nuevo pago en el sistema
    function agregarPagoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["alumno"]))
        {

            //se guardan la informacion del producto
            $data = array("alumno" => $_POST["alumno"],
                          "mama" => $_POST["nomMadre"]." ".$_POST["apeMadre"],
                          "pago" => $_POST["datePago"],
                          "img" => "views/media/img/noimg.png",
                          "folio" => $_POST["folio"]);

            //se verifica si se envio una imagen del boleto
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
                        //se mueve la imagen a la carpeta de imagenes de los boletos
                        if(!move_uploaded_file($tmp, "./views/media/img/".$name))
                        {
                            //en caso de que no se pudiera mover se asigna el error copy en session error
                            $_SESSION["error"] = "copy";

                            //nos redireccionamos al formulario de registro
                            echo "<script>
                                    window.location.replace('index.php');
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

                        //nos redireccionamos al formulario de registro
                        echo "<script>
                                    window.location.replace('index.php');
                              </script>";

                        //y se detiene la ejecucion del script
                        exit;
                    }
                }
                else
                {
                    //en caso de que la imagen no sea png o jpg se asigna el error type en session error
                    $_SESSION["error"] = "type";

                    //nos redireccionamos al formulario de registro
                    echo "<script>
                            window.location.replace('index.php');
                          </script>";

                    //y se detiene la ejecucion del script
                    exit;
                }
            }


            //se manda la infomacion nesesaria a los modelos para ingresar el producto en el sistema
            $resp = CRUDPago::agregarPagoModel($data,"Pago");

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregar";

                //nos redireccionara al listado de productos
                echo "<script>
                        window.location.replace('index.php');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar un listado de los pagos en la seccion publica
    function listadoPagoPublicoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los Pagos
        $data = CRUDPago::listadoPagoModel("Pago","Alumna");

        //se imprime la informacion de cada uno de los Pagos
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los Pagos
            echo "<tr>
                <td>".$row["id_pago"]."</td>
                <td>".$row["nombre"]." ".$row["apellido"]."</td>
                <td>".$row["fecha_envio"]."</td>
            </tr>";
        }
    }

    //Control para mostrar un listado de los pagos en la seccion publica
    function listadoPagoAdminController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los alumnos
        $data = CRUDPago::listadoPagoModel("Pago","Alumna");

        //se imprime la informacion de cada uno de los alumnos registrados
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los alumnos
            echo "<tr>
                <td>".$row["id_pago"]."</td>
                <td>".$row["nombre"]." ".$row["apellido"]."</td>
                <td>".$row["mama"]."</td>
                <td>".$row["fecha_pago"]."</td>
                <td>".$row["fecha_envio"]."</td>
                <td><a href='".$row["img_comprobante"]."'>Ver</a></td>
                <td>".$row["folio"]."</td>
                <td>
                    <center>
                        <div class='btn-group'>
                                <button type='button' title='Editar Pago' class='btn btn-default' data-toggle='modal' data-target='#edit-pago' onclick='idEdit(".$row["id_pago"].")'>
                                    <i class='fa fa-edit'></i>
                                </button>

                            <button type='button' title='Eliminar Pago' class='btn btn-default' data-toggle='modal' data-target='#Del-pago' onclick='idDel(".$row["id_pago"].")'>
                                <i class='fa fa-trash-o'></i>
                            </button>
                        </div>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar un pago del sistema
    public function eliminarPagoController()
    {
        //se verifica si se envio el id del pago a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id del pago
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDPago::eliminarPagoModel($data,"Pago");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "eliminar";

                //nos redireccionara al listado de usuarios
                echo "<script>
                        window.location.replace('index.php?section=pago&action=listado');
                      </script>";
            }
        }
    }

    /*/Control para poder mostrar la informacion de un alumno a editar
    public function editarAlumnoController()
    {
        //se obtiene el id del alumno a mostrar su informacion
        $data = $_POST["edit"];

        //se manda el id del alumno y el nombre de la tabla donde esta almacenada
        $resp = CRUDAlumno::editarAlumnoModel($data,"Alumna");

        //se imprime la informacion del grupo en inputs de un formulario
        echo "
                <input type=hidden value=".$resp["id_alumna"]." name='id'>

                <div class='form-group'>
                        <label>Nombre</label>
                        <input type='text' value='".$resp["nombre"]."' class='form-control' name='nombre' placeholder='Ingrese Nombre' required>
                    </div>

                    <div class='form-group'>
                        <label>Apellido</label>
                        <input type='text' value='".$resp["apellido"]."' class='form-control' name='apellido' placeholder='Ingrese Apellido' required>
                    </div>


                    <div class='form-group'>
                        <label>Fecha de Nacimiento</label>

                        <div class='input-group date'>
                            <div class='input-group-addon'>
                                <i class='fa fa-calendar'></i>
                            </div>
                            <input name='fecha' type='text' class='form-control pull-right' id='datepicker2' value='".$resp["fechaNac"]."'>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label>Grupo</label>
                        <select name='grupo' id='grupo' class='form-control select2' style='width: 100%;' required>";

        //creamos un objeto de mvcGrupo
        $option = new mvcGrupo();

        //se manda a llamar al control para traer a los grupos en options
        $option -> optionGrupoController();

        echo"           </select>
                    </div>";

        //script para seleccionar en el select el option de la categoria al que pertenece el producto
        echo "<script>
                var grupo = document.getElementById('grupo');

                for(var i = 1; i < grupo.options.length; i++)
                {
                    if(grupo.options[i].value ==".$resp["grupo"].")
                    {
                        grupo.selectedIndex = i;
                    }
                }
                </script>";

    }

    //Control para modificar la informacion de un alumno
    public function modificarAlumnoController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion del alumno
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "apellido" => $_POST["apellido"],
                          "fecha" => $_POST["fecha"],
                          "grupo" => $_POST["grupo"]);

            //se manda la informacion del alumno y la tabla en la que esta almacenada
            $resp = CRUDAlumno::modificarAlumnoModel($data,"Alumna");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "editar";

                //nos redireccionara al listado de alumnos
                echo "<script>
                        window.location.replace('index.php?section=alumno&action=listado');
                    </script>";
            }
        }
    }    */
}
?>