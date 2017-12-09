-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: upperlimit
-- ------------------------------------------------------
-- Server version	5.7.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carinfo`
--

DROP TABLE IF EXISTS `carinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carinfo` (
  `carId` int(11) NOT NULL AUTO_INCREMENT,
  `clientId` int(11) NOT NULL,
  `manufacturer` varchar(45) NOT NULL,
  `modelYear` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `value` decimal(15,5) NOT NULL,
  `picture1` longblob,
  `picture2` longblob,
  PRIMARY KEY (`carId`),
  KEY `fk_CarInfo_Client1_idx` (`clientId`),
  CONSTRAINT `fk_CarInfo_Client1` FOREIGN KEY (`clientId`) REFERENCES `client` (`clientId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carinfo`
--

LOCK TABLES `carinfo` WRITE;
/*!40000 ALTER TABLE `carinfo` DISABLE KEYS */;
INSERT INTO `carinfo` VALUES (1,1,'test','test','test',1444.00000,NULL,NULL),(2,1,'test','test','test',1444.00000,NULL,NULL);
/*!40000 ALTER TABLE `carinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `clientId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) NOT NULL,
  `firstName` varchar(700) NOT NULL,
  `lastName` varchar(700) NOT NULL,
  `picture` longblob,
  `addressLine1` varchar(45) NOT NULL,
  `addressLine2` varchar(45) DEFAULT NULL,
  `province` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `postalCode` varchar(20) DEFAULT NULL,
  `phoneNumber1` varchar(15) NOT NULL,
  `phoneNumber2` varchar(15) DEFAULT NULL,
  `email_address` varchar(45) NOT NULL,
  PRIMARY KEY (`clientId`),
  KEY `fk_Client_Agent_idx` (`employeeId`),
  CONSTRAINT `fk_Client_Agent` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (8,10001,'Amanda','Cerny',NULL,'Jazz Residences',NULL,'Manila','Makati',NULL,'09175925863',NULL,''),(9,10001,'Megan','Fox',NULL,'Manila Residences',NULL,'Manila','Malate',NULL,'09175925863',NULL,'');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(700) NOT NULL,
  `lastName` varchar(700) NOT NULL,
  `addressLine1` varchar(45) NOT NULL,
  `picture` longblob,
  `addressLine2` varchar(45) DEFAULT NULL,
  `phoneNumber1` varchar(45) NOT NULL,
  `phoneNumber2` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) NOT NULL,
  `password` varchar(15) NOT NULL,
  `isManager` tinyint(4) DEFAULT NULL,
  `managedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`employeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=10025 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (10001,'Randi','Roxas','Makati',NULL,NULL,'12345',NULL,'randi@gmail.com','randitoroxas',0,10014),(10002,'Kent','Regalado','Batangas',NULL,NULL,'67890',NULL,'kent@gmail.com','kentregs',0,10014),(10003,'Joe','Catarata','Paranaque',NULL,NULL,'11223',NULL,'joe@gmail.com','joesam',0,10014),(10004,'Karl','Cirilos','Manila',NULL,NULL,'44556',NULL,'karl@gmail.com','karlangelo',0,10014),(10005,'Naruto','Uzumaki','Hidden Leaf',NULL,NULL,'77889',NULL,'naruto@gmail.com','narutouzumaki',0,10014),(10014,'Edward','Tighe','EGI Taft Tower',NULL,NULL,'09175925863',NULL,'ed@gmail.com','0409',1,0),(10024,'Rachel','Roxas','Espana',NULL,NULL,'09996731517',NULL,'rachel@gmail.com','randi',0,10014);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `notifId` int(11) NOT NULL AUTO_INCREMENT,
  `employeeId` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `isRead` tinyint(4) NOT NULL,
  `timeCreated` datetime NOT NULL,
  `isApproved` tinyint(1) NOT NULL,
  PRIMARY KEY (`notifId`),
  KEY `employeeId_idx` (`employeeId`),
  CONSTRAINT `employeeId` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,10024,'Registration by: <br>Rachel Roxas',0,'2017-12-08 10:05:04',0),(2,10001,'Registration by: <br>Randito Roxas',0,'2017-12-08 10:05:12',0);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-08 18:50:46
