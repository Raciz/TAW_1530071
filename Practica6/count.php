<?php
require_once('connection.php');

//consulta para obtener el total de usuarios en la base de datos

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as users FROM user");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalUsers = $total["users"];

//consulta para obtener cuantos tipos de usuarios existen

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as types FROM user_type");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalTypes = $total["types"];

//consulta para obtener cuantos tipos de status existen

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as status FROM status");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalStatus = $total["status"];

//consulta para obtener cuantos logins se han registrados en la base de datos

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as logins FROM user_log");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalLogins = $total["logins"];

//consulta para obtener el total de usuarios activos

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as activos FROM user WHERE status_id = 1");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalActivos = $total["activos"];

//consulta para obtener el total de usuarios inactivos

//preparacion de la consulta
$stmt = $pdo->prepare("SELECT COUNT(*) as inactivos FROM user WHERE status_id = 2");
//ejecutamos la consulta que se preparo anteriormente
$stmt->execute();
//se obtiene el resultado obtenido con la consulta
$total = $stmt->fetch();
//guardamos en resultado en una variable que identifica el resultado obtenido
$totalInactivos = $total["inactivos"];
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>PHP & SQL</title>
        <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    </head>
    <body>

        <div class="top-bar">
            <div class="top-bar-left">
                <ul class="menu">
                    <li class="menu-text">Curso PHP & SQL</li>
                </ul>
            </div>
        </div>

        <div class="row column text-center">
            <h2>Contando datos</h2>
            <hr>
        </div>
        <div class="row column">
            <div class="callout success">
                <h3>Totales</h3>
            </div>
            <!--Tabla para imprimir los totales de diferentes aspectos de la base de datos-->
            <table width="100%">
                <thead>
                    <tr>
                        <th>Usuarios</th>
                        <th>Tipos</th>
                        <th>Status</th>
                        <th>Accesos</th>
                        <th>Usuarios Activos</th>
                        <th>Usuarios Inactivos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <center>
                            <!--Impresion de los totales de los de los diferentes aspectos de la base de datos-->
                            <td><?php echo $totalUsers; ?></td>
                            <td><?php echo $totalTypes; ?></td>
                            <td><?php echo $totalStatus; ?></td>
                            <td><?php echo $totalLogins; ?></td>
                            <td><?php echo $totalActivos; ?></td>
                            <td><?php echo $totalInactivos; ?></td>
                        </center>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>

        <!--Impresion de los datos de la tabla status-->
        <?php
        //preparamos la consulta para extraer la informacion de la tabla status
        $stmt = $pdo->prepare("SELECT * FROM status");
        //ahora ejecutamos la consulta
        $stmt->execute();
        ?>

        <div class="row column">
            <div class="callout success">
                <h3>Status</h3>
            </div>
            <!--Tabla para imprimir la informacion de la tabla status-->
            <table width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //recoremos todas las columnas de la tabla e imprimimos sus valores en cada columna 
                    while($row = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <!--Imprimimos la informacion de cada fila en la tabla-->
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["name"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>

        <!--Impresion de los datos de la tabla user-->
        <?php
        //preparamos la consulta para extraer la informacion de la tabla user
        $stmt = $pdo->prepare("SELECT * FROM user");
        //ahora ejecutamos la consulta
        $stmt->execute();
        ?>

        <div class="row column">
            <div class="callout success">
                <h3>User</h3>
            </div>
            <!--Tabla para imprimir la informacion de la tabla user-->
            <table width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Tipo de Usuario</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //recoremos todas las columnas de la tabla e imprimimos sus valores en cada columna 
                    while($row = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <!--Imprimimos la informacion de cada fila en la tabla-->
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["email"];?></td>
                        <td><?php echo $row["password"];?></td>
                        <td><?php echo $row["status_id"];?></td>
                        <td><?php echo $row["user_type_id"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>

        <!--Impresion de los datos de la tabla user_log-->
        <?php
        //preparamos la consulta para extraer la informacion de la tabla user_log
        $stmt = $pdo->prepare("SELECT * FROM user_log");
        //ahora ejecutamos la consulta
        $stmt->execute();
        ?>

        <div class="row column">
            <div class="callout success">
                <h3>User Log</h3>
            </div>
            <!--Tabla para imprimir la informacion de la tabla user_log-->
            <table width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha de Login</th>
                        <th>Ususario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //recoremos todas las columnas de la tabla e imprimimos sus valores en cada columna 
                    while($row = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <!--Imprimimos la informacion de cada fila en la tabla-->
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["date_logged_in"];?></td>
                        <td><?php echo $row["user_id"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>

        <!--Impresion de los datos de la tabla user_log-->
        <?php
        //preparamos la consulta para extraer la informacion de la tabla user type
        $stmt = $pdo->prepare("SELECT * FROM user_type");
        $stmt->execute();
        ?>

        <div class="row column">
            <div class="callout success">
                <h3>User Type</h3>
            </div>
            <!--Tabla para imprimir la informacion de la tabla user_type-->
            <table width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //recoremos todas las columnas de la tabla e imprimimos sus valores en cada columna 
                    while($row = $stmt->fetch())
                    {
                    ?>
                    <tr>
                        <!--Imprimimos la informacion de cada fila en la tabla-->
                        <td><?php echo $row["id"];?></td>
                        <td><?php echo $row["name"];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>

        <div>
            <div class="large-3 large-offset-2 columns"></div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
