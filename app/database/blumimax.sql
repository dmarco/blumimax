-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2014 at 11:08 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blumimax`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorias_parent_id_index` (`parent_id`),
  KEY `categorias_lft_index` (`lft`),
  KEY `categorias_rgt_index` (`rgt`),
  KEY `categories_parent_id_index` (`parent_id`),
  KEY `categories_lft_index` (`lft`),
  KEY `categories_rgt_index` (`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `created_at`, `updated_at`, `name`, `slug`) VALUES
(1, NULL, 1, 10, 0, '2014-10-28 18:30:40', '2014-10-28 18:33:32', 'Cargador de Batería', 'cargador-de-bateria'),
(2, 1, 2, 3, 1, '2014-10-28 18:32:02', '2014-10-28 18:32:02', 'Con Cables y Pinzas', 'con-cables-y-pinzas'),
(3, 1, 4, 5, 1, '2014-10-28 18:33:18', '2014-10-28 18:33:18', 'Para Tablero', 'para-tablero'),
(4, 1, 6, 7, 1, '2014-10-28 18:33:24', '2014-10-28 18:33:24', 'PCM', 'pcm'),
(5, 1, 8, 9, 1, '2014-10-28 18:33:32', '2014-10-28 18:33:32', 'PCX', 'pcx'),
(6, NULL, 11, 18, 0, '2014-10-28 18:33:47', '2014-10-28 18:34:14', 'Compresores Dogo', 'compresores-dogo'),
(7, 6, 12, 13, 1, '2014-10-28 18:33:59', '2014-10-28 18:33:59', 'Compresores Especialistas', 'compresores-especialistas'),
(8, 6, 14, 15, 1, '2014-10-28 18:34:07', '2014-10-28 18:34:07', 'Compresores sin Aceite', 'compresores-sin-aceite'),
(9, 6, 16, 17, 1, '2014-10-28 18:34:13', '2014-10-28 18:34:14', 'Profesionales', 'profesionales'),
(10, NULL, 19, 36, 0, '2014-10-28 18:34:25', '2014-10-28 18:35:56', 'Estabilizador de Tensión', 'estabilizador-de-tension'),
(11, 10, 20, 21, 1, '2014-10-28 18:34:46', '2014-10-28 18:34:46', 'Línea PE2 Alta Potencia', 'linea-pe2-alta-potencia'),
(12, 10, 22, 23, 1, '2014-10-28 18:35:13', '2014-10-28 18:35:13', 'Línea PE2 baja Potencia', 'linea-pe2-baja-potencia'),
(13, 10, 24, 25, 1, '2014-10-28 18:35:20', '2014-10-28 18:35:20', 'Línea PE2 Media Potencia', 'linea-pe2-media-potencia'),
(14, 10, 26, 27, 1, '2014-10-28 18:35:28', '2014-10-28 18:35:28', 'Línea PE3', 'linea-pe3'),
(15, 10, 28, 29, 1, '2014-10-28 18:35:35', '2014-10-28 18:35:35', 'Línea PET', 'linea-pet'),
(16, 10, 30, 31, 1, '2014-10-28 18:35:42', '2014-10-28 18:35:42', 'Línea PET más', 'linea-pet-mas'),
(17, 10, 32, 33, 1, '2014-10-28 18:35:49', '2014-10-28 18:35:49', 'Línea PET Otro', 'linea-pet-otro'),
(18, 10, 34, 35, 1, '2014-10-28 18:35:56', '2014-10-28 18:35:56', 'Para Heladera', 'para-heladera'),
(19, NULL, 37, 38, 0, '2014-10-28 18:36:22', '2014-10-28 18:56:44', 'Generadores-Honda', 'generadores-honda'),
(21, NULL, 39, 40, 0, '2014-10-28 18:57:26', '2014-10-28 18:57:26', 'Generadores-Powered by Honda', 'generadores-powered-by-honda'),
(22, NULL, 41, 42, 0, '2014-10-28 18:57:36', '2014-10-28 18:57:36', 'Inversores de Tensión', 'inversores-de-tension'),
(23, NULL, 43, 46, 0, '2014-10-28 18:57:49', '2014-10-28 18:58:08', 'Línea Jardín', 'linea-jardin'),
(24, 23, 44, 45, 1, '2014-10-28 18:58:08', '2014-10-28 18:58:08', 'Cortadora de Césped', 'cortadora-de-cesped'),
(25, NULL, 47, 48, 0, '2014-10-28 18:58:20', '2014-10-28 18:58:20', 'Motobombas', 'motobombas'),
(26, NULL, 49, 84, 0, '2014-10-28 18:58:28', '2014-10-28 19:02:16', 'Motores', 'motores'),
(27, 26, 50, 51, 1, '2014-10-28 18:58:48', '2014-10-28 18:58:48', 'Estacionarios Honda', 'estacionarios-honda'),
(28, 26, 52, 83, 1, '2014-10-28 18:58:58', '2014-10-28 19:02:16', 'Motorarg', 'motorarg'),
(29, 28, 53, 58, 2, '2014-10-28 18:59:14', '2014-10-28 18:59:54', 'Monofásicos', 'monofasicos'),
(30, 28, 59, 76, 2, '2014-10-28 18:59:23', '2014-10-28 19:01:34', 'Presurización/Circulación', 'presurizacioncirculacion'),
(31, 28, 77, 82, 2, '2014-10-28 18:59:30', '2014-10-28 19:02:16', 'Trifásicos', 'trifasicos'),
(32, 29, 54, 55, 3, '2014-10-28 18:59:47', '2014-10-28 18:59:47', 'Línea MAP', 'linea-map'),
(33, 29, 56, 57, 3, '2014-10-28 18:59:54', '2014-10-28 18:59:54', 'Línea MDC', 'linea-mdc'),
(34, 30, 60, 63, 3, '2014-10-28 19:00:05', '2014-10-28 19:00:49', 'Circuladoras con Purgador de Aire', 'circuladoras-con-purgador-de-aire'),
(35, 30, 64, 69, 3, '2014-10-28 19:00:11', '2014-10-28 19:01:16', 'Circuladoras para Agua Caliente', 'circuladoras-para-agua-caliente'),
(36, 30, 70, 75, 3, '2014-10-28 19:00:21', '2014-10-28 19:01:34', 'Presurizadoras', 'presurizadoras'),
(37, 34, 61, 62, 4, '2014-10-28 19:00:49', '2014-10-28 19:00:49', 'Línea RCL DEGASSER', 'linea-rcl-degasser'),
(38, 35, 65, 66, 4, '2014-10-28 19:01:08', '2014-10-28 19:01:08', 'Línea RCL', 'linea-rcl'),
(39, 35, 67, 68, 4, '2014-10-28 19:01:16', '2014-10-28 19:01:16', 'Línea RCL SANITARIA', 'linea-rcl-sanitaria'),
(40, 36, 71, 72, 4, '2014-10-28 19:01:25', '2014-10-28 19:01:25', 'Línea TIP', 'linea-tip'),
(41, 36, 73, 74, 4, '2014-10-28 19:01:34', '2014-10-28 19:01:34', 'Línea TIPFRESH', 'linea-tipfresh'),
(42, 31, 78, 79, 3, '2014-10-28 19:02:09', '2014-10-28 19:02:09', 'Línea MF', 'linea-mf'),
(43, 31, 80, 81, 3, '2014-10-28 19:02:16', '2014-10-28 19:02:16', 'Línea MT', 'linea-mt'),
(44, NULL, 85, 146, 0, '2014-10-28 19:02:32', '2014-10-28 19:08:20', 'Piscinas', 'piscinas'),
(45, 44, 86, 87, 1, '2014-10-28 19:03:22', '2014-10-28 19:03:22', 'Acoples rápidos y Uniones Dobles', 'acoples-rapidos-y-uniones-dobles'),
(46, 44, 88, 89, 1, '2014-10-28 19:03:29', '2014-10-28 19:03:29', 'Bombas Autocebantes Monofásicas', 'bombas-autocebantes-monofasicas'),
(47, 44, 90, 91, 1, '2014-10-28 19:03:36', '2014-10-28 19:03:36', 'Bombas Autocebantes Trifásicas', 'bombas-autocebantes-trifasicas'),
(48, 44, 92, 93, 1, '2014-10-28 19:03:43', '2014-10-28 19:03:43', 'Bombas Centrífugas', 'bombas-centrifugas'),
(49, 44, 94, 95, 1, '2014-10-28 19:03:51', '2014-10-28 19:03:51', 'Carro porta filtro', 'carro-porta-filtro'),
(50, 44, 96, 97, 1, '2014-10-28 19:03:59', '2014-10-28 19:03:59', 'Carros Porta Bombas', 'carros-porta-bombas'),
(51, 44, 98, 99, 1, '2014-10-28 19:04:06', '2014-10-28 19:04:06', 'Dosificadores', 'dosificadores'),
(52, 44, 100, 101, 1, '2014-10-28 19:04:13', '2014-10-28 19:04:13', 'Electrobombas Autodrenantes', 'electrobombas-autodrenantes'),
(53, 44, 102, 103, 1, '2014-10-28 19:04:20', '2014-10-28 19:04:20', 'Electrobombas sopladores de Aire', 'electrobombas-sopladores-de-aire'),
(54, 44, 104, 105, 1, '2014-10-28 19:04:27', '2014-10-28 19:04:27', 'Escaleras peldanios de Acero', 'escaleras-peldanios-de-acero'),
(55, 44, 106, 107, 1, '2014-10-28 19:04:35', '2014-10-28 19:04:35', 'Escaleras peldanios de Plástico', 'escaleras-peldanios-de-plastico'),
(56, 44, 108, 109, 1, '2014-10-28 19:04:42', '2014-10-28 19:04:42', 'Filtros', 'filtros'),
(57, 44, 110, 117, 1, '2014-10-28 19:04:48', '2014-10-28 19:07:25', 'Iluminación Subacuática', 'iluminacion-subacuatica'),
(58, 44, 118, 129, 1, '2014-10-28 19:04:55', '2014-10-28 19:08:20', 'Limpia Fondos', 'limpia-fondos'),
(59, 44, 130, 131, 1, '2014-10-28 19:05:03', '2014-10-28 19:08:20', 'Mangueras', 'mangueras'),
(60, 44, 132, 133, 1, '2014-10-28 19:05:10', '2014-10-28 19:08:20', 'Multiválvulas', 'multivalvulas'),
(61, 44, 134, 135, 1, '2014-10-28 19:05:17', '2014-10-28 19:08:20', 'Productos Químicos', 'productos-quimicos'),
(62, 44, 136, 137, 1, '2014-10-28 19:05:24', '2014-10-28 19:08:20', 'Retornos', 'retornos'),
(63, 44, 138, 139, 1, '2014-10-28 19:05:30', '2014-10-28 19:08:20', 'Skimmers', 'skimmers'),
(64, 44, 140, 141, 1, '2014-10-28 19:05:38', '2014-10-28 19:08:20', 'Tomas de Fondo', 'tomas-de-fondo'),
(65, 44, 142, 143, 1, '2014-10-28 19:05:44', '2014-10-28 19:08:20', 'Trampa de Pelo', 'trampa-de-pelo'),
(66, 44, 144, 145, 1, '2014-10-28 19:05:51', '2014-10-28 19:08:20', 'Virolas', 'virolas'),
(67, 57, 111, 112, 2, '2014-10-28 19:07:08', '2014-10-28 19:07:08', 'Lámparas Halogenas', 'lamparas-halogenas'),
(68, 57, 113, 114, 2, '2014-10-28 19:07:17', '2014-10-28 19:07:17', 'Led', 'led'),
(69, 57, 115, 116, 2, '2014-10-28 19:07:25', '2014-10-28 19:07:25', 'Spot', 'spot'),
(70, 58, 119, 120, 2, '2014-10-28 19:07:40', '2014-10-28 19:07:40', 'Cepillos', 'cepillos'),
(71, 58, 121, 122, 2, '2014-10-28 19:07:57', '2014-10-28 19:07:57', 'Con Cepillos', 'con-cepillos'),
(72, 58, 123, 124, 2, '2014-10-28 19:08:04', '2014-10-28 19:08:04', 'Con Ruedas', 'con-ruedas'),
(73, 58, 125, 126, 2, '2014-10-28 19:08:13', '2014-10-28 19:08:13', 'Mangos', 'mangos'),
(74, 58, 127, 128, 2, '2014-10-28 19:08:20', '2014-10-28 19:08:20', 'Saca Hojas', 'saca-hojas'),
(75, NULL, 147, 152, 0, '2014-10-28 19:09:08', '2014-10-28 19:09:50', 'Soldadoras', 'soldadoras'),
(76, NULL, 153, 154, 0, '2014-10-28 19:09:25', '2014-10-28 19:09:50', 'UP''s', 'ups'),
(77, 75, 148, 149, 1, '2014-10-28 19:09:39', '2014-10-28 19:09:39', 'Soldadoras DOGO', 'soldadoras-dogo'),
(78, 75, 150, 151, 1, '2014-10-28 19:09:50', '2014-10-28 19:09:50', 'Soldadoras Powered by HONDA', 'soldadoras-powered-by-honda');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_23_192726_create_categories_table', 1),
('2014_09_23_192807_create_products_table', 1),
('2014_09_23_192839_create_users_table', 1),
('2014_09_30_031048_add_parent_to_categories', 2),
('2014_10_01_194144_create_categorias_table', 3),
('2014_10_01_203312_add_name_to_categorias', 4),
('2014_10_07_163536_cambio_nombre_tabla_categories', 5),
('2014_10_07_180127_cambio_nombre_tabla_categorias', 6),
('2014_10_09_205606_create_products_table', 7),
('2014_10_09_210459_add_to_categories', 8),
('2014_10_09_211050_create_products_categories_table', 9),
('2014_10_28_022805_add_slug_to_categories', 10),
('2014_10_28_220612_add_new_fields_products', 11);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `technical_data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pref_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `availability`, `image`, `manual`, `technical_data`, `pref_id`, `created_at`, `updated_at`) VALUES
(2, 'Producto Sin Nombre', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 99.99, 1, 'img/products/1414528755.Foto.png', '', '', '92714091-a77e277d-7106-42be-938a-ad8398563e2e', '2014-10-28 23:39:15', '2014-10-28 23:39:15'),
(3, 'Producto Sin Nombre', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 99.99, 1, 'img/products/1414528942.Foto.png', '', '', '92714091-a77e277d-7106-42be-938a-ad8398563e2e', '2014-10-28 23:42:22', '2014-10-28 23:42:22'),
(4, 'Producto Sin Nombre', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 99.99, 1, 'img/products/1414529006.Foto.png', '', '', '92714091-a77e277d-7106-42be-938a-ad8398563e2e', '2014-10-28 23:43:26', '2014-10-28 23:43:26'),
(5, 'Producto Sin Nombre', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 99.99, 1, 'img/products/1414529030.Foto.png', '', '', '92714091-a77e277d-7106-42be-938a-ad8398563e2e', '2014-10-28 23:43:50', '2014-10-28 23:43:50'),
(20, 'Test', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 49.99, 1, 'img/products/1414554187.ET12000.png', 'img/manual/1414554187.Texto ET12000.docx', 'img/technical_data/1414554187.fichatecnicaET12000.pdf', '3485v730487v5n0983247v059873n248975v', '2014-10-29 06:43:07', '2014-10-29 06:43:07'),
(21, 'Test 2', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.', 49.99, 1, 'img/products/1414555535.ET12000.png', '', '', '3485v730487v5n0983247v059873n248975v', '2014-10-29 07:05:35', '2014-10-29 07:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(20, 76),
(21, 78);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`, `admin`, `created_at`, `updated_at`) VALUES
(1, 'Damián', 'Marcote', 'damian@wirallinteractive.com.ar', '$2y$10$wJNJnLTk8kM5DQIwj6qhqeFA4x5xtxak/aNO3XWqOblWpbMEANo0K', '47867564787', 1, '2014-09-23 22:47:39', '2014-09-23 22:47:39'),
(2, 'Test', 'Test', 'test@test.com', '$2y$10$iM3AV4YZPXjpQzDbQQJnY.88jOztMuSW/BhHOdx0Ga2GmXYkSt8Y2', '987632487634', 0, '2014-09-23 23:10:53', '2014-09-23 23:10:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
