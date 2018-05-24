<?php
class mvcController
{
    public function template()
    {
        include "views/template.php";
    }

    public function urlController()
    {
        if(isset($_GET["action"]))
        {
            $link = $_GET["action"];
        }
        else
        {
            $link = "index";
        }

        $url = url::urlModel($link);

        include $url;
    }

    public function registroCarreraController()
    {
        if(isset($_POST["carrera"]))
        {
            $data = $_POST["carrera"];

            $resp = CRUD::registroCarreraModel($data,"Carrera");

            if($resp == "success")
            {
                header("location:index.php?action=carrera");
            }
            else
            {
                echo "error";
            }
        }
    }

    public function listaCarreraController()
    {
        $data = CRUD::listaCarreraModel("Carrera");

        foreach($data as $rows => $row)
        {
            echo "<tr>
                <td>".$row["nombre"]."</td>
                <td><a href=index.php?action=editarC&edit=".$row["id"]."><button>Editar</button></a></td>
                <td><a href=index.php?action=carrera&del=".$row["id"]."><button>Eliminar</button></a></td>
            </tr>";
        }
    }

    public function optionCarreraController()
    {
        $data = CRUD::listaCarreraModel("Carrera");

        foreach($data as $rows => $row)
        {
            echo "<option value=".$row["id"].">".$row["nombre"]."</option>";
        }
    }

    public function deleteCarreraController()
    {
        if(isset($_GET["del"]))
        {
            $data = $_GET["del"];

            $resp = CRUD::deleteCarreraModel($data,"Carrera");

            if($resp == "success")
            {
                header("location:index.php?action=carrera");
            }
        }
    }

    public function editCarreraController()
    {
        $data = $_GET["edit"];
        $resp = CRUD::editCarreraModel($data,"Carrera");

        echo "
             <input type=hidden value=".$resp["id"]." name=id>
			 <input type=text value='".$resp["nombre"]."' name=nombre required>
             <input type=submit value=Actualizar name=enviar>
             ";
    }

    public function updateCarreraController()
    {
        if(isset($_POST["nombre"]))
        {
            $data = array("id"=>$_POST["id"],"nombre"=>$_POST["nombre"]);
            $resp = CRUD::updateCarreraModel($data,"Carrera");

            if($resp == "success")
            {
                header("location:index.php?action=carrera");
            }
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function registroMaestroController()
    {
        if(isset($_POST["num_empleado"]))
        {
            $data = array("num_empleado" => $_POST["num_empleado"],
                          "carrera" => $_POST["carrera"],
                          "nombre" => $_POST["nombre"],
                          "email" => $_POST["email"],
                          "password" => $_POST["password"],
                          "super" => $_POST["super"]);

            $resp = CRUD::registroMaestroModel($data,"Maestro");

            if($resp == "success")
            {
                header("location:index.php?action=maestro");
            }
        }
    }

    public function listaMaestroController()
    {
        $data = CRUD::listaMaestroModel("Maestro","Carrera");

        foreach($data as $rows => $row)
        {
            if($row["superUser"])
            {
                $super = "SI";
            }
            else
            {
                $super = "NO";
            }
            echo "<tr>
                <td>".$row["num_empleado"]."</td>
                <td>".$row["carrera"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["email"]."</td>
                <td>".$super."</td>
                <td><a href=index.php?action=editarM&edit=".$row["num_empleado"]."><button>Editar</button></a></td>
                <td><a href=index.php?action=maestro&del=".$row["num_empleado"]."><button>Eliminar</button></a></td>
            </tr>";
        }
    }


    public function deleteMaestroController()
    {
        if(isset($_GET["del"]))
        {
            $data = $_GET["del"];

            $resp = CRUD::deleteMaestroModel($data,"Maestro");

            if($resp == "success")
            {
                header("location:index.php?action=maestro");
            }
        }
    }


    public function editMaestroController()
    {
        $data = $_GET["edit"];
        $resp = CRUD::editMaestroModel($data,"Maestro");

        echo "<input type=hidden name=num_empleado value=".$resp["num_empleado"]." required>
              <select required name=carrera>
                    <option value='".$resp["carrera"]."'>Seleccione Carrera</option>";
        $edit = new mvcController();
        $edit -> optionCarreraController();
        echo "</select>
              <input type=text placeholder=Nombre name=nombre value='".$resp["nombre"]."' required>
              <input type=email placeholder=Email name=email value=".$resp["email"]." required>
              <input type=password placeholder=Contraseña name=password value='".$resp["password"]."' required>
              <select name=super>
                <option value=".$resp["superUser"].">¿Es Super Usuario?</option>
                <option value=0>NO</option>
                <option value=1>Si</option>
              </select>
              <input type=submit value=Actualizar name=enviar>
             ";
    }

    public function updateMaestroController()
    {
        if(isset($_POST["num_empleado"]))
        {
            $data = array("num_empleado" => $_POST["num_empleado"],
                          "carrera" => $_POST["carrera"],
                          "nombre" => $_POST["nombre"],
                          "email" => $_POST["email"],
                          "password" => $_POST["password"],
                          "super" => $_POST["super"]);

            $resp = CRUD::updateMaestroModel($data,"Maestro");

            if($resp == "success")
            {
                header("location:index.php?action=maestro");
            }
        }
    }

    public function optionMaestroController()
    {
        $data = CRUD::listaMaestroModel("Maestro","Carrera");

        foreach($data as $rows => $row)
        {
            echo "<option value=".$row["num_empleado"].">".$row["nombre"]."</option>";
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function registroAlumnoController()
    {
        if(isset($_POST["matricula"]))
        {
            $data = array("matricula" => $_POST["matricula"],
                          "nombre" => $_POST["nombre"],
                          "carrera" => $_POST["carrera"],
                          "tutor" => $_POST["tutor"]);

            $resp = CRUD::registroAlumnoModel($data,"Alumno");

            if($resp == "success")
            {
                header("location:index.php?action=alumno");
            }
        }
    }

    public function listaAlumnoController()
    {
        $data = CRUD::listaAlumnoModel("Alumno","Carrera","Maestro");

        foreach($data as $rows => $row)
        {
            echo "<tr>
                <td>".$row["matricula"]."</td>
                <td>".$row["nombre"]."</td>
                <td>".$row["carrera"]."</td>
                <td>".$row["tutor"]."</td>
                <td><a href=index.php?action=editarA&edit=".$row["matricula"]."><button>Editar</button></a></td>
                <td><a href=index.php?action=alumno&del=".$row["matricula"]."><button>Eliminar</button></a></td>
            </tr>";
        }
    }

    public function deleteAlumnoController()
    {
        if(isset($_GET["del"]))
        {
            $data = $_GET["del"];

            $resp = CRUD::deleteAlumnoModel($data,"Alumno");

            if($resp == "success")
            {
                header("location:index.php?action=alumno");
            }
        }
    }

    public function editAlumnoController()
    {
        $data = $_GET["edit"];
        $resp = CRUD::editAlumnoModel($data,"Alumno");

        echo "<input type=hidden name=matricula value=".$resp["matricula"]." required>
              <input type=text placeholder=Nombre name=nombre value='".$resp["nombre"]."' required>
              <select required name=carrera>
                    <option value='".$resp["carrera"]."'>Seleccione Carrera</option>";
        $edit = new mvcController();
        $edit -> optionCarreraController();
        echo "</select>
        <select required name=tutor>
                    <option value='".$resp["tutor"]."'>Seleccione Tutor</option>";
        $edit = new mvcController();
        $edit -> optionMaestroController();
        echo "</select>
              <input type=submit value=Actualizar name=enviar>";
    }


    public function updateAlumnoController()
    {
        if(isset($_POST["matricula"]))
        {
            $data = array("matricula" => $_POST["matricula"],
                          "nombre" => $_POST["nombre"],
                          "carrera" => $_POST["carrera"],
                          "tutor" => $_POST["tutor"]);

            $resp = CRUD::updateAlumnoModel($data,"Alumno");

            if($resp == "success")
            {
                header("location:index.php?action=alumno");
            }
        }
    }
    /*        
    public function optionMaestroController()
    {
        $data = CRUD::listaMaestroModel("Maestro","Carrera");

        foreach($data as $rows => $row)
        {
            echo "<option value=".$row["num_empleado"].">".$row["nombre"]."</option>";
        }
    }*/

    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function loginController()
    {

        if(isset($_POST["num_empleado"]))
        {
            $data = array("num_empleado"=>$_POST["num_empleado"], 
                          "password"=>$_POST["password"]);

            $resp = CRUD::loginModel($data,"Maestro");

            if($resp["num_empleado"] == $_POST["num_empleado"] && $resp["password"] == $_POST["password"])
            {
                session_start();
                $_SESSION["maestro"] = $resp["num_empleado"];
                $_SESSION["superUser"] = $resp["superUser"];

                header("location:index.php?action=tutoria");
            }

        }	

    }
}
?>