<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcProducto
{
    //Control para manejar el registro de un nuevo producto en la tienda
    function agregarProductoController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["producto"]))
        {

            //se guardan la informacion del producto
            $data = array("tienda" => $_GET["shop"],
                          "producto" => $_POST["producto"],
                          "stock" => $_POST["stock"],
                          "referencia" => $_POST["referencia"],
                          "usuario" => $_SESSION["id"],
                          "nombre" => $_SESSION["nombre"]);




            //se manda la infomacion nesesaria a los modelos para ingresar el producto en la tienda
            $resp1 = CRUDProducto::agregarProductoModel($data,"Tienda_Producto");
            $resp2 = CRUDProducto::agregarHistorialModel($data,"Historial");

            //en caso de que se haya registrado correctamente
            if($resp1 == "success" && $resp2 == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregarP";

                //nos redireccionara a la tienda
                echo "<script>
                        window.location.replace('index.php?section=dashboard&shop=".$_GET["shop"]."');
                      </script>";
            }
            else
            {
                //sino mandara un mensaje de error
                echo "error";
            }
        }
    }

    //Control para mostrar los productos en un select
    public function optionProductoController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar su informacion
        $data = CRUDProducto::listadoProductoModel("Producto","Tienda_Producto");

        //mostramos el nombre de cada una de los productos
        foreach($data as $rows => $row)
        {
            //se muestra cada una de las categorias en un option del select
            echo "<option value=".$row["id_producto"].">".$row["nombre_producto"]."</option>";
        }
    }

    //Control para mostrar un listado de los producto registrados en la tienda
    function listadoProductoTiendaController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de los productos en la tienda
        $data = CRUDProducto::listadoProductoTiendaModel("Producto","Tienda_Producto",$_GET["shop"]);

        //se imprime la informacion de cada uno de los producto registrados en la tienda
        foreach($data as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de los productos
            echo "<tr>
                <td>".$row["nombre_producto"]."</td>
                <td>".$row["stock"]."</td>
                <td>
                    <center>
                       <button class='btn btn-app' data-toggle='modal' data-target='#eliminar-producto' onclick='idDelP(".$row["id_producto"].")'>
                            <i class='fa fa-trash'></i> Eliminar
                       </button>
                       <a class='btn btn-app'>
                            <i class='fa fa-edit'></i> Modificar Stock
                       </a>
                    </center>
                </td>
            </tr>";
        }
    }


    /*/Control para mostrar el historial de un producto
    function listadoHistorialInventarioController()
    {
        //obtenemos el id del producto
        $id = $_GET["product"];

        //se le manda al modelo el nombre de la tabla y el id del producto para extraer su historial
        $data = CRUDInventario::listadoHistorialInventarioModel("Historial",$id);

        //se imprime del historial del producto
        foreach($data as $rows => $row)
        {
            echo "<tr>
                    <td>".$row["fecha"]."</td>
                    <td>".$row["hora"]."</td>
                    <td>".$row["nota"]."</td>
                    <td>".$row["referencia"]."</td>
                    <td>".$row["cantidad"]."</td>
                 </tr>";
        }
    }

    //Control para mostrar la informacion de un producto
    function infoInventarioController()
    {
        //obtenemos el id del producto
        $id = $_GET["product"];

        //se le manda al modelo el nombre de la tabla y el id del producto para extraer su informacion
        $data = CRUDInventario::infoInventarioModel("Producto",$id);

        //imprimimos la informacion del producto con los botones de modificar stock, editar y eliminar informacion
        echo"
        <div class='row'>
        <div class='col-xs-6'>

            <div class='box box-success'>
                <div class='box-header'>
                    <div class='row'>
                        <div class='col-xs-6'>
                            <h3 class='box-title'>Imagen del Producto</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class='box-body'>
                    <center>
                        <img class='image' src=".$data["img"].">
                    </center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class='col-xs-6'>

            <div class='box box-success'>
                <div class='box-header'>
                    <div class='row'>
                        <div class='col-xs-6'>
                            <h3 class='box-title'>Informacion del Producto</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class='box-body'>
                    <p class='info_product'>
                        <b>Nombre:</b> ".$data["nombre_producto"]."
                        <br>
                        <br>
                        <b>Codigo:</b> ".$data["codigo_producto"]." 
                        <br>
                        <br>
                        <b>Stock Disponible:</b> ".$data["stock"]."
                        <br>
                        <br>
                        <b>Precio Venta:</b> $".$data["precio"]."
                        <br>
                        <br>
                    </p>
                    <center>
                        <a class='btn btn-app' data-toggle='modal' data-target='#modal-info'>
                            <i class='fa fa-edit'></i> Editar
                        </a>
                        <a class='btn btn-app' data-toggle='modal' data-target='#modal-info-eliminar' onclick='idDel(".$data["id_producto"].")'>
                            <i class='fa fa-trash-o'></i> Eliminar
                        </a>
                        <a class='btn btn-app' data-toggle='modal' data-target='#modal-info-stock' onclick='typeOfUpdate(1)'>
                            <i class='fa fa-plus-square-o'></i> Agregar Stock
                        </a>
                        <a class='btn btn-app' data-toggle='modal' data-target='#modal-info-stock' onclick='typeOfUpdate(-1)'>
                            <i class='fa fa-minus-square-o'></i> Eliminar Stock
                        </a>
                    <center>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>
        ";
    }*/

    //Control para borrar un producto de la tienda
    public function eliminarProductoController()
    {
        //se verifica si se envio el id del producto a eliminar
        if(isset($_POST["delP"]))
        {
            //de ser asi se guarda el id del producto
            $data = array("producto" => $_POST["delP"],
                          "tienda" => $_GET["shop"]);

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDProducto::eliminarProductoModel($data,"Historial","Tienda_Producto");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "eliminarP";

                //nos redireccionara al listado de productos
                echo "<script>
                        window.location.replace('index.php?section=dashboard&shop=".$_GET["shop"]."');
                      </script>";
            }
        }
    }

    /*/Control para poder mostrar la informacion de un producto a editar
    public function editarInventarioController()
    {
        //se manda el id del producto y el nombre de la tabla donde esta almacenada
        $resp = CRUDInventario::editarInventarioModel($data,"Producto");

        //se imprime la informacion del producto en inputs de un formulario
        echo "
                    <input type=hidden value=".$resp["id_producto"]." name='id'>

                    <div class='form-group'>
                        <label>Nombre</label>
                        <input type='text' value='".$resp["nombre_producto"]."' class='form-control' name='nombre' placeholder='Ingrese Nombre' required>
                    </div>

                    <div class='form-group'>
                        <label>Categoria</label>
                        <select name='categoria' id='categoria' class='form-control select2' style='width: 100%;' required>
                            <option value=''>Seleccione Una Categoria</option>";

        //creamos un objeto de mvcCategoria
        $option = new mvcCategoria();

        //mandamos a llamar el controller para traer todad las categorias en options de un select
        $option -> optionCategoriaController();

        echo "   </select>
                    </div>

                    <div class='form-group'>
                        <label>Precio</label>
                        <input type='number' value='".$resp["precio"]."' class='form-control' name='precio' placeholder='Ingrese Usuario' required>
                    </div>

             ";

        //script para seleccionar en el select el option de la categoria al que pertenece el producto
        echo "<script>
                var categoria = document.getElementById('categoria');

                for(var i = 1; i < categoria.options.length; i++)
                {
                    if(categoria.options[i].value ==".$resp["id_categoria"].")
                    {
                        categoria.selectedIndex = i;
                    }
                }
                </script>";
    }

    //Control para modificar la informacion de un producto
    public function modificarInventarioController()
    {
        //se verifica si mediante el formulario se envio informacion
        if(isset($_POST["nombre"]))
        {
            //se guardan la informacion de producto
            $data = array("id" => $_POST["id"],
                          "nombre" => $_POST["nombre"],
                          "categoria" => $_POST["categoria"],
                          "precio" => $_POST["precio"]);

            //se manda la informacion del producto y la tabla en la que esta almacenada
            $resp = CRUDInventario::modificarInventarioModel($data,"Producto");

            //en caso de que se haya editado correctamente 
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "editar";

                //nos redireccionara a la descripcion del producto
                echo "<script>
                        window.location.replace('index.php?section=producto&product=".$data["id"]."');
                      </script>";
            }
        }
    }

    //control para modificar el inventario de los productos
    public function stockInventarioController()
    {
        //se verifica si mediante el formulario se envio la informacion
        if(isset($_POST["cantidad"]))
        {
            //se guarda la informacion de la modificacion del inventario
            $data = array("stock" => $_POST["type"] * $_POST["cantidad"],
                          "codigo" => $_POST["referencia"]);

            //se le manda la informacion a los modelos para modificar la informacion del stock del producto
            $resp1 = CRUDInventario::updateStockInventarioModel("Producto",$data,$_GET["product"]);

            $resp2 = CRUDInventario::historialInventarioModel("Historial",$data,$_SESSION["id"],$_SESSION["nombre"],$_GET["product"]);

            //en caso de haberse actualizado correctamente
            if($resp1 == "success" && $resp2 == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "stock";

                //nos redireccionara a la descripcion del producto
                echo "<script>
                        window.location.replace('index.php?section=producto&product=".$_GET["product"]."');
                      </script>";
            }
        }
    }*/
}
?>


