BEGIN TRANSACTION;
CREATE TABLE responsabilidad(
        id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
        titulo TEXT NOT NULL,
        fecha INTEGER,
        contrato TEXT NOT NULL);
INSERT INTO `responsabilidad` VALUES (1,'Entrega de Balones y Demás cosas','01/01/2015','1');
INSERT INTO `responsabilidad` VALUES (2,'Comida a todos los del grupo Fenix.',6062015,'2');
INSERT INTO `responsabilidad` VALUES (3,'Cumpleaños al mejor trabajador de Informatica HP',13122015,'3');
CREATE TABLE empresa (
        rif TEXT NOT NULL PRIMARY KEY, 
        nombre TEXT NOT NULL);
INSERT INTO `empresa` VALUES ('J-29469419-5','Empresa Probadora');
INSERT INTO `empresa` VALUES ('G-20000033-3','RIGOBLA');
CREATE TABLE contrato (
        numero INTEGER NOT NULL PRIMARY KEY, 
        titulo TEXT NOT NULL,
        fecha INTEGER,
        empresa TEXT NOT NULL);
INSERT INTO `contrato` VALUES (1,'Contrato de Prueba #One',NULL,'J-29469419-5');
INSERT INTO `contrato` VALUES (2,'Contrato Número 2',NULL,'J-29469419-5');
INSERT INTO `contrato` VALUES (3,'Contrato number #three',NULL,'G-20000033-3');
COMMIT;
