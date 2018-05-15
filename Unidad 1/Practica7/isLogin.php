<?php
    //iniciamos la session
    session_start();
    
    //verificamos si el usuario ya se logeo con su cuanta
    if(!isset($_SESSION["cuenta"]))
    {
        //sino lo regresamos al login
        header("location:index.php");
    }
    
    //verificamos si el usuario cerro la sesion
    if(isset($_GET['action']) && $_GET['action']=='logout')
    {
        //de ser asi destruimos la sesion y lo regresamos al login
        session_destroy();
        header("location:index.php");
    }
?>