<?php

if(isset($_GET["status"]))
{
    //se crea un objeto de mvcVenta
    $agregar = new mvcVenta();

    if($_GET["status"] == 1)
    {
        //se manda a llamar el controller para agregar un nuevo producto a la venta
        $agregar -> agregarProductoController();
    }
    elseif($_GET["status"] == 2)
    {
        //se manda a llamar el controller para borrar un producto a la venta 
        $agregar -> quitarProductoController();
    }
    elseif($_GET["status"] == 3)
    {
        //se manda a llamar el controller para borrar todos los productos venta 
        $agregar -> cancelarVentaController();
    }
    elseif($_GET["status"] == 4)
    {
        //se manda a llamar el controller para borrar todos los productos venta 
        $agregar -> agregarVentaController();
    }

}
echo "<script>
    window.location.replace('index.php?section=venta&action=agregar&shop=".$_GET["shop"]."');
</script>";
?>