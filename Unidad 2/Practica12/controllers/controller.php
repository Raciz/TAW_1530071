<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcController
{
    //Control para invocar la platilla con el diseño del sitio
    public function template()
    {
        //incluimos el archivo con la plantilla
        include "views/template.php";
    }

    //Control para manejar el redireccionamiento de las distintas secciones del sitio
    public function urlController()
    {
        //verifica si de debe dirigir a una pagina en especifico con GET
        if(isset($_GET["action"]))
        {
            $action = $_GET["action"];
        }
        else
        {
            //en caso de no ser asi se le direccionara al index
            $action = "index";
        }

        //se llama al modelo utilizado para el direccionaiento 
        $url = url::urlModel($action);

        //y se incluye la pagina a la qu se va a derireccionar
        include $url;
    }
}
?>