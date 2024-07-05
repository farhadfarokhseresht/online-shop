-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.3.0 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for onlineshop
CREATE DATABASE IF NOT EXISTS `onlineshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `onlineshop`;

-- Dumping structure for table onlineshop.address
CREATE TABLE IF NOT EXISTS `address` (
  `user_id` int NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `plack` varchar(50) NOT NULL,
  `vahed` varchar(50) NOT NULL,
  `codposti` varchar(50) NOT NULL,
  `codmli` varchar(50) NOT NULL,
  `address1` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.address: 0 rows
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table onlineshop.admin_info
CREATE TABLE IF NOT EXISTS `admin_info` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.admin_info: 1 rows
/*!40000 ALTER TABLE `admin_info` DISABLE KEYS */;
INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
	(1000, 'm7m3x', 'test@gmail.com', '123');
/*!40000 ALTER TABLE `admin_info` ENABLE KEYS */;

-- Dumping structure for table onlineshop.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL,
  `brand_title` varchar(50) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.brands: 0 rows
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping structure for table onlineshop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `p_id` int DEFAULT NULL,
  `ip_add` varchar(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.cart: 0 rows
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table onlineshop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL,
  `cat_title` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.categories: 1 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
	(1, 'Test1');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table onlineshop.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `province_id` (`province_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.cities: 0 rows
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

-- Dumping structure for table onlineshop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `final_cost` decimal(10,2) NOT NULL,
  `creat_at` date NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.orders: 0 rows
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table onlineshop.order_products
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.order_products: 0 rows
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;

-- Dumping structure for table onlineshop.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_cat` int NOT NULL,
  `product_brand` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_cat` (`product_cat`),
  KEY `product_brand` (`product_brand`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.products: 0 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table onlineshop.product_meta
CREATE TABLE IF NOT EXISTS `product_meta` (
  `meta_id` int NOT NULL,
  `productId` int DEFAULT NULL,
  `feature` varchar(50) NOT NULL,
  `keyy` varchar(50) NOT NULL,
  `val` varchar(255) NOT NULL,
  PRIMARY KEY (`meta_id`),
  KEY `productId` (`productId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.product_meta: 0 rows
/*!40000 ALTER TABLE `product_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_meta` ENABLE KEYS */;

-- Dumping structure for table onlineshop.provinces
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.provinces: 0 rows
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;

-- Dumping structure for table onlineshop.user_info
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `update_at` date NOT NULL DEFAULT (0),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table onlineshop.user_info: 1 rows
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `update_at`) VALUES
	(1000, 'Moha', 'Saw', '09123123123', 'test', 'test', '0000-00-00');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
