CREATE database darwin;
use darwin;

CREATE TABLE `usuarios` (
`id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`nombre`  varchar(45) NOT NULL,
`apellido` varchar(45) NOT NULL,
`correo` varchar(45) NOT NULL,
`password` varchar(45) NOT NULL,
`genero` varchar(45) NOT NULL,
`rol` INT(10) NOT NULL
);

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `password`, `genero`, `rol`) VALUES (NULL, 'Darwin', 'Fonseca', 'darwin@gmail.com', 'darwin', 'M', '4');
