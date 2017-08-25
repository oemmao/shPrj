-- MySQL dump 10.13  Distrib 5.6.36, for Win64 (x86_64)
--
-- Host: localhost    Database: mytest
-- ------------------------------------------------------
-- Server version	5.6.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comment_test`
--

DROP TABLE IF EXISTS `comment_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_test` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `board_num` int(10) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `commentDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `deleteDate` datetime NOT NULL,
  `deleteCheck` varchar(1) NOT NULL DEFAULT 'F',
  PRIMARY KEY (`comment_id`),
  KEY `board_num` (`board_num`),
  CONSTRAINT `comment_test_ibfk_1` FOREIGN KEY (`board_num`) REFERENCES `boardtest` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_test`
--

LOCK TABLES `comment_test` WRITE;
/*!40000 ALTER TABLE `comment_test` DISABLE KEYS */;
INSERT INTO `comment_test` VALUES (2,5,'이디야','222','카라멜마끼아또 수정함','2017-08-14 16:33:10','2017-08-14 18:06:56','0000-00-00 00:00:00','F'),(4,2,'빅뱅','88','에라 모르겠다','2017-08-14 18:16:49','2017-08-14 18:16:49','0000-00-00 00:00:00','F'),(7,30,'tttt','tt','test','2017-08-18 19:30:40','2017-08-18 19:30:40','0000-00-00 00:00:00','F'),(8,30,'ee','ee','ee modify','2017-08-18 19:33:02','2017-08-18 19:38:25','0000-00-00 00:00:00','F'),(10,5,'스타벅스','11','디카페인 음료','2017-08-21 18:00:22','2017-08-21 18:00:22','0000-00-00 00:00:00','F'),(20,33,'test4','44','test4','2017-08-21 18:47:15','2017-08-21 18:47:15','0000-00-00 00:00:00','F'),(21,33,'test5','55','test5','2017-08-21 18:47:26','2017-08-21 18:47:26','0000-00-00 00:00:00','F'),(22,30,'df','df','df','2017-08-21 19:01:11','2017-08-21 19:01:11','0000-00-00 00:00:00','F'),(23,30,'rt','rt','rt','2017-08-21 19:01:19','2017-08-21 19:01:19','0000-00-00 00:00:00','F'),(24,30,'fg','fg','fg','2017-08-21 19:01:25','2017-08-21 19:01:25','0000-00-00 00:00:00','F'),(25,30,'hj','hj','hj','2017-08-21 19:01:45','2017-08-21 19:01:45','0000-00-00 00:00:00','F'),(26,30,'rrqq','rrqq','rrqq','2017-08-21 20:16:31','2017-08-21 20:16:31','0000-00-00 00:00:00','F'),(27,30,'test8','88','test8','2017-08-21 20:28:02','2017-08-21 20:28:02','0000-00-00 00:00:00','F'),(29,30,'test11','11','test11 modify','2017-08-21 20:28:29','2017-08-22 21:57:12','0000-00-00 00:00:00','F'),(30,30,'test88','88','test입니다. 음하하','2017-08-22 21:59:11','2017-08-22 21:59:11','0000-00-00 00:00:00','F');
/*!40000 ALTER TABLE `comment_test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23 21:45:56
