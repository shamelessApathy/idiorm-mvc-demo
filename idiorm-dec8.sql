-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: idiorm
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB-1ubuntu0.14.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,5,1480634937,'this is it'),(2,5,1480830334,'Album 2'),(3,5,1481178808,'ewest');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_image`
--

LOCK TABLES `album_image` WRITE;
/*!40000 ALTER TABLE `album_image` DISABLE KEYS */;
INSERT INTO `album_image` VALUES (7,'2','35',1480741231),(8,'1','36',1480741234),(9,'1','37',1480741235),(10,'1','37',1480741325),(11,'%3Cbr%20','35',1481176543);
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
  `tags` text NOT NULL,
  `user_enabled` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (30,'/users/images/raw_images/phprri8pc.jpg',1,1480366152,NULL,1,225,300,'width=\"225\" height=\"300\"','image/jpeg','a','/users/images/thumbnails/phpRri8pC.jpeg','/users/images/preview/phpRri8pC.jpeg','hope',0),(31,'/users/images/raw_images/phpzmwlnw.jpg',1,1480366160,NULL,1,750,1064,'width=\"750\" height=\"1064\"','image/jpeg','a','/users/images/thumbnails/phpZmwlNW.jpeg','/users/images/preview/phpZmwlNW.jpeg','hope',0),(32,'/users/images/raw_images/php9klfen.jpeg',1,1480366173,NULL,1,5184,3456,'width=\"5184\" height=\"3456\"','image/jpeg','a','/users/images/thumbnails/php9KlfeN.jpeg','/users/images/preview/php9KlfeN.jpeg','hope',0),(33,'/users/images/raw_images/phpkuqqnn.jpg',1,1480366182,NULL,1,1920,1267,'width=\"1920\" height=\"1267\"','image/jpeg','a','/users/images/thumbnails/phpkUqQNn.jpeg','/users/images/preview/phpkUqQNn.jpeg','hope',0),(34,'/users/images/raw_images/phpi7i3en.jpg',5,1480630331,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','soulglo','/users/images/thumbnails/phpi7i3en.jpeg','/users/images/preview/phpi7i3en.jpeg','soooouuul glooow',1),(35,'/users/images/raw_images/phppgh7qk.jpg',5,1480634219,NULL,1,2000,1000,'width=\"2000\" height=\"1000\"','image/jpeg','cloud','/users/images/thumbnails/phppgH7Qk.jpeg','/users/images/preview/phppgH7Qk.jpeg','cloud cumulo nimbus',1),(36,'/users/images/raw_images/phpw7mg10.jpg',5,1480699300,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phpW7MG10.jpeg','/users/images/preview/phpW7MG10.jpeg','frozen',1),(37,'/users/images/raw_images/php5llohu.jpg',5,1480699324,NULL,1,980,711,'width=\"980\" height=\"711\"','image/jpeg','horse','/users/images/thumbnails/php5lLohu.jpeg','/users/images/preview/php5lLohu.jpeg','frozen pond horse',1);
/*!40000 ALTER TABLE `image` ENABLE KEYS */;
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

-- Dump completed on 2016-12-07 23:55:17
