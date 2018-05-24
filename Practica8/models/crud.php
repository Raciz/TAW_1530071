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
/*
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
    }*/
}
?>