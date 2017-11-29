-- MySQL dump 10.14  Distrib 5.5.57-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: idiorm_production
-- ------------------------------------------------------
-- Server version	5.5.57-MariaDB-1ubuntu0.14.04.1

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_image`
--

LOCK TABLES `album_image` WRITE;
/*!40000 ALTER TABLE `album_image` DISABLE KEYS */;
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
  `approved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (4,'sports',NULL,1),(5,'outdoors',NULL,1),(6,'city',NULL,1),(7,'plants',NULL,1),(8,'animals',NULL,1),(9,'people',NULL,1),(10,'food',NULL,1),(11,'events',NULL,1),(12,'things',NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_to_image`
--

LOCK TABLES `category_to_image` WRITE;
/*!40000 ALTER TABLE `category_to_image` DISABLE KEYS */;
INSERT INTO `category_to_image` VALUES (56,1,44),(57,1,36),(58,1,41),(59,1,37),(60,2,37),(61,3,47),(62,3,112),(63,3,113),(65,1,115),(66,1,116),(67,1,117),(68,3,118),(69,3,120),(70,3,121),(71,3,122),(72,3,123),(73,12,190),(86,12,125),(87,12,126),(88,9,127),(89,9,139),(90,5,191),(91,5,192),(92,5,193),(93,6,194),(94,5,195);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_owned`
--

LOCK TABLES `images_owned` WRITE;
/*!40000 ALTER TABLE `images_owned` DISABLE KEYS */;
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
  `first_name` text,
  `last_name` text,
  `avatar_path` text,
  `middle_name` text,
  `street_address` text,
  `city` text,
  `state` text,
  `zip_code` text,
  `dob` text,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `avatar` text,
  `merchant` enum('paypal','squarepay') DEFAULT NULL,
  `merchant_account` text,
  `country` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Brian','Moniz',NULL,'C','2175 Sidewinder Dr','Park City','UT','84060','05/08/1986',1,'/users/avatarsphpRFMNge.gif','paypal','test@paypal.com',NULL),(10,'James','Borsje-Clark',NULL,'',NULL,'Christchurch','',NULL,NULL,55,NULL,NULL,NULL,'New Zealand');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
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
  `resolved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (1,'copyright',1,'boom',1490128146,148,1),(2,'copyright',8,'opt desc',1493608172,137,1),(3,'',8,'sex and violence',1493608190,134,1),(4,'nudity',8,'nudes',1493608203,127,1);
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_history`
--

DROP TABLE IF EXISTS `search_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `search_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query` text NOT NULL,
  `created_at` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_history`
--

LOCK TABLES `search_history` WRITE;
/*!40000 ALTER TABLE `search_history` DISABLE KEYS */;
INSERT INTO `search_history` VALUES (1,'i hope this query saves',1495773914),(2,'mtb',1496426486),(3,'image',1496972889),(4,'water',1496972893),(5,'water',1496972900),(6,'city',1496973058),(7,'mtb',1497246850);
/*!40000 ALTER TABLE `search_history` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(167,NULL),(78,''),(162,'9/11'),(207,'911'),(128,'a'),(126,'add'),(276,'air'),(77,'air bubbles'),(132,'air force'),(229,'airplane'),(203,'album cover'),(298,'alday'),(278,'alps'),(246,'amazon-2'),(124,'another'),(242,'ao nang'),(239,'armchairs'),(180,'asbestos\\'),(262,'asia'),(129,'b'),(211,'baby'),(212,'baby elephant'),(200,'backflip'),(214,'bat'),(215,'batman'),(244,'BC'),(261,'below'),(275,'berm'),(260,'bike'),(254,'bike drop'),(295,'bitcoin'),(305,'black and white'),(234,'blue'),(131,'blue jets'),(306,'blue pond'),(152,'boat'),(201,'boating'),(57,'boots'),(166,'Brian'),(154,'building'),(150,'bus'),(151,'bus tour'),(164,'bush'),(163,'bush did 9/11'),(251,'cactus'),(223,'cartoon'),(221,'cave'),(204,'cdjs'),(141,'chairs'),(310,'city'),(304,'cityscape'),(191,'Cliff Dive'),(297,'clock'),(138,'cloud'),(181,'clouds'),(237,'colorado river'),(74,'cowboy'),(293,'crypto mining'),(220,'crystal'),(136,'cumulo nimbus'),(247,'cyclist'),(226,'daytime'),(224,'denver'),(81,'dirt'),(205,'dj'),(230,'DJ Sasha'),(269,'downhill'),(60,'downhill mountain bike'),(142,'drawing room'),(271,'dry'),(148,'e-cigg'),(210,'elephant'),(270,'elevation'),(173,'fake nose'),(177,'fire'),(178,'fire extinguisher'),(179,'fireman'),(153,'fishing'),(258,'flow trail'),(300,'foliage'),(299,'forest'),(279,'fresh woodlands'),(71,'frozen lake'),(268,'full face'),(240,'furniture'),(209,'george w'),(174,'glasses'),(272,'goggles'),(236,'grand canyon'),(273,'grass'),(280,'green'),(301,'green forest'),(303,'green pond'),(171,'groucho'),(228,'gv'),(109,'harley'),(216,'harley quinn'),(170,'healthy'),(253,'helmet'),(108,'hope'),(75,'horse'),(248,'hottie'),(232,'House Music'),(185,'interstellar'),(87,'island'),(307,'japan'),(217,'jeep'),(227,'jet'),(192,'Jump'),(176,'junior'),(113,'laces'),(188,'lake'),(80,'lambo'),(140,'leather'),(233,'Legend'),(288,'lift access'),(206,'loud'),(133,'loud noises'),(127,'many'),(172,'marx'),(165,'me'),(309,'middle east'),(294,'mining rig'),(218,'moab'),(147,'mod'),(187,'moon'),(308,'mosque'),(283,'motivation'),(83,'mountain'),(61,'mountain bike'),(285,'mountain biking'),(274,'mountain terrain bike'),(257,'mountains'),(59,'mtb'),(277,'mtb event'),(314,'new tag'),(189,'night'),(238,'nike'),(130,'no'),(197,'no person'),(65,'ocean'),(68,'ocean kayak'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(222,'oregon'),(193,'palm tree'),(311,'path'),(135,'phillipines'),(186,'photoshop'),(157,'pine'),(213,'pink blanket'),(72,'pond'),(190,'Portugal'),(175,'pot pie'),(82,'pow'),(195,'powerman 5000'),(282,'progress'),(250,'red'),(267,'red bull'),(156,'red pine'),(219,'redrock'),(264,'rollers'),(241,'rotate'),(296,'rx480'),(169,'salad'),(168,'salada'),(231,'Sasha'),(160,'scuba'),(143,'scuba diver'),(199,'sewer'),(287,'shadow'),(263,'shepard'),(255,'single track'),(245,'ski'),(139,'sky'),(159,'skydive'),(225,'skyline'),(134,'small boat'),(56,'snow'),(55,'snowboard boots'),(291,'snowboarding'),(289,'snowcap'),(102,'something'),(259,'summer'),(313,'sunlight'),(312,'sunrays'),(194,'sunset'),(290,'tail whip'),(208,'terrorism'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(281,'tower'),(158,'tree'),(302,'trees'),(149,'triple decker bus'),(117,'trying to duplicate'),(116,'twice'),(121,'two'),(243,'upsidedown'),(146,'vape'),(196,'wakeboard'),(256,'wales'),(155,'warehouse'),(161,'water'),(235,'wave'),(182,'whale shark'),(63,'whaleshark'),(286,'wheelie'),(137,'white cloud'),(249,'wide'),(76,'winter'),(198,'wolfgang'),(202,'wolfgang gartner'),(284,'woman'),(122,'won'),(265,'wood jib'),(266,'wood job'),(292,'woods'),(184,'yang'),(110,'yes'),(183,'ying');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brian','bcm811@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/phpYlkMok.png','Brian',NULL,NULL,NULL,1,1483998888,'','cus_ADTXNccVQKXBVP'),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a',NULL,'Ludo',NULL,'Bagman',NULL,2,1483998888,'',NULL),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc',NULL,'Rita',NULL,'Skeeter',NULL,2,1483998888,'',NULL),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png','Ronald',NULL,'Weasley',NULL,2,1483998888,'','cus_A9gDNkV2vTWaw0'),(6,'tester','tester@tester.com','7abcddbb2c74e4c0789c2c0aa6abcf5172e82e9f4916bc6409fc3989ed673e08-v­kn×','-v­kn×','/users/avatars/phpurauEi.png','Hermione',NULL,'Granger',NULL,2,1488484260,NULL,NULL),(7,'tester2','tester2@tester2.com','7cd477192d54ceb8673be093f443b8622c612896880f6879c7f8ec16fa7ba114Bö\"VãÈ','Bö\"VãÈ','/users/avatars/phpFKlffA.png','Cornelius',NULL,'Fudge',NULL,2,1488485073,NULL,NULL),(8,'buy','buy@buy.com','37db0a2d4e9ff39261fb2aafdaee60625f7e6dd1ba6260a85f7258f76ed0d011béÿý2[','béÿý2[',NULL,'Habeus',NULL,'Hagrid',NULL,2,1488485162,NULL,'cus_ADS0enKkH1xmgl'),(9,'buy2','buy2@buy2.com','f2eb7711ddc912fe7fd271b0192ca4dedaabfb5b2bd2a790bac0bc986f80f9deŠB“ä²•¬','ŠB“ä²•¬',NULL,'Albus',NULL,'Dumbledore',NULL,2,1488485173,NULL,'cus_ADRl2mVytCOaMH'),(10,'JamesBC','j_borsje-clark@windowslive.com','30aca92b73909661df7052fd91c18f5aad958b7dfff025f4675f00cea16b849c«KÚû1-ý','«KÚû1-ý','/users/avatars/phpvJYOtZ.jpg',NULL,NULL,NULL,NULL,2,1503767939,NULL,NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
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

-- Dump completed on 2017-08-28 12:58:35
