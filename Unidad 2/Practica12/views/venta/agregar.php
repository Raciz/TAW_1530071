<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redireccionara al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}


//verificamos si se debe llamar al controller para agregar un nuevo producto al inventario
if(isset($_GET["action"]) && $_GET["action"]=="agregar" && isset($_POST["C1"]))
{
    //se crea un objeto de mvcVenta
    $agregar = new mvcVenta();

    //se manda a llamar el controller para agregar un nuevo producto al inventario 
    $agregar -> agregarVentaController();
}

//creamos un objeto de mvcVenta
$productos = new mvcVenta();


?>

<!-- Main content -->
<section class="content">
    <!--Seccion para mostrar los producto a comprar-->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Productos Disponibles</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <?php
                    //traemos la informacion de los productos de la tienda
                    $productos -> infoProductosController();
                    ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


    <!--Seccion para mostrar los producto a comprar-->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <h3 class="box-title">Productos a Comprar</h3>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <!--Tabla para mostrar los productos de la venta-->
                    <form id="compra" name="compra" action="index.php?section=venta&action=agregar&shop=<? echo $_GET["shop"]; ?>" method="post">
                        <table id="example1 lista" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class='form-group'>
                            <label>Total</label>
                            <input type='number' class='form-control' name='total' id='total' value=0 readonly>
                        </div>
                        <input type="hidden" name="cantidadProductos" id="cantidadProductos">
                        <a href="index.php?section=dashboard&shop=<? echo $_GET["shop"] ?>">
                            <button type='button' class='btn btn-warning'>Cancelar</button>
                        </a>
                        <button type='submit' class='btn btn-primary'>Aceptar</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<script type="text/javascript">
    var select = document.getElementById("producto");
    var table = document.getElementById("example1 lista");
    var form = document.getElementById("compra");
    var numProducts = 0;

    function precio()
    {
        var precioU = document.getElementById("precioUnitario");
        precioU.value = price[select.selectedIndex];
    }

    function newProduct()
    {
        var producto = document.getElementById("producto").value;
        var cantidad = document.getElementById("cantidad").value;

        if(producto != "" && cantidad > 0)
        {
            numProducts++;

            var codigoPoduct = document.createElement("input");
            var nameProduct = document.createElement("input");
            var priceProduct = document.createElement("input");
            var cantidadProduct = document.createElement("input");
            var total = document.createElement("input");

            codigoPoduct.setAttribute("value",select.options[select.selectedIndex].value);
            nameProduct.setAttribute("value",select.options[select.selectedIndex].text);
            priceProduct.setAttribute("value",price[select.selectedIndex]);
            cantidadProduct.setAttribute("value",cantidad);
            total.setAttribute("value",cantidad * price[select.selectedIndex]);

            codigoPoduct.setAttribute("name","C".concat(numProducts));
            nameProduct.setAttribute("name","N".concat(numProducts));
            priceProduct.setAttribute("name","P".concat(numProducts));
            cantidadProduct.setAttribute("name","CA".concat(numProducts));
            total.setAttribute("name","T".concat(numProducts));

            codigoPoduct.readOnly = true;
            nameProduct.readOnly = true;
            priceProduct.readOnly = true;
            cantidadProduct.readOnly = true;
            total.readOnly = true;
            //-------------------------------------------------

            var table = document.getElementById("example1 lista");
            var row = document.createElement("tr");

            var col1 = document.createElement("td");
            col1.appendChild(codigoPoduct);
            var col2 = document.createElement("td");
            col2.appendChild(nameProduct);
            var col3 = document.createElement("td");
            col3.appendChild(priceProduct);
            var col4 = document.createElement("td");
            col4.appendChild(cantidadProduct);
            var col5 = document.createElement("td");
            col5.appendChild(total);

            row.appendChild(col1);
            row.appendChild(col2);
            row.appendChild(col3);
            row.appendChild(col4);
            row.appendChild(col5);
            table.appendChild(row);

            //-------------------------------------------

            var Total = parseFloat(document.getElementById("total").value);

            Total += cantidad * price[select.selectedIndex];

            document.getElementById("total").value = Total;
        }
        else
        {
            if(cantidad <= 0)
            {
                alert("La Cantidad No Puede Ser Cero o Negativa");
            }
            else
            {
                alert("Seleccione Un Producto");
            }
        }
    }

    function prepararOrden(e)
    {
        document.getElementById("cantidadProductos").value = numProducts;
    }

    form.addEventListener("submit",prepararOrden);
    select.addEventListener("change",precio);
</script>