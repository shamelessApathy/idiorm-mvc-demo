-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: idiorm
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` int(50) NOT NULL,
  `album_name` text NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,5,1480634937,'this is it'),(2,5,1480830334,'Album 2'),(3,5,1481178808,'ewest'),(4,1,1481230431,'new');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_image`
--

DROP TABLE IF EXISTS `album_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` varchar(11) NOT NULL,
  `image_id` varchar(11) NOT NULL,
  `created_at` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_image`
--

LOCK TABLES `album_image` WRITE;
/*!40000 ALTER TABLE `album_image` DISABLE KEYS */;
INSERT INTO `album_image` VALUES (7,'2','35',1480741231),(8,'1','36',1480741234),(9,'1','37',1480741235),(10,'1','37',1480741325),(11,'%3Cbr%20','35',1481176543),(12,'4','32',1481230438),(13,'4','33',1481230438);
/*!40000 ALTER TABLE `album_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_queue`
--

DROP TABLE IF EXISTS `auth_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_queue` (
  `image_id` int(20) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_queue`
--

LOCK TABLES `auth_queue` WRITE;
/*!40000 ALTER TABLE `auth_queue` DISABLE KEYS */;
INSERT INTO `auth_queue` VALUES (14,1),(15,2);
/*!40000 ALTER TABLE `auth_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `owned_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'people',NULL),(2,'places',NULL),(3,'things',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_to_image`
--

DROP TABLE IF EXISTS `category_to_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_to_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_to_image`
--

LOCK TABLES `category_to_image` WRITE;
/*!40000 ALTER TABLE `category_to_image` DISABLE KEYS */;
INSERT INTO `category_to_image` VALUES (55,1,31),(56,1,44);
/*!40000 ALTER TABLE `category_to_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_at` int(50) NOT NULL,
  `updated_at` int(50) DEFAULT NULL,
  `auth` int(1) NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `size_string` text NOT NULL,
  `mime_type` text NOT NULL,
  `user_image_name` text NOT NULL,
  `thumbnail` text NOT NULL,
  `watermark` text NOT NULL,
  `user_enabled` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (30,'/users/images/raw_images/phprri8pc.jpg',1,1480366152,NULL,1,225,300,'width=\"225\" height=\"300\"','image/jpeg','a','/users/images/thumbnails/phpRri8pC.jpeg','/users/images/preview/phpRri8pC.jpeg',0),(31,'/users/images/raw_images/phpzmwlnw.jpg',1,1480366160,NULL,1,750,1064,'width=\"750\" height=\"1064\"','image/jpeg','a','/users/images/thumbnails/phpZmwlNW.jpeg','/users/images/preview/phpZmwlNW.jpeg',0),(32,'/users/images/raw_images/php9klfen.jpeg',1,1480366173,NULL,1,5184,3456,'width=\"5184\" height=\"3456\"','image/jpeg','a','/users/images/thumbnails/php9KlfeN.jpeg','/users/images/preview/php9KlfeN.jpeg',0),(33,'/users/images/raw_images/phpkuqqnn.jpg',1,1480366182,NULL,1,1920,1267,'width=\"1920\" height=\"1267\"','image/jpeg','a','/users/images/thumbnails/phpkUqQNn.jpeg','/users/images/preview/phpkUqQNn.jpeg',0),(35,'/users/images/raw_images/phppgh7qk.jpg',5,1480634219,NULL,1,2000,1000,'width=\"2000\" height=\"1000\"','image/jpeg','cloud','/users/images/thumbnails/phppgH7Qk.jpeg','/users/images/preview/phppgH7Qk.jpeg',1),(36,'/users/images/raw_images/phpw7mg10.jpg',5,1480699300,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phpW7MG10.jpeg','/users/images/preview/phpW7MG10.jpeg',1),(37,'/users/images/raw_images/php5llohu.jpg',5,1480699324,NULL,1,980,711,'width=\"980\" height=\"711\"','image/jpeg','horse','/users/images/thumbnails/php5lLohu.jpeg','/users/images/preview/php5lLohu.jpeg',1),(39,'/users/images/raw_images/php5sfvip.jpg',5,1481225318,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/php5SfvIp.jpeg','/users/images/preview/php5SfvIp.jpeg',1),(40,'/users/images/raw_images/phpiy0u4f.jpg',5,1481225355,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','snowboard boots','/users/images/thumbnails/phpiY0u4F.jpeg','/users/images/preview/phpiY0u4F.jpeg',1),(41,'/users/images/raw_images/phpjgdxgi.jpg',5,1481225398,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','shark','/users/images/thumbnails/phpjgDxgi.jpeg','/users/images/preview/phpjgDxgi.jpeg',1),(42,'/users/images/raw_images/php79yokz.jpg',5,1481225435,NULL,1,1920,1081,'width=\"1920\" height=\"1081\"','image/jpeg','zion','/users/images/thumbnails/php79yokz.jpeg','/users/images/preview/php79yokz.jpeg',1),(43,'/users/images/raw_images/phplkr5z2.jpg',5,1481225459,NULL,1,800,569,'width=\"800\" height=\"569\"','image/jpeg','desk','/users/images/thumbnails/phpLKr5z2.jpeg','/users/images/preview/phpLKr5z2.jpeg',1),(44,'/users/images/raw_images/phpr2sd8s.jpg',5,1481225506,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','mtb','/users/images/thumbnails/phpr2SD8s.jpeg','/users/images/preview/phpr2SD8s.jpeg',1),(45,'/users/images/raw_images/phpzdv9d2.jpg',5,1481225655,NULL,1,600,391,'width=\"600\" height=\"391\"','image/jpeg','armchairs','/users/images/thumbnails/phpzdv9d2.jpeg','/users/images/preview/phpzdv9d2.jpeg',1),(46,'/users/images/raw_images/phpu7xqwc.jpg',5,1481225700,NULL,1,1000,750,'width=\"1000\" height=\"750\"','image/jpeg','green anemone','/users/images/thumbnails/phpU7XqWC.jpeg','/users/images/preview/phpU7XqWC.jpeg',1),(47,'/users/images/raw_images/phpmwnqbr.JPG',5,1481230378,NULL,1,2100,1266,'width=\"2100\" height=\"1266\"','image/jpeg','blueangels','/users/images/thumbnails/phpMWNqbr.JPG','/users/images/preview/phpMWNqbr.JPG',1),(98,'/users/images/raw_images/phporgjox.jpg',1,1481567846,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/phpoRGJox.jpeg','/users/images/preview/phpoRGJox.jpeg',1),(99,'/users/images/raw_images/php6vrzhl.jpg',1,1481568646,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','boots','/users/images/thumbnails/php6VrZhl.jpeg','/users/images/preview/php6VrZhl.jpeg',1),(100,'/users/images/raw_images/phpqzftuu.jpg',1,1481577538,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','downhillmtb','/users/images/thumbnails/phpQzFtuU.jpeg','/users/images/preview/phpQzFtuU.jpeg',1),(101,'/users/images/raw_images/phpurrdzz.jpg',1,1481577775,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpuRRDZz.jpeg','/users/images/preview/phpuRRDZz.jpeg',1),(102,'/users/images/raw_images/phpoqyych.jpg',1,1481577795,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpOQyYch.jpeg','/users/images/preview/phpOQyYch.jpeg',1),(103,'/users/images/raw_images/phprepkxo.jpg',1,1481577967,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phprePKxo.jpeg','/users/images/preview/phprePKxo.jpeg',1),(104,'/users/images/raw_images/phpvowcp1.jpg',5,1481757181,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpvOwCP1.jpeg','/users/images/preview/phpvOwCP1.jpeg',1),(105,'/users/images/raw_images/phpigsyih.jpg',5,1481757192,NULL,2,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpigsyIH.jpeg','/users/images/preview/phpigsyIH.jpeg',1),(106,'/users/images/raw_images/phpmmsjdu.jpg',1,1481757253,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpmMsJDu.jpeg','/users/images/preview/phpmMsJDu.jpeg',1),(107,'/users/images/raw_images/phpisog9r.jpg',5,1481757434,NULL,1,564,715,'width=\"564\" height=\"715\"','image/jpeg','triple','/users/images/thumbnails/phpISoG9R.jpeg','/users/images/preview/phpISoG9R.jpeg',1),(108,'/users/images/raw_images/phpkzinux.jpg',5,1481757466,NULL,1,1595,904,'width=\"1595\" height=\"904\"','image/jpeg','big boat','/users/images/thumbnails/phpKZinUx.jpeg','/users/images/preview/phpKZinUx.jpeg',1),(109,'/users/images/raw_images/phptprkxh.jpg',5,1481757680,NULL,2,1595,904,'width=\"1595\" height=\"904\"','image/jpeg','abnotherboart','/users/images/thumbnails/phpTprkXH.jpeg','/users/images/preview/phpTprkXH.jpeg',1),(110,'/users/images/raw_images/phpzhhp8u.jpg',5,1481757691,NULL,2,1595,904,'width=\"1595\" height=\"904\"','image/jpeg','abnotherboart','/users/images/thumbnails/phpzHHP8U.jpeg','/users/images/preview/phpzHHP8U.jpeg',1),(111,'/users/images/raw_images/phpmlyzei.jpg',5,1481757716,NULL,1,1920,1200,'width=\"1920\" height=\"1200\"','image/jpeg','urban exploration','/users/images/thumbnails/phpMLYZEi.jpeg','/users/images/preview/phpMLYZEi.jpeg',1);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_to_tag`
--

DROP TABLE IF EXISTS `image_to_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_to_tag` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image_id` int(20) NOT NULL,
  `tag_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
INSERT INTO `image_to_tag` VALUES (122,33,124),(123,98,125),(126,32,121),(127,32,125),(130,98,128),(131,98,129),(135,47,131),(136,47,132),(137,47,133),(138,41,63),(139,41,134),(140,41,135),(141,35,136),(142,35,137),(143,35,138),(144,35,139),(145,45,140),(146,45,141),(147,45,142),(148,41,143),(149,47,124),(151,105,146),(152,106,146),(153,106,147),(154,106,148),(155,107,149),(156,107,150),(157,107,151),(158,108,152),(159,108,65),(160,108,153),(161,109,118),(162,110,118),(163,111,154),(164,111,155),(165,100,59),(166,101,63),(167,31,109);
/*!40000 ALTER TABLE `image_to_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` int(20) NOT NULL AUTO_INCREMENT,
  `author_id` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `id` int(11) DEFAULT NULL,
  `tags` text,
  `post_type` int(11) DEFAULT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` int(20) DEFAULT NULL,
  `author_name` varchar(50) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `author_id` (`author_id`),
  KEY `author_name` (`author_name`),
  CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (4,1,'no tags','see if this works',NULL,'',NULL,'',0,''),(5,3,'this is a test post','lorem ipsum dolet',NULL,'latin',NULL,'',0,''),(6,3,'this is a test post 2','lorem dolet ipsum carpe diem',NULL,'latin',NULL,'',0,''),(7,3,'another','and another another',NULL,'yes',NULL,'',0,''),(8,4,'second test user','blah blah blah blah',NULL,'',NULL,'',0,''),(9,4,'another second','blah blah blah blah',NULL,'',NULL,'',0,''),(10,1,'test on timeq','time test',NULL,'',NULL,'',0,''),(11,1,'time','time',NULL,'',NULL,'1478992018',0,''),(12,1,'test post','another noather testttt',NULL,'boom',NULL,'1479073540',0,''),(13,1,'hope','hope',NULL,'pray',NULL,'1479336125',NULL,'Brian'),(14,1,'hope','hope',NULL,'pray',NULL,'1479336160',NULL,'Brian'),(15,1,'hope','hope',NULL,'pray',NULL,'1479336181',NULL,'Brian');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(8) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `avatar_path` text,
  `middle_name` text NOT NULL,
  `street_address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` text NOT NULL,
  `dob` varchar(10) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Brian','Moniz',NULL,'C','2175 Sidewinder Dr','Park City','UT','84060','05/08/1986',1,'/users/avatarsphpRFMNge.gif');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `user_id` int(20) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `main` text,
  `website` text,
  `intro` text,
  `created_at` int(30) NOT NULL,
  `updated_at` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (5,9,NULL,'website demo','test',0,1480546998);
/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `text` (`text`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(78,''),(128,'a'),(126,'add'),(77,'air bubbles'),(132,'air force'),(124,'another'),(129,'b'),(131,'blue jets'),(152,'boat'),(57,'boots'),(154,'building'),(150,'bus'),(151,'bus tour'),(141,'chairs'),(138,'cloud'),(74,'cowboy'),(136,'cumulo nimbus'),(81,'dirt'),(60,'downhill mountain bike'),(142,'drawing room'),(148,'e-cigg'),(153,'fishing'),(71,'frozen lake'),(109,'harley'),(108,'hope'),(75,'horse'),(87,'island'),(113,'laces'),(80,'lambo'),(140,'leather'),(133,'loud noises'),(127,'many'),(147,'mod'),(83,'mountain'),(61,'mountain bike'),(59,'mtb'),(130,'no'),(65,'ocean'),(68,'ocean kayak'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(135,'phillipines'),(72,'pond'),(82,'pow'),(143,'scuba diver'),(139,'sky'),(134,'small boat'),(56,'snow'),(55,'snowboard boots'),(102,'something'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(149,'triple decker bus'),(117,'trying to duplicate'),(116,'twice'),(121,'two'),(146,'vape'),(155,'warehouse'),(63,'whaleshark'),(137,'white cloud'),(76,'winter'),(122,'won'),(110,'yes');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `first_name` text,
  `middle_name` text,
  `last_name` text,
  `dob` varchar(12) DEFAULT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brian','bcm811','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/php51pN7n.gif','Brian',NULL,NULL,NULL,1),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a',NULL,NULL,NULL,NULL,NULL,2),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc',NULL,NULL,NULL,NULL,NULL,2),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png',NULL,NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-16 13:15:40
