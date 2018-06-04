<?php

$type = $_FILES["img"]["type"];
$size = $_FILES["img"]["size"];
$name = $_FILES["img"]["name"];
$tmp = $_FILES["img"]["tmp_name"];
    
if($type == "image/jpeg" || $type == "image/png")
{
    if($size < 300000)
    {
        if(!move_uploaded_file($tmp, "views/media/img".$archivo_name))
        {
            $_SESSION["error"] = "copy";
        }
    }
    else
    {
        $_SESSION["error"] = "size";
    }
}
else
{
    $_SESSION["error"] = "type";
}

?>
