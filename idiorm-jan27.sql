-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: idiorm
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,5,1480634937,'this is it'),(2,5,1480830334,'Album 2'),(3,5,1481178808,'ewest'),(4,1,1481230431,'new'),(5,1,1483648534,'Test');
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_to_image`
--

LOCK TABLES `category_to_image` WRITE;
/*!40000 ALTER TABLE `category_to_image` DISABLE KEYS */;
INSERT INTO `category_to_image` VALUES (55,1,31),(56,1,44),(57,1,36),(58,1,41),(59,1,37),(60,2,37),(61,3,47),(62,3,112),(63,3,113),(64,1,114),(65,1,115),(66,1,116),(67,1,117),(68,3,118),(69,3,120),(70,3,121),(71,3,122),(72,3,123);
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
  `price` int(11) NOT NULL DEFAULT '3',
  `premium` int(1) NOT NULL DEFAULT '0',
  `featured` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (30,'/users/images/raw_images/phprri8pc.jpg',1,1480366152,NULL,1,225,300,'width=\"225\" height=\"300\"','image/jpeg','a','/users/images/thumbnails/phprri8pc.jpeg','/users/images/preview/phpRri8pC.jpeg',0,3,0,NULL),(31,'/users/images/raw_images/phpzmwlnw.jpg',1,1480366160,NULL,1,750,1064,'width=\"750\" height=\"1064\"','image/jpeg','a','/users/images/thumbnails/phpzmwlnw.jpeg','/users/images/preview/phpZmwlNW.jpeg',0,3,0,NULL),(32,'/users/images/raw_images/php9klfen.jpeg',1,1480366173,NULL,1,5184,3456,'width=\"5184\" height=\"3456\"','image/jpeg','a','/users/images/thumbnails/php9klfen.jpeg','/users/images/preview/php9KlfeN.jpeg',0,3,0,NULL),(33,'/users/images/raw_images/phpkuqqnn.jpg',1,1480366182,NULL,1,1920,1267,'width=\"1920\" height=\"1267\"','image/jpeg','a','/users/images/thumbnails/phpkuqqnn.jpeg','/users/images/preview/phpkUqQNn.jpeg',0,3,0,NULL),(35,'/users/images/raw_images/phppgh7qk.jpg',5,1480634219,NULL,1,2000,1000,'width=\"2000\" height=\"1000\"','image/jpeg','cloud','/users/images/thumbnails/phppgh7qk.jpeg','/users/images/preview/phppgH7Qk.jpeg',1,3,0,NULL),(36,'/users/images/raw_images/phpw7mg10.jpg',5,1480699300,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phpw7mg10.jpeg','/users/images/preview/phpW7MG10.jpeg',1,3,0,NULL),(37,'/users/images/raw_images/php5llohu.jpg',5,1480699324,NULL,1,980,711,'width=\"980\" height=\"711\"','image/jpeg','horse','/users/images/thumbnails/php5llohu.jpeg','/users/images/preview/php5lLohu.jpeg',1,3,0,1),(39,'/users/images/raw_images/php5sfvip.jpg',5,1481225318,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/php5sfvip.jpeg','/users/images/preview/php5SfvIp.jpeg',1,3,0,NULL),(40,'/users/images/raw_images/phpiy0u4f.jpg',5,1481225355,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','snowboard boots','/users/images/thumbnails/phpiy0u4f.jpeg','/users/images/preview/phpiY0u4F.jpeg',1,3,0,NULL),(41,'/users/images/raw_images/phpjgdxgi.jpg',5,1481225398,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','shark','/users/images/thumbnails/phpjgdxgi.jpeg','/users/images/preview/phpjgDxgi.jpeg',1,3,0,NULL),(42,'/users/images/raw_images/php79yokz.jpg',5,1481225435,NULL,1,1920,1081,'width=\"1920\" height=\"1081\"','image/jpeg','zion','/users/images/thumbnails/php79yokz.jpeg','/users/images/preview/php79yokz.jpeg',1,3,0,1),(43,'/users/images/raw_images/phplkr5z2.jpg',5,1481225459,NULL,1,800,569,'width=\"800\" height=\"569\"','image/jpeg','desk','/users/images/thumbnails/phplkr5z2.jpeg','/users/images/preview/phpLKr5z2.jpeg',1,3,0,NULL),(44,'/users/images/raw_images/phpr2sd8s.jpg',5,1481225506,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','mtb','/users/images/thumbnails/phpr2sd8s.jpeg','/users/images/preview/phpr2SD8s.jpeg',1,3,0,NULL),(45,'/users/images/raw_images/phpzdv9d2.jpg',5,1481225655,NULL,1,600,391,'width=\"600\" height=\"391\"','image/jpeg','armchairs','/users/images/thumbnails/phpzdv9d2.jpeg','/users/images/preview/phpzdv9d2.jpeg',1,3,0,NULL),(46,'/users/images/raw_images/phpu7xqwc.jpg',5,1481225700,NULL,1,1000,750,'width=\"1000\" height=\"750\"','image/jpeg','green anemone','/users/images/thumbnails/phpu7xqwc.jpeg','/users/images/preview/phpU7XqWC.jpeg',1,3,0,NULL),(47,'/users/images/raw_images/phpmwnqbr.JPG',5,1481230378,NULL,1,2100,1266,'width=\"2100\" height=\"1266\"','image/jpeg','blueangels','/users/images/thumbnails/phpmwnqbr.jpeg','/users/images/preview/phpMWNqbr.JPG',1,3,0,NULL),(98,'/users/images/raw_images/phporgjox.jpg',1,1481567846,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/phporgjox.jpeg','/users/images/preview/phpoRGJox.jpeg',1,3,0,1),(99,'/users/images/raw_images/php6vrzhl.jpg',1,1481568646,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','boots','/users/images/thumbnails/php6vrzhl.jpeg','/users/images/preview/php6VrZhl.jpeg',1,3,0,NULL),(100,'/users/images/raw_images/phpqzftuu.jpg',1,1481577538,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','downhillmtb','/users/images/thumbnails/phpqzftuu.jpeg','/users/images/preview/phpQzFtuU.jpeg',1,3,0,1),(101,'/users/images/raw_images/phpurrdzz.jpg',1,1481577775,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpurrdzz.jpeg','/users/images/preview/phpuRRDZz.jpeg',1,3,0,NULL),(102,'/users/images/raw_images/phpoqyych.jpg',1,1481577795,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpoqyych.jpeg','/users/images/preview/phpOQyYch.jpeg',1,3,0,NULL),(103,'/users/images/raw_images/phprepkxo.jpg',1,1481577967,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phprepkxo.jpeg','/users/images/preview/phprePKxo.jpeg',1,3,0,NULL),(104,'/users/images/raw_images/phpvowcp1.jpg',5,1481757181,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpvowcp1.jpeg','/users/images/preview/phpvOwCP1.jpeg',1,3,0,NULL),(106,'/users/images/raw_images/phpmmsjdu.jpg',1,1481757253,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpmmsjdu.jpeg','/users/images/preview/phpmMsJDu.jpeg',1,3,0,NULL),(107,'/users/images/raw_images/phpisog9r.jpg',5,1481757434,NULL,1,564,715,'width=\"564\" height=\"715\"','image/jpeg','triple','/users/images/thumbnails/phpisog9r.jpeg','/users/images/preview/phpISoG9R.jpeg',1,3,0,NULL),(108,'/users/images/raw_images/phpkzinux.jpg',5,1481757466,NULL,1,1595,904,'width=\"1595\" height=\"904\"','image/jpeg','big boat','/users/images/thumbnails/phpkzinux.jpeg','/users/images/preview/phpKZinUx.jpeg',1,3,0,NULL),(111,'/users/images/raw_images/phpmlyzei.jpg',5,1481757716,NULL,1,1920,1200,'width=\"1920\" height=\"1200\"','image/jpeg','urban exploration','/users/images/thumbnails/phpmlyzei.jpeg','/users/images/preview/phpMLYZEi.jpeg',1,3,0,NULL),(114,'/users/images/raw_images/phpgdbjyq.jpg',1,1482727261,NULL,1,720,480,'width=\"720\" height=\"480\"','image/jpeg','skydive','/users/images/thumbnails/phpgdbjyq.jpeg','/users/images/preview/phpgdBJyq.jpeg',1,50,1,NULL),(116,'/users/images/raw_images/phpbzxroa.jpg',5,1482729186,NULL,1,720,703,'width=\"720\" height=\"703\"','image/jpeg','bush','/users/images/thumbnails/phpbzxroa.jpeg','/users/images/preview/phpBZXRoA.jpeg',1,3,0,NULL),(117,'/users/images/raw_images/phplmdwbr.jpg',5,1482729220,NULL,1,383,402,'width=\"383\" height=\"402\"','image/jpeg','b','/users/images/thumbnails/phplmdwbr.jpeg','/users/images/preview/phplMDwbr.jpeg',1,40,1,NULL),(118,'/users/images/raw_images/phpd1ybuo.jpg',5,1483565749,NULL,1,2000,1200,'width=\"2000\" height=\"1200\"','image/jpeg','mtb1','/users/images/thumbnails/phpd1ybuo.jpeg','/users/images/preview/phpD1ybUo.jpeg',1,3,0,NULL),(119,'/users/images/raw_images/php7imj18.jpg',5,1483565762,NULL,1,3000,1775,'width=\"3000\" height=\"1775\"','image/jpeg','mtb2','/users/images/thumbnails/php7imj18.jpeg','/users/images/preview/php7imj18.jpeg',1,3,0,NULL),(121,'/users/images/raw_images/phprurpum.jpg',5,1483565788,NULL,1,2856,1606,'width=\"2856\" height=\"1606\"','image/jpeg','mtb3','/users/images/thumbnails/phprurpum.jpeg','/users/images/preview/phpRuRPuM.jpeg',1,3,0,NULL),(122,'/users/images/raw_images/phpe8tvbv.jpg',5,1483565806,NULL,1,1604,1080,'width=\"1604\" height=\"1080\"','image/jpeg','mtb4','/users/images/thumbnails/phpe8tvbv.jpeg','/users/images/preview/phpe8TVBV.jpeg',1,3,0,NULL),(123,'/users/images/raw_images/php0y4fog.jpg',5,1483565819,NULL,1,1626,1080,'width=\"1626\" height=\"1080\"','image/jpeg','mtb5','/users/images/thumbnails/php0y4fog.jpeg','/users/images/preview/php0Y4foG.jpeg',1,3,0,NULL),(124,'/users/images/raw_images/phprtuxkd.jpg',5,1483659450,NULL,1,1125,750,'width=\"1125\" height=\"750\"','image/jpeg','salad','/users/images/thumbnails/phprtuxkd.jpeg','/users/images/preview/phprtuXkD.jpeg',1,3,0,NULL),(125,'/users/images/raw_images/phphrzfgj.png',1,1485064428,NULL,1,1280,798,'width=\"1280\" height=\"798\"','image/png','we see','/users/images/thumbnails/phphRZFgJ.png','/users/images/preview/phphRZFgJ.png',1,3,0,NULL),(126,'/users/images/raw_images/phpzwu8qn.jpg',1,1485229881,NULL,1,300,300,'width=\"300\" height=\"300\"','image/jpeg','groucho','/users/images/thumbnails/phpZwU8qN.jpeg','/users/images/preview/phpZwU8qN.jpeg',1,50,1,NULL),(127,'/users/images/raw_images/phpnruc3w.JPG',1,1485229976,NULL,1,300,225,'width=\"300\" height=\"225\"','image/jpeg','potpie','/users/images/thumbnails/phpNRuC3W.JPG','/users/images/preview/phpNRuC3W.JPG',1,3,0,NULL),(128,'/users/images/raw_images/phpd7gio4.jpg',1,1485230001,NULL,1,403,599,'width=\"403\" height=\"599\"','image/jpeg','red pine','/users/images/thumbnails/phpD7gIo4.jpeg','/users/images/preview/phpD7gIo4.jpeg',1,3,0,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
INSERT INTO `image_to_tag` VALUES (122,33,124),(123,98,125),(126,32,121),(127,32,125),(130,98,128),(131,98,129),(135,47,131),(136,47,132),(137,47,133),(138,41,63),(139,41,134),(140,41,135),(141,35,136),(142,35,137),(143,35,138),(144,35,139),(145,45,140),(146,45,141),(147,45,142),(153,106,147),(154,106,148),(155,107,149),(156,107,150),(157,107,151),(158,108,152),(159,108,65),(160,108,153),(161,109,118),(163,111,154),(164,111,155),(165,100,59),(166,101,63),(167,31,109),(173,114,159),(175,107,146),(179,41,160),(184,116,164),(185,117,165),(186,117,166),(187,107,147),(188,104,146),(189,118,59),(191,121,59),(192,122,59),(193,123,59),(194,116,59),(195,124,168),(196,124,169),(197,124,170),(198,125,161),(199,126,171),(200,126,172),(201,126,173),(202,126,174),(203,127,175),(204,127,176),(205,127,177),(206,127,178),(207,127,179),(208,127,180),(209,128,156),(210,128,157),(211,128,158),(213,128,181);
/*!40000 ALTER TABLE `image_to_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_owned`
--

DROP TABLE IF EXISTS `images_owned`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_owned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_owned`
--

LOCK TABLES `images_owned` WRITE;
/*!40000 ALTER TABLE `images_owned` DISABLE KEYS */;
INSERT INTO `images_owned` VALUES (1,1,30,1),(2,1,31,1),(3,1,32,1),(4,1,33,1),(5,5,35,1),(6,5,36,1),(7,5,37,1),(8,5,39,1),(9,5,40,1),(10,5,41,1),(11,5,42,1),(12,5,43,1),(13,5,44,1),(14,5,45,1),(15,5,46,1),(16,5,47,1),(17,1,98,1),(18,1,99,1),(19,1,100,1),(20,1,101,1),(21,1,102,1),(22,1,103,1),(23,5,104,1),(24,1,106,1),(25,5,107,1),(26,5,108,1),(27,5,111,1),(28,1,114,1),(29,5,116,1),(30,5,117,1),(31,5,118,1),(32,5,119,1),(33,5,121,1),(34,5,122,1),(35,5,123,1),(36,5,124,1),(37,1,47,2),(38,1,47,2),(39,5,100,2),(40,5,114,2),(41,1,126,2),(42,1,37,2),(43,1,121,2),(44,1,116,2),(45,1,125,2),(46,1,125,2),(47,1,107,2),(48,1,37,2),(49,1,123,2),(50,1,98,2),(51,1,100,2),(52,1,122,2),(53,1,122,2),(54,1,124,2);
/*!40000 ALTER TABLE `images_owned` ENABLE KEYS */;
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
-- Table structure for table `subscription_details`
--

DROP TABLE IF EXISTS `subscription_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_details`
--

LOCK TABLES `subscription_details` WRITE;
/*!40000 ALTER TABLE `subscription_details` DISABLE KEYS */;
INSERT INTO `subscription_details` VALUES (1,1,'Basic',5,9.99),(2,2,'Medium',12,19.99),(5,3,'Deluxe',25,29.99);
/*!40000 ALTER TABLE `subscription_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_purchase`
--

DROP TABLE IF EXISTS `subscription_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_purchase`
--

LOCK TABLES `subscription_purchase` WRITE;
/*!40000 ALTER TABLE `subscription_purchase` DISABLE KEYS */;
INSERT INTO `subscription_purchase` VALUES (3,1,116,1415381033),(4,1,125,1485381833),(5,1,125,1485381879),(6,1,121,1485382004),(7,1,107,1485382299),(8,1,37,1485546117);
/*!40000 ALTER TABLE `subscription_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_to_user`
--

DROP TABLE IF EXISTS `subscription_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_to_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `created_at` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_to_user`
--

LOCK TABLES `subscription_to_user` WRITE;
/*!40000 ALTER TABLE `subscription_to_user` DISABLE KEYS */;
INSERT INTO `subscription_to_user` VALUES (1,1,1,1470374040);
/*!40000 ALTER TABLE `subscription_to_user` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(167,NULL),(78,''),(162,'9/11'),(128,'a'),(126,'add'),(77,'air bubbles'),(132,'air force'),(124,'another'),(180,'asbestos\\'),(129,'b'),(131,'blue jets'),(152,'boat'),(57,'boots'),(166,'Brian'),(154,'building'),(150,'bus'),(151,'bus tour'),(164,'bush'),(163,'bush did 9/11'),(141,'chairs'),(138,'cloud'),(181,'clouds'),(74,'cowboy'),(136,'cumulo nimbus'),(81,'dirt'),(60,'downhill mountain bike'),(142,'drawing room'),(148,'e-cigg'),(173,'fake nose'),(177,'fire'),(178,'fire extinguisher'),(179,'fireman'),(153,'fishing'),(71,'frozen lake'),(174,'glasses'),(171,'groucho'),(109,'harley'),(170,'healthy'),(108,'hope'),(75,'horse'),(87,'island'),(176,'junior'),(113,'laces'),(80,'lambo'),(140,'leather'),(133,'loud noises'),(127,'many'),(172,'marx'),(165,'me'),(147,'mod'),(83,'mountain'),(61,'mountain bike'),(59,'mtb'),(130,'no'),(65,'ocean'),(68,'ocean kayak'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(135,'phillipines'),(157,'pine'),(72,'pond'),(175,'pot pie'),(82,'pow'),(156,'red pine'),(169,'salad'),(168,'salada'),(160,'scuba'),(143,'scuba diver'),(139,'sky'),(159,'skydive'),(134,'small boat'),(56,'snow'),(55,'snowboard boots'),(102,'something'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(158,'tree'),(149,'triple decker bus'),(117,'trying to duplicate'),(116,'twice'),(121,'two'),(146,'vape'),(155,'warehouse'),(161,'water'),(63,'whaleshark'),(137,'white cloud'),(76,'winter'),(122,'won'),(110,'yes');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(70) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (1,32,1,'84dc4eb32d043a7d629d931166fb7c0a1dc2fb64','1483741017'),(2,32,1,'8ea601d607a060507b52dae6a2cd0e003a32860b','1483741780'),(3,32,1,'66916ebefcc7e534c15dedc0cc189b040c147c46','1483741928'),(4,32,1,'2314cd74e7af03afe2e9b878e1e6c0afc7b2014c','1483741974'),(5,101,1,'d76f1d1c242f06b8b12ccdcfeedc7b380d251b98','1483985505'),(6,40,1,'ae88bde5ba1cdd22bf6efb853eff755c18fbc399','1483986350'),(7,121,1,'8bef0d2dd8ae2838bed3de6efff70749f72294dd','1483986375');
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
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
  `created_at` int(60) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brian','bcm811','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/php51pN7n.gif','Brian',NULL,NULL,NULL,1,1483998888,''),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a',NULL,NULL,NULL,NULL,NULL,2,1483998888,''),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc',NULL,NULL,NULL,NULL,NULL,2,1483998888,''),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png',NULL,NULL,NULL,NULL,2,1483998888,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `ip` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (3,106,147,'127.0.0.1',5,1),(4,106,147,'127.0.0.3',6,1),(5,104,146,'127.0.0.1',5,1),(6,107,146,'127.0.0.1',5,1),(7,107,146,'127.0.0.2',6,1),(8,116,59,'127.0.0.1',5,1),(9,100,59,'127.0.0.1',5,1),(10,100,59,'127.0.0.1',5,1),(11,100,59,'127.0.0.1',5,1),(12,100,59,'127.0.0.1',5,1),(13,121,59,'127.0.0.1',5,1),(14,121,59,'127.0.0.1',5,1),(15,121,59,'127.0.0.1',5,1),(16,121,59,'127.0.0.1',5,1),(17,121,59,'127.0.0.1',5,1),(18,121,59,'127.0.0.1',5,1),(19,121,59,'127.0.0.1',5,1),(20,121,59,'127.0.0.1',5,1),(21,121,59,'127.0.0.1',5,1),(22,121,59,'127.0.0.1',5,1),(23,121,59,'127.0.0.1',5,1),(24,121,59,'127.0.0.1',5,1),(25,121,59,'127.0.0.1',5,1),(26,121,59,'127.0.0.1',5,1),(27,121,59,'127.0.0.1',5,1),(28,122,59,'127.0.0.1',5,1),(29,122,59,'127.0.0.1',5,1),(30,122,59,'127.0.0.1',5,1),(31,123,59,'127.0.0.1',5,1),(32,118,59,'127.0.0.1',5,1),(33,118,59,'127.0.0.1',5,1),(34,118,59,'127.0.0.1',5,1),(35,118,59,'127.0.0.1',5,1),(36,118,59,'127.0.0.1',5,1),(37,114,159,'127.0.0.1',1,-1);
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-27 15:37:58
