<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

class mvcVenta
{
    function infoProductosController()
    {
        //obtenemos el id de la tienda a enlistar los productos
        $data = $_GET["shop"];

        //llamamos al modelo para obtener su informacion
        $info = CRUDVenta::infoProductoModel($data,"Producto","Tienda_Producto");


        echo "  <script>
                    var price = [];
                </script>

                <div class='form-group'>
                    <label>Producto</label>
                    <select name='producto' id='producto' class='form-control select2' style='width: 100%;'>";

        //mostramos el nombre de cada una de las categorias
        foreach($info as $rows => $row)
        {
            //se muestra cada uno de los producto en un option del select
            echo "<option value=".$row["id_producto"].">".$row["nombre_producto"]."</option>";
            echo "<script> price.push(".$row['precio']."); </script>";
        }

        echo"
                    </select>
                </div>

                <div class='form-group'>
                    <label>Cantidad</label>
                    <input type='number' class='form-control' name='cantidad' id='cantidad' placeholder='Cantidad'>
                </div>

                <button type='button' id='save' onclick='newProduct()' class='btn btn-primary'>Agregar</button>
                ";
    }


    function agregarVentaController()
    {
        //se verifica si mediante el formulario de registro se envio informacion
        if(isset($_POST["C1"]))
        {

            //se manda la informacion al modelo con su respectiva tabla en la que se registrara
            $resp = CRUDVenta::agregarVentaModel($_POST,"Venta","Venta_Producto",$_GET["shop"]);

            //en caso de que se haya registrado correctamente
            if($resp == "success")
            {
                //asignamos el tipo de mensaje a mostrar
                $_SESSION["mensaje"] = "agregarV";

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