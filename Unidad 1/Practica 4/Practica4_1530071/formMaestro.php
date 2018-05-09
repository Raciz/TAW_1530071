<?php
//clase para validar la informacion del formulario y guardarlo en un archivo
class form
{
    //variable para los datos del formulario
    public $numEmpleado = "";
    public $carrera = "";
    public $nombre = "";
    public $telefono = "";
    public $error = false;
    public $errorArray = array("","","","");

    //funcion para corregir valores en los valores introducidos en 
    //el formulario
    public function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //funcion para validar los campos del formulario 
    public function validar()
    {
        //reseteamos las variables
        $this->errorArray = array("","","","");
        $this->error = false;

        //mandamos llamar las funciones de validacion
        $this->validarNumEmpleado();
        $this->validarCarrera();
        $this->validarNombre();
        $this->validarTelefono();

        //en caso de que no haya ocurrido algun error
        if(!$this->error)
        {
            //la informacion introducida se guarda en un archivo
            $file = fopen("maestro.txt","a");
            fputs($file,"\n$this->numEmpleado,$this->carrera,$this->nombre,$this->telefono");
            fclose($file);

            //se redirige a la pagina de mostrar alumnos
            header("location:mostrarMaestros.php"); 
        }
    }
    
    //funcion para validar el telefono
    public function validarNumEmpleado()
    {
        //Se verifica si la variable contiene algun valor
        if(empty($this->numEmpleado))
        {
            //en caso de que este vacia se genera un error
            //se guarda el error y error pasa a ser true
            $this->errorArray[0] = "El numero de empleado es requeriro";
            $this->error = true;
        }
        else
        {
            //en caso de que si tenga se guarda el valor despues de ser enviado a test_input
            $this->numEmpleado = $this->test_input($this->numEmpleado);
                        
            //se verifica si se ingreso solo numeros
            if (!is_numeric($this->numEmpleado)) 
            {
                //en caso de que se haya introducido otra cosa
                //se guarda el error y error pasa a ser true
                $this->errorArray[0] = "Numero de Empleado Invalido";
                $this->error = true;
            }
        }
    }
    
    //funcion para validar el nombre
    public function validarNombre()
    {
        //verificacion de que se haya introducido informacion para este campo
        if (empty($this->nombre)) 
        {
            //en caso de que este vacia se genera un error
            //se guarda el error y error pasa a ser true
            $this->errorArray[2] = "El nombre es requeriro";
            $this->error = true;
        } 
        else 
        {
            //se guarda el valor despues de ser enviado a test_input
            $this->nombre = $this->test_input($this->nombre);
            
            //se verifica que solo se introdujo letras y espacios
            if (!preg_match("/^[a-zA-Z ]*$/",$this->nombre)) 
            {
                //en caso de que se haya introducido otra cosa
                //se guarda el error y error pasa a ser true
                $this->errorArray[2] = "Solo letras y espacios son permitidos";
                $this->error = true;
            }
        }
    }

    //funcion para validar la carrera
    public function validarCarrera()
    {
        //verificacion de que se haya introducido informacion para este campo
        if (empty($this->carrera)) 
        {
            //en caso de que este vacia se genera un error
            //se guarda el error y error pasa a ser true
            $this->errorArray[1] = "La carrera es requerira";
            $this->error = true;
        } 
        else 
        {
            //se guarda el valor despues de ser enviado a test_input
            $this->carrera = $this->test_input($this->carrera);
            
            //se verifica que solo se introdujo letras y espacios
            if (!preg_match("/^[a-zA-Z ]*$/",$this->carrera)) 
            {
                //en caso de que se haya introducido otra cosa
                //se guarda el error y error pasa a ser true
                $this->errorArray[1] = "Solo letras y espacios son permitidos";
                $this->error = true;
            }
        }
    }


    //funcion para validar el telefono
    public function validarTelefono()
    {
        //Se verifica si la variable contiene algun valor
        if(!empty($this->telefono))  
        {
            //en caso de que si tenga se guarda el valor despues de ser enviado a test_input
            $this->telefono = $this->test_input($this->telefono);
                        
            //se verifica si se ingreso solo numeros
            if (!is_numeric($this->telefono)) 
            {
                //en caso de que se haya introducido otra cosa
                //se guarda el error y error pasa a ser true
                $this->errorArray[3] = "Telefono Invalido";
                $this->error = true;
            }
        }
    }

}

//se crea un objeto de tipo form
$formulario = new form();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //se pasa los valores del formulario a las variables de la clase
    $formulario->numEmpleado = $_POST["numEmpleado"];
    $formulario->carrera = $_POST["carrera"];
    $formulario->nombre = $_POST["nombre"];
    $formulario->telefono = $_POST["telefono"];
        
    //se manda a llamar la funcion validar
    $formulario->validar();
}


?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Curso PHP |  Bienvenidos</title>
        <link rel="stylesheet" href="./css/foundation.css" />
        <script src="./js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php require_once('header.php'); ?>

        <div class="row">

            <div class="large-9 columns">
                <h3>Registro de Alumno</h3>

                <div class="section-container tabs" data-section>
                    <section class="section">
                        <!--formulario para ingresar la informacion de los maestros-->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            Numero de Empleado *: <input type="text" name="numEmpleado" value="<?php echo $formulario->numEmpleado;?>">
                            <?php if(!empty($formulario->errorArray[0])) echo "<span class='error'>*".$formulario->errorArray[0]."</span> ";?>
                            <br>
                            Carrera *: <input type="text" name="carrera" value="<?php echo $formulario->carrera;?>">
                            <?php if(!empty($formulario->errorArray[1])) echo "<span class='error'>*".$formulario->errorArray[1]."</span> ";?>
                            <br>
                            Nombre *: <input type="text" name="nombre" value="<?php echo $formulario->nombre;?>">
                            <?php if(!empty($formulario->errorArray[2])) echo "<span class='error'>*".$formulario->errorArray[2]."</span> ";?>
                            <br>
                            Telefono: <input type="text" name="telefono" value="<?php echo $formulario->telefono;?>">
                            <?php if(!empty($formulario->errorArray[3])) echo "<span class='error'>*".$formulario->errorArray[3]."</span> ";?>
                            <br>
                            <input type="submit" name="submit" value="Guardar" class="button">

                        </form>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once('footer.php'); ?>