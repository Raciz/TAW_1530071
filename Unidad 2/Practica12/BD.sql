CREATE DATABASE Inventario;

CREATE TABLE Stock(id int AUTO_INCREMENT PRIMARY KEY,
                   nombre varchar(30),
                   precio double(8,2),
                   cantidad_disponible int);

CREATE TABLE Entrada(id int AUTO_INCREMENT PRIMARY KEY,
                     fecha date);
                     
CREATE TABLE Salida(id int AUTO_INCREMENT PRIMARY KEY,
                    fecha date);

CREATE TABLE Entrada_Producto(id int AUTO_INCREMENT PRIMARY KEY,
                              entrada int,
                              producto int,
                              cantidad int,
                              FOREIGN KEY (entrada) REFERENCES Entrada(id),
                              FOREIGN KEY (producto) REFERENCES Stock(id));

CREATE TABLE Salida_Producto(id int AUTO_INCREMENT PRIMARY KEY,
                             salida int,
                             producto int, 
                             cantidad int,
                             FOREIGN KEY (salida) REFERENCES Salida(id),
                             FOREIGN KEY (producto) REFERENCES Stock(id));
