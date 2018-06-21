<?php
//clase para realizar el redireccionamiento del sitio
class url
{
    //modelo para realizar e l redireccionamiento del sitio
    public static function urlModel($action)
    {
        //en caso de que se mande un link valido se redirecciona a su pagina correspondiene
        if($action == "admin")
        {
            $url = "views/modules/login.php";
        }
        elseif($action == "listado" || $action == "grupo" || $action == "pago" || $action == "dashboard" || $action == "alumna" || $action == "logout")
        {
            $url = "views/modules/".$action.".php";
        }
        else
        {
            $url = "views/modules/registro.php";
        }
        
        //y se retorna la pagina a redireccionar
        return $url;
    }
}
?>