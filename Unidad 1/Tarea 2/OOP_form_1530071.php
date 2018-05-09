<?php
class form
{
    public $name = "";
    public $email = "";
    public $gender = "";
    public $website = "";
    public $comment = "";
    public $errorArray = array("","","","");

    public function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function validar()
    {
        $this->errorArray = array("","","","");
        $this->validarName();
        $this->validarEmail();
        $this->validarWebsite();
        $this->validarComment();
        $this->validarGender();
    }

    public function mostrarInfo()
    {
        echo $this->name . "<br>" . $this->email . "<br>" . $this->website . "<br>" . $this->comment . "<br>" . $this->gender;
    }

    public function validarName()
    {
        if (empty($this->name)) 
        {
            $this->errorArray[0] = "Name is required";
        } 
        else 
        {
            $this->name = $this->test_input($this->name);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) 
            {
                $this->errorArray[0] = "Only letters and white space allowed";
            }
        }
    }

    public function validarEmail()
    {
        if (empty($this->email)) 
        {
            $this->errorArray[1] = "Email is required";
        } 
        else 
        {
            $this->email = $this->test_input($this->email);
            // check if e-mail address is well-formed
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
            {
                $this->errorArray[1] = "Invalid email format";
            }
        }
    }

    public function validarWebsite()
    {
        if (!empty($this->website)) 
        {
            $this->website = $this->test_input($this->website);
            // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) 
            {
                $this->errorArray[2] = "Invalid URL";
            }
        }
    }

    public function validarComment()
    {
        if (!empty($this->comment)) 
        {
            $this->comment = $this->test_input($this->comment);
        }
    }

    public function validarGender()
    {
        if (empty($_POST["gender"])) 
        {
            $this->errorArray[3] = "Gender is required";
        } 
        else 
        {
            $this->gender = $this->test_input($this->gender);
        }
    }

}

$formulario = new form();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $formulario->name = $_POST["name"];
    $formulario->email = $_POST["email"];
    $formulario->gender = (isset($_POST["gender"])) ? $_POST["gender"] : "" ;
    $formulario->comment = $_POST["comment"];
    $formulario->website = $_POST["website"];
    $formulario->validar();
}


?>

<html>
    <head>
        <title>Formulario en PHP7</title>
    </head>

    <body>


        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field.</span></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            Name: <input type="text" name="name" value="<?php echo $formulario->name;?>">
            <span class="error">* <?php echo $formulario->errorArray[0];?></span>
            <br>
            <br>
            E-mail: <input type="text" name="email" value="<?php echo $formulario->email;?>">
            <span class="error">* <?php echo $formulario->errorArray[1];?></span>
            <br>
            <br>
            Website: <input type="text" name="website" value="<?php echo $formulario->website;?>">
            <span class="error"><?php echo $formulario->errorArray[2];?></span>
            <br>
            <br>
            Comment: <textarea name="comment" rows="5" cols="40"><?php echo $formulario->comment;?></textarea>
            <br>
            <br>
            Gender:
            <input type="radio" name="gender" <?php if (isset($formulario->gender) && $formulario->gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($formulario->gender) && $formulario->gender=="male") echo "checked";?> value="male">Male
            <span class="error">* <?php echo $formulario->errorArray[3];?></span>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit">

        </form>

        <?php
        echo "<h2>Your Input:</h2>";
        $formulario->mostrarInfo();
        ?>


        <ul>
            <li><a href="#">Volver al Inicio</a></li>
        </ul>
    </body>
</html>