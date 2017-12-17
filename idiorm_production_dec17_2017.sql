-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: idiorm_production
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (4,'sports',NULL,1),(5,'outdoors',NULL,1),(6,'city',NULL,1),(7,'plants',NULL,1),(8,'animals',NULL,1),(9,'people',NULL,1),(10,'food',NULL,1),(11,'events',NULL,1),(12,'things',NULL,1),(13,'Travel',NULL,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_to_image`
--

LOCK TABLES `category_to_image` WRITE;
/*!40000 ALTER TABLE `category_to_image` DISABLE KEYS */;
INSERT INTO `category_to_image` VALUES (96,5,2),(97,5,3),(98,5,4),(99,5,5),(100,5,6),(101,5,7),(102,5,8),(103,5,9),(104,5,10),(105,5,11),(106,5,12),(107,5,13),(108,5,14),(109,5,15),(110,5,16),(111,5,17),(112,5,18),(113,5,19),(114,5,20),(115,5,21),(116,5,22),(117,5,23),(118,5,24),(119,8,25),(120,5,26),(122,5,28),(123,5,29),(124,5,30),(125,9,31),(126,5,32),(127,12,40),(128,12,41),(129,12,42),(130,5,43),(131,12,44),(132,12,45),(133,5,46),(134,5,47),(135,12,48),(136,4,49),(137,12,50),(138,6,51),(139,6,52),(140,6,53),(141,7,54),(142,6,55),(143,4,56),(144,6,58),(146,4,61),(147,10,62),(148,6,63),(149,12,64),(150,5,65),(151,5,66),(152,5,67),(153,12,68),(154,5,69),(155,5,70),(156,5,71),(157,5,72),(158,5,73),(159,5,74),(160,5,75),(161,5,76),(162,5,77),(163,8,78),(164,5,79),(165,12,80),(166,5,81),(167,5,82),(169,9,84),(170,5,85),(171,5,86),(172,11,88),(173,10,89),(174,7,90),(175,9,91),(176,5,92),(177,5,93),(178,5,94),(179,12,95),(180,12,96),(181,6,97),(182,12,98),(183,9,99),(184,4,100),(185,4,101),(186,8,102),(187,5,103),(188,4,104),(189,5,105),(190,5,106),(191,4,107),(192,4,108),(193,5,109),(194,4,110);
/*!40000 ALTER TABLE `category_to_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `download`
--

DROP TABLE IF EXISTS `download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
INSERT INTO `download` VALUES (1,1,1,28,'2017-10-28 20:36:28'),(2,10,1,24,'2017-11-06 20:38:17'),(3,1,1,94,'2017-12-05 03:23:29');
/*!40000 ALTER TABLE `download` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (2,'/users/images/raw_images/13a91beef42b3c86fa655cb94dbb2e7119393b2d.jpg',10,1504022890,NULL,1,5355,3112,'width=\"5355\" height=\"3112\"','image/jpeg','jbc01','/users/images/thumbnails/php1rjmN9.jpeg','/users/images/preview/php1rjmN9.jpeg',1,5,1,NULL),(3,'/users/images/raw_images/08c0205e277729da3aa3b3f6615932013cca7d40.jpg',10,1504023222,NULL,1,5343,3679,'width=\"5343\" height=\"3679\"','image/jpeg','jbc02','/users/images/thumbnails/php51YnZg.jpeg','/users/images/preview/php51YnZg.jpeg',1,5,1,NULL),(4,'/users/images/raw_images/e4f3396763e9d9bb1999470d867dec3bf441703f.jpg',10,1504023363,NULL,1,2347,2200,'width=\"2347\" height=\"2200\"','image/jpeg','jbc03','/users/images/thumbnails/phpHY07CB.jpeg','/users/images/preview/phpHY07CB.jpeg',1,5,1,NULL),(5,'/users/images/raw_images/62979f4b1d21500c22f4832d494556b3cb1e0f37.jpg',10,1504023433,NULL,1,3343,3674,'width=\"3343\" height=\"3674\"','image/jpeg','jbc04','/users/images/thumbnails/phpLWBDyu.jpeg','/users/images/preview/phpLWBDyu.jpeg',1,5,1,NULL),(6,'/users/images/raw_images/018162c99a909ea8184dd92ea682827e9a7ff9a7.jpg',10,1504023481,NULL,1,1947,1595,'width=\"1947\" height=\"1595\"','image/jpeg','jbc05','/users/images/thumbnails/phpGvT5iJ.jpeg','/users/images/preview/phpGvT5iJ.jpeg',1,5,1,NULL),(7,'/users/images/raw_images/f773cf6488460c4d38b758086051015d7aa9aee7.jpg',10,1504023529,NULL,1,3337,2887,'width=\"3337\" height=\"2887\"','image/jpeg','jbc06','/users/images/thumbnails/phpwfWpJu.jpeg','/users/images/preview/phpwfWpJu.jpeg',1,5,1,NULL),(8,'/users/images/raw_images/b145169978aac65c5f1ef80db0c86f4bd0b244b2.jpg',10,1504023587,NULL,1,3744,3970,'width=\"3744\" height=\"3970\"','image/jpeg','jbc07','/users/images/thumbnails/phpsrEPhM.jpeg','/users/images/preview/phpsrEPhM.jpeg',1,5,1,NULL),(9,'/users/images/raw_images/ca7c802e150e449f5de89c7c731f7bcb7e6d5d6a.jpg',10,1504024779,NULL,1,3744,5616,'width=\"3744\" height=\"5616\"','image/jpeg','jbc08','/users/images/thumbnails/php42nGll.jpeg','/users/images/preview/php42nGll.jpeg',1,5,1,NULL),(10,'/users/images/raw_images/201c05169c62265507e320bbf908bda8bfe5153c.jpg',10,1504025049,NULL,1,3744,4932,'width=\"3744\" height=\"4932\"','image/jpeg','jbc09','/users/images/thumbnails/phpOQNHM4.jpeg','/users/images/preview/phpOQNHM4.jpeg',1,5,1,NULL),(11,'/users/images/raw_images/7f094a28c9df6da493cfadf23cab4c7d783db177.jpg',10,1504025106,NULL,1,3051,4063,'width=\"3051\" height=\"4063\"','image/jpeg','jbc10','/users/images/thumbnails/phpFEomzq.jpeg','/users/images/preview/phpFEomzq.jpeg',1,5,1,NULL),(12,'/users/images/raw_images/5d4ae9baf7e4066ac15c93f5c1d2476f894dff7e.jpg',10,1504025159,NULL,1,3160,3298,'width=\"3160\" height=\"3298\"','image/jpeg','jbc11','/users/images/thumbnails/phpPFVcbN.jpeg','/users/images/preview/phpPFVcbN.jpeg',1,5,1,NULL),(13,'/users/images/raw_images/e91c31322ed136a187dab2c7ab5bf07f989f8165.jpg',10,1504025212,NULL,1,5616,2458,'width=\"5616\" height=\"2458\"','image/jpeg','jbc12','/users/images/thumbnails/phpdLhbiW.jpeg','/users/images/preview/phpdLhbiW.jpeg',1,5,1,NULL),(14,'/users/images/raw_images/9b6113402a4a75668e3099c14f80c5440bc9242c.jpg',10,1504025448,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc13','/users/images/thumbnails/php7aZNsx.jpeg','/users/images/preview/php7aZNsx.jpeg',1,5,1,NULL),(15,'/users/images/raw_images/7b46e1da3038aa543c574b8e8b81f4914f0a0ebd.jpg',10,1504025557,NULL,1,3596,5395,'width=\"3596\" height=\"5395\"','image/jpeg','jbc14','/users/images/thumbnails/phpVPxuYD.jpeg','/users/images/preview/phpVPxuYD.jpeg',1,5,1,NULL),(16,'/users/images/raw_images/037c0788e68b00cac139f9b7f6cc4535047ad4b8.crop',10,1504025641,NULL,1,3355,3964,'width=\"3355\" height=\"3964\"','image/jpeg','jbc15','/users/images/thumbnails/phpEYAgs9.crop','/users/images/preview/phpEYAgs9.jpeg',1,5,1,NULL),(17,'/users/images/raw_images/49582dd29cfbab99a51e3c80dde970c118ce3c89.jpg',10,1504025878,NULL,1,3582,3734,'width=\"3582\" height=\"3734\"','image/jpeg','jbc16','/users/images/thumbnails/php2uiQ42.jpeg','/users/images/preview/php2uiQ42.jpeg',1,5,1,NULL),(18,'/users/images/raw_images/37b49e60c1d5edfa2a3064774147a9f977efad6a.jpg',10,1504026201,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc16','/users/images/thumbnails/phpZwLmtu.jpeg','/users/images/preview/phpZwLmtu.jpeg',1,5,1,NULL),(19,'/users/images/raw_images/ec5b329b7bc11014c7eb6c790e1e16ea768ee50a.jpg',10,1504026931,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc17','/users/images/thumbnails/phpfzwsBm.jpeg','/users/images/preview/phpfzwsBm.jpeg',1,5,1,NULL),(20,'/users/images/raw_images/766354b477a10b1a80f7d92919f6aa7f6d72a142.jpg',10,1504027132,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc18','/users/images/thumbnails/phpN1uDWs.jpeg','/users/images/preview/phpN1uDWs.jpeg',1,5,1,NULL),(21,'/users/images/raw_images/1e3540b7b0a85f3498124d9b7e7f4338e27278ec.jpg',10,1504027183,NULL,1,4028,3368,'width=\"4028\" height=\"3368\"','image/jpeg','jbc19','/users/images/thumbnails/php4vWFpc.jpeg','/users/images/preview/php4vWFpc.jpeg',1,5,1,NULL),(22,'/users/images/raw_images/094ae3b782a8032ddeaae3a14c0e535f80af4d30.jpg',10,1504027241,NULL,1,4186,3359,'width=\"4186\" height=\"3359\"','image/jpeg','jbc20','/users/images/thumbnails/phpT8NLvE.jpeg','/users/images/preview/phpT8NLvE.jpeg',1,5,1,NULL),(23,'/users/images/raw_images/6fb0d7bf11e6c42779a54a44ff75f54233c96ab8.jpg',10,1504027286,NULL,1,5616,1944,'width=\"5616\" height=\"1944\"','image/jpeg','jbc21','/users/images/thumbnails/phpizwtzQ.jpeg','/users/images/preview/phpizwtzQ.jpeg',1,5,1,NULL),(24,'/users/images/raw_images/5cd5172cf5d0aebfeec4c8d6f1ecbafa7d8048bb.jpg',10,1504027382,NULL,1,3744,2677,'width=\"3744\" height=\"2677\"','image/jpeg','jbc22','/users/images/thumbnails/phpEUz88J.jpeg','/users/images/preview/phpEUz88J.jpeg',1,5,1,NULL),(25,'/users/images/raw_images/6b19fb9ca02fdccd3574ff57f7290b54736b2d0a.jpg',10,1504027597,NULL,1,3744,5616,'width=\"3744\" height=\"5616\"','image/jpeg','jbc23','/users/images/thumbnails/phpiyCqid.jpeg','/users/images/preview/phpiyCqid.jpeg',1,5,1,NULL),(26,'/users/images/raw_images/b89c16836de81ccaf87ef6d8764ba2ba06e37d75.jpg',10,1504027635,NULL,1,3025,3146,'width=\"3025\" height=\"3146\"','image/jpeg','jbc24','/users/images/thumbnails/php6HyyDT.jpeg','/users/images/preview/php6HyyDT.jpeg',1,5,1,NULL),(28,'/users/images/raw_images/26def607530c05303a24e9e9f27ac283345cbd0b.jpg',1,1509222829,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','mossy-trees','/users/images/thumbnails/php90aclY.jpeg','/users/images/preview/php90aclY.jpeg',1,5,1,NULL),(29,'/users/images/raw_images/7323aacd9f175e4851c727beba71095dc741b85e.jpg',1,1509223315,NULL,1,2448,3264,'width=\"2448\" height=\"3264\"','image/jpeg','dead tree','/users/images/thumbnails/phpt1YmVt.jpeg','/users/images/preview/phpt1YmVt.jpeg',1,5,1,NULL),(30,'/users/images/raw_images/0697d7d1b9f9898ed622e15a040ab97f1278b4f6.jpg',1,1509223506,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','dingy','/users/images/thumbnails/phpwsI9gz.jpeg','/users/images/preview/phpwsI9gz.jpeg',1,5,1,NULL),(31,'/users/images/raw_images/84bd396b03eaa351d2e5e621df12c6531a193716.jpg',1,1509223965,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','ferry couple','/users/images/thumbnails/phpborN80.jpeg','/users/images/preview/phpborN80.jpeg',1,5,1,NULL),(32,'/users/images/raw_images/d9b64467add5e1692162cb0c122180f0889141dd.jpeg',14,1510778586,NULL,1,4032,3024,'width=\"4032\" height=\"3024\"','image/jpeg','Lava hot springs motel ','/users/images/thumbnails/php5nJgLY.jpeg','/users/images/preview/php5nJgLY.jpeg',1,5,1,NULL),(33,'/users/images/raw_images/b756eaf589a95e7172086c84a7dfbc7bce12f5c2.jpeg',14,1510825260,NULL,1,3024,3024,'width=\"3024\" height=\"3024\"','image/jpeg','Come with me ','/users/images/thumbnails/phpNc3GWk.jpeg','/users/images/preview/phpNc3GWk.jpeg',1,5,1,NULL),(34,'/users/images/raw_images/4c7b35dcc3d3c86e40159ded35ae40843a5f1d62.jpeg',14,1510825658,NULL,1,960,720,'width=\"960\" height=\"720\"','image/jpeg','This is where we live now ','/users/images/thumbnails/phphGW7BG.jpeg','/users/images/preview/phphGW7BG.jpeg',1,5,1,NULL),(35,'/users/images/raw_images/15a6d7928e22acba6049106e1a92ae1536aaa151.png',14,1510825804,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/png','Pcb ','/users/images/thumbnails/phpmEMlID.png','/users/images/preview/phpmEMlID.png',1,5,1,NULL),(40,'/users/images/raw_images/c8408015437d879d5f67c266404d47640e0235ff.jpg',1,1510863193,NULL,1,1024,615,'width=\"1024\" height=\"615\"','image/jpeg','ferry-puzzle','/users/images/thumbnails/phpz43ouG.jpeg','/users/images/preview/phpz43ouG.jpeg',1,5,1,NULL),(41,'/users/images/raw_images/0aca6fecbafa12f0eb448da7fd19eaa77f74ecf2.jpg',1,1510863235,NULL,1,1024,611,'width=\"1024\" height=\"611\"','image/jpeg','ferry-no-smoking','/users/images/thumbnails/phpD4B8am.jpeg','/users/images/preview/phpD4B8am.jpeg',1,5,1,NULL),(42,'/users/images/raw_images/eb9429dbe0ac84cb10655308fff14fcb76237fc4.jpg',1,1510939286,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Table','/users/images/thumbnails/phpKKnehI.jpeg','/users/images/preview/phpKKnehI.jpeg',1,5,1,NULL),(43,'/users/images/raw_images/be22c35bb2af9eae3dc566805ff15df61b185ce5.jpg',1,1511472669,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','boat-wake','/users/images/thumbnails/phpU7egdm.jpeg','/users/images/preview/phpU7egdm.jpeg',1,5,1,NULL),(44,'/users/images/raw_images/302785070afe1afebb83561ff0dd92a543e87977.jpg',1,1511477975,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','ferry-booth','/users/images/thumbnails/php3IrGDy.jpeg','/users/images/preview/php3IrGDy.jpeg',1,5,1,NULL),(45,'/users/images/raw_images/e0bb50ec2a6afa3bda6102ca7c2101f2ecc224dd.jpg',1,1511478032,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','life-ring','/users/images/thumbnails/php5MxvzW.jpeg','/users/images/preview/php5MxvzW.jpeg',1,5,1,NULL),(46,'/users/images/raw_images/6891232cc489439a28a1833321be19100b00f75b.jpg',1,1511478060,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','mossy-rock','/users/images/thumbnails/phpKt2Vl6.jpeg','/users/images/preview/phpKt2Vl6.jpeg',1,5,1,NULL),(47,'/users/images/raw_images/418ecf327f4d02750ec3344c7211cf14eeeb734a.jpg',1,1511484552,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Bayview','/users/images/thumbnails/phpqga5go.jpeg','/users/images/preview/phpqga5go.jpeg',1,5,1,NULL),(48,'/users/images/raw_images/bf4d84929579a6f2eca9ed6c84ecbe7602056997.jpg',1,1511484649,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Orcas-skatepark','/users/images/thumbnails/phpGrMtDx.jpeg','/users/images/preview/phpGrMtDx.jpeg',1,5,1,NULL),(49,'/users/images/raw_images/0122a2b6d29ff13480bc5c77e0c2ca35cea552e9.jpg',1,1511484773,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Deervalley','/users/images/thumbnails/phpSVTtTN.jpeg','/users/images/preview/phpSVTtTN.jpeg',1,5,1,NULL),(50,'/users/images/raw_images/86a151aa86a2af08bcb28d2b009de3e3be9ce4cf.jpg',1,1511484838,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Brakepad','/users/images/thumbnails/phpXLvwNx.jpeg','/users/images/preview/phpXLvwNx.jpeg',1,5,1,NULL),(51,'/users/images/raw_images/b9171e46e315aaa699173cd5ea76eee9869de9de.jpg',1,1511484966,NULL,1,5392,1728,'width=\"5392\" height=\"1728\"','image/jpeg','Prov-bridge','/users/images/thumbnails/phpgbYlCx.jpeg','/users/images/preview/phpgbYlCx.jpeg',1,5,1,NULL),(52,'/users/images/raw_images/1a6e8e6143a3107090745cc2c71354f61c5aa3c5.jpg',1,1511485086,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Prov-industrial ','/users/images/thumbnails/php93zL5z.jpeg','/users/images/preview/php93zL5z.jpeg',1,5,1,NULL),(53,'/users/images/raw_images/f2aaee17d1c9b6fa7f313c8322187a9e17cbca1b.jpg',1,1511485199,NULL,1,10464,1696,'width=\"10464\" height=\"1696\"','image/jpeg','Prov-houseboats','/users/images/thumbnails/phpeorEBn.jpeg','/users/images/preview/phpeorEBn.jpeg',1,5,1,NULL),(54,'/users/images/raw_images/722639f37912e6c52d2384b0b8deb32c043c1b8f.jpg',1,1511485287,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Urban-flowers','/users/images/thumbnails/phpME4ORf.jpeg','/users/images/preview/phpME4ORf.jpeg',1,5,1,NULL),(55,'/users/images/raw_images/767eacceace1580958ab3c085901df9a939a2cc8.jpg',1,1511485663,NULL,1,4528,1680,'width=\"4528\" height=\"1680\"','image/jpeg','Prov-river-westside','/users/images/thumbnails/phpWVPacB.jpeg','/users/images/preview/phpWVPacB.jpeg',1,5,1,NULL),(56,'/users/images/raw_images/7cbe59ac18c25673d618f536173290e636ac3ce5.jpg',1,1511485762,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Mountain -bike','/users/images/thumbnails/phpjuV8be.jpeg','/users/images/preview/phpjuV8be.jpeg',1,5,1,NULL),(57,'/users/images/raw_images/649d4f0976d75ad738f8fc578457ef9a07e75637.jpg',1,1511485852,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Dc-mlb','/users/images/thumbnails/php6uheI5.jpeg','/users/images/preview/php6uheI5.jpeg',1,5,1,NULL),(58,'/users/images/raw_images/d2dee21bf93dc072def2e6dcd0b781a5c3de5e37.jpg',1,1511486234,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Missing -tort','/users/images/thumbnails/phptpYPhK.jpeg','/users/images/preview/phptpYPhK.jpeg',1,5,1,NULL),(61,'/users/images/raw_images/55799fa8ea71ed8a4c31af802da095a3ab074c7c.jpg',1,1511487039,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Orcas-skatepark2','/users/images/thumbnails/php8NZPKw.jpeg','/users/images/preview/php8NZPKw.jpeg',1,5,1,NULL),(62,'/users/images/raw_images/91fda7637b9ba0a14c1d466f0df9bc4ed9af1e02.jpg',1,1511542006,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Bobs-chowda-bar','/users/images/thumbnails/phplCjQIL.jpeg','/users/images/preview/phplCjQIL.jpeg',1,5,1,NULL),(63,'/users/images/raw_images/7ccbcb614cdc3d3c928229052dbffafd0f533808.JPG',17,1511590370,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Denver Science Museum','/users/images/thumbnails/phpRYZv6E.JPG','/users/images/preview/phpRYZv6E.JPG',1,5,1,NULL),(64,'/users/images/raw_images/43a6c8f4566b1ad675f2f10148a484f8fbcea055.JPG',17,1511590429,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Snow Village','/users/images/thumbnails/phpbgJFVb.JPG','/users/images/preview/phpbgJFVb.JPG',1,5,1,NULL),(65,'/users/images/raw_images/7c54896ec45f6e7cdfb56ffd09a418435f09a557.JPG',17,1511590483,NULL,1,2124,2124,'width=\"2124\" height=\"2124\"','image/jpeg','Pueblo Colorado','/users/images/thumbnails/phpxxyQxx.JPG','/users/images/preview/phpxxyQxx.JPG',1,5,1,NULL),(66,'/users/images/raw_images/806da4926cc9daabce1dee1ee5e39521a34dd33e.JPG',17,1511590554,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Turbine Sunrise','/users/images/thumbnails/phpwenRMt.JPG','/users/images/preview/phpwenRMt.JPG',1,5,1,NULL),(67,'/users/images/raw_images/232d58f31725186e84da57840f896724129f5351.JPG',17,1511590617,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Snowy Sunrise','/users/images/thumbnails/phpeDZlR5.JPG','/users/images/preview/phpeDZlR5.JPG',1,5,1,NULL),(68,'/users/images/raw_images/e8f2e879047a7523a8e8c183552ad809099a9e5e.JPG',17,1511590694,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Malachite','/users/images/thumbnails/php1G8a4n.JPG','/users/images/preview/php1G8a4n.JPG',1,5,1,NULL),(69,'/users/images/raw_images/588108ba52e7e4cfeea722544607850cc0e858a8.JPG',17,1511590768,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Mississippi Garden','/users/images/thumbnails/phpSAAE8T.JPG','/users/images/preview/phpSAAE8T.JPG',1,5,1,NULL),(70,'/users/images/raw_images/8813da25e96da7eb0d7ed0d30ae80979260bc71b.JPG',17,1511590829,NULL,1,1617,1617,'width=\"1617\" height=\"1617\"','image/jpeg','Bumblebee ','/users/images/thumbnails/php1IT2Aa.JPG','/users/images/preview/php1IT2Aa.JPG',1,5,1,NULL),(71,'/users/images/raw_images/db4c63b571fae683c5da7f3a37f413bdf67deefc.JPG',17,1511590884,NULL,1,2151,2151,'width=\"2151\" height=\"2151\"','image/jpeg','Snow Caps','/users/images/thumbnails/phph4z5RP.JPG','/users/images/preview/phph4z5RP.JPG',1,5,1,NULL),(72,'/users/images/raw_images/245496d9691c3a3dc4db0a94bb067979da133a24.JPG',17,1511590966,NULL,1,4566,2332,'width=\"4566\" height=\"2332\"','image/jpeg','Rainbow','/users/images/thumbnails/phpO5qyvP.JPG','/users/images/preview/phpO5qyvP.JPG',1,5,1,NULL),(73,'/users/images/raw_images/2bc04b4739e3b66180237bd6b24afaa0ff4a1c46.JPG',17,1511591048,NULL,1,640,640,'width=\"640\" height=\"640\"','image/jpeg','Beach Love','/users/images/thumbnails/phpeHaDTt.JPG','/users/images/preview/phpeHaDTt.JPG',1,5,1,NULL),(74,'/users/images/raw_images/7db5e6aac2b6d277d5e499c62c630c6f0d6650ce.JPG',17,1511591639,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Florida ','/users/images/thumbnails/php3qmMba.JPG','/users/images/preview/php3qmMba.JPG',1,5,1,NULL),(75,'/users/images/raw_images/2319801cd46b3ded3114758767226d81baa9a814.JPG',17,1511591710,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Sand Dollars','/users/images/thumbnails/phpqpRiF4.JPG','/users/images/preview/phpqpRiF4.JPG',1,5,1,NULL),(76,'/users/images/raw_images/e24fcc62963d62a3674210211b3f3079f412fc73.JPG',17,1511591782,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Mountains','/users/images/thumbnails/php7ZQlym.JPG','/users/images/preview/php7ZQlym.JPG',1,5,1,NULL),(77,'/users/images/raw_images/574438a4a9659e70e5733317dec546351630a6f1.JPG',17,1511591836,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Fishing ','/users/images/thumbnails/phppVILls.JPG','/users/images/preview/phppVILls.JPG',1,5,1,NULL),(78,'/users/images/raw_images/700fecc812431dd91cdb48fd94a48c9dab56759e.JPG',17,1511591893,NULL,1,4032,3024,'width=\"4032\" height=\"3024\"','image/jpeg','Bullfrog','/users/images/thumbnails/phpOWm1Gg.JPG','/users/images/preview/phpOWm1Gg.JPG',1,5,1,NULL),(79,'/users/images/raw_images/106eb05dfe2bc9efb4f42a54ff59886cb6caba73.jpg',1,1511742604,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','orcas-pebble-beach','/users/images/thumbnails/php2VIQX1.jpeg','/users/images/preview/php2VIQX1.jpeg',1,5,1,NULL),(80,'/users/images/raw_images/29fe0a262c7339dc69d24ced4a1e3802f6c11395.jpg',1,1511743072,NULL,1,2148,3143,'width=\"2148\" height=\"3143\"','image/jpeg','firetower-orcas','/users/images/thumbnails/phpcoOJfY.jpeg','/users/images/preview/phpcoOJfY.jpeg',1,5,1,NULL),(81,'/users/images/raw_images/cd3339fa3ee52b7217d09743519f65c7d2d83c3b.JPG',20,1511851773,NULL,1,4032,3024,'width=\"4032\" height=\"3024\"','image/jpeg','Moab','/users/images/thumbnails/phpaB8o04.JPG','/users/images/preview/phpaB8o04.JPG',1,5,1,NULL),(82,'/users/images/raw_images/77ef26f1f9e903f5a78c6fc3c91bcefe1d5eb1d5.JPG',20,1511851829,NULL,1,1536,2048,'width=\"1536\" height=\"2048\"','image/jpeg','Goddess ','/users/images/thumbnails/phpOfppfE.JPG','/users/images/preview/phpOfppfE.JPG',1,5,1,NULL),(84,'/users/images/raw_images/04652449f6fc0c7fb08ca568dd7c7ab2b1fc94cb.JPG',20,1511851928,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','Soulless ','/users/images/thumbnails/php36yyoV.JPG','/users/images/preview/php36yyoV.JPG',1,5,1,NULL),(85,'/users/images/raw_images/20a6e7d0d281ef82b9d91b991a16c016906dbdcb.JPG',20,1511852228,NULL,1,1334,750,'width=\"1334\" height=\"750\"','image/jpeg','Green sand beach','/users/images/thumbnails/phpk44tmA.JPG','/users/images/preview/phpk44tmA.JPG',1,5,1,NULL),(86,'/users/images/raw_images/81d90641b7a1a9de3e90cebf55938a056cf43b23.JPG',20,1511852294,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','Waterfall','/users/images/thumbnails/phpQx8cDl.JPG','/users/images/preview/phpQx8cDl.JPG',1,5,1,NULL),(88,'/users/images/raw_images/84828cfcb5538963d043f4007e81ea03941315a5.JPG',20,1511852922,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','Baby shower for girl','/users/images/thumbnails/phpopNGcW.JPG','/users/images/preview/phpopNGcW.JPG',1,5,1,NULL),(89,'/users/images/raw_images/49ed08d2c14c63f9b7aea52961c8a2328c442912.JPG',20,1511852990,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','Cupcake design','/users/images/thumbnails/phpXebmfy.JPG','/users/images/preview/phpXebmfy.JPG',1,5,1,NULL),(90,'/users/images/raw_images/27e8ed54bdf5f30a04ecc681b7250db0b83f95b9.JPG',20,1511853130,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','Flower','/users/images/thumbnails/phphHRFwn.JPG','/users/images/preview/phphHRFwn.JPG',1,5,1,NULL),(91,'/users/images/raw_images/c5e01f4bc54cc0cb0f291bb1b37c56ea4fee442b.JPG',20,1511853200,NULL,1,750,1334,'width=\"750\" height=\"1334\"','image/jpeg','OmbrÃ© hair','/users/images/thumbnails/phpYlyA73.JPG','/users/images/preview/phpYlyA73.JPG',1,5,1,NULL),(92,'/users/images/raw_images/b220fc8f716f990dcd00d886fd533285a57918e4.JPG',20,1511853269,NULL,1,1334,750,'width=\"1334\" height=\"750\"','image/jpeg','Utah mountains ','/users/images/thumbnails/phpfHVcRh.JPG','/users/images/preview/phpfHVcRh.JPG',1,5,1,NULL),(93,'/users/images/raw_images/5cab4aa1027a340ec1f1143b1debed96fdd637b0.jpg',1,1512355496,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','10420-peak','/users/images/thumbnails/php0IEARr.jpeg','/users/images/preview/php0IEARr.jpeg',1,5,1,NULL),(94,'/users/images/raw_images/dacd0a9b35ed2e08b7a37ab844b216f1a0f609e6.jpg',1,1512442962,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Bayview-sunset','/users/images/thumbnails/phpiGS8M0.jpeg','/users/images/preview/phpiGS8M0.jpeg',1,5,1,NULL),(95,'/users/images/raw_images/a0200232f001ec445212d3c5073630169ebabff4.jpg',1,1512443316,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Crypto-mining ','/users/images/thumbnails/phpK6Se0Z.jpeg','/users/images/preview/phpK6Se0Z.jpeg',1,5,1,NULL),(96,'/users/images/raw_images/bb588bc3a61453b2655282e96248cc119ef4bb54.png',1,1512443447,NULL,1,1080,1920,'width=\"1080\" height=\"1920\"','image/png','3d-printer','/users/images/thumbnails/phpKziIos.png','/users/images/preview/phpKziIos.png',1,5,1,NULL),(97,'/users/images/raw_images/83dbdfdc067b9d9b33b422591ebd58c1e2e534ab.jpg',1,1512443581,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Moab-raft-shop ','/users/images/thumbnails/phpw5Q0B9.jpeg','/users/images/preview/phpw5Q0B9.jpeg',1,5,1,NULL),(98,'/users/images/raw_images/86aed9fc980a7d004aff0f253602a3d18c3b6563.jpg',1,1512443707,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Bitcoin-atm','/users/images/thumbnails/phpo2Kejx.jpeg','/users/images/preview/phpo2Kejx.jpeg',1,5,1,NULL),(99,'/users/images/raw_images/62d41d4199cf4147d0b6b638a5334bd07c97d16e.jpg',1,1512443864,NULL,1,3264,1836,'width=\"3264\" height=\"1836\"','image/jpeg','Bad-parking','/users/images/thumbnails/phpDK1LV4.jpeg','/users/images/preview/phpDK1LV4.jpeg',1,5,1,NULL),(100,'/users/images/raw_images/bdcd2984293f7a99a4d41838c86c8c332d2b0bda.jpeg',21,1512638305,NULL,1,960,640,'width=\"960\" height=\"640\"','image/jpeg','Log jib ','/users/images/thumbnails/phpvy1Os3.jpeg','/users/images/preview/phpvy1Os3.jpeg',1,5,1,NULL),(101,'/users/images/raw_images/433efb65f6de56d66c367e0e35f7bf64c8ec31b7.jpeg',21,1512638376,NULL,1,960,605,'width=\"960\" height=\"605\"','image/jpeg','Pow','/users/images/thumbnails/phpTKCsr3.jpeg','/users/images/preview/phpTKCsr3.jpeg',1,5,1,NULL),(102,'/users/images/raw_images/a54488c7c2daea53e04aa570935e9bc4c09725bd.jpeg',21,1512638444,NULL,1,2592,1936,'width=\"2592\" height=\"1936\"','image/jpeg','Lizard ','/users/images/thumbnails/phpox2XbJ.jpeg','/users/images/preview/phpox2XbJ.jpeg',1,5,1,NULL),(103,'/users/images/raw_images/51ebfbabeac146f5bae73a92e51bc23c28dabe74.jpeg',21,1512638513,NULL,1,960,776,'width=\"960\" height=\"776\"','image/jpeg','Rope swing','/users/images/thumbnails/phpSbeiKQ.jpeg','/users/images/preview/phpSbeiKQ.jpeg',1,5,1,NULL),(104,'/users/images/raw_images/b989458dc5fdb649459a11055787e60031495bb5.jpeg',21,1512638656,NULL,1,960,666,'width=\"960\" height=\"666\"','image/jpeg','Shred','/users/images/thumbnails/phpMQ8xiT.jpeg','/users/images/preview/phpMQ8xiT.jpeg',1,5,1,NULL),(105,'/users/images/raw_images/c379b3bc2b331fd65bbefdb023423b6ef36d34e8.jpeg',21,1512638734,NULL,1,3264,2448,'width=\"3264\" height=\"2448\"','image/jpeg','Mountain ','/users/images/thumbnails/phpfwkCHZ.jpeg','/users/images/preview/phpfwkCHZ.jpeg',1,5,1,NULL),(106,'/users/images/raw_images/5651fa25c9d81e2051f8b802d7db278da79663a5.jpg',22,1512955367,NULL,1,1080,809,'width=\"1080\" height=\"809\"','image/jpeg','Desolation Lake','/users/images/thumbnails/phpU7QVRW.jpeg','/users/images/preview/phpU7QVRW.jpeg',1,5,1,NULL),(107,'/users/images/raw_images/4b66aff3a1c04b70420212a07954633e57b74b48.jpg',22,1512955520,NULL,1,926,960,'width=\"926\" height=\"960\"','image/jpeg','Snowboarding','/users/images/thumbnails/phpTaWOsp.jpeg','/users/images/preview/phpTaWOsp.jpeg',1,5,1,NULL),(108,'/users/images/raw_images/5f929beaba818084bb400e377d187c9f71a7c41b.JPG',23,1513475381,NULL,1,640,480,'width=\"640\" height=\"480\"','image/jpeg','Boxing','/users/images/thumbnails/phpLMITYo.JPG','/users/images/preview/phpLMITYo.JPG',1,5,1,NULL),(109,'/users/images/raw_images/56a3df0c5108b60edd9c0ab52c3b715f3d95db16.JPG',23,1513475431,NULL,1,640,480,'width=\"640\" height=\"480\"','image/jpeg','lagoon','/users/images/thumbnails/phpMnu8uw.JPG','/users/images/preview/phpMnu8uw.JPG',1,5,1,NULL),(110,'/users/images/raw_images/af59cf229a3fb36e5d0a3ce0c0a7d5d902b5a63b.jpg',1,1513501614,NULL,1,1152,2048,'width=\"1152\" height=\"2048\"','image/jpeg','bobsled trail','/users/images/thumbnails/phpcbMhVM.jpeg','/users/images/preview/phpcbMhVM.jpeg',1,5,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=420 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
INSERT INTO `image_to_tag` VALUES (2,2,316),(3,2,317),(4,2,318),(5,2,313),(6,2,292),(7,3,65),(8,3,319),(9,3,317),(10,3,194),(11,4,320),(12,4,188),(13,4,71),(14,4,321),(15,4,322),(16,4,257),(17,5,188),(18,5,257),(19,5,313),(20,5,161),(21,6,323),(22,6,219),(23,6,218),(24,6,324),(25,7,325),(26,7,324),(27,7,292),(28,7,326),(29,7,327),(30,8,188),(31,8,56),(32,8,257),(33,8,326),(34,8,328),(35,9,329),(36,9,330),(37,9,331),(38,10,326),(39,10,327),(40,10,332),(41,10,329),(42,10,333),(43,10,324),(44,11,334),(45,11,335),(46,11,324),(47,11,332),(48,11,331),(49,12,336),(50,12,337),(51,12,332),(52,12,329),(53,12,338),(54,12,334),(55,12,331),(56,12,335),(57,13,334),(58,13,338),(59,13,331),(60,13,329),(61,13,339),(62,14,329),(63,14,316),(64,14,340),(65,14,341),(66,14,342),(67,15,343),(68,15,344),(69,15,316),(70,15,331),(71,15,329),(72,15,221),(73,16,345),(74,16,316),(75,16,346),(76,16,347),(77,16,348),(78,17,65),(79,17,161),(80,17,349),(81,17,319),(82,17,350),(83,17,194),(84,17,181),(85,18,350),(86,18,317),(87,18,349),(88,18,65),(89,18,194),(90,18,181),(91,19,351),(92,19,319),(93,19,352),(94,19,161),(95,19,65),(96,20,316),(97,20,302),(98,20,299),(99,20,329),(100,21,349),(101,21,353),(102,21,354),(103,21,65),(104,21,355),(105,22,356),(106,22,316),(107,22,299),(108,22,329),(109,23,324),(110,23,357),(111,23,358),(112,23,259),(113,23,194),(114,23,257),(115,24,316),(116,24,359),(117,24,360),(118,24,335),(119,24,83),(120,25,361),(121,25,362),(122,25,363),(123,25,300),(124,25,326),(125,25,83),(126,26,364),(127,26,349),(128,26,365),(129,26,366),(130,26,194),(131,26,65),(133,28,318),(134,28,302),(135,28,368),(136,29,369),(137,29,368),(138,29,299),(139,30,370),(140,30,368),(141,30,371),(142,30,372),(143,31,373),(144,31,374),(145,31,375),(146,31,371),(147,32,376),(148,32,377),(149,32,378),(150,33,368),(151,33,379),(152,33,380),(153,33,65),(154,34,381),(155,34,218),(156,34,382),(157,34,383),(158,35,384),(159,35,65),(160,35,385),(161,40,386),(162,40,387),(163,40,388),(164,40,389),(165,41,390),(166,41,391),(167,41,374),(168,41,392),(169,42,388),(170,42,393),(171,43,152),(172,43,394),(173,43,395),(174,44,396),(175,44,386),(176,44,374),(177,45,397),(178,45,398),(179,45,374),(180,45,152),(181,46,399),(182,46,351),(183,46,299),(184,46,368),(185,47,400),(186,47,371),(187,47,401),(188,47,194),(189,48,402),(190,48,368),(191,49,285),(192,49,403),(193,50,404),(194,50,405),(195,50,406),(196,51,407),(197,51,408),(198,51,348),(199,51,409),(200,52,407),(201,52,408),(202,52,410),(203,52,411),(204,53,407),(205,53,408),(206,53,412),(207,53,339),(208,54,413),(209,54,414),(210,54,415),(211,55,407),(212,55,408),(213,55,416),(214,55,329),(215,56,61),(216,56,417),(217,56,357),(218,56,418),(219,57,419),(220,57,420),(221,58,421),(222,58,422),(223,58,423),(224,58,391),(227,61,426),(228,61,427),(229,61,402),(230,61,368),(231,62,428),(232,62,429),(233,62,430),(234,62,431),(235,62,391),(236,63,432),(237,63,224),(238,63,433),(239,63,434),(240,64,435),(241,64,436),(242,64,437),(243,64,438),(244,65,257),(245,65,433),(246,65,439),(247,65,440),(248,66,441),(249,66,442),(250,66,433),(251,66,443),(252,67,56),(253,67,442),(254,67,433),(255,68,224),(256,68,432),(257,68,444),(258,68,445),(259,68,446),(260,69,447),(261,69,448),(262,69,449),(263,69,450),(264,70,451),(265,70,452),(266,70,453),(267,71,454),(268,71,433),(269,71,56),(270,71,455),(271,72,456),(272,72,433),(273,72,457),(274,73,458),(275,73,194),(276,73,349),(277,73,459),(278,74,349),(279,74,459),(280,74,65),(281,74,460),(282,74,461),(283,74,462),(284,75,459),(285,75,65),(286,75,463),(287,75,349),(288,76,257),(289,76,433),(290,77,433),(291,77,153),(292,77,257),(293,77,188),(294,78,464),(295,78,465),(296,78,466),(297,79,368),(298,79,401),(299,79,371),(300,79,349),(301,80,467),(302,80,468),(303,80,469),(304,80,368),(312,86,316),(313,86,472),(314,86,453),(315,86,473),(317,85,472),(318,85,474),(319,85,446),(320,85,65),(321,85,475),(322,84,476),(323,84,477),(324,84,478),(325,84,479),(326,84,480),(327,84,481),(328,84,482),(329,82,218),(330,82,473),(331,82,483),(332,82,475),(333,81,218),(334,81,484),(335,81,485),(336,81,473),(337,88,486),(338,88,487),(339,88,488),(340,88,489),(341,88,490),(342,89,491),(343,89,492),(344,89,489),(345,89,493),(346,89,494),(347,90,472),(348,90,495),(349,90,496),(350,90,497),(351,91,498),(352,91,499),(353,91,500),(354,91,501),(355,91,502),(356,92,257),(357,92,56),(358,92,473),(359,93,357),(360,93,503),(361,93,504),(362,93,505),(363,93,83),(364,93,259),(365,94,506),(366,94,401),(367,94,371),(368,94,194),(369,95,507),(370,95,508),(371,95,295),(372,95,509),(373,96,510),(374,96,511),(375,97,512),(376,97,218),(377,97,513),(378,97,514),(379,97,515),(380,98,295),(381,98,516),(382,98,517),(383,98,518),(384,99,519),(385,99,520),(386,99,521),(387,99,522),(388,100,291),(389,100,56),(390,101,82),(391,101,523),(392,101,291),(393,101,56),(394,102,524),(395,102,525),(396,102,526),(397,103,527),(398,103,188),(399,103,528),(400,104,291),(401,104,529),(402,104,530),(403,104,83),(404,105,83),(405,105,188),(406,105,531),(407,105,324),(408,105,453),(409,106,78),(410,106,532),(411,106,533),(412,107,534),(413,107,291),(414,108,535),(415,109,536),(416,110,285),(417,110,537),(418,110,538),(419,110,382);
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
  `website` text,
  `bio` text,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Brian','Moniz',NULL,'C','2175 Sidewinder Dr','Park City','UT','84060','05/08/1986',1,'/users/avatarsphpRFMNge.gif','paypal','test@paypal.com','','http://slcutahdesign.com','I am the creator of this site. I\'ve painstakingly written nearly every line of code used to make this all happen. I am not a good photographer. But I hope to become one! I think that pictures capture a moment in time that you can never go back to, and that\'s what makes them special! ',NULL),(10,'James','Borsje-Clark',NULL,'',NULL,'Christchurch','TEST STATE',NULL,'03/06/1987',55,NULL,NULL,NULL,'New Zealand','',NULL,NULL),(14,'Stevie','Douglas ',NULL,'R',NULL,'Salt Lake City','Utah',NULL,'01/14/1988',56,NULL,NULL,NULL,'USA ','','',NULL),(16,'Deja','Person',NULL,'',NULL,'Salt Lake','Utah',NULL,NULL,57,NULL,NULL,NULL,'United states',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_history`
--

LOCK TABLES `search_history` WRITE;
/*!40000 ALTER TABLE `search_history` DISABLE KEYS */;
INSERT INTO `search_history` VALUES (1,'i hope this query saves',1495773914),(2,'mtb',1496426486),(3,'image',1496972889),(4,'water',1496972893),(5,'water',1496972900),(6,'city',1496973058),(7,'mtb',1497246850),(8,'woods',1504018412),(9,'waterfall',1504018418),(10,'halfpipe',1504018428),(11,'halfpipe',1504018555),(12,'halfpipe',1504018710),(13,'halfpipe',1504018733),(14,'halfpipe',1504018751),(15,'halfpipe',1504019576),(16,'halfpipe',1504019616),(17,'halfpipe',1504019645),(18,'halfpipe',1504019711),(19,'halfpipe',1504019740),(20,'halfpipe',1504019743),(21,'halfpipe',1504019885),(22,'halfpipe',1504019909),(23,'halfpipe',1504020078),(24,'halfpipe',1504020283),(25,'las wegas',1510786720),(26,'las vegas',1510786725),(27,'rain',1510786730),(28,'Skate',1511487259),(29,'Skate',1511487271),(30,'Skate',1511487274),(31,'Skate',1511487278),(32,'Orcas',1511491080),(33,'Bike',1513517112);
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
) ENGINE=InnoDB AUTO_INCREMENT=539 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(167,NULL),(78,''),(535,'#boxing'),(536,'#lagoon #sharkinthewater'),(510,'3d printer'),(162,'9/11'),(207,'911'),(128,'a'),(381,'Acid '),(126,'add'),(456,'Adobe House'),(380,'Adventure '),(276,'air'),(77,'air bubbles'),(132,'air force'),(229,'airplane'),(203,'album cover'),(298,'alday'),(278,'alps'),(246,'amazon-2'),(470,'Amber '),(429,'Anacortes'),(430,'Anacortes, WA'),(124,'another'),(242,'ao nang'),(323,'arches national park'),(239,'armchairs'),(180,'asbestos\\'),(262,'asia'),(325,'aspen'),(326,'autumn'),(129,'b'),(211,'baby'),(212,'baby elephant'),(486,'Baby shower'),(528,'Back flip'),(200,'backflip'),(519,'Bad parking'),(214,'bat'),(215,'batman'),(400,'Bayview'),(506,'Bayview State Park'),(244,'BC'),(349,'beach'),(525,'Bearded dragon '),(446,'Beautiful'),(473,'Beauty'),(261,'below'),(275,'berm'),(505,'Big Cottonwood Canyon'),(522,'Big truck'),(260,'bike'),(254,'bike drop'),(417,'Bike trail'),(295,'bitcoin'),(516,'Bitcoin ATM'),(305,'black and white'),(234,'blue'),(131,'blue jets'),(306,'blue pond'),(355,'blue water'),(379,'Board walk '),(364,'boardwalk'),(152,'boat'),(201,'boating'),(428,'Bob\'s Chowda Bar'),(537,'bobsled trail'),(462,'Book'),(396,'booth'),(57,'boots'),(404,'Brake pad'),(166,'Brian'),(359,'bridal veil falls'),(348,'bridge'),(154,'building'),(464,'Bullfrog'),(451,'Bumblebee'),(150,'bus'),(151,'bus tour'),(164,'bush'),(163,'bush did 9/11'),(251,'cactus'),(492,'Cakes by jill'),(338,'canyon'),(406,'Car part'),(223,'cartoon'),(221,'cave'),(204,'cdjs'),(141,'chairs'),(435,'Christmas'),(310,'city'),(304,'cityscape'),(443,'Clean Energy'),(191,'Cliff Dive'),(354,'cliffs'),(335,'climbing'),(297,'clock'),(138,'cloud'),(181,'clouds'),(433,'Colorado'),(237,'colorado river'),(452,'Conservation'),(74,'cowboy'),(332,'creek'),(518,'Cryotocurrency'),(507,'Cryprocurrency'),(293,'crypto mining'),(220,'crystal'),(136,'cumulo nimbus'),(491,'Cupcakes'),(483,'Curves'),(247,'cyclist'),(226,'daytime'),(476,'Dead'),(369,'dead tree'),(480,'Death'),(328,'deck'),(403,'Deer valley'),(389,'denim jacket'),(224,'denver'),(485,'Deserted '),(370,'dingy'),(81,'dirt'),(205,'dj'),(230,'DJ Sasha'),(362,'dog walking'),(269,'downhill'),(60,'downhill mountain bike'),(142,'drawing room'),(271,'dry'),(366,'dunes'),(148,'e-cigg'),(210,'elephant'),(270,'elevation'),(508,'Ethereum'),(173,'fake nose'),(327,'fall'),(383,'Favorite '),(374,'ferry'),(477,'Fight to live'),(177,'fire'),(178,'fire extinguisher'),(179,'fireman'),(469,'firetower'),(153,'fishing'),(397,'floatation device'),(459,'Florida '),(258,'flow trail'),(495,'Flower'),(415,'Flowers'),(300,'foliage'),(299,'forest'),(279,'fresh woodlands'),(465,'Frog'),(71,'frozen lake'),(345,'frozen waterfall'),(268,'full face'),(240,'furniture'),(449,'Garden'),(209,'george w'),(489,'Girl baby shower '),(493,'Girl birthday party '),(502,'Girl hair colors'),(174,'glasses'),(272,'goggles'),(363,'golden retriever'),(236,'grand canyon'),(534,'Grand Targhee'),(273,'grass'),(280,'green'),(301,'green forest'),(303,'green pond'),(471,'Green sands '),(474,'Green sands beach'),(171,'groucho'),(504,'Guardsman Pass'),(460,'Gulf of Mexico'),(228,'gv'),(499,'Hair color'),(500,'Hair style'),(315,'halfpipe'),(481,'Halloween'),(411,'Harbor'),(109,'harley'),(216,'harley quinn'),(472,'Hawaii'),(170,'healthy'),(458,'Heart'),(253,'helmet'),(324,'hiking'),(344,'hole'),(343,'hole-in-the-rock'),(436,'Holidays'),(438,'Home Decor'),(108,'hope'),(75,'horse'),(341,'hot spring'),(248,'hottie'),(412,'House boat'),(232,'House Music'),(321,'ice'),(410,'Industry'),(185,'interstellar'),(87,'island'),(395,'islands'),(307,'japan'),(217,'jeep'),(227,'jet'),(521,'Juggernaut '),(192,'Jump'),(176,'junior'),(113,'laces'),(330,'ladder'),(188,'lake'),(80,'lambo'),(377,'Lava hot springs '),(140,'leather'),(333,'leaves'),(233,'Legend'),(398,'life ring'),(288,'lift access'),(524,'Lizard'),(206,'loud'),(133,'loud noises'),(478,'Makeup'),(479,'Makeup artist:Jillian Russ '),(127,'many'),(172,'marx'),(482,'Mask'),(165,'me'),(501,'Melt'),(309,'middle east'),(294,'mining rig'),(423,'Missing pet'),(447,'Missisippi'),(448,'Mississippi'),(218,'moab'),(512,'Moab, UT'),(147,'mod'),(187,'moon'),(308,'mosque'),(318,'moss'),(399,'mossy rock'),(376,'Motel '),(283,'motivation'),(83,'mountain'),(61,'mountain bike'),(285,'mountain biking'),(320,'mountain lake'),(274,'mountain terrain bike'),(257,'mountains'),(59,'mtb'),(277,'mtb event'),(432,'Museum '),(453,'Nature'),(346,'new hampshire'),(314,'new tag'),(189,'night'),(238,'nike'),(130,'no'),(197,'no person'),(390,'no smoking'),(65,'ocean'),(353,'ocean cliff'),(68,'ocean kayak'),(373,'old couple'),(498,'Ombre'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(368,'orcas island'),(222,'oregon'),(531,'Outdoor '),(371,'pacific ocean'),(193,'palm tree'),(409,'Panama'),(384,'Panama City beach'),(339,'panarama'),(357,'park city'),(503,'Park City,  UT'),(520,'Parking shame'),(311,'path'),(135,'phillipines'),(186,'photoshop'),(157,'pine'),(488,'Pink'),(213,'pink blanket'),(494,'Pink flowers '),(496,'Plumeria '),(72,'pond'),(336,'pool'),(190,'Portugal'),(175,'pot pie'),(82,'pow'),(523,'Powder'),(195,'powerman 5000'),(282,'progress'),(407,'Providence'),(416,'Providence river'),(408,'Providence, RI'),(360,'provo canyon'),(420,'Public transit'),(352,'puddle'),(439,'Pueblo'),(386,'puzzle'),(387,'puzzle pieces'),(513,'Rafting'),(514,'Rafting Tours'),(392,'railing'),(457,'Rainbow '),(461,'Reading'),(250,'red'),(267,'red bull'),(156,'red pine'),(484,'Red rocks'),(219,'redrock'),(526,'Reptile'),(431,'Restaurant'),(329,'river'),(351,'rock'),(455,'Rockies'),(317,'rocks'),(319,'rocky beach'),(264,'rollers'),(527,'Rope swing'),(241,'rotate'),(350,'round rock'),(418,'Round valley'),(296,'rx480'),(347,'sabbaday falls'),(169,'salad'),(168,'salada'),(421,'Salt Lake City'),(422,'Salt Lake City,  UT'),(463,'Sand Dollar'),(365,'sand dunes'),(517,'Sandy, UT'),(231,'Sasha'),(475,'Scenic '),(434,'Science'),(160,'scuba'),(143,'scuba diver'),(199,'sewer'),(287,'shadow'),(375,'shaw island'),(263,'shepard'),(372,'shore'),(391,'sign'),(255,'single track'),(427,'Skate'),(402,'Skate park'),(426,'Skateboarding'),(245,'ski'),(358,'ski resort'),(139,'sky'),(159,'skydive'),(225,'skyline'),(334,'slot canyon'),(134,'small boat'),(56,'snow'),(437,'Snow Village'),(529,'Snowboard '),(55,'snowboard boots'),(291,'snowboarding'),(289,'snowcap'),(367,'snowman'),(454,'Snowy Mountains'),(102,'something'),(337,'spring'),(322,'springtime'),(538,'sSalt Lake City, UT'),(440,'State Park'),(445,'Stone'),(467,'stone window'),(515,'Store'),(385,'Stormy '),(259,'summer'),(425,'Sun Glasses'),(424,'Sunglasses'),(313,'sunlight'),(312,'sunrays'),(442,'Sunrise'),(194,'sunset'),(490,'Surprise shower'),(342,'swimming'),(388,'table'),(290,'tail whip'),(487,'Tea party '),(511,'Technology'),(509,'Terminal'),(208,'terrorism'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(340,'timelapse'),(466,'Toad'),(281,'tower'),(378,'Travel '),(158,'tree'),(302,'trees'),(530,'Trick'),(149,'triple decker bus'),(117,'trying to duplicate'),(444,'Turquoise '),(116,'twice'),(356,'twin falls'),(121,'two'),(243,'upsidedown'),(414,'Urban flowers'),(382,'Utah'),(146,'vape'),(450,'Vegetables '),(394,'wake'),(196,'wakeboard'),(256,'wales'),(361,'walk dog'),(155,'warehouse'),(532,'Wasatch Back'),(533,'Wasatch Crest Trail'),(401,'Washington'),(419,'Washington DC'),(161,'water'),(316,'waterfall'),(235,'wave'),(182,'whale shark'),(63,'whaleshark'),(286,'wheelie'),(137,'white cloud'),(413,'White flowers'),(249,'wide'),(441,'Windmills'),(468,'window'),(76,'winter'),(198,'wolfgang'),(202,'wolfgang gartner'),(284,'woman'),(122,'won'),(393,'Wood'),(265,'wood jib'),(266,'wood job'),(292,'woods'),(405,'Worn'),(184,'yang'),(497,'Yellow flower '),(110,'yes'),(183,'ying'),(331,'zion');
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
  `avatar` varchar(200) DEFAULT '/users/avatars/profile_image_default.jpg',
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Brian','bcm811@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/phpQ471vc.jpg','Brian',NULL,NULL,NULL,1,1483998888,'','cus_ADTXNccVQKXBVP'),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a','/users/avatars/profile_image_default.jpg','Ludo',NULL,'Bagman',NULL,2,1483998888,'',NULL),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc','/users/avatars/profile_image_default.jpg','Rita',NULL,'Skeeter',NULL,2,1483998888,'',NULL),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png','Ronald',NULL,'Weasley',NULL,2,1483998888,'','cus_A9gDNkV2vTWaw0'),(6,'tester','tester@tester.com','7abcddbb2c74e4c0789c2c0aa6abcf5172e82e9f4916bc6409fc3989ed673e08-v­kn×','-v­kn×','/users/avatars/phpurauEi.png','Hermione',NULL,'Granger',NULL,2,1488484260,NULL,NULL),(7,'tester2','tester2@tester2.com','7cd477192d54ceb8673be093f443b8622c612896880f6879c7f8ec16fa7ba114Bö\"VãÈ','Bö\"VãÈ','/users/avatars/phpFKlffA.png','Cornelius',NULL,'Fudge',NULL,2,1488485073,NULL,NULL),(8,'buy','buy@buy.com','37db0a2d4e9ff39261fb2aafdaee60625f7e6dd1ba6260a85f7258f76ed0d011béÿý2[','béÿý2[','/users/avatars/profile_image_default.jpg','Habeus',NULL,'Hagrid',NULL,2,1488485162,NULL,'cus_ADS0enKkH1xmgl'),(9,'buy2','buy2@buy2.com','f2eb7711ddc912fe7fd271b0192ca4dedaabfb5b2bd2a790bac0bc986f80f9deŠB“ä²•¬','ŠB“ä²•¬','/users/avatars/profile_image_default.jpg','Albus',NULL,'Dumbledore',NULL,2,1488485173,NULL,'cus_ADRl2mVytCOaMH'),(10,'JamesBC','j_borsje-clark@windowslive.com','30aca92b73909661df7052fd91c18f5aad958b7dfff025f4675f00cea16b849c«KÚû1-ý','«KÚû1-ý','/users/avatars/phpvJYOtZ.jpg',NULL,NULL,NULL,NULL,2,1503767939,NULL,NULL),(11,'tester4','tester4@tester4.com','cddde3e87131b14a1c796deb08b44b2fdb9afba24b75818c894298e2dafcdac5ð¡Ò3¢™¤','ð¡Ò3¢™¤','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1508172096,NULL,NULL),(12,'brian_test','bcmo811@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29f1>ósÊ‚','f1>ósÊ‚','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1510769877,NULL,NULL),(13,'brian_test2','brian@prohoods.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29\ZÁ¢\\ÊÆ»','\ZÁ¢\\ÊÆ»','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1510770330,NULL,NULL),(14,'Mermaidinthevalley','Steviedouglas8@gmail.com','a68ecf0408139da4296c0954d07fa1f8e16d61294b53e195e74f080fa49d196c2SS®ŒMÄk','2SS®ŒMÄk','/users/avatars/phpKfoIGy.jpeg',NULL,NULL,NULL,NULL,2,1510777970,NULL,NULL),(15,'Mermaidinthevalley ','Steviedouglas8@gmail.com','a68ecf0408139da4296c0954d07fa1f8e16d61294b53e195e74f080fa49d196c.f˜¥¸ùvG','.f˜¥¸ùvG','/usesr/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1510778042,NULL,NULL),(16,'Dperson26','Deja_p12@gmail.com','c5d1cd58f6618396a2a552443b6048c163e25b26bcc78765fa559220371f2311AL¿—bm.','AL¿—bm.','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1510798125,NULL,NULL),(17,'kimberlymorgan','kimberlydouglasmorgan@gmail.com','9b39040707ccf7b80cbad292508eef33b42bd461cbef65f1ca4f8e8a7450feb6+é½Y¶áÐG','+é½Y¶áÐG','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1511590233,NULL,NULL),(18,'new_register','new_register@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29¿²º9¦ªCE','¿²º9¦ªCE','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1511592737,NULL,NULL),(19,'beebop','Beebop2284@hotmail.com','f371ccad4c858106173eabc72e5bed1a0096ddae1d59663413c212732a82776f3 Z°èB','3 Z°èB','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1511595716,NULL,NULL),(20,'Amberhamilt','Ambahx3@gmail.com','a34419dcf82fb055221884074f73c9b7dcc8b1b19ddcf8d1ec5ee6ba51277793å¯¤ËÞdõ','å¯¤ËÞdõ','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1511851507,NULL,NULL),(21,'Marcus.llewellyn','Marcus.llewellyn@yahoo.com','7821ae6f5e0ee3d983ea4f9633f021347ef4c920f9781a2ff28a9b8908605812jbÝÁMØÚ','jbÝÁMØÚ','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1512638066,NULL,NULL),(22,'LiamHeffernan','liamsheffernan@yahoo.com','2e0c94334b9b36a45e294e25364379616de6e1dfb6dfe387c8044221da168f4cE™›á,)íÈ','E™›á,)íÈ','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1512955176,NULL,NULL),(23,'tfuller','tf1string@yahoo.com','19513fdc9da4fb72a4a05eb66917548d3c90ff94d5419e1f2363eea89dfee1ddœMÒkl«Þ','œMÒkl«Þ','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1513474515,NULL,NULL),(24,'tf1string','tf1string@yahoo.com','0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94eF¨— +ðA*','F¨— +ðA*','/users/avatars/profile_image_default.jpg',NULL,NULL,NULL,NULL,2,1513474699,NULL,NULL);
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

-- Dump completed on 2017-12-17 21:11:19
