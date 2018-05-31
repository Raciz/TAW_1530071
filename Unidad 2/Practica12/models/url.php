<?php
//clase para realizar el redireccionamiento del sitio
class url
{
    //modelo para realizar e l redireccionamiento del sitio
    public static function urlModel($action)
    {
        //en caso de que se mande un link valido se redircciona a su pagina correspondiene
        if($action=="producto" || $action=="categoria" || $action=="usuario")
        {
            $url = "views/modules/".$action.".php";
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