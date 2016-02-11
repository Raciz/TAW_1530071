<?php
required_once "conecion.php";

class CRUD extends Conexion
{
    public function insertModel($data,$table)
    {
        $stmt = Conexion::conectar-prepare("INSERT INTO $table(nombre,telefono) values (:name,:tel)");
        
        $stmt -> bindParam(":name", $data["name"],PDO::PARAM_STR);
        $stmt -> bindParam(":tel", $data["tel"],PDO::PARAM_STR);
        
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
    
    public function deleteModel($data,$tabla)
    {
        $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id",$data,PDO::PARAM_INT);
        
        if($stmt->execute())
        {
			return "success";
		}
		else
        {
			return "fail";
		}

		$stmt->close();
    }
    
    public function selectModel($tabla)
    {
        $stmt = Conexion::conectar() -> prepare("SELETE * FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();
        
		$stmt->close();
    }
}
?>