CREATE DATABASE Tutorias;

CREATE TABLE Carrera(id int AUTO_INCREMENT PRIMARY KEY,
                     nombre varchar(50));

CREATE TABLE Maestro(num_empleado varchar(10),
                     carrera varchar(50),
                     nombre varchar(50),
                     email varchar(30),
                     password varchar(20),
                     superUser int(1),
                     FOREIGN KEY (carrera) REFERENCES Carrera(nombre));

CREATE TABLE Alumno(matricula int(7) PRIMARY KEY,
                    nombre varchar(50),
                    carrera varchar(50),
                    tutor varchar(10),
                    FOREIGN KEY (carrera) REFERENCES Carrera(nombre));
                    
CREATE TABLE Tutoria(id int AUTO_INCREMENT PRIMARY KEY,
                     alumno int(7),
                     tutor varchar(10),
                     fecha date,
                     hora time,
                     tipo varchar(12),
                     tutoria varchar(200),
                     FOREIGN KEY (tutor) REFERENCES Maestro(num_empleado),                     
                     FOREIGN KEY (alumno) REFERENCES Alumno(matricula));