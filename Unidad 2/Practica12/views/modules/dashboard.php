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

<!--section para mostrar al Usuario el lugar donde se encuentra-->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!--Widgets para mostrar la informacion del sistema-->

    <div class="row">
        <!--widget para mostrar la informacion de las categorias-->    
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!--widget para mostrar la informacion de los productos-->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Productos</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!--widget para mostrar la informacion de los usuarios-->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-user-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-12">

            <?php
            //verificamos si se va a mostrar un mensaje de aviso al realizar alguna operacion de crud
            if(!empty($_SESSION["mensaje"]))
            {
                //si session en mensaje es agregar
                if($_SESSION["mensaje"]=="agregarP")
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
                elseif ($_SESSION["mensaje"]=="eliminarP")
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
                        Se ha registrado un nuevo usuario en la tienda.
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
                        Se ha eliminado un usuario de la tienda.
                    </div>
                    ";

                }
                //si session en mensaje es editar
                elseif ($_SESSION["mensaje"]=="editar")
                {
                    //se muestra el alert de editar
                    echo"
                    <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                        <h4>
                            <i class='icon fa fa-check'></i> Editado Exitoso
                        </h4>
                        La Información del usuario ha sido actualizada.
                    </div>
                    ";

                }

                //se elimina el contenido de session en mensaje
                $_SESSION["mensaje"]="";
            }
            ?>
        </div>
    </div>
    
    <div class="row">

        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
                    <li><a href="#producto" data-toggle="tab">Inventario</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Ventas</a></li>                    
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <?php
                        include_once "views/usuario/listado.php";
                        ?>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="producto">
                        <?php
                        include_once "views/producto/listado.php";
                        ?>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                        like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
    </div>
</section>
<!-- /.content -->