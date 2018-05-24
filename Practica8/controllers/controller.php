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
/*

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
    
    public function optionCarreraController()
    {
        $data = CRUD::listaCarreraModel("Carrera");

        foreach($data as $rows => $row)
        {
            echo "<option value=".$row["id"].">".$row["nombre"]."</option>";
        }
    }*/
}
?>