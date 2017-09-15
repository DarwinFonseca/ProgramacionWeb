CREATE database darwin;
use darwin;

CREATE TABLE `roles` (
`rol` INT(10) NOT NULL PRIMARY KEY ,
`descripcion` VARCHAR(60) NOT NULL
);

INSERT INTO `roles` (`rol`, `descripcion`) VALUES ('1', 'Leer.'), ('2', 'Leer, Editar.'), ('3', 'Leer, Editar, Crear.'), ('4', 'Leer, Editar, Crear, Eliminar.');


CREATE TABLE `usuarios` (
`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`nombre`  varchar(45) NOT NULL,
`apellido` varchar(45) NOT NULL,
`correo` varchar(45) NOT NULL,
`password` varchar(45) NOT NULL,
`genero` varchar(45) NOT NULL,
`rol` INT(10) NOT NULL,
foreign key(rol) references `roles`(rol) on delete cascade on update cascade
);

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `password`, `genero`, `rol`) VALUES (NULL, 'Darwin', 'Fonseca', 'darwin@gmail.com', 'darwin', 'M', '4');

CREATE TABLE `bienes` (
`id_bienes` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`descripcion`  varchar(45) NOT NULL,
`tipo` varchar(45) NOT NULL
);

CREATE TABLE `cargo` (
`id_cargo` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`descripcion`  varchar(45) NOT NULL,
`JefeArea` boolean NOT NULL
);

CREATE TABLE `proveedor` (
`id_proveedor` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`nro_orden`  varchar(45) NOT NULL,
`ruc` INT(20) NOT NULL,
`razon_social` varchar(255) NOT NULL,
`fecha_orden` DATETIME NOT NULL,
`monto_total` DOUBLE NOT NULL,
`fecha_entrega` DATE NOT NULL
);

CREATE TABLE `responsable` (
`id_responsable` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`dni` VARCHAR(45) NOT NULL ,
`nombre` VARCHAR(45) NOT NULL ,
`id_cargo` INT(20) NOT NULL,
foreign key(id_cargo) references `cargo`(id_cargo) on delete cascade on update cascade
);

CREATE TABLE `solicitud` (
`id_solicitud` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`fecha` DATETIME NOT NULL,
`id_responsable` INT(20) NOT NULL,
foreign key(id_responsable) references `responsable`(id_responsable) on delete cascade on update cascade
);

CREATE TABLE `cotizacion` (
`id_cotizacion` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`id_responsable` INT(20) NOT NULL,
`id_solicitud` INT(20) NOT NULL,
foreign key(id_responsable) references `responsable`(id_responsable) on delete cascade on update cascade,
foreign key(id_solicitud) references `solicitud`(id_solicitud) on delete cascade on update cascade
);

CREATE TABLE `solicitudxbienes` (
`id_solicitudxbienes` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`cantidad` INT(20) NOT NULL,
`id_solicitud` INT(20) NOT NULL,
`id_bienes` INT(20) NOT NULL,
foreign key(id_solicitud) references `solicitud`(id_solicitud) on delete cascade on update cascade,
foreign key(id_bienes) references `bienes`(id_bienes) on delete cascade on update cascade
);

CREATE TABLE `cotizacionxbienes` (
`cotizacion_id_cotizacion` INT(20) NOT NULL,
`bienes_id_bienes` INT(20) NOT NULL,
`cantidad` VARCHAR(45) NOT NULL,
foreign key(cotizacion_id_cotizacion) references `cotizacion`(id_cotizacion) on delete cascade on update cascade,
foreign key(bienes_id_bienes) references `bienes`(id_bienes) on delete cascade on update cascade,
PRIMARY KEY(cotizacion_id_cotizacion,bienes_id_bienes)
);

CREATE TABLE `ordenxcompra` (
`id_ordenxcompra` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`id_proveedor` INT(20) NOT NULL,
`id_bienes` INT(20) NOT NULL,
`id_cotizacion` INT(20) NOT NULL,
`id_responsable` INT(20) NOT NULL,
`aprobado` BOOLEAN NOT NULL,
foreign key(id_proveedor) references `proveedor`(id_proveedor) on delete cascade on update cascade,
foreign key(id_bienes) references `bienes`(id_bienes) on delete cascade on update cascade,
foreign key(id_cotizacion) references `cotizacion` (id_cotizacion) on delete cascade on update cascade,
foreign key(id_responsable) references `responsable` (id_responsable) on delete cascade on update cascade
);

CREATE TABLE `inventario` (
`id_inventario` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`codigo_unico` VARCHAR(45) NOT NULL,
`id_bienes` INT(20) NOT NULL,
`ubicacion` VARCHAR(45) NOT NULL,
`fecha_ingreso` VARCHAR(45) NOT NULL,
`id_responsable` INT(20) NOT NULL,
foreign key(id_bienes) references `bienes`(id_bienes) on delete cascade on update cascade,
foreign key(id_responsable) references `responsable`(id_responsable) on delete cascade on update cascade
);

CREATE TABLE `ingreso` (
`id_ingreso` INT(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`fecha_ingreso` VARCHAR(45) NOT NULL,
`id_ordenxcompra` INT(20) NOT NULL,
`cantidad` VARCHAR(45) NOT NULL,
`valor_total` VARCHAR(45) NOT NULL,
`id_bienes` INT(20) NOT NULL,
`id_proveedor` INT(20) NOT NULL,
foreign key(id_ordenxcompra) references `ordenxcompra` (id_ordenxcompra) on delete cascade on update cascade,
foreign key(id_bienes) references `bienes`(id_bienes) on delete cascade on update cascade,
foreign key(id_proveedor) references `proveedor`(id_proveedor) on delete cascade on update cascade
);

INSERT INTO `cargo` (`id_cargo`, `descripcion`, `JefeArea`) VALUES ('1', 'LECTURA.', '0'), ('2', 'LECTURA, CREACION.', '0'), ('3', 'LECTURA, CREACION, MODIFICACION.', '0'), ('4', 'LECTURA, MODIFICACION, CREACION, ELIMINACION.', '1');
INSERT INTO `responsable` (`id_responsable`, `dni`, `nombre`, `id_cargo`) VALUES ('1', '101', 'Juan Lopez', '1'), ('2', '102', 'Maria Rodriguez', '2'), ('3', '103', 'Mario Mora', '3'), ('4', '104', 'Darwin Fonseca', '4');
INSERT INTO `bienes` (`id_bienes`, `descripcion`, `tipo`) VALUES ('1', 'Motocicleta', 'Mueble'), ('2', 'Apartamento', 'Inmueble'), ('3', 'Televisor', 'Mueble'), ('4', 'Sofacama', 'Mueble'), ('5', 'Casa', 'Inmueble');
INSERT INTO `inventario` (`id_inventario`, `codigo_unico`, `id_bienes`, `ubicacion`, `fecha_ingreso`, `id_responsable`) VALUES ('1', 'INV1', '1', 'Concesionario Yamaha', '15/04/2017', '1'), ('2', 'INV2', '5', 'Barrio Minuto de Dios', '30/11/2016', '2'), ('3', 'INV3', '4', 'Exito 170 (comodisimos)', '06/06/2017', '3'), ('4', 'INV4', '3', 'Ktronix Salitre', '21/03/2016', '3'), ('5', 'INV5', '2', 'Conjunto Salvador', '23/12/2016', '4');
INSERT INTO `proveedor` (`id_proveedor`, `nro_orden`, `ruc`, `razon_social`, `fecha_orden`, `monto_total`, `fecha_entrega`) VALUES ('9055', 'ORD9055-1', '9387291', 'Yamaha Motors', '2015-10-23 12:20:00', '30000000', '2016-01-14'),
('9056', 'ORD9056-1', '3838390', 'Constructoras Bolivar Ltda.', '2015-05-13 09:40:00', '900000000', '2016-04-13'), ('9057', 'ORD9057-1', '8827490', 'LG', '2015-07-15 08:12:00', '50000000', '2016-06-15'),
('9058', 'ORD9058-1', '8764589', 'Comodisimos', '2016-03-15 13:19:00', '25000000', '2016-09-15'), ('9059', 'ORD9059-1', '19274012', 'Constructora Panamericana SA.', '2015-03-15 17:11:00', '800000000', '2016-06-15');
