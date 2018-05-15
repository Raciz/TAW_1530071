<?php
require_once('funciones.php'); //este archivo requiere del archivo funciones
$total_usuarios = contarRegistros("user"); //guarda el valor retornado en la variable total_usuarios
$total_tipos = contarRegistros("user_type"); //guarda el valor retornado en la variable total_tipos
$total_status = contarRegistros("status"); //guarda el valor retornado en la variable total_status
$total_accesos = contarRegistros("user_log"); //guarda el valor retornado en la variable total_accesos
$total_usuarios_a = contarAct_Inact(1); //guarda el valor retornado en la variable total_usuarios_a
$total_usuarios_i = contarAct_Inact(2); //guarda el valor retornado en la variable total_usuarios_i
$usuarios = mostrarUser(); //guarda el valor retornado en la variable usuarios
$tipos = mostrarType(); //guarda el valor retornado en la variable tipos
$status = mostrarStatus(); //guarda el valor retornado en la variable status
$accesos = mostrarAccesos(); //guarda el valor retornado en la variable accesos
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
                        <td><?php echo $total_usuarios[0] ?></td>
                        <td><?php echo $total_tipos[0] ?></td>
                        <td><?php echo $total_status[0] ?></td>
                        <td><?php echo $total_accesos[0] ?></td>
                        <td><?php echo $total_usuarios_a[0] ?></td>
                        <td><?php echo $total_usuarios_i[0] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row column">
            <div class="callout success">
                <h3>Tabla: USER</h3>
            </div>
            <table width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Status_id</th>
                        <th>user_type_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach( $usuarios as $users )
                    { 
                        $nom_status = nombreStatus($users[3]); //guarda el valor retornado en la variable nom_status
                        $nom_type = nombreType($users[4]); //guarda el valor retornado en la variable nom_type
                    ?>
                    <tr>
                        <td><?php echo $users[0] ?></td>
                        <td><?php echo $users[1] ?></td>
                        <td><?php echo $users[2] ?></td>
                        <td><?php echo $nom_status[0] ?></td>
                        <td><?php echo $nom_type[0] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row column">
            <div class="callout success">
                <h3>Tabla: USER_TYPE</h3>
            </div>
            <table width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $tipos as $types ){ ?>
                    <tr>
                        <td><?php echo $types[0] ?></td>
                        <td><?php echo $types[1] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row column">
            <div class="callout success">
                <h3>Tabla: STATUS</h3>
            </div>
            <table width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $status as $st ){ ?>
                    <tr>
                        <td><?php echo $st[0] ?></td>
                        <td><?php echo $st[1] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row column">
            <div class="callout success">
                <h3>Tabla: USER_LOG</h3>
            </div>
            <table width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data_logged_in</th>
                        <th>User_id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $accesos as $log ){ 
    $nom_user = nombreUsuario($log[2]); //guarda el valor retornado en la variable nom_user
                    ?>
                    <tr>
                        <td><?php echo $log[0] ?></td>
                        <td><?php echo $log[1] ?></td>
                        <td><?php echo $nom_user[0] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <hr>


        </div>
    <div class="large-3 large-offset-2 columns">
    </div>
    </div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>