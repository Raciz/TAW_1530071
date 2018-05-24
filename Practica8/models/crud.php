<?php
require_once "conexion.php";

class CRUD
{
    public function registroCarreraModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

        $stmt -> bindParam(":nombre",$data,PDO::PARAM_STR);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt -> close();
    }

    public function listaCarreraModel($tabla)
    {
        $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
    }

    public function deleteCarreraModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt -> close();
    }

    public function editCarreraModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $data, PDO::PARAM_INT);	
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
    }

    public function updateCarreraModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

        $stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt->close();
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function registroMaestroModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (num_empleado,carrera,nombre,email,password,superUser) VALUES (:num_empleado,:carrera,:nombre,:email,:password,:superUser)");

        $stmt -> bindParam(":num_empleado",$data["num_empleado"],PDO::PARAM_STR);
        $stmt -> bindParam(":carrera",$data["carrera"],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":email",$data["email"],PDO::PARAM_STR);
        $stmt -> bindParam(":password",$data["password"],PDO::PARAM_STR);
        $stmt -> bindParam(":superUser",$data["super"],PDO::PARAM_INT);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt -> close();
    }

    public function listaMaestroModel($tabla1,$tabla2)
    {
        $stmt = Conexion::conectar() -> prepare("SELECT m.num_empleado,c.nombre as carrera,m.nombre,m.email,m.superUser FROM $tabla1 as m JOIN $tabla2 as c on m.carrera = c.id");
        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();
    }
    
    public function deleteMaestroModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE num_empleado = :id");

        $stmt -> bindParam(":id",$data,PDO::PARAM_STR);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt -> close();
    }

    public function editMaestroModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_empleado = :id");
		$stmt->bindParam(":id", $data, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
    }


    public function updateMaestroModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera, nombre = :nombre, email = :email, password = :password, superUser = :super WHERE num_empleado = :num_empleado");
        
		$stmt -> bindParam(":num_empleado", $data["num_empleado"], PDO::PARAM_STR);
		$stmt -> bindParam(":carrera", $data["carrera"], PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":super", $data["super"], PDO::PARAM_INT);

		if($stmt -> execute())
        {
			return "success";
		}
		else
        {
			return "fail";
		}

		$stmt->close();
    }
    
    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function registroAlumnoModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla (matricula,nombre,carrera,tutor) VALUES (:matricula,:nombre,:carrera,:tutor)");

        $stmt -> bindParam(":matricula",$data["matricula"],PDO::PARAM_INT);
        $stmt -> bindParam(":nombre",$data["nombre"],PDO::PARAM_STR);
        $stmt -> bindParam(":carrera",$data["carrera"],PDO::PARAM_INT);
        $stmt -> bindParam(":tutor",$data["tutor"],PDO::PARAM_STR);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            print_r($stmt->errorInfo());
            return "fail";
        }

        $stmt -> close();
    }

    public function listaAlumnoModel($tabla1,$tabla2,$tabla3)
    {
        $stmt = Conexion::conectar() -> prepare("SELECT a.matricula,a.nombre,c.nombre as carrera, m.nombre as tutor FROM $tabla1 as a JOIN $tabla2 as c on a.carrera = c.id JOIN $tabla3 as m on a.tutor = m.num_empleado");
        $stmt -> execute();
        return $stmt -> fetchAll();

        $stmt -> close();
    }
   
    public function deleteAlumnoModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE matricula = :id");

        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);

        if($stmt -> execute())
        {
            return "success";
        }
        else
        {
            return "fail";
        }

        $stmt -> close();
    }

    public function editAlumnoModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE matricula = :id");
		$stmt->bindParam(":id", $data, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
    }


    public function updateAlumnoModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, carrera = :carrera, tutor = :tutor WHERE matricula = :matricula");
        
		$stmt -> bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":carrera", $data["carrera"], PDO::PARAM_INT);
		$stmt -> bindParam(":tutor", $data["tutor"], PDO::PARAM_STR);
		$stmt -> bindParam(":matricula", $data["matricula"], PDO::PARAM_STR);

		if($stmt -> execute())
        {
			return "success";
		}
		else
        {
			return "fail";
		}

		$stmt->close();
    }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function loginModel($data,$tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT num_empleado, password, superUser FROM $tabla WHERE num_empleado = :id");	
		$stmt->bindParam(":id", $data["num_empleado"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
    }
}
?>