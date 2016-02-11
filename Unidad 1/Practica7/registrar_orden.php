<?php

if(isset($_POST["enviar"]))
{
    require_once("conexion.php");
    $numProducts = $_POST["cantidadProductos"];

    $conn -> query("INSERT INTO venta(fecha) VALUES (NOW())");
    //---------------------------------------------

    $res = $conn -> query("SELECT MAX(id) as lastID FROM venta");
    $res =  $res -> fetch();
    $idOrden = $res["lastID"];

    //--------------------------------------------

    $sql = "INSERT INTO detalle_venta(id_venta,id_producto,cantidad) VALUES (?,?,?)";
    $stmt = $conn -> prepare($sql);

    for($i = 1; $i <= $numProducts; $i++)
    {
        $stmt -> bindparam(1,$orden);
        $stmt -> bindparam(2,$producto);
        $stmt -> bindparam(3,$cantidad);

        $orden = $idOrden;
        $cantidad = $_POST["C".$i];
        $producto = $_POST["P".$i];
        $stmt -> execute();
    }

    echo "<script>
               window.location.replace('menu_principal.php');
        </script>";
}
?>
