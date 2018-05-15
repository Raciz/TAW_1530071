<?php
$servidor = "localhost"; //servidor
$bd = "practica6"; //nombre de la base de datos
$dsn = "mysql:host={$servidor};dbname={$bd}"; //dsn
$user = 'root'; //nombre de usuario
$password = ''; //password

try{

    $pdo = new PDO(	$dsn, 
                   $user, 
                   $password
                  );

}catch( PDOException $e ){
    echo 'Error al conectarnos: ' . $e->getMessage();
}
?>