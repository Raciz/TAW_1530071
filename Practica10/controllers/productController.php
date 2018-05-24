<?php

class product
{
    public function insertProductController()
    {
        if(isset($_POST["enviar"]))
        {
            $data = array("name" => $_POST["name"],
                          "desc" => $_POST["desc"],
                          "buy" => $_POST["buy"],
                          "sale" => $_POST["sale"],
                          "price" => $_POST["price"]);
            
            $respuesta = CRUD::insertProductModel($data,"producto");

			if($respuesta == "success")
            {

				header("location:index.php?action=product");
			}
        }
    }
}
?>