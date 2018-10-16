-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: wypozyczalnia
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `miasta`
--

DROP TABLE IF EXISTS `miasta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miasta` (
  `ID_Miasto` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Nazwa` char(40) DEFAULT NULL,
  PRIMARY KEY (`ID_Miasto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miasta`
--

LOCK TABLES `miasta` WRITE;
/*!40000 ALTER TABLE `miasta` DISABLE KEYS */;
INSERT INTO `miasta` VALUES (1,'Gdansk'),(2,'Gdynia'),(3,'Warszawa');
/*!40000 ALTER TABLE `miasta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `samochody`
--

DROP TABLE IF EXISTS `samochody`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `samochody` (
  `ID_Samochod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Marka` char(20) NOT NULL,
  `Model` char(20) NOT NULL,
  `Rocznik` int(4) NOT NULL,
  PRIMARY KEY (`ID_Samochod`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `samochody`
--

LOCK TABLES `samochody` WRITE;
/*!40000 ALTER TABLE `samochody` DISABLE KEYS */;
INSERT INTO `samochody` VALUES (1,'Renault','Clio',2018),(2,'Volkswagen','Golf V',2017),(3,'Opel','Astra',2018);
/*!40000 ALTER TABLE `samochody` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `ID_Status` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `Status` char(11) NOT NULL,
  PRIMARY KEY (`ID_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Dostepny'),(2,'Wypozyczony'),(3,'Niedostepny');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_samochod`
--

DROP TABLE IF EXISTS `status_samochod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_samochod` (
  `ID_Status_Samochod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ID_Samochod` int(10) unsigned NOT NULL,
  `ID_Miasto` tinyint(3) unsigned NOT NULL,
  `ID_Status` tinyint(1) unsigned NOT NULL,
  `Data_wyp` date DEFAULT NULL,
  `Data_zwr` date DEFAULT NULL,
  PRIMARY KEY (`ID_Status_Samochod`),
  KEY `ID_Samochod` (`ID_Samochod`),
  KEY `ID_Miasto` (`ID_Miasto`),
  KEY `ID_Status` (`ID_Status`),
  CONSTRAINT `status_samochod_ibfk_1` FOREIGN KEY (`ID_Samochod`) REFERENCES `samochody` (`ID_Samochod`),
  CONSTRAINT `status_samochod_ibfk_2` FOREIGN KEY (`ID_Miasto`) REFERENCES `miasta` (`ID_Miasto`),
  CONSTRAINT `status_samochod_ibfk_3` FOREIGN KEY (`ID_Status`) REFERENCES `status` (`ID_Status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_samochod`
--

LOCK TABLES `status_samochod` WRITE;
/*!40000 ALTER TABLE `status_samochod` DISABLE KEYS */;
INSERT INTO `status_samochod` VALUES (2,1,1,1,'0000-00-00','0000-00-00'),(3,1,2,2,'2018-10-16','2018-10-20'),(4,3,2,3,'0000-00-00','0000-00-00');
/*!40000 ALTER TABLE `status_samochod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzytkownik`
--

DROP TABLE IF EXISTS `uzytkownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uzytkownik` (
  `ID_Uzytkownik` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Login` char(40) DEFAULT NULL,
  `Pass` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Uzytkownik`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzytkownik`
--

LOCK TABLES `uzytkownik` WRITE;
/*!40000 ALTER TABLE `uzytkownik` DISABLE KEYS */;
INSERT INTO `uzytkownik` VALUES (1,'testowe','99e016e282808d04b885aea87973ea2cb3ad38a3',NULL),(2,'testowe2','9d79f238840f769533f7cecaf16f32575c28ba67','123456'),(3,'testowe23','7c4a8d09ca3762af61e59520943dc26494f8941b','test@test.pl');
/*!40000 ALTER TABLE `uzytkownik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-16 23:58:18
