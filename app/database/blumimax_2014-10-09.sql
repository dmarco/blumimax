# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.34)
# Database: blumimax
# Generation Time: 2014-10-09 21:56:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table _categories_old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `_categories_old`;

CREATE TABLE `_categories_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `_categories_old` WRITE;
/*!40000 ALTER TABLE `_categories_old` DISABLE KEYS */;

INSERT INTO `_categories_old` (`id`, `name`, `parent_id`, `created_at`, `updated_at`)
VALUES
	(1,'Desktops',0,'2014-09-23 19:30:58','2014-09-23 19:30:58'),
	(2,'Laptops',0,'2014-09-23 19:31:04','2014-09-23 19:31:04'),
	(3,'Smartphones',0,'2014-09-23 19:31:11','2014-09-23 19:31:11'),
	(5,'Tablets',0,'2014-09-23 19:31:25','2014-09-23 19:31:25'),
	(6,'HTC One X',3,'2014-10-01 15:29:16','2014-10-01 15:29:16'),
	(7,'Child 2',0,'2014-10-01 20:40:40','2014-10-01 20:40:40'),
	(8,'Child 2',0,'2014-10-01 20:41:12','2014-10-01 20:41:12'),
	(9,'R1',0,'2014-10-01 20:45:55','2014-10-01 20:45:55'),
	(10,'R2',0,'2014-10-01 20:45:55','2014-10-01 20:45:55'),
	(11,'C1',0,'2014-10-01 20:45:55','2014-10-01 20:45:55'),
	(12,'C2',0,'2014-10-01 20:45:55','2014-10-01 20:45:55');

/*!40000 ALTER TABLE `_categories_old` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table _products_old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `_products_old`;

CREATE TABLE `_products_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `_categories_old` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `_products_old` WRITE;
/*!40000 ALTER TABLE `_products_old` DISABLE KEYS */;

INSERT INTO `_products_old` (`id`, `category_id`, `title`, `description`, `price`, `availability`, `image`, `created_at`, `updated_at`)
VALUES
	(1,1,'PC','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. ',799.99,1,'img/products/2014-09-23-19:31:59-desktop-upload.jpg','2014-09-23 19:31:59','2014-09-24 19:12:53'),
	(2,2,'Dell Inspiron 1525','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. ',1299.99,1,'img/products/2014-09-23-19:32:28-laptop-upload.jpg','2014-09-23 19:32:28','2014-09-23 19:32:28'),
	(3,3,'Samsung S3','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. ',3299.99,1,'img/products/2014-09-23-19:32:46-smartphone-upload.jpg','2014-09-23 19:32:46','2014-09-23 19:32:46'),
	(4,5,'Ipad','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. ',8899.99,1,'img/products/2014-09-23-19:33:03-tablet-upload.jpg','2014-09-23 19:33:03','2014-09-23 19:33:03'),
	(5,2,'Dell Inspiron 1425','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. ',999.99,1,'img/products/2014-09-23-19:33:34-laptop-upload.jpg','2014-09-23 19:33:34','2014-09-23 19:33:34'),
	(6,3,'HTC','Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo \"Contenido aquí, contenido aquí\". Estos textos hacen parecerlo un español que se puede leer.',3699.99,1,'img/products/2014-09-24-21:01:25-smartphone-upload.jpg','2014-09-24 21:01:26','2014-09-24 21:01:26');

/*!40000 ALTER TABLE `_products_old` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_parent_id_index` (`parent_id`),
  KEY `categorias_lft_index` (`lft`),
  KEY `categorias_rgt_index` (`rgt`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_lft_index` (`lft`),
  KEY `categories_rgt_index` (`rgt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `created_at`, `updated_at`, `name`)
VALUES
	(2,NULL,1,12,0,'2014-10-02 19:42:27','2014-10-08 20:44:40','Hombres'),
	(5,NULL,13,58,0,'2014-10-02 20:02:45','2014-10-08 20:44:40','Mujeres'),
	(6,2,2,11,1,'2014-10-02 20:03:51','2014-10-08 20:44:40','Ropa Interior'),
	(17,6,3,8,2,'2014-10-02 20:58:12','2014-10-08 20:44:40','Boxer'),
	(21,5,14,23,1,'2014-10-06 18:14:12','2014-10-08 20:44:40','Ropa Interior'),
	(44,21,15,16,2,'2014-10-07 19:25:22','2014-10-08 20:44:40','Conjuntos'),
	(47,21,21,22,2,'2014-10-08 19:41:22','2014-10-08 20:44:40','Medias'),
	(50,6,9,10,2,'2014-10-08 20:44:01','2014-10-08 20:44:40','Slip'),
	(51,17,4,5,3,'2014-10-08 20:44:30','2014-10-08 20:44:30','Lycra'),
	(52,17,6,7,3,'2014-10-08 20:44:40','2014-10-08 20:44:40','Algodón');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_09_23_192726_create_categories_table',1),
	('2014_09_23_192807_create_products_table',1),
	('2014_09_23_192839_create_users_table',1),
	('2014_09_30_031048_add_parent_to_categories',2),
	('2014_10_01_194144_create_categorias_table',3),
	('2014_10_01_203312_add_name_to_categorias',4),
	('2014_10_07_163536_cambio_nombre_tabla_categories',5),
	('2014_10_07_180127_cambio_nombre_tabla_categorias',6),
	('2014_10_09_205606_create_products_table',7),
	('2014_10_09_210459_add_to_categories',8),
	('2014_10_09_211050_create_products_categories_table',9);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `description`, `price`, `availability`, `image`, `created_at`, `updated_at`)
VALUES
	(1,'Boxer Adidas','Blablablablablabla',255.99,1,'NULL','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products_categories`;

CREATE TABLE `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `products_categories` WRITE;
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;

INSERT INTO `products_categories` (`product_id`, `category_id`)
VALUES
	(1,17);

/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`, `admin`, `created_at`, `updated_at`)
VALUES
	(1,'Damián','Marcote','damian@wirallinteractive.com.ar','$2y$10$wJNJnLTk8kM5DQIwj6qhqeFA4x5xtxak/aNO3XWqOblWpbMEANo0K','47867564787',1,'2014-09-23 19:47:39','2014-09-23 19:47:39'),
	(2,'Test','Test','test@test.com','$2y$10$iM3AV4YZPXjpQzDbQQJnY.88jOztMuSW/BhHOdx0Ga2GmXYkSt8Y2','987632487634',0,'2014-09-23 20:10:53','2014-09-23 20:10:53');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
