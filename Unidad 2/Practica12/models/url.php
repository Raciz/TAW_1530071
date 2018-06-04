<?php
//clase para realizar el redireccionamiento del sitio
class url
{
    //modelo para realizar e l redireccionamiento del sitio
    public static function urlModel($section,$action)
    {
        //en caso de que se mande un link valido se redircciona a su pagina correspondiene
        if(($section=="inventario" || $section=="categoria" || $section=="usuario") && ($action=="listado" || $action=="agregar" || $action=="eliminar" || $action=="editar"))
        {
            $url = "views/".$section."/".$action.".php";
        }
        elseif($section=="dashboard")
        {
            $url = "views/modules/dashboard.php";
        }
        elseif($section=="logout")
        {
            $url = "views/modules/logout.php";
        }
        else //sino se le manda al login
        {
            $url = "views/modules/login.php";
        }
        
        //y se retorna la pagina a redireccioar
        return $url;
    }
}
?>