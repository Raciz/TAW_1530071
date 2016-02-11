<?php
class mvcController
{
    public function template()
    {
        include "views/template.php";
    }
    
    public function insertController()
    {
        if(isset($_POST["enviar"]))
        {
            $data = array("name" => $_POST["name"],"tel" => $_POST["tel"]);
            
            $resp = CRUD::insertModel($data,"empleado");
            
            if($resp == "success")
            {
                header("location:index.php?action=lista");
            }
            else
            {
                header("location:index.php?action=form");
            }
        }
    }
    
    public function deleteController()
    {
        if(isset($_GET["id"]))
        {
           $data = $_GET["id"];
           $resp = CRUD::deleteModel($data,"empleado");
           if($resp == "success")
           {
               header("location:index.php?action=lista");
           }
        }
    }
}
?>
