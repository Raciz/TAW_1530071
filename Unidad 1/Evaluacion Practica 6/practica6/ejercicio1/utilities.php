<?php 
  //Contiene todas las funciones para obtener los totales de las tablas y obtener toda la informacion de los usuarios
  include 'connection.php';

  //Funcion para obtener informacion de los usuarios
  function getUsers(){
    global $pdo;
    $sql = 'SELECT * FROM user';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement;
  }

  //Funcion para obtener el total de los usuarios
  function totalUsuarios(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_users FROM user';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_users = $results[0]['total_users'];
    return $total_users;
  }

  //Funcion para obtener el total de tipos
  function totalTipos(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_tipos FROM user_type';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_tipos = $results[0]['total_tipos'];
    return $total_tipos;
  }

  //Funcion para obtener el total de status
  function totalStatus(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_status FROM status';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_status = $results[0]['total_status'];
    return $total_status;
  }

  //Funcion para obtener el total de accesos
  function totalAccesos(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_accesos FROM user_log';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_accesos = $results[0]['total_accesos'];
    return $total_accesos;
  }

  //Funcion para obtener el total de usuarios activos
  function totalActivos(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_activos FROM user WHERE status_id = 1';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_activos = $results[0]['total_activos'];
    return $total_activos;
  }

  //Funcion para obtener el total de usuarios inactivos
  function totalInactivos(){
    global $pdo;
    $sql = 'SELECT COUNT(*) as total_inactivos FROM user WHERE status_id = 2';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll();
    $total_inactivos = $results[0]['total_inactivos'];
    return $total_inactivos;
  }

 ?>