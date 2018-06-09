DROP DATABASE IF EXISTS Inventario;
CREATE DATABASE IF NOT EXISTS Inventario DEFAULT CHARACTER SET utf8;
USE Inventario;


CREATE TABLE Tienda(id_tienda int PRIMARY KEY AUTO_INCREMENT,
                    nombre varchar(45),
                    ubicacion varchar(45),
                    activa int(1));

CREATE TABLE Usuario (id_usuario int(11) PRIMARY KEY AUTO_INCREMENT,
                      nombre varchar(50),
                      apellido varchar(50),
                      usuario varchar(64),
                      password varchar(255),
                      email varchar(54),
                      fecha_de_registro date,
                      root int(1),
                      id_tienda int,
                      FOREIGN KEY (id_tienda) REFERENCES Tienda(id_tienda));
                    
CREATE TABLE Categoria (id_categoria int(11) PRIMARY KEY AUTO_INCREMENT,
                        nombre_categoria varchar(50),
                        descripcion_categoria varchar(255),
                        fecha_de_registro date);

CREATE TABLE Producto (id_producto int(11) PRIMARY KEY AUTO_INCREMENT,
                       codigo_producto char(20),
                       nombre_producto varchar(255),
                       fecha_de_registro date,
                       precio double,
                       img varchar(255),
                       id_categoria int(11),
                       FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria));
                       
CREATE TABLE Tienda_Producto(id_tienda int,
                             id_producto int,
                             stock int,
                             PRIMARY KEY (id_tienda,id_producto),
                             FOREIGN KEY (id_tienda) REFERENCES Tienda(id_tienda),
                             FOREIGN KEY (id_producto) REFERENCES Producto(id_producto));

CREATE TABLE Historial (id_historial int(11) PRIMARY KEY AUTO_INCREMENT,
                        id_tienda int(11),
                        id_producto int(11),
                        id_usuario int(11),
                        fecha date,
                        hora time,
                        nota varchar(255),
                        referencia varchar(100),
                        cantidad int(11),
                        FOREIGN KEY (id_tienda,id_producto) REFERENCES Tienda_Producto(id_tienda,id_producto), 
                        FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario));




