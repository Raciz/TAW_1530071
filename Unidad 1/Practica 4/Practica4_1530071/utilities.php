<?php

class persona
{
    public $infoPersona = array();

    public function extractDataAlumno()
    {
        $this->infoPersona = array();
        $file = fopen("alumno.txt","r");
        while(!feof($file))
        {
            $data = fgets($file);
            if(trim($data) != "")
            {
                $data = explode(",",$data);
                $this->infoPersona[] = ["nombre" => $data[0],
                                        "matricula" => $data[1],
                                        "carrera" => $data[2],
                                        "email" => $data[3],
                                        "telefono" => $data[4]];
            }
        }
        fclose($file);
    }

    public function extractDataMaestro()
    {
        $this->infoPersona = array();
        $file = fopen("maestro.txt","r");
        while(!feof($file))
        {
            $data = fgets($file);
            if(trim($data) != "")
            {
                $data = explode(",",$data);
                $this->infoPersona[] = ["numEmpleado" => $data[0],
                                        "carrera" => $data[1],
                                        "nombre" => $data[2],
                                        "telefono" => $data[3]];
            }
        }
        fclose($file);
    }
}