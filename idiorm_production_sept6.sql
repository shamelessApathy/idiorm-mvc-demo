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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_to_image`
--

LOCK TABLES `category_to_image` WRITE;
/*!40000 ALTER TABLE `category_to_image` DISABLE KEYS */;
INSERT INTO `category_to_image` VALUES (96,5,2),(97,5,3),(98,5,4),(99,5,5),(100,5,6),(101,5,7),(102,5,8),(103,5,9),(104,5,10),(105,5,11),(106,5,12),(107,5,13),(108,5,14),(109,5,15),(110,5,16),(111,5,17),(112,5,18),(113,5,19),(114,5,20),(115,5,21),(116,5,22),(117,5,23),(118,5,24),(119,8,25),(120,5,26);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `download`
--

LOCK TABLES `download` WRITE;
/*!40000 ALTER TABLE `download` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image`
--

LOCK TABLES `image` WRITE;
/*!40000 ALTER TABLE `image` DISABLE KEYS */;
INSERT INTO `image` VALUES (2,'/users/images/raw_images/13a91beef42b3c86fa655cb94dbb2e7119393b2d.jpg',10,1504022890,NULL,1,5355,3112,'width=\"5355\" height=\"3112\"','image/jpeg','jbc01','/users/images/thumbnails/php1rjmN9.jpeg','/users/images/preview/php1rjmN9.jpeg',1,5,1,NULL),(3,'/users/images/raw_images/08c0205e277729da3aa3b3f6615932013cca7d40.jpg',10,1504023222,NULL,1,5343,3679,'width=\"5343\" height=\"3679\"','image/jpeg','jbc02','/users/images/thumbnails/php51YnZg.jpeg','/users/images/preview/php51YnZg.jpeg',1,5,1,NULL),(4,'/users/images/raw_images/e4f3396763e9d9bb1999470d867dec3bf441703f.jpg',10,1504023363,NULL,1,2347,2200,'width=\"2347\" height=\"2200\"','image/jpeg','jbc03','/users/images/thumbnails/phpHY07CB.jpeg','/users/images/preview/phpHY07CB.jpeg',1,5,1,NULL),(5,'/users/images/raw_images/62979f4b1d21500c22f4832d494556b3cb1e0f37.jpg',10,1504023433,NULL,1,3343,3674,'width=\"3343\" height=\"3674\"','image/jpeg','jbc04','/users/images/thumbnails/phpLWBDyu.jpeg','/users/images/preview/phpLWBDyu.jpeg',1,5,1,NULL),(6,'/users/images/raw_images/018162c99a909ea8184dd92ea682827e9a7ff9a7.jpg',10,1504023481,NULL,1,1947,1595,'width=\"1947\" height=\"1595\"','image/jpeg','jbc05','/users/images/thumbnails/phpGvT5iJ.jpeg','/users/images/preview/phpGvT5iJ.jpeg',1,5,1,NULL),(7,'/users/images/raw_images/f773cf6488460c4d38b758086051015d7aa9aee7.jpg',10,1504023529,NULL,1,3337,2887,'width=\"3337\" height=\"2887\"','image/jpeg','jbc06','/users/images/thumbnails/phpwfWpJu.jpeg','/users/images/preview/phpwfWpJu.jpeg',1,5,1,NULL),(8,'/users/images/raw_images/b145169978aac65c5f1ef80db0c86f4bd0b244b2.jpg',10,1504023587,NULL,1,3744,3970,'width=\"3744\" height=\"3970\"','image/jpeg','jbc07','/users/images/thumbnails/phpsrEPhM.jpeg','/users/images/preview/phpsrEPhM.jpeg',1,5,1,NULL),(9,'/users/images/raw_images/ca7c802e150e449f5de89c7c731f7bcb7e6d5d6a.jpg',10,1504024779,NULL,1,3744,5616,'width=\"3744\" height=\"5616\"','image/jpeg','jbc08','/users/images/thumbnails/php42nGll.jpeg','/users/images/preview/php42nGll.jpeg',1,5,1,NULL),(10,'/users/images/raw_images/201c05169c62265507e320bbf908bda8bfe5153c.jpg',10,1504025049,NULL,1,3744,4932,'width=\"3744\" height=\"4932\"','image/jpeg','jbc09','/users/images/thumbnails/phpOQNHM4.jpeg','/users/images/preview/phpOQNHM4.jpeg',1,5,1,NULL),(11,'/users/images/raw_images/7f094a28c9df6da493cfadf23cab4c7d783db177.jpg',10,1504025106,NULL,1,3051,4063,'width=\"3051\" height=\"4063\"','image/jpeg','jbc10','/users/images/thumbnails/phpFEomzq.jpeg','/users/images/preview/phpFEomzq.jpeg',1,5,1,NULL),(12,'/users/images/raw_images/5d4ae9baf7e4066ac15c93f5c1d2476f894dff7e.jpg',10,1504025159,NULL,1,3160,3298,'width=\"3160\" height=\"3298\"','image/jpeg','jbc11','/users/images/thumbnails/phpPFVcbN.jpeg','/users/images/preview/phpPFVcbN.jpeg',1,5,1,NULL),(13,'/users/images/raw_images/e91c31322ed136a187dab2c7ab5bf07f989f8165.jpg',10,1504025212,NULL,1,5616,2458,'width=\"5616\" height=\"2458\"','image/jpeg','jbc12','/users/images/thumbnails/phpdLhbiW.jpeg','/users/images/preview/phpdLhbiW.jpeg',1,5,1,NULL),(14,'/users/images/raw_images/9b6113402a4a75668e3099c14f80c5440bc9242c.jpg',10,1504025448,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc13','/users/images/thumbnails/php7aZNsx.jpeg','/users/images/preview/php7aZNsx.jpeg',1,5,1,NULL),(15,'/users/images/raw_images/7b46e1da3038aa543c574b8e8b81f4914f0a0ebd.jpg',10,1504025557,NULL,1,3596,5395,'width=\"3596\" height=\"5395\"','image/jpeg','jbc14','/users/images/thumbnails/phpVPxuYD.jpeg','/users/images/preview/phpVPxuYD.jpeg',1,5,1,NULL),(16,'/users/images/raw_images/037c0788e68b00cac139f9b7f6cc4535047ad4b8.crop',10,1504025641,NULL,1,3355,3964,'width=\"3355\" height=\"3964\"','image/jpeg','jbc15','/users/images/thumbnails/phpEYAgs9.crop','/users/images/preview/phpEYAgs9.jpeg',1,5,1,NULL),(17,'/users/images/raw_images/49582dd29cfbab99a51e3c80dde970c118ce3c89.jpg',10,1504025878,NULL,1,3582,3734,'width=\"3582\" height=\"3734\"','image/jpeg','jbc16','/users/images/thumbnails/php2uiQ42.jpeg','/users/images/preview/php2uiQ42.jpeg',1,5,1,NULL),(18,'/users/images/raw_images/37b49e60c1d5edfa2a3064774147a9f977efad6a.jpg',10,1504026201,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc16','/users/images/thumbnails/phpZwLmtu.jpeg','/users/images/preview/phpZwLmtu.jpeg',1,5,1,NULL),(19,'/users/images/raw_images/ec5b329b7bc11014c7eb6c790e1e16ea768ee50a.jpg',10,1504026931,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc17','/users/images/thumbnails/phpfzwsBm.jpeg','/users/images/preview/phpfzwsBm.jpeg',1,5,1,NULL),(20,'/users/images/raw_images/766354b477a10b1a80f7d92919f6aa7f6d72a142.jpg',10,1504027132,NULL,1,5616,3744,'width=\"5616\" height=\"3744\"','image/jpeg','jbc18','/users/images/thumbnails/phpN1uDWs.jpeg','/users/images/preview/phpN1uDWs.jpeg',1,5,1,NULL),(21,'/users/images/raw_images/1e3540b7b0a85f3498124d9b7e7f4338e27278ec.jpg',10,1504027183,NULL,1,4028,3368,'width=\"4028\" height=\"3368\"','image/jpeg','jbc19','/users/images/thumbnails/php4vWFpc.jpeg','/users/images/preview/php4vWFpc.jpeg',1,5,1,NULL),(22,'/users/images/raw_images/094ae3b782a8032ddeaae3a14c0e535f80af4d30.jpg',10,1504027241,NULL,1,4186,3359,'width=\"4186\" height=\"3359\"','image/jpeg','jbc20','/users/images/thumbnails/phpT8NLvE.jpeg','/users/images/preview/phpT8NLvE.jpeg',1,5,1,NULL),(23,'/users/images/raw_images/6fb0d7bf11e6c42779a54a44ff75f54233c96ab8.jpg',10,1504027286,NULL,1,5616,1944,'width=\"5616\" height=\"1944\"','image/jpeg','jbc21','/users/images/thumbnails/phpizwtzQ.jpeg','/users/images/preview/phpizwtzQ.jpeg',1,5,1,NULL),(24,'/users/images/raw_images/5cd5172cf5d0aebfeec4c8d6f1ecbafa7d8048bb.jpg',10,1504027382,NULL,1,3744,2677,'width=\"3744\" height=\"2677\"','image/jpeg','jbc22','/users/images/thumbnails/phpEUz88J.jpeg','/users/images/preview/phpEUz88J.jpeg',1,5,1,NULL),(25,'/users/images/raw_images/6b19fb9ca02fdccd3574ff57f7290b54736b2d0a.jpg',10,1504027597,NULL,1,3744,5616,'width=\"3744\" height=\"5616\"','image/jpeg','jbc23','/users/images/thumbnails/phpiyCqid.jpeg','/users/images/preview/phpiyCqid.jpeg',1,5,1,NULL),(26,'/users/images/raw_images/b89c16836de81ccaf87ef6d8764ba2ba06e37d75.jpg',10,1504027635,NULL,1,3025,3146,'width=\"3025\" height=\"3146\"','image/jpeg','jbc24','/users/images/thumbnails/php6HyyDT.jpeg','/users/images/preview/php6HyyDT.jpeg',1,5,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_to_tag`
--

LOCK TABLES `image_to_tag` WRITE;
/*!40000 ALTER TABLE `image_to_tag` DISABLE KEYS */;
INSERT INTO `image_to_tag` VALUES (2,2,316),(3,2,317),(4,2,318),(5,2,313),(6,2,292),(7,3,65),(8,3,319),(9,3,317),(10,3,194),(11,4,320),(12,4,188),(13,4,71),(14,4,321),(15,4,322),(16,4,257),(17,5,188),(18,5,257),(19,5,313),(20,5,161),(21,6,323),(22,6,219),(23,6,218),(24,6,324),(25,7,325),(26,7,324),(27,7,292),(28,7,326),(29,7,327),(30,8,188),(31,8,56),(32,8,257),(33,8,326),(34,8,328),(35,9,329),(36,9,330),(37,9,331),(38,10,326),(39,10,327),(40,10,332),(41,10,329),(42,10,333),(43,10,324),(44,11,334),(45,11,335),(46,11,324),(47,11,332),(48,11,331),(49,12,336),(50,12,337),(51,12,332),(52,12,329),(53,12,338),(54,12,334),(55,12,331),(56,12,335),(57,13,334),(58,13,338),(59,13,331),(60,13,329),(61,13,339),(62,14,329),(63,14,316),(64,14,340),(65,14,341),(66,14,342),(67,15,343),(68,15,344),(69,15,316),(70,15,331),(71,15,329),(72,15,221),(73,16,345),(74,16,316),(75,16,346),(76,16,347),(77,16,348),(78,17,65),(79,17,161),(80,17,349),(81,17,319),(82,17,350),(83,17,194),(84,17,181),(85,18,350),(86,18,317),(87,18,349),(88,18,65),(89,18,194),(90,18,181),(91,19,351),(92,19,319),(93,19,352),(94,19,161),(95,19,65),(96,20,316),(97,20,302),(98,20,299),(99,20,329),(100,21,349),(101,21,353),(102,21,354),(103,21,65),(104,21,355),(105,22,356),(106,22,316),(107,22,299),(108,22,329),(109,23,324),(110,23,357),(111,23,358),(112,23,259),(113,23,194),(114,23,257),(115,24,316),(116,24,359),(117,24,360),(118,24,335),(119,24,83),(120,25,361),(121,25,362),(122,25,363),(123,25,300),(124,25,326),(125,25,83),(126,26,364),(127,26,349),(128,26,365),(129,26,366),(130,26,194),(131,26,65);
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
INSERT INTO `profile` VALUES (1,'Brian','Moniz',NULL,'C','2175 Sidewinder Dr','Park City','UT','84060','05/08/1986',1,'/users/avatarsphpRFMNge.gif','paypal','test@paypal.com',NULL,NULL),(10,'James','Borsje-Clark',NULL,'',NULL,'Christchurch','TEST STATE',NULL,'03/06/1987',55,NULL,NULL,NULL,'New Zealand','');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_history`
--

LOCK TABLES `search_history` WRITE;
/*!40000 ALTER TABLE `search_history` DISABLE KEYS */;
INSERT INTO `search_history` VALUES (1,'i hope this query saves',1495773914),(2,'mtb',1496426486),(3,'image',1496972889),(4,'water',1496972893),(5,'water',1496972900),(6,'city',1496973058),(7,'mtb',1497246850),(8,'woods',1504018412),(9,'waterfall',1504018418),(10,'halfpipe',1504018428),(11,'halfpipe',1504018555),(12,'halfpipe',1504018710),(13,'halfpipe',1504018733),(14,'halfpipe',1504018751),(15,'halfpipe',1504019576),(16,'halfpipe',1504019616),(17,'halfpipe',1504019645),(18,'halfpipe',1504019711),(19,'halfpipe',1504019740),(20,'halfpipe',1504019743),(21,'halfpipe',1504019885),(22,'halfpipe',1504019909),(23,'halfpipe',1504020078),(24,'halfpipe',1504020283);
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
) ENGINE=InnoDB AUTO_INCREMENT=367 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (145,NULL),(167,NULL),(78,''),(162,'9/11'),(207,'911'),(128,'a'),(126,'add'),(276,'air'),(77,'air bubbles'),(132,'air force'),(229,'airplane'),(203,'album cover'),(298,'alday'),(278,'alps'),(246,'amazon-2'),(124,'another'),(242,'ao nang'),(323,'arches national park'),(239,'armchairs'),(180,'asbestos\\'),(262,'asia'),(325,'aspen'),(326,'autumn'),(129,'b'),(211,'baby'),(212,'baby elephant'),(200,'backflip'),(214,'bat'),(215,'batman'),(244,'BC'),(349,'beach'),(261,'below'),(275,'berm'),(260,'bike'),(254,'bike drop'),(295,'bitcoin'),(305,'black and white'),(234,'blue'),(131,'blue jets'),(306,'blue pond'),(355,'blue water'),(364,'boardwalk'),(152,'boat'),(201,'boating'),(57,'boots'),(166,'Brian'),(359,'bridal veil falls'),(348,'bridge'),(154,'building'),(150,'bus'),(151,'bus tour'),(164,'bush'),(163,'bush did 9/11'),(251,'cactus'),(338,'canyon'),(223,'cartoon'),(221,'cave'),(204,'cdjs'),(141,'chairs'),(310,'city'),(304,'cityscape'),(191,'Cliff Dive'),(354,'cliffs'),(335,'climbing'),(297,'clock'),(138,'cloud'),(181,'clouds'),(237,'colorado river'),(74,'cowboy'),(332,'creek'),(293,'crypto mining'),(220,'crystal'),(136,'cumulo nimbus'),(247,'cyclist'),(226,'daytime'),(328,'deck'),(224,'denver'),(81,'dirt'),(205,'dj'),(230,'DJ Sasha'),(362,'dog walking'),(269,'downhill'),(60,'downhill mountain bike'),(142,'drawing room'),(271,'dry'),(366,'dunes'),(148,'e-cigg'),(210,'elephant'),(270,'elevation'),(173,'fake nose'),(327,'fall'),(177,'fire'),(178,'fire extinguisher'),(179,'fireman'),(153,'fishing'),(258,'flow trail'),(300,'foliage'),(299,'forest'),(279,'fresh woodlands'),(71,'frozen lake'),(345,'frozen waterfall'),(268,'full face'),(240,'furniture'),(209,'george w'),(174,'glasses'),(272,'goggles'),(363,'golden retriever'),(236,'grand canyon'),(273,'grass'),(280,'green'),(301,'green forest'),(303,'green pond'),(171,'groucho'),(228,'gv'),(315,'halfpipe'),(109,'harley'),(216,'harley quinn'),(170,'healthy'),(253,'helmet'),(324,'hiking'),(344,'hole'),(343,'hole-in-the-rock'),(108,'hope'),(75,'horse'),(341,'hot spring'),(248,'hottie'),(232,'House Music'),(321,'ice'),(185,'interstellar'),(87,'island'),(307,'japan'),(217,'jeep'),(227,'jet'),(192,'Jump'),(176,'junior'),(113,'laces'),(330,'ladder'),(188,'lake'),(80,'lambo'),(140,'leather'),(333,'leaves'),(233,'Legend'),(288,'lift access'),(206,'loud'),(133,'loud noises'),(127,'many'),(172,'marx'),(165,'me'),(309,'middle east'),(294,'mining rig'),(218,'moab'),(147,'mod'),(187,'moon'),(308,'mosque'),(318,'moss'),(283,'motivation'),(83,'mountain'),(61,'mountain bike'),(285,'mountain biking'),(320,'mountain lake'),(274,'mountain terrain bike'),(257,'mountains'),(59,'mtb'),(277,'mtb event'),(346,'new hampshire'),(314,'new tag'),(189,'night'),(238,'nike'),(130,'no'),(197,'no person'),(65,'ocean'),(353,'ocean cliff'),(68,'ocean kayak'),(119,'once'),(115,'once?'),(120,'one'),(144,'one more for good luck'),(222,'oregon'),(193,'palm tree'),(339,'panarama'),(357,'park city'),(311,'path'),(135,'phillipines'),(186,'photoshop'),(157,'pine'),(213,'pink blanket'),(72,'pond'),(336,'pool'),(190,'Portugal'),(175,'pot pie'),(82,'pow'),(195,'powerman 5000'),(282,'progress'),(360,'provo canyon'),(352,'puddle'),(250,'red'),(267,'red bull'),(156,'red pine'),(219,'redrock'),(329,'river'),(351,'rock'),(317,'rocks'),(319,'rocky beach'),(264,'rollers'),(241,'rotate'),(350,'round rock'),(296,'rx480'),(347,'sabbaday falls'),(169,'salad'),(168,'salada'),(365,'sand dunes'),(231,'Sasha'),(160,'scuba'),(143,'scuba diver'),(199,'sewer'),(287,'shadow'),(263,'shepard'),(255,'single track'),(245,'ski'),(358,'ski resort'),(139,'sky'),(159,'skydive'),(225,'skyline'),(334,'slot canyon'),(134,'small boat'),(56,'snow'),(55,'snowboard boots'),(291,'snowboarding'),(289,'snowcap'),(102,'something'),(337,'spring'),(322,'springtime'),(259,'summer'),(313,'sunlight'),(312,'sunrays'),(194,'sunset'),(342,'swimming'),(290,'tail whip'),(208,'terrorism'),(118,'test'),(114,'testing'),(123,'this'),(125,'three'),(340,'timelapse'),(281,'tower'),(158,'tree'),(302,'trees'),(149,'triple decker bus'),(117,'trying to duplicate'),(116,'twice'),(356,'twin falls'),(121,'two'),(243,'upsidedown'),(146,'vape'),(196,'wakeboard'),(256,'wales'),(361,'walk dog'),(155,'warehouse'),(161,'water'),(316,'waterfall'),(235,'wave'),(182,'whale shark'),(63,'whaleshark'),(286,'wheelie'),(137,'white cloud'),(249,'wide'),(76,'winter'),(198,'wolfgang'),(202,'wolfgang gartner'),(284,'woman'),(122,'won'),(265,'wood jib'),(266,'wood job'),(292,'woods'),(184,'yang'),(110,'yes'),(183,'ying'),(331,'zion');
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
INSERT INTO `user` VALUES (1,'Brian','bcm811@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf296ed6c','6ed6c','/users/avatars/phphESW45.jpg','Brian',NULL,NULL,NULL,1,1483998888,'','cus_ADTXNccVQKXBVP'),(3,'test_account','test@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08c595a','c595a',NULL,'Ludo',NULL,'Bagman',NULL,2,1483998888,'',NULL),(4,'second_test','test2@test.com','9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08b0bfc','b0bfc',NULL,'Rita',NULL,'Skeeter',NULL,2,1483998888,'',NULL),(5,'default','default@gmail.com','62baffea5308be78831d703e8101157cf9c950c53d7bf80ac3810779c44ecf29iÎ³îégü','iÎ³îégü','/users/avatars/phpjlM80a.png','Ronald',NULL,'Weasley',NULL,2,1483998888,'','cus_A9gDNkV2vTWaw0'),(6,'tester','tester@tester.com','7abcddbb2c74e4c0789c2c0aa6abcf5172e82e9f4916bc6409fc3989ed673e08-v­kn×','-v­kn×','/users/avatars/phpurauEi.png','Hermione',NULL,'Granger',NULL,2,1488484260,NULL,NULL),(7,'tester2','tester2@tester2.com','7cd477192d54ceb8673be093f443b8622c612896880f6879c7f8ec16fa7ba114Bö\"VãÈ','Bö\"VãÈ','/users/avatars/phpFKlffA.png','Cornelius',NULL,'Fudge',NULL,2,1488485073,NULL,NULL),(8,'buy','buy@buy.com','37db0a2d4e9ff39261fb2aafdaee60625f7e6dd1ba6260a85f7258f76ed0d011béÿý2[','béÿý2[',NULL,'Habeus',NULL,'Hagrid',NULL,2,1488485162,NULL,'cus_ADS0enKkH1xmgl'),(9,'buy2','buy2@buy2.com','f2eb7711ddc912fe7fd271b0192ca4dedaabfb5b2bd2a790bac0bc986f80f9deŠB“ä²•¬','ŠB“ä²•¬',NULL,'Albus',NULL,'Dumbledore',NULL,2,1488485173,NULL,'cus_ADRl2mVytCOaMH'),(10,'JamesBC','j_borsje-clark@windowslive.com','30aca92b73909661df7052fd91c18f5aad958b7dfff025f4675f00cea16b849c«KÚû1-ý','«KÚû1-ý','/users/avatars/phpvJYOtZ.jpg',NULL,NULL,NULL,NULL,2,1503767939,NULL,NULL);
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

-- Dump completed on 2017-09-06 19:20:56
