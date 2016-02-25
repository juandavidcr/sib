SET time_zone = "-06:00";

use sib3
SET charset utf8;
#DROP TABLE folios;
CREATE TABLE folios(
  id MEDIUMINT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  folio_de_fabrica MEDIUMINT unique NOT NULL,
  fecha DATE,
  cantidad_de_cajas int(8) NOT NULL,
  total_de_equipos int(8) NOT NULL,  
  user_almacen VARCHAR(20) NOT NULL
)ENGINE=INNODB;

CREATE TABLE Almacen(
  idAlmacen TINYINT AUTO_INCREMENT,
  zona enum('A','B','C','D','E','F'), 
  tipoAlmacen enum('Mercancia','Refacciones'),    
  status enum('ok_mercancia','not_ok_mercancia','ok_refacc','not_ok_refacc'),
  descripcion TEXT,
  idmodel VARCHAR(100) REFERENCES modelos,
  PRIMARY KEY (idAlmacen)
);

INSERT INTO `almacen` (`idAlmacen`, `zona`, `tipoAlmacen`, `status`, `descripcion`, `idmodel`) 
VALUES (NULL, 'A', 'Mercancia', 'ok_mercancia', 'ON1 LISTO PARA SER ENVIADO', 'ON1');
DROP TABLE Pedidos;
CREATE TABLE Pedidos (
  idPedido MEDIUMINT NOT NULL AUTO_INCREMENT,
  folioFabrica MEDIUMINT not null,
  fecha DATE NOT NULL,
  cantCaja INT UNSIGNED,
  proveedor MEDIUMINT NOT NULL REFERENCES proveedor,
  tipo enum('mobile_phone','dron','tablet','smart_watch'),
  usuario VARCHAR(200) NOT NULL REFERENCES usuarios(email),
  cantidad int(8),    
  cantidadTotal int(8),  
  PRIMARY KEY (idPedido)
)ENGINE=INNODB;

#DROP TABLE modelos;
CREATE TABLE `modelos` (
  `idmodel` varchar(100) NOT NULL,
  `tipo` enum('smartphone','smartwatch','tablet','drone') DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` double(10,2) NOT NULL,
  PRIMARY KEY (`idmodel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- LOAD DATA INFILE ‘C:\xampp\htdocs\BBIT3.5\sql\Modelos.csv’ INTO TABLE ‘modelos’
-- FIELDS TERMINATED BY ‘,’
-- LINES TERMINATED BY ‘\n’;


#DROP TABLE Proveedor;

CREATE TABLE Proveedor (
    idProveedor MEDIUMINT NOT NULL,
    razon_social VARCHAR(100),
    domicilio TEXT,
    telefonos TEXT,
    wechat VARCHAR(50),
    contacto VARCHAR(100),
    descripcion TEXT,
    email VARCHAR(150),
    pagina VARCHAR(255),
    tipo_de_producto enum('smartphone','smartwatch','tablet','drone'),
    idmodelo VARCHAR(100) NOT NULL REFERENCES modelos(idmodel),
    PRIMARY KEY(idProveedor)
)ENGINE=INNODB;

CREATE TABLE usuarios(
   id_Us INT(11) NOT NULL AUTO_INCREMENT,
   nombre VARCHAR(100) NOT NULL,
   email VARCHAR(20) NOT NULL unique,
   password VARCHAR(12) NOT NULL,
   tipo_user VARCHAR(12),
   PRIMARY KEY (id_Us)
)ENGINE=INNODB;

CREATE TABLE inspeccion(
  
)ENGINE=INNODB;
