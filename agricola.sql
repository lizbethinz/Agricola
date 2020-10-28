CREATE TABLE categorias (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL unique,
  imagen varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE roles (
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL unique,
  PRIMARY KEY (id)
); 

CREATE TABLE Empleados (
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL unique,
  imagen varchar(255) NOT NULL,
  PRIMARY KEY (id)
); 

CREATE TABLE Usuarios (
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  correo varchar(255) NOT NULL unique,
  contra varchar(25) NOT NULL,
  rol bigint(20) NOT NULL,
 PRIMARY KEY (id),
  FOREIGN KEY (rol) REFERENCES roles(id)
);

CREATE TABLE Productos (
  id bigint(20)  NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL unique,
  categoria bigint(20) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (categoria) REFERENCES categorias(id)
);

CREATE TABLE ImagenesProductos (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  producto bigint(20) NOT NULL,
  imagen varchar(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (producto) REFERENCES Productos(id)
); 


CREATE TABLE HorariosEmpleados (
  id bigint(20) NOT NULL AUTO_INCREMENT,
  empleado bigint(20) NOT NULL,
  horaentrada time NOT NULL,
  horasalida time NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (empleado) REFERENCES Empleados(id)
); 
INSERT INTO roles(nombre) VALUES('Administrador'),('Auxiliar'),('Consultor');
INSERT INTO USUARIOS(correo,contra,rol) VALUES('admin0@gmail.com','admin123',1);