<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
?>
<section class="content-header">
    <h1>
        Inventario
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Inventario</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <?php
            //verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
            if(!empty($_SESSION["mensaje"]))
            {
                //si session en mensaje es agregar
                if($_SESSION["mensaje"]=="editar")
                {
                    //se muestra el alert de agregar
                    echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-check'></i> Editado Exitoso
                        </h4>
                         La Información del producto ha sido actualizada.
                    </div>
                    ";
                }

                //se elimina el contenido de session en mensaje
                $_SESSION["mensaje"]="";
            }

            //verificamos si se va a mostrar un mensaje de aviso al suceder un error
            if(!empty($_SESSION["error"]))
            {
                //si session en error es type
                if($_SESSION["error"]=="type")
                {
                    //se muestra el alert de type
                    echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-ban'></i> Error: Formato de imagen invalido
                        </h4>
                        Solo se permite subir imagenes en formato JPG o PNG.
                    </div>
                    ";
                }
                //si session en error es size
                elseif ($_SESSION["error"]=="size")
                {
                    //se muestra el alert de size
                    echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-ban'></i> Error: Tamaño superior al permitido
                        </h4>
                        No se permite subir imagenes de tamaño superior a 300 KB.
                    </div>
                    ";

                }
                //si session en error es copy
                elseif ($_SESSION["error"]=="copy")
                {
                    //se muestra el alert de copy
                    echo"
                    <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-ban'></i> Error
                        </h4>
                        No se puede subir la imagen al sistema.
                    </div>
                    ";

                }

                //se elimina el contenido de session en mensaje
                $_SESSION["error"]="";
            }
            ?>
            <!-- /.col -->
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-6">

            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Imagen del Producto</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-6">

            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Informacion del Producto</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <?php
    #include_once "views/inventario/agregar.php";
    ?>
</section>
<!-- /.content -->