<?php
class url
{
    public function urlModel($link)
    {
        if($link == "maestro" || $link == "alumno" || $link == "carrera" || $link == "tutoria" || $link == "reporte" || $link == "logout" || $link == "agregarC" || $link == "editarC" || $link == "agregarM" || $link == "editarM" || $link == "agregarA" || $link == "editarA" || $link == "agregarT" || $link == "editarT")
        {
            $url = "views/modules/".$link.".php";
        }
        else if($link = "index")
        {
            $url = "views/modules/login.php";
        }
        
        return $url;
    }
}
?>