-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: idiorm
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `bug`
--

DROP TABLE IF EXISTS `bug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('image','payment','account','other') NOT NULL,
  `email` text NOT NULL,
  `description` text NOT NULL,
  `answered` enum('no','yes') NOT NULL DEFAULT 'no',
  `resolved` enum('no','yes') NOT NULL DEFAULT 'no',
  `created_at` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bug`
--

LOCK TABLES `bug` WRITE;
/*!40000 ALTER TABLE `bug` DISABLE KEYS */;
INSERT INTO `bug` VALUES (1,'image','bcm811@gmail.com','This is a test for a bug description blah blah blah lorem ipsum dolet','no','no',1490387176),(2,'','bcm811@gmail.com','Soemthing to do with a bug happening','no','no',1493146648),(3,'','bcm811@gmail.com','testing the bug','no','no',1493327341);
/*!40000 ALTER TABLE `bug` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (30,'/users/images/raw_images/phprri8pc.jpg',1,1480366152,NULL,1,225,300,'width=\"225\" height=\"300\"','image/jpeg','a','/users/images/thumbnails/phprri8pc.jpeg','/users/images/preview/phpRri8pC.jpeg',0,3,0,NULL),(31,'/users/images/raw_images/phpzmwlnw.jpg',1,1480366160,NULL,1,750,1064,'width=\"750\" height=\"1064\"','image/jpeg','harley quinn','/users/images/thumbnails/phpzmwlnw.jpeg','/users/images/preview/phpZmwlNW.jpeg',0,3,0,NULL),(32,'/users/images/raw_images/php9klfen.jpeg',1,1480366173,NULL,1,5184,3456,'width=\"5184\" height=\"3456\"','image/jpeg','a','/users/images/thumbnails/php9klfen.jpeg','/users/images/preview/php9KlfeN.jpeg',0,3,0,NULL),(33,'/users/images/raw_images/phpkuqqnn.jpg',1,1480366182,NULL,1,1920,1267,'width=\"1920\" height=\"1267\"','image/jpeg','a','/users/images/thumbnails/phpkuqqnn.jpeg','/users/images/preview/phpkUqQNn.jpeg',0,3,0,NULL),(35,'/users/images/raw_images/phppgh7qk.jpg',5,1480634219,NULL,1,2000,1000,'width=\"2000\" height=\"1000\"','image/jpeg','cloud','/users/images/thumbnails/phppgh7qk.jpeg','/users/images/preview/phppgH7Qk.jpeg',1,3,0,NULL),(36,'/users/images/raw_images/phpw7mg10.jpg',5,1480699300,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phpw7mg10.jpeg','/users/images/preview/phpW7MG10.jpeg',1,3,0,NULL),(37,'/users/images/raw_images/php5llohu.jpg',5,1480699324,NULL,1,980,711,'width=\"980\" height=\"711\"','image/jpeg','horse','/users/images/thumbnails/php5llohu.jpeg','/users/images/preview/php5lLohu.jpeg',1,3,0,1),(39,'/users/images/raw_images/php5sfvip.jpg',5,1481225318,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/php5sfvip.jpeg','/users/images/preview/php5SfvIp.jpeg',1,3,0,NULL),(40,'/users/images/raw_images/phpiy0u4f.jpg',5,1481225355,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','snowboard boots','/users/images/thumbnails/phpiy0u4f.jpeg','/users/images/preview/phpiY0u4F.jpeg',1,3,0,NULL),(41,'/users/images/raw_images/phpjgdxgi.jpg',5,1481225398,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','shark','/users/images/thumbnails/phpjgdxgi.jpeg','/users/images/preview/phpjgDxgi.jpeg',1,3,0,NULL),(42,'/users/images/raw_images/php79yokz.jpg',5,1481225435,NULL,1,1920,1081,'width=\"1920\" height=\"1081\"','image/jpeg','zion','/users/images/thumbnails/php79yokz.jpeg','/users/images/preview/php79yokz.jpeg',1,3,0,1),(43,'/users/images/raw_images/phplkr5z2.jpg',5,1481225459,NULL,1,800,569,'width=\"800\" height=\"569\"','image/jpeg','desk','/users/images/thumbnails/phplkr5z2.jpeg','/users/images/preview/phpLKr5z2.jpeg',1,3,0,NULL),(44,'/users/images/raw_images/phpr2sd8s.jpg',5,1481225506,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','mtb','/users/images/thumbnails/phpr2sd8s.jpeg','/users/images/preview/phpr2SD8s.jpeg',1,3,0,NULL),(45,'/users/images/raw_images/phpzdv9d2.jpg',5,1481225655,NULL,1,600,391,'width=\"600\" height=\"391\"','image/jpeg','armchairs','/users/images/thumbnails/phpzdv9d2.jpeg','/users/images/preview/phpzdv9d2.jpeg',1,3,0,NULL),(46,'/users/images/raw_images/phpu7xqwc.jpg',5,1481225700,NULL,1,1000,750,'width=\"1000\" height=\"750\"','image/jpeg','green anemone','/users/images/thumbnails/phpu7xqwc.jpeg','/users/images/preview/phpU7XqWC.jpeg',1,3,0,NULL),(47,'/users/images/raw_images/phpmwnqbr.JPG',5,1481230378,NULL,1,2100,1266,'width=\"2100\" height=\"1266\"','image/jpeg','blueangels','/users/images/thumbnails/phpmwnqbr.jpeg','/users/images/preview/phpMWNqbr.JPG',1,3,0,NULL),(98,'/users/images/raw_images/phporgjox.jpg',1,1481567846,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/phporgjox.jpeg','/users/images/preview/phpoRGJox.jpeg',1,3,0,1),(99,'/users/images/raw_images/php6vrzhl.jpg',1,1481568646,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','boots2','/users/images/thumbnails/php6vrzhl.jpeg','/users/images/preview/php6VrZhl.jpeg',1,3,0,NULL),(100,'/users/images/raw_images/phpqzftuu.jpg',1,1481577538,NULL,1,3000,2000,'width=\"3000\" height=\"2000\"','image/jpeg','downhillmtb','/users/images/thumbnails/phpqzftuu.jpeg','/users/images/preview/phpQzFtuU.jpeg',1,3,0,1),(101,'/users/images/raw_images/phpurrdzz.jpg',1,1481577775,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpurrdzz.jpeg','/users/images/preview/phpuRRDZz.jpeg',1,3,0,NULL),(102,'/users/images/raw_images/phpoqyych.jpg',1,1481577795,NULL,1,1100,619,'width=\"1100\" height=\"619\"','image/jpeg','phillipines','/users/images/thumbnails/phpoqyych.jpeg','/users/images/preview/phpOQyYch.jpeg',1,3,0,NULL),(103,'/users/images/raw_images/phprepkxo.jpg',1,1481577967,NULL,1,880,582,'width=\"880\" height=\"582\"','image/jpeg','pond','/users/images/thumbnails/phprepkxo.jpeg','/users/images/preview/phprePKxo.jpeg',1,3,0,NULL),(104,'/users/images/raw_images/phpvowcp1.jpg',5,1481757181,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpvowcp1.jpeg','/users/images/preview/phpvOwCP1.jpeg',1,3,0,NULL),(106,'/users/images/raw_images/phpmmsjdu.jpg',1,1481757253,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','mod','/users/images/thumbnails/phpmmsjdu.jpeg','/users/images/preview/phpmMsJDu.jpeg',1,3,0,NULL),(107,'/users/images/raw_images/phpisog9r.jpg',5,1481757434,NULL,1,564,715,'width=\"564\" height=\"715\"','image/jpeg','triple','/users/images/thumbnails/phpisog9r.jpeg','/users/images/preview/phpISoG9R.jpeg',1,3,0,NULL),(108,'/users/images/raw_images/phpkzinux.jpg',5,1481757466,NULL,1,1595,904,'width=\"1595\" height=\"904\"','image/jpeg','big boat','/users/images/thumbnails/phpkzinux.jpeg','/users/images/preview/phpKZinUx.jpeg',1,3,0,NULL),(111,'/users/images/raw_images/phpmlyzei.jpg',5,1481757716,NULL,1,1920,1200,'width=\"1920\" height=\"1200\"','image/jpeg','urban exploration','/users/images/thumbnails/phpmlyzei.jpeg','/users/images/preview/phpMLYZEi.jpeg',1,3,0,NULL),(114,'/users/images/raw_images/phpgdbjyq.jpg',1,1482727261,NULL,1,720,480,'width=\"720\" height=\"480\"','image/jpeg','skydive','/users/images/thumbnails/phpgdbjyq.jpeg','/users/images/preview/phpgdBJyq.jpeg',1,50,1,NULL),(116,'/users/images/raw_images/phpbzxroa.jpg',5,1482729186,NULL,1,720,703,'width=\"720\" height=\"703\"','image/jpeg','bush','/users/images/thumbnails/phpbzxroa.jpeg','/users/images/preview/phpBZXRoA.jpeg',1,3,0,NULL),(118,'/users/images/raw_images/phpd1ybuo.jpg',5,1483565749,NULL,1,2000,1200,'width=\"2000\" height=\"1200\"','image/jpeg','mtb1','/users/images/thumbnails/phpd1ybuo.jpeg','/users/images/preview/phpD1ybUo.jpeg',1,3,0,NULL),(119,'/users/images/raw_images/php7imj18.jpg',5,1483565762,NULL,1,3000,1775,'width=\"3000\" height=\"1775\"','image/jpeg','mtb2','/users/images/thumbnails/php7imj18.jpeg','/users/images/preview/php7imj18.jpeg',1,3,0,NULL),(121,'/users/images/raw_images/phprurpum.jpg',5,1483565788,NULL,1,2856,1606,'width=\"2856\" height=\"1606\"','image/jpeg','mtb3','/users/images/thumbnails/phprurpum.jpeg','/users/images/preview/phpRuRPuM.jpeg',1,3,0,NULL),(122,'/users/images/raw_images/phpe8tvbv.jpg',5,1483565806,NULL,1,1604,1080,'width=\"1604\" height=\"1080\"','image/jpeg','mtb4','/users/images/thumbnails/phpe8tvbv.jpeg','/users/images/preview/phpe8TVBV.jpeg',1,3,0,NULL),(123,'/users/images/raw_images/php0y4fog.jpg',5,1483565819,NULL,1,1626,1080,'width=\"1626\" height=\"1080\"','image/jpeg','mtb5','/users/images/thumbnails/php0y4fog.jpeg','/users/images/preview/php0Y4foG.jpeg',1,3,0,NULL),(124,'/users/images/raw_images/phprtuxkd.jpg',5,1483659450,NULL,1,1125,750,'width=\"1125\" height=\"750\"','image/jpeg','salad','/users/images/thumbnails/phprtuxkd.jpeg','/users/images/preview/phprtuXkD.jpeg',1,3,0,NULL),(125,'/users/images/raw_images/phphrzfgj.png',1,1485064428,NULL,1,1280,798,'width=\"1280\" height=\"798\"','image/png','we see','/users/images/thumbnails/phphRZFgJ.png','/users/images/preview/phphRZFgJ.png',1,3,0,NULL),(126,'/users/images/raw_images/phpzwu8qn.jpg',1,1485229881,NULL,1,300,300,'width=\"300\" height=\"300\"','image/jpeg','groucho','/users/images/thumbnails/phpZwU8qN.jpeg','/users/images/preview/phpZwU8qN.jpeg',1,50,1,NULL),(127,'/users/images/raw_images/phpnruc3w.JPG',1,1485229976,NULL,1,300,225,'width=\"300\" height=\"225\"','image/jpeg','potpie','/users/images/thumbnails/phpNRuC3W.JPG','/users/images/preview/phpNRuC3W.JPG',1,3,0,NULL),(128,'/users/images/raw_images/phpd7gio4.jpg',1,1485230001,NULL,1,403,599,'width=\"403\" height=\"599\"','image/jpeg','red pine','/users/images/thumbnails/phpD7gIo4.jpeg','/users/images/preview/phpD7gIo4.jpeg',1,3,0,NULL),(129,'/users/images/raw_images/phpolui8v.jpg',6,1488485564,NULL,1,300,168,'width=\"300\" height=\"168\"','image/jpeg','yingyang','/users/images/thumbnails/phpoLui8v.jpeg','/users/images/preview/phpoLui8v.jpeg',1,3,0,NULL),(130,'/users/images/raw_images/php7ijiig.jpg',6,1488485585,NULL,1,1600,1000,'width=\"1600\" height=\"1000\"','image/jpeg','galaxy','/users/images/thumbnails/php7iJiig.jpeg','/users/images/preview/php7iJiig.jpeg',1,3,0,NULL),(131,'/users/images/raw_images/php20rvkp.jpg',6,1488485604,NULL,1,2880,1800,'width=\"2880\" height=\"1800\"','image/jpeg','bigmoon','/users/images/thumbnails/php20rVKp.jpeg','/users/images/preview/php20rVKp.jpeg',1,3,0,NULL),(132,'/users/images/raw_images/php3zkwit.jpg',7,1488485641,NULL,1,760,428,'width=\"760\" height=\"428\"','image/jpeg','cliffs','/users/images/thumbnails/php3zKWit.jpeg','/users/images/preview/php3zKWit.jpeg',1,3,0,NULL),(133,'/users/images/raw_images/phptlgfzs.jpg',7,1488485659,NULL,1,1600,1200,'width=\"1600\" height=\"1200\"','image/jpeg','sunsetpalms','/users/images/thumbnails/phptlgfzS.jpeg','/users/images/preview/phptlgfzS.jpeg',1,3,0,NULL),(134,'/users/images/raw_images/phpfmmzql.jpg',7,1488485675,NULL,1,2560,1440,'width=\"2560\" height=\"1440\"','image/jpeg','collide','/users/images/thumbnails/phpFMMzqL.jpeg','/users/images/preview/phpFMMzqL.jpeg',1,3,0,NULL),(135,'/users/images/raw_images/phpxklvin.jpg',6,1488491687,NULL,1,2022,1348,'width=\"2022\" height=\"1348\"','image/jpeg','wolfgang gartner','/users/images/thumbnails/phpxKLvin.jpeg','/users/images/preview/phpxKLvin.jpeg',1,3,0,NULL),(136,'/users/images/raw_images/phptgcpjq.jpg',6,1488491703,NULL,1,500,334,'width=\"500\" height=\"334\"','image/jpeg','wakeboard','/users/images/thumbnails/phpTgCPJq.jpeg','/users/images/preview/phpTgCPJq.jpeg',1,3,0,NULL),(137,'/users/images/raw_images/php8hrdd4.jpg',6,1488491730,NULL,1,714,521,'width=\"714\" height=\"521\"','image/jpeg','albumcover','/users/images/thumbnails/php8HRdD4.jpeg','/users/images/preview/php8HRdD4.jpeg',1,3,0,NULL),(138,'/users/images/raw_images/phpbp8fik.png',6,1488491752,NULL,1,981,654,'width=\"981\" height=\"654\"','image/png','cdjs','/users/images/thumbnails/phpBp8FIk.png','/users/images/preview/phpBp8FIk.png',1,3,0,NULL),(139,'/users/images/raw_images/phpkkd2hn.jpg',1,1488601035,NULL,1,300,300,'width=\"300\" height=\"300\"','image/jpeg','georgebush meme','/users/images/thumbnails/phpKkD2hN.jpeg','/users/images/preview/phpKkD2hN.jpeg',1,3,0,NULL),(140,'/users/images/raw_images/phpwvx9p3.jpg',1,1488963699,NULL,1,1024,682,'width=\"1024\" height=\"682\"','image/jpeg','elephant baby','/users/images/thumbnails/phpWvX9P3.jpeg','/users/images/preview/phpWvX9P3.jpeg',1,3,0,NULL),(141,'/users/images/raw_images/php3ximon.jpg',6,1489470745,NULL,1,660,495,'width=\"660\" height=\"495\"','image/jpeg','moab_jeeps','/users/images/thumbnails/php3xImON.jpeg','/users/images/preview/php3xImON.jpeg',1,3,0,NULL),(142,'/users/images/raw_images/phpflk5el.jpg',6,1489470757,NULL,1,1280,624,'width=\"1280\" height=\"624\"','image/jpeg','cave','/users/images/thumbnails/phpFLK5El.jpeg','/users/images/preview/phpFLK5El.jpeg',1,3,0,NULL),(143,'/users/images/raw_images/phpz6ldey.jpg',6,1489470772,NULL,1,758,458,'width=\"758\" height=\"458\"','image/jpeg','cartoon-crystal','/users/images/thumbnails/phpZ6LdEY.jpeg','/users/images/preview/phpZ6LdEY.jpeg',1,3,0,NULL),(144,'/users/images/raw_images/phpujctft.jpg',6,1489470783,NULL,1,1920,823,'width=\"1920\" height=\"823\"','image/jpeg','denver','/users/images/thumbnails/phpUjCTft.jpeg','/users/images/preview/phpUjCTft.jpeg',1,3,0,NULL),(145,'/users/images/raw_images/phpke6i1v.jpg',6,1489470794,NULL,1,2144,1222,'width=\"2144\" height=\"1222\"','image/jpeg','jet','/users/images/thumbnails/phpkE6i1V.jpeg','/users/images/preview/phpkE6i1V.jpeg',1,3,0,NULL),(146,'/users/images/raw_images/phphmiliu.jpg',6,1489470806,NULL,1,750,380,'width=\"750\" height=\"380\"','image/jpeg','moab-bike','/users/images/thumbnails/phpHMiLIu.jpeg','/users/images/preview/phpHMiLIu.jpeg',1,3,0,NULL),(147,'/users/images/raw_images/phpxxbooj.jpg',6,1489470825,NULL,1,650,430,'width=\"650\" height=\"430\"','image/jpeg','sasha-dj','/users/images/thumbnails/phpXxBooj.jpeg','/users/images/preview/phpXxBooj.jpeg',1,3,0,NULL),(148,'/users/images/raw_images/phpv8ms4q.jpg',5,1489698817,NULL,1,1920,1200,'width=\"1920\" height=\"1200\"','image/jpeg','bluewater','/users/images/thumbnails/phpV8MS4q.jpeg','/users/images/preview/phpV8MS4q.jpeg',1,3,0,NULL),(152,'/users/images/raw_images/bb2d07e719b1cc28cde4787cd1fa2d921aa3b5ec.jpg',1,1490385112,NULL,1,640,717,'width=\"640\" height=\"717\"','image/jpeg','nike-boots','/users/images/thumbnails/php0nhM6j.jpeg','/users/images/preview/php0nhM6j.jpeg',1,3,0,NULL),(153,'/users/images/raw_images/215cce26a724959817688e4837db3f40b1b1c3ac.jpg',1,1490645280,NULL,1,480,360,'width=\"480\" height=\"360\"','image/jpeg','brownboots','/users/images/thumbnails/phpCzaog4.jpeg','/users/images/preview/phpCzaog4.jpeg',1,3,0,NULL),(154,'/users/images/raw_images/9fef6769cd7f0c028e4a0ffcb18a37965f351006.jpg',1,1490645570,NULL,1,600,391,'width=\"600\" height=\"391\"','image/jpeg','chairs','/users/images/thumbnails/php45dr3U.jpeg','/users/images/preview/php45dr3U.jpeg',1,5,1,NULL),(156,'/users/images/raw_images/554b9a9cfe863ab67b70bb40f056f1dbcb3e66f8.jpg',1,1491328127,NULL,1,970,647,'width=\"970\" height=\"647\"','image/jpeg','lambo','/users/images/thumbnails/phpgkFLMl.jpeg','/users/images/preview/phpgkFLMl.jpeg',1,5,1,NULL),(157,'/users/images/raw_images/5ca7f7efcc07aa2cb9d227846bdca2a7a206a3de.jpg',1,1491328851,NULL,1,1000,750,'width=\"1000\" height=\"750\"','image/jpeg','upside down','/users/images/thumbnails/phpnSJzIt.jpeg','/users/images/preview/phpnSJzIt.jpeg',1,5,1,NULL),(158,'/users/images/raw_images/1ee558bb1fac1ecc642964b3a071df1c1fa4f10e.jpg',1,1491329886,NULL,1,1367,709,'width=\"1367\" height=\"709\"','image/jpeg','whistler BC','/users/images/thumbnails/phpf3rDgf.jpeg','/users/images/preview/phpf3rDgf.jpeg',1,5,1,NULL),(159,'/users/images/raw_images/4ab6cd1e9ede2ec8cdc87a0829f105342290051e.jpg',1,1491329972,NULL,1,160,160,'width=\"160\" height=\"160\"','image/jpeg','ski','/users/images/thumbnails/phpchYgWw.jpeg','/users/images/preview/phpchYgWw.jpeg',1,5,1,NULL),(160,'/users/images/raw_images/d5b1b7efe5042e0340f2b91c7978cf2028b0d81d.54',1,1492025716,NULL,1,1505,571,'width=\"1505\" height=\"571\"','image/png','amazon','/users/images/thumbnails/phpNDD9Qa.54','/users/images/preview/phpNDD9Qa.png',1,5,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
INSERT INTO `image_to_tag` VALUES (122,33,124),(123,98,125),(126,32,121),(127,32,125),(130,98,128),(131,98,129),(135,47,131),(136,47,132),(137,47,133),(138,41,63),(139,41,134),(140,41,135),(141,35,136),(142,35,137),(143,35,138),(144,35,139),(145,45,140),(146,45,141),(147,45,142),(153,106,147),(154,106,148),(155,107,149),(156,107,150),(157,107,151),(158,108,152),(159,108,65),(160,108,153),(161,109,118),(163,111,154),(164,111,155),(165,100,59),(166,101,63),(167,31,109),(173,114,159),(175,107,146),(179,41,160),(184,116,164),(187,107,147),(188,104,146),(189,118,59),(191,121,59),(192,122,59),(193,123,59),(194,116,59),(195,124,168),(196,124,169),(197,124,170),(198,125,161),(199,126,171),(200,126,172),(201,126,173),(202,126,174),(203,127,175),(204,127,176),(205,127,177),(206,127,178),(207,127,179),(208,127,180),(209,128,156),(210,128,157),(211,128,158),(213,128,181),(214,102,182),(215,129,183),(216,129,184),(217,130,185),(218,130,186),(219,131,187),(220,131,188),(221,131,189),(222,132,190),(223,132,191),(224,132,192),(225,133,193),(226,133,194),(227,134,195),(228,135,196),(229,135,197),(230,135,198),(231,135,199),(232,136,200),(233,136,196),(234,136,201),(235,137,202),(236,137,203),(237,138,204),(238,138,205),(239,138,206),(240,139,207),(241,139,208),(242,139,209),(243,140,210),(244,140,211),(245,140,212),(246,140,213),(247,31,214),(248,31,215),(249,31,216),(250,141,217),(251,141,218),(252,141,219),(253,142,220),(254,142,221),(255,142,222),(256,143,221),(257,143,220),(258,143,223),(259,144,224),(260,144,225),(261,144,226),(262,145,227),(263,145,228),(264,145,229),(265,146,61),(266,146,218),(267,146,59),(268,147,230),(269,147,231),(270,147,232),(271,147,233),(272,148,234),(273,148,161),(274,148,235),(284,152,238),(285,152,55),(286,152,57),(287,152,56),(288,153,57),(289,154,239),(290,154,140),(291,154,240),(292,156,241),(293,157,242),(294,157,78),(295,157,243),(296,158,244),(297,159,245),(298,160,246);
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
  `owner_id` int(11) DEFAULT NULL,
  `created_at` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_owned`
--

LOCK TABLES `images_owned` WRITE;
/*!40000 ALTER TABLE `images_owned` DISABLE KEYS */;
INSERT INTO `images_owned` VALUES (1,1,30,1,NULL,NULL),(2,1,31,1,NULL,NULL),(3,1,32,1,NULL,NULL),(4,1,33,1,NULL,NULL),(5,5,35,1,NULL,NULL),(6,5,36,1,NULL,NULL),(7,5,37,1,NULL,NULL),(8,5,39,1,NULL,NULL),(9,5,40,1,NULL,NULL),(10,5,41,1,NULL,NULL),(11,5,42,1,NULL,NULL),(12,5,43,1,NULL,NULL),(13,5,44,1,NULL,NULL),(14,5,45,1,NULL,NULL),(15,5,46,1,NULL,NULL),(16,5,47,1,NULL,NULL),(17,1,98,1,NULL,NULL),(18,1,99,1,NULL,NULL),(19,1,100,1,NULL,NULL),(20,1,101,1,NULL,NULL),(21,1,102,1,NULL,NULL),(22,1,103,1,NULL,NULL),(23,5,104,1,NULL,NULL),(24,1,106,1,NULL,NULL),(25,5,107,1,NULL,NULL),(26,5,108,1,NULL,NULL),(27,5,111,1,NULL,NULL),(28,1,114,1,NULL,NULL),(29,5,116,1,NULL,NULL),(30,5,117,1,NULL,NULL),(31,5,118,1,NULL,NULL),(32,5,119,1,NULL,NULL),(33,5,121,1,NULL,NULL),(34,5,122,1,NULL,NULL),(35,5,123,1,NULL,NULL),(36,5,124,1,NULL,NULL),(37,1,47,2,NULL,NULL),(38,1,47,2,NULL,NULL),(39,5,100,2,NULL,NULL),(40,5,114,2,NULL,NULL),(41,1,126,2,NULL,NULL),(42,1,37,2,NULL,NULL),(43,1,121,2,NULL,NULL),(44,1,116,2,NULL,NULL),(45,1,125,2,NULL,NULL),(46,1,125,2,NULL,NULL),(47,1,107,2,NULL,NULL),(48,1,37,2,NULL,NULL),(49,1,123,2,NULL,NULL),(50,1,98,2,NULL,NULL),(51,1,100,2,NULL,NULL),(52,1,122,2,NULL,NULL),(53,1,122,2,NULL,NULL),(54,1,124,2,NULL,NULL),(55,1,45,2,NULL,NULL),(56,1,43,2,NULL,NULL),(57,1,100,2,NULL,NULL),(58,5,46,2,NULL,NULL),(59,8,134,2,NULL,NULL),(60,8,133,2,NULL,NULL),(61,8,132,2,NULL,NULL),(62,9,131,2,NULL,NULL),(63,9,130,2,NULL,NULL),(64,9,129,2,NULL,NULL),(65,9,138,2,NULL,NULL),(66,9,137,2,NULL,NULL),(67,9,136,2,NULL,NULL),(68,8,132,2,NULL,NULL),(69,8,130,2,NULL,NULL),(70,5,133,2,NULL,NULL),(71,5,131,2,NULL,NULL),(72,5,111,2,NULL,NULL),(73,8,135,2,NULL,NULL),(74,1,42,2,5,NULL),(75,8,137,2,6,NULL),(76,8,136,2,6,NULL),(77,8,135,2,6,NULL),(78,8,133,2,7,NULL),(79,8,134,2,7,NULL),(80,8,132,2,7,NULL),(81,8,131,2,6,NULL),(82,9,138,2,6,NULL),(83,9,130,2,6,NULL),(84,9,129,2,6,NULL),(85,9,137,2,6,NULL),(86,9,132,2,7,NULL),(87,8,147,2,6,1489470913),(88,8,146,2,6,1489470913),(89,8,145,2,6,1489470913),(90,9,144,2,6,1489470955),(91,9,143,2,6,1489470955),(92,9,142,2,6,1489470955),(93,9,141,2,6,1489470955),(94,8,147,2,6,1489471187),(95,8,146,2,6,1489471187),(96,8,145,2,6,1489471187),(97,9,144,2,6,1489471219),(98,9,143,2,6,1489471219),(99,9,142,2,6,1489471219),(100,9,141,2,6,1489471219),(101,1,157,2,1,1493153539),(102,1,159,2,1,1493153746),(103,1,140,2,1,1493154198),(104,1,140,2,1,1493154283),(105,1,158,2,1,1493154283),(106,1,140,2,1,1493154457),(107,1,158,2,1,1493154457),(108,1,158,2,1,1493154457),(109,1,144,2,6,1493154549),(110,1,144,2,6,1493154728),(111,1,144,2,6,1493154779),(112,1,144,2,6,1493154926),(113,1,144,2,6,1493154958),(114,1,141,2,6,1493244182),(115,1,157,2,1,1493244564);
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
  `merchant` enum('paypal','squarepay') DEFAULT NULL,
  `merchant_account` text,
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
INSERT INTO `profile` VALUES (1,'Brian','Moniz',NULL,'C','2175 Sidewinder Dr','Park City','UT','84060','05/08/1986',1,'/users/avatarsphpRFMNge.gif','paypal','test@paypal.com');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `created_at` int(50) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (8,6,8,'3',1489471187,147),(9,6,8,'3',1489471187,146),(10,6,8,'3',1489471187,145),(11,6,9,'3',1489471219,144),(12,6,9,'3',1489471219,143),(13,6,9,'3',1489471219,142),(14,6,9,'3',1489471219,141),(15,1,1,'5',1493153539,157),(16,1,1,'5',1493153746,159),(17,1,1,'3',1493154198,140),(18,1,1,'3',1493154283,140),(19,1,1,'5',1493154283,158),(20,1,1,'3',1493154457,140),(21,1,1,'5',1493154457,158),(22,1,1,'5',1493154457,158),(23,6,1,'3',1493154549,144),(24,6,1,'3',1493154728,144),(25,6,1,'3',1493154779,144),(26,6,1,'3',1493154926,144),(27,6,1,'3',1493154958,144),(28,6,1,'3',1493244182,141),(29,1,1,'5',1493244564,157);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('copyright','nudity','graphic violence') NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text,
  `created_at` int(50) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'copyright',1,'boom',1490128146,148);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` VALUES (5,9,NULL,'website demo','test',0,1480546998),(1,10,NULL,NULL,NULL,1487282719,NULL);
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
  `class` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_details`
--

LOCK TABLES `subscription_details` WRITE;
/*!40000 ALTER TABLE `subscription_details` DISABLE KEYS */;
INSERT INTO `subscription_details` VALUES (1,1,'Bronze',5,9.99,'bronze-name'),(2,2,'Silver',12,19.99,'silver-name'),(5,3,'Gold',25,29.99,'gold-name');
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
  `owner_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_purchase`
--

LOCK TABLES `subscription_purchase` WRITE;
/*!40000 ALTER TABLE `subscription_purchase` DISABLE KEYS */;
INSERT INTO `subscription_purchase` VALUES (17,9,6,138,1488491795),(18,9,6,137,1488491807),(19,9,6,136,1488491816),(20,8,7,132,1488491832),(21,8,6,130,1488491839),(22,5,7,133,1488494443),(23,5,6,131,1488494451),(24,5,5,111,1488494461),(25,8,6,135,1488601258);
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
  `period_start` int(30) NOT NULL,
  `period_end` int(30) NOT NULL,
  `stripe_subscription_id` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_to_user`
--

LOCK TABLES `subscription_to_user` WRITE;
/*!40000 ALTER TABLE `subscription_to_user` DISABLE KEYS */;
INSERT INTO `subscription_to_user` VALUES (2,5,3,1488494431,1488494430,1491172830,'sub_ADTY5Y5h2TKw54'),(4,9,1,1488487776,1488487776,1491166176,'sub_ADRlxp22nscWSe'),(5,8,2,1488488696,1488488695,1491167095,'sub_ADS0LyNySgmzOE'),(6,1,1,1493330763,1493330762,1495922762,'sub_AYRdWrRSNSIPHp');
/*!40000 ALTER TABLE `subscription_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestion`
--

LOCK TABLES `suggestion` WRITE;
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;
INSERT INTO `suggestion` VALUES (1,NULL,'test@test.com','Here is the suggestion',1491947819),(2,NULL,'test@test.com','Here is the suggestion',1491947963),(3,NULL,'test@test.com','Here is the suggestion',1491947966),(4,NULL,'bcm811@gmail.com','Testing the suggestion box',1493146610),(5,NULL,'bcm811@gmail.com','this is a test about a suggestion',1493328206),(6,NULL,'bcm811@gmail.com','this is a test about a suggestion',1493328268);
/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(167,NULL),(78,''),(162,'9/11'),(207,'911'),(128,'a'),(126,'add'),(77,'air bubbles'),(132,'air force'),(229,'airplane'),(203,'album cover'),(246,'amazon-2'),(124,'another'),(242,'ao nang'),(239,'armchairs'),(180,'asbestos\\'),(129,'b'),(211,'baby'),(212,'baby elephant'),(200,'backflip'),(214,'bat'),(215,'batman'),(244,'BC'),(234,'blue'),(131,'blue jets'),(152,'boat'),(201,'boating'),(57,'boots'),(166,'Brian'),(154,'building'),(150,'bus'),(151,'bus tour'),(164,'bush'),(163,'bush did 9/11'),(223,'cartoon'),(221,'cave'),(204,'cdjs'),(141,'chairs'),(191,'Cliff Dive'),(138,'cloud'),(181,'clouds'),(237,'colorado river'),(74,'cowboy'),(220,'crystal'),(136,'cumulo nimbus'),(226,'daytime'),(224,'denver'),(81,'dirt'),(205,'dj'),(230,'DJ Sasha'),(60,'downhill mountain bike'),(142,'drawing room'),(148,'e-cigg'),(210,'elephant'),(173,'fake nose'),(177,'fire'),(178,'fire extinguisher'),(179,'fireman'),(153,'fishing'),(71,'frozen lake'),(240,'furniture'),(209,'george w'),(174,'glasses'),(236,'grand canyon'),(171,'groucho'),(228,'gv'),(109,'harley'),(216,'harley quinn'),(170,'healthy'),(108,'hope'),(75,'horse'),(232,'House Music'),(185,'interstellar'),(87,'island'),(217,'jeep'),(227,'jet'),(192,'Jump'),(176,'junior'),(113,'laces'),(188,'lake'),(80,'lambo'),(140,'leather'),(233,'Legend'),(206,'loud'),(133,'loud noises'),(127,'many'),(172,'marx'),(165,'me'),(218,'moab'),(147,'mod'),(187,'moon'),(83,'mountain'),(61,'mountain bike'),(59,'mtb'),(189,'night'),(238,'nike'),(130,'no'),(197,'no person'),(65,'ocean'),(68,'ocean kayak'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(222,'oregon'),(193,'palm tree'),(135,'phillipines'),(186,'photoshop'),(157,'pine'),(213,'pink blanket'),(72,'pond'),(190,'Portugal'),(175,'pot pie'),(82,'pow'),(195,'powerman 5000'),(156,'red pine'),(219,'redrock'),(241,'rotate'),(169,'salad'),(168,'salada'),(231,'Sasha'),(160,'scuba'),(143,'scuba diver'),(199,'sewer'),(245,'ski'),(139,'sky'),(159,'skydive'),(225,'skyline'),(134,'small boat'),(56,'snow'),(55,'snowboard boots'),(102,'something'),(194,'sunset'),(208,'terrorism'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(158,'tree'),(149,'triple decker bus'),(117,'trying to duplicate'),(116,'twice'),(121,'two'),(243,'upsidedown'),(146,'vape'),(196,'wakeboard'),(155,'warehouse'),(161,'water'),(235,'wave'),(182,'whale shark'),(63,'whaleshark'),(137,'white cloud'),(76,'winter'),(198,'wolfgang'),(202,'wolfgang gartner'),(122,'won'),(184,'yang'),(110,'yes'),(183,'ying');
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
  `stripe_id` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brian','bcm811@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/phpYlkMok.png','Brian',NULL,NULL,NULL,1,1483998888,'','cus_ADTXNccVQKXBVP'),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a',NULL,'Ludo',NULL,'Bagman',NULL,2,1483998888,'',NULL),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc',NULL,'Rita',NULL,'Skeeter',NULL,2,1483998888,'',NULL),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png','Ronald',NULL,'Weasley',NULL,2,1483998888,'','cus_A9gDNkV2vTWaw0'),(6,'tester','tester@tester.com','7abcddbb2c74e4c0789c2c0aa6abcf5172e82e9f4916bc6409fc3989ed673e08-v­kn×','-v­kn×','/users/avatars/phpurauEi.png','Hermione',NULL,'Granger',NULL,2,1488484260,NULL,NULL),(7,'tester2','tester2@tester2.com','7cd477192d54ceb8673be093f443b8622c612896880f6879c7f8ec16fa7ba114Bö\"VãÈ','Bö\"VãÈ','/users/avatars/phpFKlffA.png','Cornelius',NULL,'Fudge',NULL,2,1488485073,NULL,NULL),(8,'buy','buy@buy.com','37db0a2d4e9ff39261fb2aafdaee60625f7e6dd1ba6260a85f7258f76ed0d011béÿý2[','béÿý2[',NULL,'Habeus',NULL,'Hagrid',NULL,2,1488485162,NULL,'cus_ADS0enKkH1xmgl'),(9,'buy2','buy2@buy2.com','f2eb7711ddc912fe7fd271b0192ca4dedaabfb5b2bd2a790bac0bc986f80f9deŠB“ä²•¬','ŠB“ä²•¬',NULL,'Albus',NULL,'Dumbledore',NULL,2,1488485173,NULL,'cus_ADRl2mVytCOaMH');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` VALUES (3,106,147,'127.0.0.1',5,1),(4,106,147,'127.0.0.3',6,1),(5,104,146,'127.0.0.1',5,1),(6,107,146,'127.0.0.1',5,1),(7,107,146,'127.0.0.2',6,1),(8,116,59,'127.0.0.1',5,1),(9,100,59,'127.0.0.1',5,1),(10,100,59,'127.0.0.1',5,1),(11,100,59,'127.0.0.1',5,1),(12,100,59,'127.0.0.1',5,1),(13,121,59,'127.0.0.1',5,1),(14,121,59,'127.0.0.1',5,1),(15,121,59,'127.0.0.1',5,1),(16,121,59,'127.0.0.1',5,1),(17,121,59,'127.0.0.1',5,1),(18,121,59,'127.0.0.1',5,1),(19,121,59,'127.0.0.1',5,1),(20,121,59,'127.0.0.1',5,1),(21,121,59,'127.0.0.1',5,1),(22,121,59,'127.0.0.1',5,1),(23,121,59,'127.0.0.1',5,1),(24,121,59,'127.0.0.1',5,1),(25,121,59,'127.0.0.1',5,1),(26,121,59,'127.0.0.1',5,1),(27,121,59,'127.0.0.1',5,1),(28,122,59,'127.0.0.1',5,1),(29,122,59,'127.0.0.1',5,1),(30,122,59,'127.0.0.1',5,1),(31,123,59,'127.0.0.1',5,1),(32,118,59,'127.0.0.1',5,1),(33,118,59,'127.0.0.1',5,1),(34,118,59,'127.0.0.1',5,1),(35,118,59,'127.0.0.1',5,1),(36,118,59,'127.0.0.1',5,1),(37,114,159,'127.0.0.1',1,-1),(38,133,193,'127.0.0.1',1,1),(39,133,194,'127.0.0.1',1,1),(40,146,59,'127.0.0.1',1,1),(41,146,59,'127.0.0.1',1,1);
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

-- Dump completed on 2017-04-27 16:07:30
