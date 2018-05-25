<?php

class MvcController{

    public function pagina()
    {		
        include "views/template.php";
    }

    public function conversorController()
    {
        if(isset($_POST["enviar"]))
        {
            $convertir = $_POST["numero"];
            if($_POST["original"] == "decimal")
            {
                echo "Decimal: " . $convertir;
                echo "<br>binario: " . decbin($convertir);
                echo "<br>octal: " . decoct($convertir);
                echo "<br>hexadecimal: " . dechex($convertir);

            }
            if($_POST["original"] == "octal")
            {
                echo "Decimal: " . octdec($convertir);
                echo "<br>octal: " . $convertir;
                echo "<br>binario: " . decbin(octdec($convertir));
                echo "<br>hexadecimal: " . dechex(octdec($convertir));
                
            }
            if($_POST["original"] == "binario")
            {
                echo "Decimal: " . bindec($convertir);
                echo "<br>octal: " . decoct(bindec($convertir));
                echo "<br>binario: " . $convertir;
                echo "<br>hexadecimal: " . dechex(bindec($convertir));
            
            }
            if($_POST["original"] == "hexadecimal")
            {
                echo "Decimal: " . hexdec($convertir);
                echo "<br>octal: " . decoct(hexdec($convertir));
                echo "<br>binario: " . decbin(hexdec($convertir));
                echo "<br>hexadecimal: " . $convertir;
            
            }
        }
    }

    public function enlacesPaginasController(){

        if(isset( $_GET['action'])){

            $enlaces = $_GET['action'];

        }

        else{

            $enlaces = "index";
        }

        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;

    }
}
?>