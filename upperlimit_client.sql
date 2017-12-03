-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: upperlimit
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (2,10001,'Karl','Cirilos',NULL,'taft',NULL,'','',NULL,'132',NULL,''),(3,10001,'Joe','Catarata',NULL,'paranque',NULL,'','',NULL,'132',NULL,''),(4,10001,'kent','regs',NULL,'green residences',NULL,'malate','manila',NULL,'asd',NULL,''),(5,10001,'brent','mctallahan',NULL,'kahit',NULL,'saan','wala ako pake','222','132',NULL,''),(30,10001,'jonah','hill',NULL,'somewhere',NULL,'idk','lol','1566','bvlah',NULL,''),(31,10001,'dead','pool',NULL,'idk',NULL,'dis','lol','1566','bvlah',NULL,''),(34,10001,'Jacob','Doyle',NULL,'United States','Array','San Diego','San Diego','90210','999888777','444555666',''),(35,10001,'Rey','Romero',NULL,'United States',NULL,'San Diego','El Cajon','90210','999888777',NULL,''),(36,10001,'Rey','Romero',NULL,'United States',NULL,'San Diego','El Cajon','90210','999888777',NULL,''),(37,10001,'Karl','Cirilos',NULL,'United States','Array','New York','New York','1','999888777',NULL,''),(38,10001,'test','test',NULL,'manila',NULL,'testprov','testcity','123132','123456789',NULL,''),(39,10001,'test','test',NULL,'addresstest1','Array','testprov','testcity','123456','123456789','987654321',''),(40,10001,'testname','testlastname',NULL,'testaddress1','testaddress2','testprov','testcity','123456','123456789','987654321',''),(41,10001,'tesst','testlastname',NULL,'testaddress1','testaddress2','testprov','testcity','123','123456','7894651',''),(42,10001,'testname','test',NULL,'testaddress1','testaddress2','testprov','testcity','123','123456','321654','testemail2@gmail.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-03 14:37:46
