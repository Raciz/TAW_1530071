<?php
require_once "controllers/controller.php";
require_once "models/url.php";
require_once "models/crud.php";

$MVC = new mvcController();
$MVC -> template();
?>