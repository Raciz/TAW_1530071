CREATE DATABASE Tienda_TAW;

CREATE TABLE cuenta(usuario varchar(20) PRIMARY KEY,
                    contraseña varchar(100));
                    
CREATE TABLE productos(id int AUTO_INCREMENT PRIMARY KEY,
                       nombre varchar(25),
                       precio double(10,2));
                       
CREATE TABLE ventas(id int AUTO_INCREMENT PRIMARY KEY,
                    producto int,
                    cantidad int);