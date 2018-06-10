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

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <?php
            //verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
            if(!empty($_SESSION["mensaje"]))
            {
                //si session en mensaje es agregar
                if($_SESSION["mensaje"]=="agregar")
                {
                    //se muestra el alert de agregar
                    echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-check'></i> Registro Exitoso
                        </h4>
                        Se ha agregado un nuevo producto a la tienda.
                    </div>
                    ";
                }
                //si session en mensaje es eliminar
                elseif ($_SESSION["mensaje"]=="eliminar")
                {
                    //se muestra el alert de eliminar
                    echo"
                    <div class='alert alert-warning alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-warning'></i> Advertencia
                        </h4>
                        Se ha eliminado un producto de la tienda.
                    </div>
                    ";

                }

                //se elimina el contenido de session en mensaje
                $_SESSION["mensaje"]="";
            }
            ?>

            <!-- caja para mostrar la el listado de productos de la tienda-->
            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Productos En la Tienda</h3>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-info-producto">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;Añadir Producto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <!--tabla para mostrar la informacion de los productos de la tienda-->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //creamos un objeto de mvcProducto
                            $listado = new mvcProducto();

                            //se manda a llamar el control para enlistar los procuctos de la tienda
                            $listado -> listadoProductoTiendaController();
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <?php
    //incluimos el archivo con el modal para agregar productos
    include_once "views/producto/agregar.php";
    #include_once "views/inventario/editar.php";
    ?>
</section>
<!-- /.content -->