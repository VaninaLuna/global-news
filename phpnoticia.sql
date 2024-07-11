/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.4.28-MariaDB : Database - phpnoticia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpnoticia` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `phpnoticia`;

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(128) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `horarioAtencion` varchar(256) NOT NULL,
  `quienesSomos` varchar(1024) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `domicilio` varchar(256) NOT NULL,
  `email` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `empresa` */

insert  into `empresa`(`id`,`denominacion`,`telefono`,`horarioAtencion`,`quienesSomos`,`latitud`,`longitud`,`domicilio`,`email`) values (1,'Walmart S.A','011 231564','De 8:00 am a 21 pm','Empresa dedidaca al rubro alimenticio',12,10,'Chuquisaca 2350. Salta. Argentina','walmart@asfg.com'),(2,'pepsi','02616514342','10 a 12','empresa dedidaca a gaseosas',10,12,'asffc','vani.lunaa@gmail.com'),(5,'talca','123456','12 20','asdf',12,10,'oifsdkfj','asadf'),(6,'Nivea Sa','2616523145','de 20 a 3 am','una empresa de belleza',45.26,452.8526,'las peras 35120','nivea@hlskdoa.com');

/*Table structure for table `noticia` */

DROP TABLE IF EXISTS `noticia`;

CREATE TABLE `noticia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tituloNoticia` varchar(128) DEFAULT NULL,
  `resumenNoticia` varchar(1024) DEFAULT NULL,
  `imagenNoticia` varchar(128) DEFAULT NULL,
  `contenidoHTML` varchar(20480) DEFAULT NULL,
  `publicada` char(1) DEFAULT NULL,
  `fechaPublicacion` date DEFAULT NULL,
  `idEmpresa` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_empresa` (`idEmpresa`),
  CONSTRAINT `FK_empresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `noticia` */

insert  into `noticia`(`id`,`tituloNoticia`,`resumenNoticia`,`imagenNoticia`,`contenidoHTML`,`publicada`,`fechaPublicacion`,`idEmpresa`) values (12,'Llegar a la tercera edad','Los abuelos se suman a jugar para tener recreada la mente','anciano.jpg','<p>Con los juegos de estrategia se mantiene joven la mente</p>','N','2023-10-17',2),(13,'Home office','La nueva era','homePixar.jpg','<p>Trabajar desde casa es lo mejor para los jovenes</p>','Y','2023-10-17',2),(33,'Celulares feos','hay muchos celulares feos en el mercado','senales 1.png','<p>bnb</p>','Y','2024-05-22',1),(34,'Imagenes IA','bing crea imagenes perfectas','dragon_edit.png','cc','N','2024-04-19',1),(35,'Imagenes IA','a','senales3.png','ff','N','2024-04-10',1),(40,'Imagenes IA','veamos si funciona','senales4.png','dd','N','2024-04-18',1),(41,'prueba','a','senales3.png','<p>tes<strong>tsakjgnvna <u>fjgdkfslS </u><em><u>CKFJDSKFJGD VB</u></em></strong></p>','Y','2024-04-20',5),(42,'Imagenes IA','bing crea imagenes perfectas','senales2.png','<p>DSA A A A A AA <strong><em><u> A AA AAA </u></em></strong></p>','Y','2024-04-19',5),(43,'prueba','a','senales4.png','<p>asfcvm,xjcilkasj</p>','N','2024-04-24',6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
