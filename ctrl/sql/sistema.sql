SET time_zone = "+00:00";
DROP DATABASE sib2;
CREATE DATABASE sib2;
use sib2
SET charset utf8;

CREATE TABLE login(
   
   correo VARCHAR(50),
   pass   VARCHAR(12),
   repass VARCHAR(12),
   PRIMARY KEY (correo)   
);

CREATE TABLE usuarios(
   id_Us INT(11) NOT NULL AUTO_INCREMENT,
   nombre VARCHAR(100) NOT NULL,
   email VARCHAR(20) NOT NULL unique,
   password VARCHAR(12) NOT NULL,
   tipo_user VARCHAR(12),
   PRIMARY KEY (id_Us)
)ENGINE=INNODB;

DROP TABLE Productos;

CREATE TABLE Productos(
   idProducto MEDIUMINT NOT NULL AUTO_INCREMENT,
   brand VARCHAR(100),
   modelo VARCHAR(50),
   color enum('negro','blanco','rojo','rosa','dorado','purpura','plata'),
   tipo enum('mobile_phone','dron','tablet','smart_watch'),
   nUnidades MEDIUMINT UNSIGNED,
   PRIMARY KEY (idProducto)
)ENGINE=INNODB;
CREATE TABLE IMEI(
   IDIMEI MEDIUMINT not null AUTO_INCREMENT,
   TAC CHAR(6),
   FAC CHAR(2),
   NSTEL CHAR(6),
   W CHAR(1),
   idProduct MEDIUMINT,
   PRIMARY KEY (IDIMEI),
   FOREIGN KEY (idProduct) REFERENCES productos(idProducto)
)ENGINE=INNODB;
INSERT INTO IMEI (TAC,FAC,NSTEL,W, idProduct)
VALUES ('123456','11','987654','1',1);



TRUNCATE TABLE Productos;
INSERT INTO productos (brand, modelo,color,tipo,IMEI,nUnidades)
VALUES('beBeit','T800','negro','mobile_phone',9876543212345678,50),
      ('beBeit','T800','blanco','mobile_phone',9876543212345679,100),
      ('beBeit','T800','rojo','mobile_phone',9876543212345680,100),
      ('beBeit','T800','rosa','mobile_phone',9876543212345681,100);
INSERT INTO productos (brand, modelo,color,tipo,IMEI,nUnidades)
VALUES('beBeit','OPAL','negro','mobile_phone',9876543212345682,100),
      ('beBeit','OPAL','blanco','mobile_phone',9876543212345683,100),
      ('beBeit','OPAL','dorado','mobile_phone',9876543212345684,100);
INSERT INTO productos (brand, modelo,color,tipo,IMEI,nUnidades)
VALUES('beBeit','T200','negro','mobile_phone',9876543222345685,100),
            ('beBeit','T200','rojo','mobile_phone',9876043212345686,100),
            ('beBeit','T200','purpura','mobile_phone',9816543212345687,100);
INSERT INTO productos (brand, modelo,color,tipo,IMEI,nUnidades)
VALUES('beBeit','Z50','negro','mobile_phone',9876543222345688,100),
            ('beBeit','Z50','rojo','mobile_phone',9876043212345689,100),
            ('beBeit','Z50','purpura','mobile_phone',9816543212345690,100);

SELECT sum(nUnidades)
FROM Productos;

CREATE TABLE modelos(
  idmodel VARCHAR(100),
  tipo enum ('sp','sw','t','d'),
  nombre VARCHAR(100),
  color VARCHAR(50),
  PRIMARY KEY (idmodel)
);
  


DROP TABLE Proveedor;
CREATE TABLE Proveedor (
    idProveedor MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    razon_social VARCHAR(100),
    dir TEXT,
    telefonos TEXT,
    tipo enum('sp','sw','t','d'),
    idmodel VARCHAR(100),
    PRIMARY KEY (idProveedor),
    FOREIGN KEY (idmodel) REFERENCES modelo(idmodel)
)ENGINE=INNODB;



INSERT INTO proveedor (idProveedor,nombreProveedor,tipoProducto,modelo,color) 
VALUES(12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T800','negro'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T800','blanco'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T800','rojo'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T800','rosa');

INSERT INTO proveedor (idProveedor,nombreProveedor,tipoProducto,modelo,color) 
VALUES(12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','OPAL','negro'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','OPAL','blanco'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','OPAL','dorado');

INSERT INTO proveedor (idProveedor,nombreProveedor,tipoProducto,modelo,color) 
VALUES(12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T200','negro'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T200','rojo'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','T200','purpura');

INSERT INTO proveedor (idProveedor,nombreProveedor,tipoProducto,modelo,color) 
VALUES(12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','Z50','negro'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','Z50','plata'),
      (12345,'PIONERO ACM LIMITED','TELEFONO MOVIL','Z50','dorado');


INSERT INTO proveedor (nombreProveedor,tipoProducto,modelo,color) VALUES('PIONERO ACM LIMITED','TELEFONO MOVIL','T800','blanco');

DROP TABLE Almacen;
CREATE TABLE Almacen(
  idRegistro int(100) AUTO_INCREMENT,
  zona enum('A1','B1','C1','D1','E1','F1','A2','B2','C2','D2','E2','F2','A3','A4','B4','C4','D4','E4','F4','A5','B5','C5','D5','E5','F5'), 
  tipoAlmacen enum('Mercancia','Refacciones'),    
  calidad enum('ok_mercancia','not_ok_mercancia','ok_refacc','not_ok_refacc'),
  descripcionPieza TEXT,
  idProd MEDIUMINT,
  PRIMARY KEY (idRegistro),
  FOREIGN KEY (idProd) REFERENCES productos(idProducto)
);

TRUNCATE Almacen;

INSERT INTO Almacen (zona,tipoAlmacen,calidad,descripcionPieza,idProd)
VALUES ('A1','Mercancia','ok_mercancia','Z50 listo para venderse',13),
('B1','Mercancia','ok_mercancia','Z50 Rojo en espera de pedido',12),
('A3','Mercancia','not_ok_mercancia','Z50 negro descompuesto por falta de piezas',11),
('A4','Refacciones','ok_refacc','pieza logica que se instalará en un T200',9);


SELECT * FROM Almacen RIGHT JOIN Productos;

#Reporte Almacen General
#Informe sobre productos a detalle 
SELECT productos.idProducto,modelo,color,tipo,nUnidades, almacen.idProd,zona,tipoAlmacen,calidad,descripcionPieza FROM productos,almacen
WHERE productos.idProducto = almacen.idProd;



DROP TABLE folio;
CREATE TABLE folios(
  id MEDIUMINT AUTO_INCREMENT PRIMARY KEY,
  folio_de_fabrica MEDIUMINT unique,
  fecha DATE,
  cantidad_de_cajas int(8),
  total_de_equipos int(8),  
  user VARCHAR(20)
)ENGINE=INNODB;

CREATE TABLE Garantia(
  idDocumento INT(10) UNSIGNED AUTO_INCREMENT,
  idcliente MEDIUMINT,
  fechaEmision DATE,
  PRIMARY KEY (idDocumento)
)ENGINE=INNODB;

CREATE TABLE cliente (
  idcliente MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT, 
  nombre VARCHAR(30)NOT NULL, 
  apPat VARCHAR(30) NOT NULL, 
  apMat VARCHAR(30) NOT NULL, 
  idgarantia INT(10),
  PRIMARY KEY (idcliente),
  FOREIGN KEY (idgarantia) REFERENCES garantia(idDocumento)
  )ENGINE=INNODB;
 

CREATE TABLE servicios(idServicio VARCHAR(100), descripcion text, almacen enum('1','2','3') );

CREATE TEMPORARY TABLE FormaInspeccion(
	IDProveedor VARCHAR(50),
    tipo enum('mobile_phone','dron','tablet','smart_watch'),
    modelo VARCHAR(25),
    color enum('rojo','rosa','blanco','azul','negro'),
    cantidad smallint,
    status enum('bueno','defectuoso')
);