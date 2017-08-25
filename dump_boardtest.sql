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
-- Table structure for table `boardtest`
--

DROP TABLE IF EXISTS `boardtest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boardtest` (
  `num` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `writer` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `textView` int(10) NOT NULL DEFAULT '0',
  `creatDate` datetime NOT NULL,
  `modifyDate` datetime NOT NULL,
  `deleteDate` datetime NOT NULL,
  `deleteCheck` varchar(1) NOT NULL DEFAULT 'F',
  `cmtCount` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boardtest`
--

LOCK TABLES `boardtest` WRITE;
/*!40000 ALTER TABLE `boardtest` DISABLE KEYS */;
INSERT INTO `boardtest` VALUES (2,'두번이','sc@gmail.com','1212','스타벅스','바닐라라떼 한잔해',0,'2017-08-08 16:15:23','2017-08-08 16:15:23','0000-00-00 00:00:00','F',1),(3,'삼순이','sam@naver.com','33','요즘..','요즘 치킨이 너무 좋습니다.',0,'2017-08-08 21:20:35','2017-08-08 21:20:35','0000-00-00 00:00:00','F',0),(4,'삭제이','eeee@naver.com','44','삭제 후 수정','수정햇음',0,'2017-08-09 20:14:22','2017-08-09 21:27:15','0000-00-00 00:00:00','F',1),(5,'사순이','4545@gmail.com','44','그린티라떼','스타벅스 그린티라떼는 맛있다!! ',0,'2017-08-13 16:43:46','2017-08-13 16:43:46','0000-00-00 00:00:00','F',13),(6,'오순이','5656@cc.com','55','db include','db파일 include해서 사용',0,'2017-08-13 18:39:32','2017-08-13 18:39:32','0000-00-00 00:00:00','F',1),(7,'test77','test77@naver.com','77','test777임다','페이지네이션 테스트',0,'2017-08-17 16:12:46','2017-08-17 16:12:46','0000-00-00 00:00:00','F',0),(8,'test8','test8@gg.com','88','목요일입니다','오늘은 목요일입니다. 그냥 그런하루',0,'2017-08-17 16:13:58','2017-08-17 16:13:58','0000-00-00 00:00:00','F',0),(9,'rt9','rt@mm.com','99','제목을..','뭐라할까?',0,'2017-08-17 16:14:34','2017-08-17 16:14:34','0000-00-00 00:00:00','F',0),(10,'tt','tt','tt','tt','tt',0,'2017-08-17 19:57:05','2017-08-17 19:57:05','0000-00-00 00:00:00','F',0),(11,'rr','rr','rr','Rr','rr',0,'2017-08-17 19:57:37','2017-08-17 19:57:37','0000-00-00 00:00:00','F',0),(12,'ee','ee','ee','ee','ee',0,'2017-08-17 19:57:57','2017-08-17 19:57:57','0000-00-00 00:00:00','F',0),(13,'yy','yy','yy','yy','yy',0,'2017-08-17 19:58:08','2017-08-17 19:58:08','0000-00-00 00:00:00','F',0),(14,'gd','gd','gd','gd','gd',0,'2017-08-17 19:58:18','2017-08-17 19:58:18','0000-00-00 00:00:00','F',0),(15,'aa','aa','aa','aa','aa',0,'2017-08-17 19:58:27','2017-08-17 19:58:27','0000-00-00 00:00:00','F',0),(16,'dd','dd','dd','dd','dd',0,'2017-08-17 19:58:51','2017-08-17 19:58:51','0000-00-00 00:00:00','F',0),(17,'zz','zz','zz','zz','zz',0,'2017-08-17 19:59:04','2017-08-17 19:59:04','0000-00-00 00:00:00','F',0),(18,'cc','cc','cc','cc','cc',0,'2017-08-17 19:59:13','2017-08-17 19:59:13','0000-00-00 00:00:00','F',0),(19,'vv','vv','vv','vv','vv',0,'2017-08-17 20:00:13','2017-08-17 20:00:13','0000-00-00 00:00:00','F',0),(20,'qw','qw','qw','qw','qw',0,'2017-08-17 20:58:45','2017-08-17 20:58:45','0000-00-00 00:00:00','F',0),(21,'1','1','1','1','1',0,'2017-08-17 20:58:53','2017-08-17 20:58:53','0000-00-00 00:00:00','F',0),(22,'2','2','2','2','2',0,'2017-08-17 20:58:58','2017-08-17 20:58:58','0000-00-00 00:00:00','F',0),(23,'b','b','b','b','b',0,'2017-08-17 20:59:06','2017-08-17 20:59:06','0000-00-00 00:00:00','F',0),(24,'n','n','n','n','n',0,'2017-08-17 20:59:13','2017-08-17 20:59:13','0000-00-00 00:00:00','F',0),(25,'l','l','l','ll','l',0,'2017-08-17 20:59:22','2017-08-17 20:59:22','0000-00-00 00:00:00','F',0),(26,'p','p','p','p','p',0,'2017-08-17 20:59:30','2017-08-17 20:59:30','0000-00-00 00:00:00','F',0),(27,'o','o','o','oo','o',0,'2017-08-17 20:59:45','2017-08-17 20:59:45','0000-00-00 00:00:00','F',0),(28,'fg','fg','fg','fg','fg',0,'2017-08-17 20:59:55','2017-08-17 20:59:55','0000-00-00 00:00:00','F',0),(29,'abc','abc','abc','abc','abc',0,'2017-08-17 21:00:07','2017-08-17 21:00:07','0000-00-00 00:00:00','F',0),(30,'jk','jk','jk','jk','jk',0,'2017-08-17 21:00:16','2017-08-17 21:00:16','0000-00-00 00:00:00','F',10),(32,'nm','nm','nm','nm','nm',0,'2017-08-17 21:01:05','2017-08-18 20:42:30','0000-00-00 00:00:00','F',0),(33,'you','you@nn.com','11','you','you',0,'2017-08-18 19:39:00','2017-08-18 19:39:00','0000-00-00 00:00:00','F',3);
/*!40000 ALTER TABLE `boardtest` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23 21:45:23
