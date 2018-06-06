<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}

//verificamos si se envio por get el id del producto a mostrar su informacion
if(!isset($_GET["product"]))
{
    //si no se envio lo enviamos al listado de producto de inventarios
    echo "<script>
            window.location.replace('index.php?section=inventario&action=listado');
          </script>";
}

?>

<!--section para mosrar al Usuario el lugar donde se encuentra-->
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
                //si session en mensaje es Stock
                elseif($_SESSION["mensaje"]=="stock")
                {
                    //se muestra el alert de stock
                    echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-check'></i> Registro Exitoso
                        </h4>
                         Se ha actualizado el stock del producto.
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

    <?php
    //creamos un objeto de mvcInventario
    $info = new mvcInventario();
    
    //se manda a llamar a el control para mostrar la informacion del producto
    $info -> infoInventarioController();
    ?>
    
    
    <!--Seccion para mostrar la informacion del historial del producto-->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Historial de Inventario</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <!--Tabla para mostrar el historial del producto-->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Descripcion</th>
                                <th>Referencia</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //se crea un objeto de mvcInventario
                            $listado = new mvcInventario();
                            
                            //se manda a llamar el control para traer el historial del estock del producto
                            $listado -> listadoHistorialInventarioController();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Descripcion</th>
                                <th>Referencia</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <?php
    //incluimos los archivos con los modales para actualizar el stock y editar y eliminar el producto
    include_once "views/inventario/editar.php";
    include_once "views/inventario/eliminar.php";
    include_once "views/inventario/actualizarStock.php";
    ?>
</section>
<!-- /.content -->