DROP DATABASE Inventario;
CREATE DATABASE Inventario;


CREATE TABLE Categoria();

CREATE TABLE Producto(id_producto int AUTO_INCREMENT PRIMARY KEY,
                      codigo_producto char(20),
                      nombre_producto varchar(255),
                      fecha_de_registro date,
                      precio double,
                      stock int,
                      id_categoria int,
                      FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario));

CREATE TABLE Usuario(id_usuario int PRIMARY KEY,
                     nombre varchar(50),
                     apellido varchar(50),
                     usuario varchar(64),
                     password varchar(255),
                     correo varchar(54),
                     fecha_de_registro date);

CREATE TABLE Historial(id_historial int AUTO_INCREMENT PRIMARY KEY,
                       id_producto int,
                       id_usuario int,
                       fecha date,
                       nota varchar(255),
                       referencia varchar(100),
                       cantidad int,
                       FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
                       FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario));
