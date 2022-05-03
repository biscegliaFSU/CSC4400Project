-- MySQL dump 10.13  Distrib 8.0.28
--
-- Host: localhost    Database: restaurantdb
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE IF NOT EXISTS test; 
USE test;
--
-- Table structure for table `Employee`
--
DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `Employee ID` int NOT NULL,
  `First Name` varchar(45) DEFAULT NULL,
  `Last Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Job` varchar(45) DEFAULT NULL,
  `Currently Working` tinyint DEFAULT NULL,
  `Profile Picture Link` varchar(45) DEFAULT NULL,
  `Orders Fulfilled` int DEFAULT NULL,
  `Login ID` int DEFAULT NULL,
  PRIMARY KEY (`Employee ID`),
  KEY `Login ID_idx` (`Login ID`),
  CONSTRAINT `Login ID` FOREIGN KEY (`Login ID`) REFERENCES `login` (`Login ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Marcos ','Torres Capellan','mtorresc@student.fitchburgstate.edu','Cashier',1,'Link',1,1),(2,'Nicholas','Bisceglia','nbisceg1@student.fitchburgstate.edu','Dishwasher',1,'Link',1,2),(3,'Aaron','Leon Sandoval','aleonsan@student.fitchburgstate.edu','Manager',1,'Link',1,3);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `Login ID` int NOT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Security Question` varchar(45) DEFAULT NULL,
  `Security Answer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Login ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Marcos','Password','Favorite color?','Black'),(2,'Nicholas','Password','Favorite color?','Blue'),(3,'Aaron','Password','Favorite color?','Green');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `Item ID` int NOT NULL,
  `Item Name` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Picture Link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Item ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `Order ID` int NOT NULL,
  `Customer Name` varchar(45) DEFAULT NULL,
  `Customer Address` varchar(45) DEFAULT NULL,
  `Order Date` datetime DEFAULT NULL,
  `Oreder Status` int DEFAULT NULL,
  PRIMARY KEY (`Order ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order Detail`
--

DROP TABLE IF EXISTS `order detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order detail` (
  `Order Detail ID` int NOT NULL,
  `Item Quantity` int DEFAULT NULL,
  `Item ID` int DEFAULT NULL,
  `Order ID` int DEFAULT NULL,
  PRIMARY KEY (`Order Detail ID`),
  KEY `Item ID_idx` (`Item ID`),
  KEY `Order ID_idx` (`Order ID`),
  CONSTRAINT `Item ID` FOREIGN KEY (`Item ID`) REFERENCES `menu` (`Item ID`),
  CONSTRAINT `Order ID` FOREIGN KEY (`Order ID`) REFERENCES `order` (`Order ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order Detail`
--

LOCK TABLES `order detail` WRITE;
/*!40000 ALTER TABLE `order detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-27  0:39:23
