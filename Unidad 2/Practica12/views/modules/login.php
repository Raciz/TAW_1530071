<?php
$login = new mvcController();
$login -> loginController();
?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <h1>Inventario TAW</h1>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
                Iniciar Sesion
            </p>

            <form method="post" autocomplete="off">
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Ingrese Usuario O Correo" name="user">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Ingrese Contraseña" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
                        </div>
                        <!-- /.col -->
                    </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

