<?php
//importamos el archivo con la funcion agregar_usuario
require_once("funciones.php");
require_once ("isLogin.php");

//verificamos que se haya enviado informacion
if(isset($_POST["enviar"]))
{
    //enviamos los datos a la funcion agregar_usuario
    agregar_venta($_POST["producto"],$_POST["cantidad"]);
    //redireccionamos al menu_principal
    header("location:menu_principal.php");
}
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Tienda TAW</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php require_once('header.php'); ?>

        <div class="row">

            <div class="large-9 columns">
                <h3>Registro de Venta</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--Formulario para agregar una nueva venta-->

                        Producto *: 
                        <select name="producto" id="producto">
                            <?php
                            //traemos la informacion de los productos
                            $data = info_productos();
                            while($row = $data->fetch())
                            {
                            ?>
                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <br>
                        Cantidad *: <input type="number" id="cantidad" name="cantidad" value="" required>
                        <br>
                        <button id="save" onclick="newProduct()">Agregar</button>

                        <h3>Lista de Compra</h3>

                        <form method="post" action="registrar_orden.php" onsubmit="prepararVenta()">
                            <table id="lista">
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </table>
                            <input type="hidden" name="cantidadProductos" id="cantidadProductos">
                            <input type="submit" value="Enviar" name="enviar" class="button">
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <script>
            var numProducts = 0;

            function newProduct()
            {
                var producto = document.getElementById("producto").value;
                var cantidad = document.getElementById("cantidad").value;

                if(cantidad > 0)
                {
                    numProducts++;

                    var namePoduct = document.createElement("input");
                    var cantidadProduct = document.createElement("input");

                    namePoduct.setAttribute("value",producto);
                    cantidadProduct.setAttribute("value",cantidad);

                    namePoduct.setAttribute("name","P".concat(numProducts));
                    cantidadProduct.setAttribute("name","C".concat(numProducts));

                    namePoduct.readOnly = true;
                    cantidadProduct.readOnly = true;
                    //-------------------------------------------------

                    var table = document.getElementById("lista");
                    var row = document.createElement("tr");

                    var col1 = document.createElement("td");
                    col1.appendChild(namePoduct);
                    var col2 = document.createElement("td");
                    col2.appendChild(cantidadProduct);

                    row.appendChild(col1);
                    row.appendChild(col2);
                    table.appendChild(row);
                }
                else
                {
                    if(cantidad <= 0)
                    {
                        alert("La Cantidad No Puede Ser Cero o Negativa");
                    }
                }
            }
            
            function prepararVenta()
            {
                document.getElementById("cantidadProductos").value = numProducts;
            }
        </script>

        <?php require_once('footer.php'); ?>