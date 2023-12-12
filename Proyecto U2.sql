-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: veterinaria
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cita` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `idpaciente` varchar(45) NOT NULL,
  `sintomas` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`,`idpaciente`),
  KEY `idx_cita` (`idpaciente`),
  CONSTRAINT `fk_cita_dueño` FOREIGN KEY (`dni`) REFERENCES `dueño` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cita_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES ('21323171','Joe','909821192','joe.cruz@gmail.com','2023-12-13','11:00','PE-02','Alergia'),('23891064','German','901289112','german.gonzales@gmail.com','2023-12-11','18:00','PE-03','Dolor en las extremidades'),('23894121','Lucas','992273281','lucas.paredes@gmail.com','2023-12-13','15:00','PE-05','Alergia'),('32764510','Jose','964497718','jose.carrillo@gmail.com','2023-12-14','17:00','PE-04','Alergia'),('34128921','Keylee','964497718','keylee.angeles@gmail.com','2023-12-13','14:00','GA-01','Alergia');
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_cita` AFTER INSERT ON `cita` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA CITA', now(), concat('Registro de cita del señor(a) ',
new.`nombre`,' identificado con DNI ',new.`dni`,' con telefono ',new.`telefono`,' y correo ',
new.`correo`,' para el dia ',new.`fecha`,' a las ',new.`hora`,' horas. Para tratar a su mascota identificado con el codigo ',
new.`idpaciente`,' de paciente que presenta los sintomas de ',new.`sintomas`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_cita` AFTER UPDATE ON `cita` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`dni` <> old.`dni` ,concat('Actualizacion de la columna DNI de ',old.`dni`, ' a ',new.`dni`, '. '), ""),
if (new.`nombre` <> old.`nombre` ,concat('Actualizacion de la columna NOMBRE de ',old.`nombre`, ' a ',new.`nombre`, '. '), ""),
if (new.`telefono` <> old.`telefono` ,concat('Actualizacion de la columna TELEFONO de ',old.`telefono`, ' a ',new.`telefono`, '. '), ""),
if (new.`correo` <> old.`correo` ,concat('Actualizacion de la columna CORREO de ',old.`correo`, ' a ',new.`correo`, '. '), ""),
if (new.`fecha` <> old.`fecha` ,concat('Actualizacion de la columna FECHA de ',old.`fecha`, ' a ',new.`fecha`, '. '), ""),
if (new.`hora` <> old.`hora` ,concat('Actualizacion de la columna HORA de ',old.`hora`, ' a ',new.`hora`, '. '), ""),
if (new.`idpaciente` <> old.`idpaciente` ,concat('Actualizacion de la columna IDPACIENTE de ',old.`idpaciente`, ' a ',new.`idpaciente`, '. '), ""),
if (new.`sintomas` <> old.`sintomas` ,concat('Actualizacion de la columna SINTOMAS de ',old.`sintomas`, ' a ',new.`sintomas`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA CITAS', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_cita` AFTER DELETE ON `cita` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA CITA', now(), concat('Se elimino el registro con el identificador DNI = ',old.`dni`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `dbregistros`
--

DROP TABLE IF EXISTS `dbregistros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dbregistros` (
  `idDBregistros` int NOT NULL AUTO_INCREMENT,
  `accion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`idDBregistros`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbregistros`
--

LOCK TABLES `dbregistros` WRITE;
/*!40000 ALTER TABLE `dbregistros` DISABLE KEYS */;
INSERT INTO `dbregistros` VALUES (154,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 10:31:21','Actualizacion de la columna IDPACIENTE de PE-02 a PE-03.'),(155,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 10:31:40','Actualizacion de la columna IDPACIENTE de PE-03 a PE-02.'),(156,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 10:38:50','Registro de la mascota Pool identificado con el codigo paciente PE-03 de especie Perro y de raza Sabueso polaco, con fecha de nacimiento 2016-11-26. La mascota de color Marron con negro de edad 7 años 0 mesesde estatura 1.24 de peso 14.34 y que presenta los sintomas de Dolor en las extremidades'),(157,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento ACEDERM SPRAY identificado con el codigo MED-LT20300 con precio 48.00 soles y con descripcion Antinflamatorio, problemas de piel, shampoo medicado x 20ml. Datos adicionales: Se registro 12 unidades y tiene fecha de elaboracion 2021-12-24 y fecha de vencimiento 2026-12-24'),(158,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento Acido Hipocloroso ECADERM identificado con el codigo MED-LT20305 con precio 35.00 soles y con descripcion Antibiotico, limpiador Otico, problemas de piel, shampoo medicado x 120ml. Datos adicionales: Se registro 8 unidades y tiene fecha de elaboracion 2022-03-10 y fecha de vencimiento 2027-03-10'),(159,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento Acido Hipocloro ECADERM identificado con el codigo MED-LT30305 con precio 64.00 soles y con descripcion Antinflamatorio, problemas de piel, shampoo medicado x 500ml. Datos adicionales: Se registro 9 unidades y tiene fecha de elaboracion 2021-12-24 y fecha de vencimiento 2026-12-24'),(160,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento Andavix Pipeta identificado con el codigo MED-LT20310 con precio 53.00 soles y con descripcion Antiparasitario, antipulgas, pipeta 10-25kg. Datos adicionales: Se registro 6 unidades y tiene fecha de elaboracion 2023-02-14 y fecha de vencimiento 2026-02-14'),(161,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento Andavix Pipeta identificado con el codigo MED-LT30310 con precio 59.00 soles y con descripcion Antiparasitario, antipulgas, pipeta 25-40kg. Datos adicionales: Se registro 5 unidades y tiene fecha de elaboracion 2023-02-14 y fecha de vencimiento 2026-02-14'),(162,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento Andavix Pipeta identificado con el codigo MED-LT40310 con precio 50.00 soles y con descripcion Antiparasitario, antipulgas, pipeta 4-10kg. Datos adicionales: Se registro 5 unidades y tiene fecha de elaboracion 2023-02-14 y fecha de vencimiento 2026-02-14'),(163,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento ADITIVO Agua Tropiclean identificado con el codigo MED-LT20315 con precio 35.00 soles y con descripcion Agua Tropiclean gato x 236ml. Datos adicionales: Se registro 8 unidades y tiene fecha de elaboracion 2019-12-24 y fecha de vencimiento 2024-12-24'),(164,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento ADVANTAGE GATO identificado con el codigo MED-LT20320 con precio 48.00 soles y con descripcion Antipulgas de 4-8kg - bayer. Datos adicionales: Se registro 2 unidades y tiene fecha de elaboracion 2023-05-16 y fecha de vencimiento 2028-05-16'),(165,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento ANTIBIOTICO BUCAL identificado con el codigo MED-LT20325 con precio 6.50 soles y con descripcion Antibiotico bucal triton x 01 tableta. Datos adicionales: Se registro 4 unidades y tiene fecha de elaboracion 2021-12-24 y fecha de vencimiento 2026-12-24'),(166,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:15','Registro del medicamento APETIL identificado con el codigo MED-LT20330 con precio 51.00 soles y con descripcion APETIL Holliday x 10ml. Datos adicionales: Se registro 10 unidades y tiene fecha de elaboracion 2020-02-13 y fecha de vencimiento 2025-02-13'),(167,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:40','Registro del medicamento Rimadyl carprofeno identificado con el codigo MED-LT40100 con precio 55.00 soles y con descripcion Alivio del dolor e inflamacion en perros. Datos adicionales: Se registro 18 unidades y tiene fecha de elaboracion 2023-12-09 y fecha de vencimiento 2028-11-21'),(168,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:40','Registro del medicamento Benadryl (difenhidramina) identificado con el codigo MED-LT40105 con precio 79.00 soles y con descripcion Antihistaminico para alivio alergias perros y gatos. Datos adicionales: Se registro 10 unidades y tiene fecha de elaboracion 2023-12-09 y fecha de vencimiento 2028-11-21'),(169,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:40','Registro del medicamento Frontline fipronil identificado con el codigo MED-LT40110 con precio 34.00 soles y con descripcion Antiinflamatorio para aliviar el dolor en perros y gatos. Datos adicionales: Se registro 12 unidades y tiene fecha de elaboracion 2023-12-09 y fecha de vencimiento 2028-11-21'),(170,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:40','Registro del medicamento Metacam meloxicam identificado con el codigo MED-LT40115 con precio 45.00 soles y con descripcion Prevencion de infestaciones pulgas y garrapatas. Datos adicionales: Se registro 14 unidades y tiene fecha de elaboracion 2023-12-09 y fecha de vencimiento 2028-11-21'),(171,'INGRESO DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 10:46:40','Registro del medicamento Revolution selamectina identificado con el codigo MED-LT40120 con precio 45.00 soles y con descripcion Medicamento topico previene infestaciones pulgas, garrapatas, acaros y parasitos. Datos adicionales: Se registro 14 unidades y tiene fecha de elaboracion 2023-12-09 y fecha de vencimiento 2028-11-21'),(172,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 11:04:32','Registro de la mascota Tian identificado con el codigo paciente GA-01 de especie Gato y de raza Maine, con fecha de nacimiento 2020-06-02. La mascota de color Blanco Manchado de edad 3 años 6 mesesde estatura 0.65 de peso 4.28 y que presenta los sintomas de Alergia'),(173,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 11:10:13','Registro de la mascota Max identificado con el codigo paciente GA-02 de especie Gato y de raza Americano, con fecha de nacimiento 2021-02-07. La mascota de color Blanco Manchado de edad 2 años 10 mesesde estatura 0.72 de peso 5.31 y que presenta los sintomas de Resfriado'),(174,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 11:13:27','Registro de la mascota Chino identificado con el codigo paciente PE-04 de especie Perro y de raza Schanauzer, con fecha de nacimiento 2021-11-26. La mascota de color Sal y Pimienta de edad 2 años 0 mesesde estatura 0.67 de peso 4.51 y que presenta los sintomas de Alergia'),(175,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 11:14:32','Registro de la mascota Chester identificado con el codigo paciente PE-05 de especie Perro y de raza Pastor Ovejero, con fecha de nacimiento 2013-06-15. La mascota de color Blanco con cafe de edad 10 años 5 mesesde estatura 1.24 de peso 12.45 y que presenta los sintomas de Alergia'),(176,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-09 11:14:39','Registro del señor(a) Lucas identificado con DNI 23894121 con telefono 992273281 de edad 26 años. Ademas, dueño de la mascota identificado con el codigo de paciente PE-05'),(177,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 14:58:57','Registro de la mascota Maxi identificado con el codigo paciente GA-03 de especie Gato y de raza Maine Coon, con fecha de nacimiento 2019-12-06. La mascota de color Blanco con negro de edad 4 años 0 mesesde estatura 0.71 de peso 4.50 y que presenta los sintomas de Alergia'),(178,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 15:01:01','Registro de la mascota Kitty identificado con el codigo paciente GA-04 de especie Gato y de raza Comun Europeo, con fecha de nacimiento 2018-04-13. La mascota de color Cafe claro de edad 5 años 7 mesesde estatura 0.67 de peso 4.25 y que presenta los sintomas de Fiebre'),(179,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 15:05:36','Registro de la mascota Tom identificado con el codigo paciente GA-05 de especie Gato y de raza Azul Ruso, con fecha de nacimiento 2020-01-18. La mascota de color Azul con blanco de edad 3 años 10 mesesde estatura 0.65 de peso 4.90 y que presenta los sintomas de '),(180,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-09 15:17:42','Registro del señor(a) German identificado con DNI 23891064 con telefono 901289112 de edad 18 años. Ademas, dueño de la mascota identificado con el codigo de paciente PE-03'),(181,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:05:13','Registro de la mascota Toby identificado con el codigo paciente PE-06 de especie Perro y de raza Gran Danes, con fecha de nacimiento 2011-12-04. La mascota de color Blanco de edad 11 años 11 mesesde estatura 1.34 de peso 15.34 y que presenta los sintomas de Alergia'),(182,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:08:56','Registro de la mascota Hachiko identificado con el codigo paciente PE-07 de especie Perro y de raza Dalmata, con fecha de nacimiento 2014-08-06. La mascota de color Blanco con negro de edad 9 años 4 mesesde estatura 1.21 de peso 8.56 y que presenta los sintomas de Resfriado'),(183,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:15:12','Registro de la mascota Scooby Doo identificado con el codigo paciente PE-08 de especie Perro y de raza , con fecha de nacimiento 2010-03-14. La mascota de color Marron con negro de edad 13 años 8 mesesde estatura 1.43 de peso 13.76 y que presenta los sintomas de Alergia'),(184,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-09 17:17:07','Registro del señor(a) Jose identificado con DNI 32764510 con telefono 992371221 de edad 24 años. Ademas, dueño de la mascota identificado con el codigo de paciente PE-04'),(185,'ACTUALIZACION DE DATOS EN LA TABLA MEDICAMENTO','2023-12-09 17:17:50','Actualizacion de la columna STOCK de 12 a 15.'),(186,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-09 17:19:15','Registro del señor(a) Keylee identificado con DNI 34128921 con telefono 964497718 de edad 30 años. Ademas, dueño de la mascota identificado con el codigo de paciente GA-01'),(187,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:39:32','Actualizacion de la columna EDAD de 4 años 0 meses a 4 años 6 meses.'),(188,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:39:43','Actualizacion de la columna EDAD de 4 años 6 meses a 4 años 3 meses.'),(189,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:42:19','Actualizacion de la columna EDAD de 3 años 6 meses a 3 años 5 meses.'),(190,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 17:43:33','Actualizacion de la columna TALLA de 0.67 a 0.69.'),(191,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 18:03:07','Actualizacion de la columna FEC_NACIMIENTO de 2020-07-02 a 2020-07-01.Actualizacion de la columna PESO de 4.21 a 4.20.Actualizacion de la columna TALLA de 0.65 a 0.68.'),(192,'ACTUALIZACION DE DATOS EN LA TABLA CITAS','2023-12-09 18:24:08','Actualizacion de la columna FECHA de 2023-12-12 a 2023-12-13. Actualizacion de la columna HORA de 10:00 a 11:00. '),(193,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 18:28:03','Registro de la mascota Laika identificado con el codigo paciente PE-09 de especie Perro y de raza Laika, con fecha de nacimiento 2015-07-14. La mascota de color Blanco con cafe de edad 8 años 4 mesesde estatura 1.31 de peso 10.43 y que presenta los sintomas de Dolor en las extremidades'),(194,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 18:29:11','Registro de la mascota Pluto identificado con el codigo paciente PE-10 de especie Perro y de raza Basset Hound, con fecha de nacimiento 2016-05-13. La mascota de color Mostaza de edad 7 años 6 mesesde estatura 1.08 de peso 9.56 y que presenta los sintomas de Malestar digestivo'),(195,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-09 18:31:10','Registro de la mascota Sidny identificado con el codigo paciente HA-01 de especie Hamster y de raza Hula, con fecha de nacimiento 2022-09-12. La mascota de color Blanco de edad 1 años 2 mesesde estatura 0.45 de peso 3.45 y que presenta los sintomas de Alergia'),(196,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-09 18:31:27','Actualizacion de la columna EDAD de 7 años 1 mes a 7 años 1 meses. '),(197,'INGRESO DE DATOS EN LA TABLA CITA','2023-12-09 18:34:12','Registro de cita del señor(a) Lucas identificado con DNI 23112121 con telefono 992273281 y correo lucas.paredes@gmail.com para el dia 2023-12-13 a las 15:00 horas. Para tratar a su mascota identificado con el codigo PE-05 de paciente que presenta los sintomas de Alergia'),(198,'INGRESO DE DATOS EN LA TABLA CITA','2023-12-09 18:38:24','Registro de cita del señor(a) German identificado con DNI 23891064 con telefono 901289112 y correo german.gonzales@gmail.com para el dia 2023-12-11 a las 18:00 horas. Para tratar a su mascota identificado con el codigo PE-03 de paciente que presenta los sintomas de Dolor en las extremidades'),(199,'INGRESO DE DATOS EN LA TABLA CITA','2023-12-09 18:40:36','Registro de cita del señor(a) Lucas identificado con DNI 23891064 con telefono 992273281 y correo  para el dia 2023-12-15 a las 10:00 horas. Para tratar a su mascota identificado con el codigo PE-05 de paciente que presenta los sintomas de Alergia'),(200,'ELIMINACION DE DATOS EN LA TABLA CITA','2023-12-09 18:41:55','Se elimino el registro con el identificador DNI = 23891064'),(201,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-09 18:43:28','Registro del tratamiento TR-CAT-R-PE de tipo Reposo. Para la mascota identificado con el codigo paciente  PE-01 ademas, tiene un costo de 45.00 soles y con un tiempo de 5 dias .'),(202,'INGRESO DE DATOS EN LA TABLA HISTORIAL','2023-12-09 18:43:46','Registro del historial HIS-PE-02 de la mascota identificado con el codigo paciente PE-01 y su tratamiento identificado con el codigo tratamiento TR-CAT-R-PE'),(203,'ACTUALIZACION DE DATOS EN LA TABLA CITAS','2023-12-09 18:56:19','Actualizacion de la columna DNI de 23112121 a 23894121. '),(204,'INGRESO DE DATOS EN LA TABLA CITA','2023-12-09 18:57:21','Registro de cita del señor(a) Jose identificado con DNI 32764510 con telefono 964497718 y correo jose.carrillo@gmail.com para el dia 2023-12-14 a las 17:00 horas. Para tratar a su mascota identificado con el codigo PE-04 de paciente que presenta los sintomas de Alergia'),(205,'INGRESO DE DATOS EN LA TABLA CITA','2023-12-10 10:00:30','Registro de cita del señor(a) Keylee identificado con DNI 34128921 con telefono 964497718 y correo keylee.angeles@gmail.com para el dia 2023-12-13 a las 14:00 horas. Para tratar a su mascota identificado con el codigo GA-01 de paciente que presenta los sintomas de Alergia'),(206,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-10 10:04:57','Registro del señor(a) Any identificado con DNI 36787531 con telefono 958418287 de edad 24 años. Ademas, dueño de la mascota identificado con el codigo de paciente GA-02'),(207,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-10 10:05:44','Registro del señor(a) Amy identificado con DNI 36787532 con telefono 980575585 de edad 24 años. Ademas, dueño de la mascota identificado con el codigo de paciente GA-02'),(208,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-10 10:06:14','Actualizacion de la columna RAZA de Americano a Siames.'),(209,'ACTUALIZACION DE DATOS EN LA TABLA DUEÑO','2023-12-10 10:06:44','Actualizacion de la columna DNI de 21323121 a 21323171. '),(210,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-10 10:09:26','Registro del tratamiento TR-CAT-D-PE de tipo Chequeo General. Para la mascota identificado con el codigo paciente  PE-03 ademas, tiene un costo de 230.00 soles y con un tiempo de 7 dias .'),(211,'INGRESO DE DATOS EN LA TABLA HISTORIAL','2023-12-10 10:09:51','Registro del historial HIS-PE-03 de la mascota identificado con el codigo paciente PE-03 y su tratamiento identificado con el codigo tratamiento TR-CAT-D-PE'),(213,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 10:48:45','Registro del personal Gabriel identificado con DNI 10103421 con cargo de Veterinario y de edad 26 en el turno de  Tarde-Noche'),(214,'ACTUALIZACION DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:31:18','Actualizacion de la columna CARGO de Veterinario a Veterinario(a). '),(215,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:35:49','Registro del personal Manuel identificado con DNI 23017634 con cargo de Veterinario(a) y de edad 45 en el turno de  Mañana-Tarde'),(216,'ACTUALIZACION DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:38:31','Actualizacion de la columna EDAD de 26 a 24. '),(218,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:43:54','Registro del personal Jackeline identificado con DNI 34101751 con cargo de Veterinario(a) y de edad 24 en el turno de  Tarde-Noche'),(219,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:45:06','Registro del personal Moises identificado con DNI 40562321 con cargo de Veterinario(a) y de edad 45 en el turno de  Mañana-Tarde'),(220,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:45:34','Registro del personal Ana identificado con DNI 45437805 con cargo de Asistente(a) y de edad 25 en el turno de  Tarde-Noche'),(221,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:46:05','Registro del personal Daniel identificado con DNI 45457892 con cargo de Auxiliar y de edad 20 en el turno de  Tarde-Noche'),(222,'INGRESO DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:47:16','Registro del personal Camila identificado con DNI 07340916 con cargo de Recepcionista y de edad 18 en el turno de  Mañana-Tarde'),(223,'ACTUALIZACION DE DATOS EN LA TABLA PERSONAL','2023-12-10 11:48:26','Actualizacion de la columna EDAD de 24 a 20. '),(224,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-10 11:50:53','Registro de la mascota Snoopy identificado con el codigo paciente PE-11 de especie Perro y de raza Beagle, con fecha de nacimiento 2017-04-18. La mascota de color Blanco de edad 6 años 7 mesesde estatura 0.76 de peso 7.23 y que presenta los sintomas de Resfriado'),(225,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-10 11:53:14','Registro de la mascota Lassie identificado con el codigo paciente PE-12 de especie Perro y de raza Collie, con fecha de nacimiento 2017-03-12. La mascota de color Blanco con cafe de edad 6 años 8 mesesde estatura 1.35 de peso 13.41 y que presenta los sintomas de '),(226,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-10 11:54:28','Registro de la mascota Gigia identificado con el codigo paciente PE-13 de especie Perro y de raza Schanauzer, con fecha de nacimiento 2012-10-10. La mascota de color Sal y Pimienta de edad 11 años 2 mesesde estatura 0.97 de peso 10.45 y que presenta los sintomas de Malestar digestivo'),(227,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-11 10:06:43','Registro de la mascota Marley identificado con el codigo paciente PE-14 de especie Perro y de raza Husky Siberiano, con fecha de nacimiento 2018-12-06. La mascota de color Blanco de edad 5 años 0 mesesde estatura 1.13 de peso 10.45 y que presenta los sintomas de Fiebre'),(228,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-11 10:08:07','Registro de la mascota Katrina identificado con el codigo paciente PE-15 de especie Perro y de raza Hula, con fecha de nacimiento 2013-02-14. La mascota de color Negro de edad 10 años 9 mesesde estatura 0.89 de peso 8.56 y que presenta los sintomas de Alergia'),(229,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-11 10:09:27','Registro de la mascota Thor identificado con el codigo paciente PE-16 de especie Perro y de raza Golden, con fecha de nacimiento 2017-04-17. La mascota de color Dorado de edad 6 años 7 mesesde estatura 1.32 de peso 11.34 y que presenta los sintomas de '),(230,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-11 10:13:28','Registro del tratamiento TR-CAT-A-GA de tipo Chequeo General. Para la mascota identificado con el codigo paciente  GA-01 ademas, tiene un costo de 160.00 soles y con un tiempo de 4 dias .'),(231,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-11 10:13:28','Registro del tratamiento TR-CAT-R-GA de tipo Reposo. Para la mascota identificado con el codigo paciente  GA-02 ademas, tiene un costo de 60.00 soles y con un tiempo de 5 dias .'),(232,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-11 10:13:28','Registro del tratamiento TR-CAT-A-HA de tipo Chequeo General. Para la mascota identificado con el codigo paciente  HA-01 ademas, tiene un costo de 130.00 soles y con un tiempo de 4 dias .'),(233,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-11 10:15:56','Registro del tratamiento TR-CAT-A-PE de tipo Chequeo General. Para la mascota identificado con el codigo paciente  PE-04 ademas, tiene un costo de 145.00 soles y con un tiempo de 4 dias .'),(234,'INGRESO DE DATOS EN LA TABLA TRATAMIENTO','2023-12-11 10:15:56','Registro del tratamiento TR-CAT-N-GA de tipo Spa Limpieza. Para la mascota identificado con el codigo paciente  GA-05 ademas, tiene un costo de 30.00 soles y con un tiempo de 1 dia .'),(235,'INGRESO DE DATOS EN LA TABLA HISTORIAL','2023-12-11 10:16:55','Registro del historial HIS-PE-04 de la mascota identificado con el codigo paciente PE-04 y su tratamiento identificado con el codigo tratamiento TR-CAT-A-PE'),(236,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-11 14:39:41','Registro de la mascota Sam identificado con el codigo paciente PE-17 de especie Perro y de raza Pastor Ovejero, con fecha de nacimiento 2011-09-12. La mascota de color Negro de edad 12 años 2 mesesde estatura 1.45 de peso 16.34 y que presenta los sintomas de Alergia'),(237,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-11 14:53:27','Actualizacion de la columna RAZA de Kai Ken a Sabueso polaco.Actualizacion de la columna FEC_NACIMIENTO de 2015-03-13 a 2016-02-11. Actualizacion de la columna TALLA de 0.89 a 0.95. Actualizacion de la columna EDAD de 8 años 8 meses a 7 años 10 meses. '),(238,'ELIMINACION DE DATOS EN LA TABLA PACIENTE','2023-12-11 16:34:31','Se elimino el registro con el identificador IDPACIENTE = PE-08'),(239,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-11 19:18:28','Registro del señor(a) Estefani identificado con DNI 45452193 con telefono 992391821 de edad 20 años. Ademas, dueño de la mascota identificado con el codigo de paciente HA-01'),(240,'INGRESO DE DATOS EN LA TABLA DUEÑO','2023-12-11 19:20:32','Registro del señor(a) Johan identificado con DNI 29187056 con telefono 945230959 de edad 18 años. Ademas, dueño de la mascota identificado con el codigo de paciente GA-03'),(241,'ACTUALIZACION DE DATOS EN LA TABLA DUEÑO','2023-12-11 19:27:42','Actualizacion de la columna NOMBRE de Johan a Pedro. '),(242,'ELIMINACION DE DATOS EN LA TABLA DUEÑO','2023-12-11 19:28:50','Se elimino el registro con el identificador DNI = 29187056'),(243,'ACTUALIZACION DE DATOS EN LA TABLA DUEÑO','2023-12-11 19:55:53','Actualizacion de la columna DNI de 06318181 a 50152560. '),(244,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-11 19:59:00','Actualizacion de la columna IDPACIENTE de PE-05 a PE-25. '),(245,'ELIMINACION DE DATOS EN LA TABLA PACIENTE','2023-12-11 20:05:58','Se elimino el registro con el identificador IDPACIENTE = PE-01'),(246,'INGRESO DE DATOS EN LA TABLA PACIENTE','2023-12-11 20:18:41','Registro de la mascota Hachi identificado con el codigo paciente PE-01 de especie Perro y de raza Husky Siberiano, con fecha de nacimiento 2016-10-16. La mascota de color Blanco con negro de edad 7 años 1 mesesde estatura 1.14 de peso 12.45 y que presenta los sintomas de Resfriado'),(247,'ACTUALIZACION DE DATOS EN LA TABLA PACIENTE','2023-12-12 10:32:34','Actualizacion de la columna IDPACIENTE de PE-25 a PE-05. ');
/*!40000 ALTER TABLE `dbregistros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dueño`
--

DROP TABLE IF EXISTS `dueño`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dueño` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `idpaciente` varchar(45) NOT NULL,
  `edad` int DEFAULT NULL,
  `telefono` varchar(9) NOT NULL,
  PRIMARY KEY (`dni`,`idpaciente`),
  KEY `idx_dueño` (`idpaciente`),
  CONSTRAINT `fk_dueño_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dueño`
--

LOCK TABLES `dueño` WRITE;
/*!40000 ALTER TABLE `dueño` DISABLE KEYS */;
INSERT INTO `dueño` VALUES ('21323171','Joe','PE-02',40,'909821192'),('23891064','German','PE-03',18,'901289112'),('23894121','Lucas','PE-05',26,'992273281'),('32764510','Jose','PE-04',24,'992371221'),('34128921','Keylee','GA-01',30,'964497718'),('36787531','Any','GA-02',24,'958418287'),('36787532','Amy','GA-02',24,'980575585'),('45452193','Estefani','HA-01',20,'992391821');
/*!40000 ALTER TABLE `dueño` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_dueño` AFTER INSERT ON `dueño` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA DUEÑO', now(), concat('Registro del señor(a) ',
new.`nombre`,' identificado con DNI ',new.`dni`,' con telefono ',new.`telefono`,' de edad ',
new.`edad`,' años. Ademas, dueño de la mascota identificado con el codigo de paciente ',new.`idpaciente`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_dueño` AFTER UPDATE ON `dueño` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`dni` <> old.`dni` ,concat('Actualizacion de la columna DNI de ',old.`dni`, ' a ',new.`dni`, '. '), ""),
if (new.`nombre` <> old.`nombre` ,concat('Actualizacion de la columna NOMBRE de ',old.`nombre`, ' a ',new.`nombre`, '. '), ""),
if (new.`idpaciente` <> old.`idpaciente` ,concat('Actualizacion de la columna IDPACIENTE de ',old.`idpaciente`, ' a ',new.`idpaciente`, '. '), ""),
if (new.`edad` <> old.`edad` ,concat('Actualizacion de la columna EDAD de ',old.`edad`, ' a ',new.`edad`, '. '), ""),
if (new.`telefono` <> old.`telefono` ,concat('Actualizacion de la columna TELEFONO de ',old.`telefono`, ' a ',new.`telefono`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA DUEÑO', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_dueño` AFTER DELETE ON `dueño` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA DUEÑO', now(), concat('Se elimino el registro con el identificador DNI = ',old.`dni`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historial` (
  `idhistorial` varchar(45) NOT NULL,
  `idpaciente` varchar(45) NOT NULL,
  `idtratamiento` varchar(45) NOT NULL,
  PRIMARY KEY (`idhistorial`),
  KEY `idx_historial` (`idtratamiento`),
  KEY `idx_historial1` (`idpaciente`),
  CONSTRAINT `fk_historial_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_historial_tratamiento` FOREIGN KEY (`idtratamiento`) REFERENCES `tratamiento` (`idtratamiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES ('HIS-PE-01','PE-02','TR-CAT-A-PE'),('HIS-PE-03','PE-03','TR-CAT-D-PE'),('HIS-PE-04','PE-04','TR-CAT-A-PE');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_historial` AFTER INSERT ON `historial` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA HISTORIAL', now(), concat('Registro del historial ',
new.`idhistorial`,' de la mascota identificado con el codigo paciente ',
new.`idpaciente`,' y su tratamiento identificado con el codigo tratamiento ',new.`idtratamiento`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_historial` AFTER UPDATE ON `historial` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`idhistorial` <> old.`idhistorial` ,concat('Actualizacion de la columna IDHISTORIAL de ',old.`idhistorial`, ' a ',new.`idhistorial`, '. '), ""),
if (new.`idpaciente` <> old.`idpaciente` ,concat('Actualizacion de la columna IDPACIENTE de ',old.`idpaciente`, ' a ',new.`idpaciente`, '. '), ""),
if (new.`idtratamiento` <> old.`idtratamiento` ,concat('Actualizacion de la columna IDTRATAMIENTO de ',old.`idtratamiento`, ' a ',new.`idtratamiento`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA HISTORIAL', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_historial` AFTER DELETE ON `historial` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA HISTORIAL', now(), concat('Se elimino el registro con el identificador IDHISTORIAL = ',old.`idhistorial`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento` (
  `idmedicamento` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `stock` int NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fec_elab` date NOT NULL,
  `fec_venc` date NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  PRIMARY KEY (`idmedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
INSERT INTO `medicamento` VALUES ('MED-LT20300','ACEDERM SPRAY',15,'Antinflamatorio, problemas de piel, shampoo medicado x 20ml','2021-12-24','2026-12-24',48.00),('MED-LT20305','Acido Hipocloroso ECADERM',8,'Antibiotico, limpiador Otico, problemas de piel, shampoo medicado x 120ml','2022-03-10','2027-03-10',35.00),('MED-LT20310','Andavix Pipeta',6,'Antiparasitario, antipulgas, pipeta 10-25kg','2023-02-14','2026-02-14',53.00),('MED-LT20315','ADITIVO Agua Tropiclean',8,'Agua Tropiclean gato x 236ml','2019-12-24','2024-12-24',35.00),('MED-LT20320','ADVANTAGE GATO',2,'Antipulgas de 4-8kg - bayer','2023-05-16','2028-05-16',48.00),('MED-LT20325','ANTIBIOTICO BUCAL',4,'Antibiotico bucal triton x 01 tableta','2021-12-24','2026-12-24',6.50),('MED-LT20330','APETIL',10,'APETIL Holliday x 10ml','2020-02-13','2025-02-13',51.00),('MED-LT30305','Acido Hipocloro ECADERM',9,'Antinflamatorio, problemas de piel, shampoo medicado x 500ml','2021-12-24','2026-12-24',64.00),('MED-LT30310','Andavix Pipeta',5,'Antiparasitario, antipulgas, pipeta 25-40kg','2023-02-14','2026-02-14',59.00),('MED-LT40100','Rimadyl carprofeno',18,'Alivio del dolor e inflamacion en perros','2023-12-09','2028-11-21',55.00),('MED-LT40105','Benadryl (difenhidramina)',10,'Antihistaminico para alivio alergias perros y gatos','2023-12-09','2028-11-21',79.00),('MED-LT40110','Frontline fipronil',12,'Antiinflamatorio para aliviar el dolor en perros y gatos','2023-12-09','2028-11-21',34.00),('MED-LT40115','Metacam meloxicam',14,'Prevencion de infestaciones pulgas y garrapatas','2023-12-09','2028-11-21',45.00),('MED-LT40120','Revolution selamectina',14,'Medicamento topico previene infestaciones pulgas, garrapatas, acaros y parasitos','2023-12-09','2028-11-21',45.00),('MED-LT40310','Andavix Pipeta',5,'Antiparasitario, antipulgas, pipeta 4-10kg','2023-02-14','2026-02-14',50.00);
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_medicamento` AFTER INSERT ON `medicamento` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA MEDICAMENTO', now(), concat('Registro del medicamento ',
new.`nombre`,' identificado con el codigo ',new.`idmedicamento`,' con precio ',new.`precio`,' soles y con descripcion ',
new.`descripcion`,'. Datos adicionales: Se registro ',new.`stock`,' unidades y tiene fecha de elaboracion ',
new.`fec_elab`,' y fecha de vencimiento ',new.`fec_venc`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_medicamento` AFTER UPDATE ON `medicamento` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`idmedicamento` <> old.`idmedicamento` ,concat('Actualizacion de la columna IDMEDICAMENTO de ',old.`idmedicamento`, ' a ',new.`idmedicamento`, '. '), ""),
if (new.`nombre` <> old.`nombre` ,concat('Actualizacion de la columna NOMBRE de ',old.`nombre`, ' a ',new.`nombre`, '. '), ""),
if (new.`stock` <> old.`stock` ,concat('Actualizacion de la columna STOCK de ',old.`stock`, ' a ',new.`stock`, '. '), ""),
if (new.`descripcion` <> old.`descripcion` ,concat('Actualizacion de la columna DESCRIPCION de ',old.`descripcion`, ' a ',new.`descripcion`, '. '), ""),
if (new.`fec_elab` <> old.`fec_elab` ,concat('Actualizacion de la columna FEC_ELAB de ',old.`fec_elab`, ' a ',new.`fec_elab`, '. '), ""),
if (new.`fec_venc` <> old.`fec_venc` ,concat('Actualizacion de la columna FEC_VENC de ',old.`fec_venc`, ' a ',new.`fec_venc`, '. '), ""),
if (new.`precio` <> old.`precio` ,concat('Actualizacion de la columna TIPO de ',old.`precio`, ' a ',new.`precio`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA MEDICAMENTO', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_medicamento` AFTER DELETE ON `medicamento` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA MEDICAMENTO', now(), concat('Se elimino el registro con el identificador IDMEDICAMENTO = ',old.`idmedicamento`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `idpaciente` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `especie` varchar(45) NOT NULL,
  `raza` varchar(45) DEFAULT NULL,
  `fec_nacimiento` date NOT NULL,
  `color` varchar(45) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `talla` decimal(5,2) NOT NULL,
  `edad` varchar(45) NOT NULL,
  `sintomas` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES ('GA-01','Tian','Gato','Maine','2020-07-01','Blanco Manchado',4.20,0.68,'3 años 5 meses','Alergia'),('GA-02','Max','Gato','Siames','2021-02-07','Blanco Manchado',5.31,0.72,'2 años 10 meses','Resfriado'),('GA-03','Maxi','Gato','Maine Coon','2019-09-06','Blanco con negro',4.50,0.71,'4 años 3 meses','Alergia'),('GA-04','Kitty','Gato','Comun Europeo','2018-04-13','Cafe claro',4.20,0.69,'5 años 7 meses','Fiebre'),('GA-05','Tom','Gato','Azul Ruso','2020-01-18','Azul con blanco',4.90,0.65,'3 años 10 meses',''),('HA-01','Sidny','Hamster','Hula','2022-09-12','Blanco',3.45,0.45,'1 años 2 meses','Alergia'),('PE-01','Hachi','Perro','Husky Siberiano','2016-10-16','Blanco con negro',12.45,1.14,'7 años 1 meses','Resfriado'),('PE-02','Voika','Perro','Sabueso polaco','2016-02-11','Marron',10.21,0.95,'7 años 10 meses','Alergia'),('PE-03','Pool','Perro','Sabueso polaco','2016-11-26','Marron con negro',14.34,1.24,'7 años 0 meses','Dolor en las extremidades'),('PE-04','Chino','Perro','Schanauzer','2021-11-26','Sal y Pimienta',4.51,0.67,'2 años 0 meses','Alergia'),('PE-05','Chester','Perro','Pastor Ovejero','2013-06-15','Blanco con cafe',12.45,1.24,'10 años 5 meses','Alergia'),('PE-06','Toby','Perro','Gran Danes','2011-12-04','Blanco',15.34,1.34,'11 años 11 meses','Alergia'),('PE-07','Hachiko','Perro','Dalmata','2014-08-06','Blanco con negro',8.56,1.21,'9 años 4 meses','Resfriado'),('PE-09','Laika','Perro','Laika','2015-07-14','Blanco con cafe',10.43,1.31,'8 años 4 meses','Dolor en las extremidades'),('PE-10','Pluto','Perro','Basset Hound','2016-05-13','Mostaza',9.56,1.08,'7 años 6 meses','Malestar digestivo'),('PE-11','Snoopy','Perro','Beagle','2017-04-18','Blanco',7.23,0.76,'6 años 7 meses','Resfriado'),('PE-12','Lassie','Perro','Collie','2017-03-12','Blanco con cafe',13.41,1.35,'6 años 8 meses',''),('PE-13','Gigia','Perro','Schanauzer','2012-10-10','Sal y Pimienta',10.45,0.97,'11 años 2 meses','Malestar digestivo'),('PE-14','Marley','Perro','Husky Siberiano','2018-12-06','Blanco',10.45,1.13,'5 años 0 meses','Fiebre'),('PE-15','Katrina','Perro','Hula','2013-02-14','Negro',8.56,0.89,'10 años 9 meses','Alergia'),('PE-16','Thor','Perro','Golden','2017-04-17','Dorado',11.34,1.32,'6 años 7 meses',''),('PE-17','Sam','Perro','Pastor Ovejero','2011-09-12','Negro',16.34,1.45,'12 años 2 meses','Alergia');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_paciente` AFTER INSERT ON `paciente` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA PACIENTE', now(), concat('Registro de la mascota ',
new.`nombre`,' identificado con el codigo paciente ',new.`idpaciente`,' de especie ',new.`especie`,' y de raza ',
new.`raza`,', con fecha de nacimiento ',new.`fec_nacimiento`,'. La mascota de color ',
new.`color`,' de edad ',new.`edad`, 'de estatura ',new.`talla`,' de peso ',new.`peso`,' y que presenta los sintomas de ',
new.`sintomas`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_paciente` AFTER UPDATE ON `paciente` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`idpaciente` <> old.`idpaciente`, concat('Actualizacion de la columna IDPACIENTE de ',old.`idpaciente`, ' a ',new.`idpaciente`, '. '), ""),
if (new.`nombre` <> old.`nombre` , concat('Actualizacion de la columna NOMBRE de ',old.`nombre`, ' a ',new.`nombre`, '. '), ""),
if (new.`especie` <> old.`especie` , concat('Actualizacion de la columna ESPECIE de ',old.`especie`, ' a ',new.`especie`, '. '), ""),
if (new.`raza` <> old.`raza` , concat('Actualizacion de la columna RAZA de ',old.`raza`, ' a ',new.`raza`, '.'), ""),
if (new.`fec_nacimiento` <> old.`fec_nacimiento` , concat('Actualizacion de la columna FEC_NACIMIENTO de ',old.`fec_nacimiento`, ' a ',new.`fec_nacimiento`, '. '), ""),
if (new.`color` <> old.`color` , concat('Actualizacion de la columna COLOR de ',old.`color`, ' a ',new.`color`, '. '), ""),
if (new.`peso` <> old.`peso` , concat('Actualizacion de la columna PESO de ',old.`peso`, ' a ',new.`peso`, '. '), ""),
if (new.`talla` <> old.`talla` , concat('Actualizacion de la columna TALLA de ',old.`talla`, ' a ',new.`talla`, '. '), ""),
if (new.`edad` <> old.`edad` , concat('Actualizacion de la columna EDAD de ',old.`edad`, ' a ',new.`edad`, '. '), ""),
if (new.`sintomas` <> old.`sintomas` , concat('Actualizacion de la columna SINTOMAS de ',old.`sintomas`, ' a ',new.`sintomas`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA PACIENTE', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_paciente` AFTER DELETE ON `paciente` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA PACIENTE', now(), concat('Se elimino el registro con el identificador IDPACIENTE = ',old.`idpaciente`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `edad` int DEFAULT NULL,
  `turno` varchar(45) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES ('07340916','Camila','Recepcionista',18,'Mañana-Tarde'),('10103421','Gabriel','Veterinario(a)',24,'Tarde-Noche'),('23017634','Manuel','Veterinario(a)',45,'Mañana-Tarde'),('34101751','Jackeline','Veterinario(a)',20,'Tarde-Noche'),('40562321','Moises','Veterinario(a)',45,'Mañana-Tarde'),('45437805','Ana','Asistente(a)',25,'Tarde-Noche'),('45457892','Daniel','Auxiliar',20,'Tarde-Noche');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_personal` AFTER INSERT ON `personal` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA PERSONAL', now(), concat('Registro del personal ',
new.`nombre`,' identificado con DNI ',new.`dni`,' con cargo de ',new.`cargo`,' y de edad ',
new.`edad`,' en el turno de  ',new.`turno`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_personal` AFTER UPDATE ON `personal` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`dni` <> old.`dni` ,concat('Actualizacion de la columna DNI de ',old.`dni`, ' a ',new.`dni`, '. '), ""),
if (new.`nombre` <> old.`nombre` ,concat('Actualizacion de la columna NOMBRE de ',old.`nombre`, ' a ',new.`nombre`, '. '), ""),
if (new.`cargo` <> old.`cargo` ,concat('Actualizacion de la columna CARGO de ',old.`cargo`, ' a ',new.`cargo`, '. '), ""),
if (new.`edad` <> old.`edad` ,concat('Actualizacion de la columna EDAD de ',old.`edad`, ' a ',new.`edad`, '. '), ""),
if (new.`turno` <> old.`turno` ,concat('Actualizacion de la columna TURNO de ',old.`turno`, ' a ',new.`turno`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA PERSONAL', now(), @actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_personal` AFTER DELETE ON `personal` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA PERSONAL', now(), concat('Se elimino el registro con el identificador DNI = ',old.`dni`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tratamiento` (
  `idtratamiento` varchar(45) NOT NULL,
  `idpaciente` varchar(45) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `costo` decimal(7,2) NOT NULL,
  `tiempo` varchar(45) NOT NULL,
  PRIMARY KEY (`idtratamiento`,`idpaciente`),
  KEY `idx_tratamiento` (`idpaciente`),
  CONSTRAINT `fk_tratamiento_paciente` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`idpaciente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamiento`
--

LOCK TABLES `tratamiento` WRITE;
/*!40000 ALTER TABLE `tratamiento` DISABLE KEYS */;
INSERT INTO `tratamiento` VALUES ('TR-CAT-A-GA','GA-01','Chequeo General',160.00,'4 dias'),('TR-CAT-A-HA','HA-01','Chequeo General',130.00,'4 dias'),('TR-CAT-A-PE','PE-02','Chequeo General',145.00,'4 dias'),('TR-CAT-A-PE','PE-04','Chequeo General',145.00,'4 dias'),('TR-CAT-D-PE','PE-03','Chequeo General',230.00,'7 dias'),('TR-CAT-N-GA','GA-05','Spa Limpieza',30.00,'1 dia'),('TR-CAT-R-GA','GA-02','Reposo',60.00,'5 dias');
/*!40000 ALTER TABLE `tratamiento` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `registrar_tratamiento` AFTER INSERT ON `tratamiento` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('INGRESO DE DATOS EN LA TABLA TRATAMIENTO', now(), concat('Registro del tratamiento ',
new.`idtratamiento`,' de tipo ',new.`tipo`,'. Para la mascota identificado con el codigo paciente  ',new.`idpaciente`,' ademas, tiene un costo de ',
new.`costo`,' soles y con un tiempo de ',new.`tiempo`,' .'));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `actualizar_tratamiento` AFTER UPDATE ON `tratamiento` FOR EACH ROW begin
set @actualizaciones = CONCAT (
if (new.`idtratamiento` <> old.`idtratamiento` ,concat('Actualizacion de la columna IDTRATAMIENTO de ',old.`idtratamiento`, ' a ',new.`idtratamiento`, '. '), ""),
if (new.`idpaciente` <> old.`idpaciente` ,concat('Actualizacion de la columna IDPACIENTE de ',old.`idpaciente`, ' a ',new.`idpaciente`, '. '), ""),
if (new.`tipo` <> old.`tipo` ,concat('Actualizacion de la columna TIPO de ',old.`tipo`, ' a ',new.`tipo`, '. '), ""),
if (new.`costo` <> old.`costo` ,concat('Actualizacion de la columna COSTO de ',old.`costo`, ' a ',new.`costo`, '. '), ""),
if (new.`tiempo` <> old.`tiempo` ,concat('Actualizacion de la columna TIEMPO de ',old.`tiempo`, ' a ',new.`tiempo`, '. '), ""));
insert into dbregistros (accion, fecha, descripcion) values
('ACTUALIZACION DE DATOS EN LA TABLA TRATAMIENTO', now(), actualizaciones);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`personal`@`localhost`*/ /*!50003 TRIGGER `eliminar_tratamiento` AFTER DELETE ON `tratamiento` FOR EACH ROW begin insert into dbregistros (accion, fecha, descripcion) values
('ELIMINACION DE DATOS EN LA TABLA TRATAMIENTO', now(), concat('Se elimino el registro con el identificador IDTRATAMIENTO = ',old.`idtratamiento`));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(15) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Sebastian','ian.cp1695@gmail.com','IanCP','12345'),(3,'Moises','moises.atencio@gmail.com','matencioca','12345');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'veterinaria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-12 10:49:44
