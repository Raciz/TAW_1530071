<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcVenta
{
    function agregarProductoController()
    {
        if(isset($_POST["codigo"]))
        {
            $data = array("codigo" => $_POST["codigo"], 
                          "tienda" => $_GET["shop"]);

            $product = CRUDVenta::agregarProductoController($data,"Producto","Tienda_Producto");

            if($product)
            {
                if($product -> stock >= 1)
                {
                    $pos = -1;

                    for($i = 0; $i < count($_SESSION["compra"]); $i++)
                    {
                        if($_SESSION["compra"][$i] -> codigo_producto == $data["codigo"])
                        {
                            $pos = $i;
                            break;
                        }
                    }

                    if($pos == -1)
                    {
                        $product->cantidad = 1;
                        $product->total = $product->precio;
                        array_push($_SESSION["compra"], $product);
                    }
                    else
                    {
                        $_SESSION["compra"][$pos] -> cantidad++;
                        $_SESSION["compra"][$pos] -> total = $_SESSION["compra"][$pos] -> cantidad * $_SESSION["compra"][$pos] -> precio;
                    }
                }
                else
                {
                    $_SESSION["mensaje"] = "agotado";
                }
            }
            else
            {
                $_SESSION["mensaje"] = "existe";
            }
        }         
    }

    function quitarProductoController()
    {
        if(isset($_GET["del"]))
        {
            $data = $_GET["del"];

            array_splice($_SESSION["compra"], $data, 1);
        } 

        $_SESSION["mensaje"] = "borrar";
    }

    function cancelarVentaController()
    {

        $_SESSION["compra"] = [];

        $_SESSION["mensaje"] = "cancelar";
    }

    function agregarVentaController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["total"]))
        {

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDVenta::agregarVentaModel($_SESSION["compra"],$_POST["total"],"Venta","Venta_Producto","Tienda_Producto","Historial",$_GET["shop"],$_SESSION["id"],$_SESSION["nombre"]);

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregarV";
                
                $_SESSION["compra"] = [];
                
                //nos redireccionara al listado de categorias
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

    //Control para mostrar un listado de las ventas registrados en el sistema
    function listadoVentaController()
    {
        //se le manda al modelo el nombre de la tabla a mostrar la informacion de las ventas 
        $data1 = CRUDVenta::listadoVentaModel("Venta",$_GET["shop"]);

        //se imprime la informacion de cada uno de las ventas registrados
        foreach($data1 as $rows => $row)
        {
            //e imprimimos la informacion de cada uno de las ventas
            echo "<tr>
                <td>".$row["id_venta"]."</td>
                <td>

            <table id='example4' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>";

            $data2 = CRUDVenta::listadoProductoVentaModel("Venta_Producto","Producto",$row["id_venta"]);
            foreach($data2 as $rows2 => $row2)
            {
                echo "<tr>
                                    <td>".$row2["nombre_producto"]."</td>
                                    <td>".$row2["cantidad"]."</td>
                                    <td>".$row2["total"]."</td>
                                  </tr>";
            }

            echo"       </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>

            </td>
                <td>".$row["total"]."</td>
                <td>
                    <center>
                        <div class='btn-group'>
                            <button type='button' title='Eliminar Categoria' class='btn btn-default' data-toggle='modal' data-target='#eliminar-Venta' onclick='idDelV(".$row["id_venta"].")'>
                                <i class='fa fa-trash-o'></i>
                            </button>
                        </div>
                    </center>
                </td>
            </tr>";
        }
    }

    //Control para borrar una venta de la tienda
    public function eliminarVentaController()
    {
        //se verifica si se envio el id del producto a eliminar
        if(isset($_POST["del"]))
        {
            //de ser asi se guarda el id de la venta
            $data = $_POST["del"];

            //y se manda al modelo el id y el nombre de la tabla de donde se va a eliminar
            $resp = CRUDVenta::eliminarVentaModel($data,"Venta_Producto","Venta");

            //en caso de haberse eliminado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "eliminarV";
                //nos redireccionara al listado de productos
                echo "<script>
                        window.location.replace('index.php?section=dashboard&shop=".$_GET["shop"]."');
                      </script>";
            }
        }
    }
}